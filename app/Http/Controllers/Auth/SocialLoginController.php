<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Carbon\Carbon;
use App\Models\User;

class SocialLoginController extends Controller
{
    /**
     * Handle Social login request
     *
     * @param $social
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function socialLogin($social)
    {
        $socialite = \App\Models\Socialite::first();

        if (\request()->has('secret_key')) {
            $secret_key = \request()->get('secret_key');
            if ($secret_key == $socialite->app_secret_key) {
                return Socialite::driver($social)->redirect();
            }
        }

        abort(403, 'Sorry !! You are not login as user!');
    }

    /**
     * Obtain the user information from Soci
     * @param $social
     */
    public function handleProviderCallback($social)
    {
        $userSocial = Socialite::driver($social)->stateless()->user();

        $NameArray = explode(' ',$userSocial->getName());
        $First_name = $NameArray[0];
        $Last_name = $NameArray[1];

        $user = User::where('provider_id', $userSocial->getId())
            ->orWhere('email', $userSocial->getEmail())
            ->first();

        if (!empty($user)) {
            Auth::guard('web')->login($user);
            return redirect()->route('dashboard');
        }

        $user = User::create([
            'email' => $userSocial->getEmail(),
            'fname' => $First_name,
            'lname' => $Last_name,
            'provider_type' => 1,
            'provider_id' => $userSocial->getId(),
            'password' => bcrypt(Str::random(8)),
            'image' => $userSocial->getAvatar(),
            'email_verified_at' => Carbon::now()
        ]);

        Auth::guard('web')->login($user);

        return redirect()->route('dashboard');
    }
}
