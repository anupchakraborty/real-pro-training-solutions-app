<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\Companyinfo;
use App\Models\Course;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::guard('web')->user()->id;
        $user = User::where('id', $id)->first();
        $companyinfo = Companyinfo::first();
        $courses = Course::all();
        return view('frontend.pages.dashboard.index',compact('user','companyinfo','courses'));
    }

    public function profile()
    {
        $id = Auth::guard('web')->user()->id;
        $user = User::where('id', $id)->first();
        $companyinfo = Companyinfo::first();
       return view('frontend.pages.profile.index',compact('user','companyinfo'));
    }

}
