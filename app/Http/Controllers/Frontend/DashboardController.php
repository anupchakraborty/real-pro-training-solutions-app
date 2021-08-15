<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Companyinfo;
use App\Models\Course;
use App\Models\Coursecontent;
use App\Models\Order;
use App\Models\Cart;
use App\Models\User;
use App\Models\Quiz;
use App\Models\Question;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check()){
        $id = Auth::guard('web')->user()->id;
        $user = User::where('id', $id)->first();
        $companyinfo = Companyinfo::first();
        $courses = Course::all();
        return view('frontend.pages.dashboard.index',compact('user','companyinfo','courses'));
        }else{
            return redirect()->route('login');
        }
    }

    public function profile()
    {
        if(Auth::check()){
        $id = Auth::guard('web')->user()->id;
        $user = User::where('id', $id)->first();
        $companyinfo = Companyinfo::first();
        $orders = Order::where('user_id',$id)->get();
        return view('frontend.pages.profile.index',compact('user','companyinfo','orders'));
        }else{
            return redirect()->route('login');
        }
    }
    public function profile_update(Request $request, $id)
    {
         // Validation Data
        $request->validate([
            'dateofbirth' => 'required',
            'address' => 'required',
            'image' => ['required', 'mimes:jpeg,jpg,png,PNG | max:1000'],
            'about_you' => 'required|max:500',
        ]);
        $user = User::where('id', $id)->first();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->dateofbirth = $request->dateofbirth;
        $user->address = $request->address;
        $user->about_you = $request->about_you;
        if ($request->hasfile('image')) {
            // File store in public folder------
            $image = $request->file('image'); //catch File from input field
            $extension = $image->getClientOriginalExtension(); //File extension define
            $filename = time().'.'.$extension; //File filename define
            $image->move('frontend/assets/img/profile/',$filename); //File location define im public folder
            $user->image = $filename; //File name save in db
        }
        $user->save();
        $notification = array(
            'message' => 'Profike has been updated !!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

    //password_update 
    public function password_update(Request $request, $id)
    {
        $user = User::find($id);
        // Validation Data
        $request->validate([
            'old_password' => 'required|min:6',
            'password' => 'required|min:6|confirmed',
        ]);
        $password = $user->password;

        if(Hash::check($request->old_password, $user->password)){
            $user->password = Hash::make($request->password);
            $user->save();
            $notification = array(
                'message' => 'Password has been updated !!',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Password does not matched !!',
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
    }

    public function course($course_id)
    {
        if(Auth::check()){
        $id = Auth::guard('web')->user()->id;
        $user = User::where('id', $id)->first();
        $companyinfo = Companyinfo::first();
        $course = Course::where('id',$course_id)->first();
        $contents = Coursecontent::where('course_id',$course->id)->get();

        //$quiz = Quiz::where('content_id', $content_id)->first();
        //dd($course_contant);
        return view('frontend.pages.dashboard.content',compact('user','companyinfo','course','contents'));
        }else{
            return redirect()->route('login');
        }
    }

    public function course_contant($content_id)
    {
        if(Auth::check()){
        $id = Auth::guard('web')->user()->id;
        $user = User::where('id', $id)->first();
        $companyinfo = Companyinfo::first();

        $course_contant = Coursecontent::where('id',$content_id)->first();
        $course = Course::where('id',$course_contant->course_id)->first();
        $contents = Coursecontent::where('course_id',$course->id)->get();

        $view_content = Coursecontent::find($content_id);
        $view_content->view_status = 1;
        $view_content->save();

        return view('frontend.pages.dashboard.view_content',compact('user','companyinfo','course','contents','course_contant'));
        }else{
            return redirect()->route('login');
        }
    }

    public function contant_quiz($course_id, $quiz_id)
    {
        if(Auth::check()){
            $id = Auth::guard('web')->user()->id;
            $user = User::where('id', $id)->first();
            $companyinfo = Companyinfo::first();

            $course = Course::where('id',$course_id)->first();
            //dd($course);
            $contents = Coursecontent::where('course_id',$course->id)->get();
            // $course_contant = Coursecontent::where('id',$content_id)->first();

            $quizzies = Quiz::where('course_id', $course->id)->get();
            $questions = Question::where('quiz_id',$quiz_id)->get();

            return view('frontend.pages.Dashboard.quiz.view_question',compact('user','companyinfo','course','contents','quizzies','questions'));
        }else{
            return redirect()->route('login');
        }
    }

}
