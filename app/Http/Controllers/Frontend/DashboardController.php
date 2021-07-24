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

    public function contant($cid)
    {
        $id = Auth::guard('web')->user()->id;
        $user = User::where('id', $id)->first();
        $companyinfo = Companyinfo::first();
        $orders = Order::where('user_id',$id)->get();
        foreach($orders as $order){
            $complete_order = Cart::where('order_id',$order->id)->first();
            $course = Course::where('id',$complete_order->course_id)->first();
            $contents = Coursecontent::where('course_id',$course->id)->get();
        }
        $course_contant = Coursecontent::where('id',$cid)->first();

        //dd($course_contant->title);
        return view('frontend.pages.dashboard.content',compact('user','companyinfo','course_contant','course','order','contents'));
    }

}
