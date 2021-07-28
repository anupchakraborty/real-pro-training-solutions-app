<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\About;

class AboutController extends Controller
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
        $about = About::first();
        return view('backend.pages.about.index',compact('about'));
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editinfos = About::all();
        return view('backend.pages.about.edit',compact('editinfos'));
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
            'description' => 'required|max:1000',
        ]);

        // Create New Course
        $info = About::find($id);
        $info->title = $request->title;
        $info->description = $request->description;

        if ($request->hasfile('image')) {
            unlink('backend/img/'.$request->old_image);
            // Image store in public folder------
            $image = $request->file('image'); //catch image from input field
            $extension = $image->getClientOriginalExtension(); //image extension define
            $filename = time().'.'.$extension; //image filename define
            $image->move('backend/img/',$filename); //image location define im public folder
            $info->image = $filename; //image name save in db
        }else{
            $info->image = $request->old_image;
        }
        $info->save();
        $notification = array(
            'message' => 'About Info has been updated !!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.about.index')->with($notification);
    }

}
