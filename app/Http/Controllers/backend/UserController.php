<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function index()
    {
        $users = User::all();
        return view('backend.pages.users.index', compact('users'));
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('backend.pages.users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Create New Admin
        $users = User::find($id);

        // Validation Data
        $request->validate([
            'fname' => 'required|max:50',
            'lname' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        //dd(request()->all());
        $users->fname = $request->fname;
        $users->lname = $request->lname;
        $users->email = $request->email;
        if ($request->password) {
            $users->password = Hash::make($request->password);
        }
        $users->save();

        $notification = array(
            'message' => 'User has been updated !!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
        }

        $notification = array(
            'message' => 'User has been deleted !!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
