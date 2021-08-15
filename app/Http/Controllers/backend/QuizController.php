<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Quiz;
use App\Models\Course;
use App\Models\Coursecontent;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::all();
        return view('backend.pages.quizzes.index',compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $contents = Coursecontent::all();
        return view('backend.pages.quizzes.create',compact('courses','contents'));
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
            'quiz_name' => 'required',
            'course_id' => 'required',
            'content_id' => 'required',
            'admin_id' => 'required',
            'quiz_date' => 'required',
        ]);

        //dd($request->all());
        // Create New Quiz
        $quiz = new Quiz();
        $quiz->quiz_name = $request->quiz_name;
        $quiz->course_id = $request->course_id;
        $quiz->content_id = $request->content_id;
        $quiz->admin_id = $request->admin_id;
        $quiz->quiz_date = $request->quiz_date;
        $quiz->description = $request->description;
        $quiz->save();

        $notification = array(
            'message' => 'Quiz has been created !!',
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
        $quiz = Quiz::find($id);
        $courses = Course::all();
        $contents = Coursecontent::all();
        return view('backend.pages.quizzes.edit',compact('quiz','courses','contents'));
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
            'quiz_name' => 'required',
            'course_id' => 'required',
            'content_id' => 'required',
            'admin_id' => 'required',
            'quiz_date' => 'required',
        ]);

        //dd($request->all());
        // Update Quiz
        $quiz = Quiz::find($id);
        $quiz->quiz_name = $request->quiz_name;
        $quiz->course_id = $request->course_id;
        $quiz->content_id = $request->content_id;
        $quiz->admin_id = $request->admin_id;
        $quiz->quiz_date = $request->quiz_date;
        $quiz->description = $request->description;
        $quiz->save();

        $notification = array(
            'message' => 'Quiz has been Updated !!',
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
        $quiz = Quiz::find($id);
        $quiz->delete();

        $notification = array(
            'message' => 'Quiz has been Deleted !!',
            'alert-type' => 'success'
         );
         return Redirect()->back()->with($notification);
    }
}
