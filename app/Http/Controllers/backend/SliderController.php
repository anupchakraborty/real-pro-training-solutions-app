<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Slider;

class SliderController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function index()
    {
        $sliders = Slider::all();
        return view('backend.pages.slider.index', compact('sliders'));
    }

    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('backend.pages.slider.edit', compact('slider'));
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
        // Create New Admin
        $slider = Slider::find($id);

        // Validation Data
        $request->validate([
            'heading' => 'required|min:10',
            'title' => 'required|min:20',
        ]);

        //dd(request()->all());
        $slider->heading = $request->heading;
        $slider->title = $request->title;
        if ($request->hasfile('image')) {
            unlink('backend/img/slider/'.$request->old_image);
            // Image store in public folder------
            $image = $request->file('image'); //catch image from input field
            $extension = $image->getClientOriginalExtension(); //image extension define
            $filename = time().'.'.$extension; //image filename define
            $image->move('backend/img/slider/',$filename); //image location define im public folder
            $slider->image = $filename; //image name save in db
        }else{
            $slider->image = $request->old_image;
        }
        //dd($slider);
        $slider->save();

        $notification = array(
            'message' => 'Slider has been updated !!',
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
        $user = Slider::find($id);
        $user->delete();


        $notification = array(
            'message' => 'Slider has been deleted !!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
