<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Companyinfo;
use App\Models\Course;
use App\Models\Admin;
use App\Models\About;
use App\Models\Slider;
use App\Models\Studentregistation;
use App\Models\Comment;
use Mail;

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
        $about = About::first();
        $sliders = Slider::all();
        return view('frontend.pages.index',compact('companyinfo','courses','admins','about','sliders'));
    }

    public function registation(Request $request)
    {
        //dd($request->all());
        $student = new Studentregistation();
        $student->fname = $request->fname;
        $student->lname = $request->lname;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->course_id = $request->course_id;
        $student->save();

        session()->flash('success', 'Thank you For registation our course!!');
        return redirect('/');
    }
    
    public function about()
    {
        $companyinfo = Companyinfo::first();
        $courses = Course::all();
        $admins = Admin::all();
        $about = About::first();
        return view('frontend.pages.about.index',compact('courses','companyinfo','admins','about'));
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

    public function sendEmail(Request $request)
    {
        //dd($request->all());
        $request->validate([
          'email' => 'required|email',
          'subject' => 'required',
          'name' => 'required',
          'content' => 'required',
        ]);

        $data = [
          'subject' => $request->subject,
          'name' => $request->name,
          'email' => $request->email,
          'content' => $request->content
        ];

        Mail::send('email-template', $data, function($message) use ($data) {
          $message->to($data['email'])
          ->subject($data['subject']);
        });

        session()->flash('success', 'Thank you For your email. Please Stay with us!!');
        return back();
    }
    //comments route are here
    public function store(Request $request)
    {
        $data = request()->validate([
            'comment' => 'required',
            'name' => 'required',
            'email' => 'required',
        ]);

        $comment = new Comment;
        $comment->course_id = $request->course_id;
        $id = Auth::guard('web')->user()->id;
        if(!empty($id)){
            $comment->user_id = $id;
        }
        $comment->comment = $request->comment;
        $comment->save();

        $notification = array(
            'message' => 'Comment has been Created !!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function Schedule()
    {
        //dd('okk');
        $companyinfo = Companyinfo::first();
        $courses = Course::all();
        return view('frontend.pages.courses.course-schedule',compact('courses','companyinfo'));
    }
}
