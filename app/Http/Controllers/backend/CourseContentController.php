<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Coursecontent;
use App\Models\Course;

class CourseContentController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Role Base Authentication Permision create
        if (is_null($this->user) || !$this->user->can('course.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any course !');
        }

        $courses_id = DB::table('coursecontents')
                 ->select('course_id')
                 ->groupBy('course_id')
                 ->get();
        return view('backend.pages.courses.course_content.index', compact('courses_id'));
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

        $courses  = Course::all();
        return view('backend.pages.courses.course_content.create', compact('courses'));
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
            'course_id' => 'required',
            'desctription' => 'required|max:500',
            'file' => 'required | mimes:mp4,3gp,mpeg | max:100000',
        ]);

        // Create New Admin
        $coursecontent = new Coursecontent();
        $coursecontent->title = $request->title;
        $coursecontent->course_id = $request->course_id;
        $coursecontent->desctription = $request->desctription;

        if ($request->hasfile('file')) {
       		// File store in public folder------
	  		$file = $request->file('file'); //catch File from input field
	    	$extension = $file->getClientOriginalExtension(); //File extension define
            $filename = time().'.'.$extension; //File filename define
	    	$file->move('backend/courses_content/',$filename); //File location define im public folder
	    	$coursecontent->file = $filename; //File name save in db
	    }
        $coursecontent->save();
        $notification = array(
           'message' => 'Course Content has been created !!',
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

        $coursecontent = Coursecontent::find($id);
        $courses = Course::all();
        return view('backend.pages.courses.course_content.edit', compact('coursecontent','courses'));
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
            'course_id' => 'required',
            'desctription' => 'required|max:500',
        ]);
        //dd($request->all());

        // Create New Admin
        $coursecontent = Coursecontent::find($id);
        $coursecontent->title = $request->title;
        $coursecontent->course_id = $request->course_id;
        $coursecontent->desctription = $request->desctription;

        if ($request->hasfile('file')) {
            unlink('backend/courses_content/'.$request->old_file);
       		// File store in public folder------
	  		$file = $request->file('file'); //catch File from input field
	    	$extension = $file->getClientOriginalExtension(); //File extension define
            $filename = time().'.'.$extension; //File filename define
	    	$file->move('backend/courses_content/',$filename); //File location define im public folder
	    	$coursecontent->file = $filename; //File name save in db
	    }else{
            $coursecontent->file = $request->old_file;
        }

        //dd($coursecontent);

        $coursecontent->save();
        $notification = array(
           'message' => 'Course Content has been updated !!',
           'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
