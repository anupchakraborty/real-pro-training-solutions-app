<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Companyinfo;
use App\Models\Course;
use App\Models\Admin;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $companyinfo = Companyinfo::first();
        $courses = Course::all();
        $admins = Admin::all();
        return view('frontend.pages.index',compact('companyinfo','courses','admins'));
    }
}
