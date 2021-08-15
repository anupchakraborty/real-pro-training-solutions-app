<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\Answer;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        return view('backend.pages.quizzes.question.index',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quizzes = Quiz::all();
        return view('backend.pages.quizzes.question.create',compact('quizzes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation Data
        $request->validate([
            'quiz_id' => 'required',
            'question' => 'required',
            'right_answer' => 'required',
            'options' => 'required',
        ]);

        //dd($request->all());
        //Create New Question
        $question = new Question();
        $question->quiz_id = $request->quiz_id;
        $question->question = $request->question;
        $question->right_answer = $request->right_answer;
        $question->save();

        $question_id = DB::getPdo()->lastInsertId();
        foreach($request->options as $key => $option){
            $answer = new Answer();
            $answer->question_id = $question_id;
            $answer->quiz_id  = $request->quiz_id;
            $answer->answer = $option;
            $answer->save();
        }

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
        $question = Question::find($id);
        $quizzes = Quiz::all();
        $answers = Answer::where('question_id',$question->id)->get();
        return view('backend.pages.quizzes.question.edit', compact('question','quizzes','answers'));
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
        //Validation Data
        $request->validate([
            'quiz_id' => 'required',
            'question' => 'required',
            'right_answer' => 'required',
            'options' => 'required',
        ]);

        //dd($request->all());
        //Create New Question
        $question = Question::find($id);
        $question->quiz_id = $request->quiz_id;
        $question->question = $request->question;
        $question->right_answer = $request->right_answer;
        $question->save();

        // $question_id = DB::getPdo()->lastInsertId();
        foreach($request->options as $key => $option){
            //dd($request->answers_id[$key]);
            // foreach($request->answers_id as $answer_id){
                $answer = Answer::find($request->answers_id[$key]);
                $answer->question_id = $id;
                $answer->quiz_id  = $request->quiz_id;
                $answer->answer = $option;
                $answer->save();
            // }
        }

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
        $question = Question::find($id);
        $question->delete();

        $notification = array(
            'message' => 'Quiz has been Deleted !!',
            'alert-type' => 'success'
         );
        return Redirect()->back()->with($notification);
    }
}
