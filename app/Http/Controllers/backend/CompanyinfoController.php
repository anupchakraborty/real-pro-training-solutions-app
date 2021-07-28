<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Companyinfo;

class CompanyinfoController extends Controller
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
        $companyinfos = Companyinfo::all();
        return view('backend.pages.companyinfo.index',compact('companyinfos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editinfos = Companyinfo::all();
        return view('backend.pages.companyinfo.edit',compact('editinfos'));
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
            'name' => 'required|max:100',
            'address' => 'required|max:250',
            'email' => 'required',
            'contact' => 'required',
            'logo' => 'required | mimes:jpeg,jpg,png,PNG | max:1000',
        ]);

        // Create New Course
        $info = Companyinfo::find($id);
        $info->name = $request->name;
        $info->address = $request->address;
        $info->email = $request->email;
        $info->contact = $request->contact;

        if ($request->hasfile('logo')) {
            unlink('backend/img/'.$request->old_logo);
            // Image store in public folder------
            $image = $request->file('logo'); //catch image from input field
            $extension = $image->getClientOriginalExtension(); //image extension define
            $filename = time().'.'.$extension; //image filename define
            $image->move('backend/img/',$filename); //image location define im public folder
            $info->logo = $filename; //image name save in db
        }else{
            $info->logo = $request->old_logo;
        }
        $info->save();
        $notification = array(
            'message' => 'Company Info has been updated !!',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }

}
