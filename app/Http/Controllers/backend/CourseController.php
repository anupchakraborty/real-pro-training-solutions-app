<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Course;

class CourseController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource..
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Role Base Authentication Permision create
        if (is_null($this->user) || !$this->user->can('course.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any course !');
        }

        $courses = Course::all();
        $admins = Admin::all();
        return view('backend.pages.courses.index', compact('courses','admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Role Base Authentication Permision create
        if (is_null($this->user) || !$this->user->can('course.create')) {
            abort(403, 'Sorry !! You are Unauthorized to Create any course !');
        }

        $admins  = Admin::all();
        return view('backend.pages.courses.create', compact('admins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation Data
        $request->validate([
            'title' => 'required|max:100',
            'feature' => 'required|max:250',
            'desctription' => 'required|max:500',
            'admin_id' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'started_date' => 'required',
            'course_type' => 'required',
            'course_session' => 'required',
            'image' => 'required | mimes:jpeg,jpg,png,PNG | max:1000',
        ]);

        //dd($request->all());
        // Create New Admin
        $course = new Course();
        $course->title = $request->title;
        $course->feature = $request->feature;
        $course->desctription = $request->desctription;
        $course->price = $request->price;
        $course->duration = $request->duration;
        $course->started_date = $request->started_date;
        $course->course_type = $request->course_type;
        $course->course_session = $request->course_session;
        $course->admin_id = $request->admin_id;

        if ($request->hasfile('image')) {
       		// Image store in public folder------
	  		$image = $request->file('image'); //catch image from input field
	    	$extension = $image->getClientOriginalExtension(); //image extension define
            $filename = time().'.'.$extension; //image filename define
	    	$image->move('backend/img/courses/',$filename); //image location define im public folder
	    	$course->image = $filename; //image name save in db
	    }
        //dd($course);
        $course->save();
        $notification = array(
           'message' => 'Course has been created !!',
           'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);

    }
        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Role Base Authentication Permision create
        if (is_null($this->user) || !$this->user->can('course.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to Edit any admin !');
        }

        $course = Course::find($id);
        $admins  = Admin::all();
        $courses = Course::all();
        return view('backend.pages.courses.edit', compact('course', 'admins','courses'));
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
         // Validation Data
         $request->validate([
            'title' => 'required|max:100',
            'feature' => 'required|max:250',
            'desctription' => 'required|max:500',
            'admin_id' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'started_date' => 'required',
            'course_type' => 'required',
            'course_session' => 'required',
        ]);
        //dd($request->all());
        // Create New Course
        $course = Course::find($id);
        $course->title = $request->title;
        $course->feature = $request->feature;
        $course->desctription = $request->desctription;
        $course->price = $request->price;
        $course->duration = $request->duration;
        $course->started_date = $request->started_date;
        $course->course_type = $request->course_type;
        $course->course_session = $request->course_session;
        $course->admin_id = $request->admin_id;

        if ($request->hasfile('image')) {
            unlink('backend/img/courses/'.$request->old_image);
            // Image store in public folder------
            $image = $request->file('image'); //catch image from input field
            $extension = $image->getClientOriginalExtension(); //image extension define
            $filename = time().'.'.$extension; //image filename define
            $image->move('backend/img/courses/',$filename); //image location define im public folder
            $course->image = $filename; //image name save in db
        }else{
            $course->image = $request->old_image;
        }
        //dd($course);
        $course->save();
        $notification = array(
            'message' => 'Course has been updated !!',
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
        //Role Base Authentication Permision create
        if (is_null($this->user) || !$this->user->can('course.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to Delete any admin !');
        }

        $course = Course::find($id);
        if (!is_null($course)) {
            $course->delete();
        }

        $notification = array(
            'message' => 'Course has been deleted!!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
