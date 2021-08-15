<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use FFMpeg\Coordinate\Dimension;
use App\Models\Admin;
use App\Models\Course;
use App\Models\Companyinfo;
use App\Models\User;
use FFMpeg;

class CourseController extends Controller
{
    public function course_show()
    {
        $companyinfo = Companyinfo::first();
        $courses = Course::all();
        return view('frontend.pages.courses.popular',compact('courses','companyinfo'));
    }

    public function course_details($id,$slug)
    {
        $companyinfo = Companyinfo::first();
        $course = Course::find($id);
        
        $media = FFMpeg::open($course->file);
        $duration = $media->getDimensions(); // returns an int
        return view('frontend.pages.courses.course-details',compact('course','companyinfo','duration'));
    }

    public function course_type($type)
    {
        //dd('course-type');
        $companyinfo = Companyinfo::first();

        $courses = Course::where('course_type',$type)->get();

        return view('frontend.pages.courses.search_by_course_type',compact('companyinfo','courses'));
    }
}
