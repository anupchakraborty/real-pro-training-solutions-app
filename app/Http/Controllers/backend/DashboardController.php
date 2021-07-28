<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use App\Models\Admin;
use App\Models\User;
use App\Models\Course;
use App\Models\Order;

class DashboardController extends Controller
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
        if (is_null($this->user) || !$this->user->can('dashboard.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view dashboard !');
        }

        $total_admin = count(Admin::select('id')->get());
        $total_user = count(User::select('id')->get());
        $total_course = count(Course::select('id')->get());
        $total_order = count(Order::select('id')->get());

        return view('backend.pages.dashboard.index',compact('total_admin','total_user','total_course','total_order'));
    }

    public function profile()
    {
        if (is_null($this->user) || !$this->user->can('profile.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view Profile !');
        }
        $id = Auth::guard('admin')->user()->id;
        $admin = Admin::where('id',$id)->first();
        //dd($admin);
        return view('backend.pages.dashboard.profile',compact('admin'));
    }

    public function profile_update()
    {
        if (is_null($this->user) || !$this->user->can('profile.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to view Profile !');
        }
       $id = Auth::guard('admin')->user()->id;
       $profile_info = Admin::where('id',$id)->first();
       return view('backend.pages.dashboard.profile_update',compact('profile_info'));
    }

    public function profile_update_submit(Request $request, $id)
    {
        // Create New Admin
        $admin = Admin::find($id);

        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:admins,email,' . $id,
            'password' => 'nullable|min:6',
            'username' => 'nullable|max:100',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }
        $admin->username = $request->username;

        if ($request->hasfile('image')) {
            unlink('backend/img/admin/'.$request->old_image);
            // Image store in public folder------
            $image = $request->file('image'); //catch image from input field
            $extension = $image->getClientOriginalExtension(); //image extension define
            $filename = time().'.'.$extension; //image filename define
            $image->move('backend/img/admin/',$filename); //image location define im public folder
            $admin->image = $filename; //image name save in db
        }else{
            $admin->image = $request->old_image;
        }
        $admin->save();

        $notification = array(
            'message' => 'Profile has been Updated !!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);
    }
}
