<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\Companyinfo;
use App\Models\Course;
use App\Models\Coursecontent;
use App\Models\Order;
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

    public function course($course_id)
    {
        $id = Auth::guard('web')->user()->id;
        $user = User::where('id', $id)->first();
        $companyinfo = Companyinfo::first();
        $course = Course::where('id',$course_id)->first();
        $contents = Coursecontent::where('course_id',$course->id)->get();

        //dd($course_contant);
        return view('frontend.pages.dashboard.content',compact('user','companyinfo','course','contents'));
    }

    public function course_contant($content_id)
    {
        $id = Auth::guard('web')->user()->id;
        $user = User::where('id', $id)->first();
        $companyinfo = Companyinfo::first();

        $course_contant = Coursecontent::where('id',$content_id)->first();
        $course = Course::where('id',$course_contant->course_id)->first();
        $contents = Coursecontent::where('course_id',$course->id)->get();

        $view_content = Coursecontent::find($content_id);
        $view_content->view_status = 1;
        $view_content->save();

        return view('frontend.pages.dashboard.view_content',compact('user','companyinfo','course','contents','course_contant'));
    }

}
