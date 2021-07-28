<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

    public function course_details($id)
    {
        $companyinfo = Companyinfo::first();
        $course = Course::find($id);
        $ffprobe = FFMpeg\FFProbe::create();
        $ffprobe
            ->format('/path/to/video/mp4') // extracts file informations
            ->get('duration');             // returns the duration property
        dd($ffprobe);
        return view('frontend.pages.courses.course-details',compact('course','companyinfo'));
    }
}
