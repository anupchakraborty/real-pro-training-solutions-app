<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Admin;
use App\Models\Course;
use App\Models\Companyinfo;
use App\Models\User;

class CourseController extends Controller
{
    public function course_show()
    {
        $companyinfo = Companyinfo::first();
        $courses = Course::all();
        return view('frontend.pages.courses.popular',compact('courses','companyinfo'));
    }

    public function course_details($id)
    {
        $companyinfo = Companyinfo::first();
        $course = Course::find($id);
        return view('frontend.pages.courses.course-details',compact('course','companyinfo'));
    }

    public function teacher()
    {
        $companyinfo = Companyinfo::first();
        $courses = Course::all();
        $admins = Admin::all();
        return view('frontend.pages.teacher.index',compact('courses','companyinfo','admins'));
    }

    public function contact()
    {
        $companyinfo = Companyinfo::first();
        $courses = Course::all();
        $admins = Admin::all();
        return view('frontend.pages.contact.index',compact('courses','companyinfo','admins'));
    }
}
