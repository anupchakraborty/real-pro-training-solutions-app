@extends('backend.layouts.master')

@section('title')
    Admin | Real Pro Training Solutions Admin Dashboard
@endsection

@section('admin_content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark" style="text-transform: capitalize;">{{ Auth::guard('admin')->user()->name }} Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Company Info</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class = "card">
                <div class="card-header">
                    <h3 class="card-title">Company Information</h3>
                    <p class="float-right mb-2">
                      {{-- @if(Auth::guard('admin')->user()->can('role.create')) --}}
                      <a class="btn btn-primary text-white" href="{{ route('admin.companyinfo.index') }}">All Info</a>
                      {{-- @endif --}}
                  </p>
                </div>
                <div class="card-body">
                    @foreach($editinfos as $editinfo)
                    <form action="{{ route('admin.companyinfo.update',$editinfo->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputname" class="form-label">Company Name</label>
                          <input type="text" class="form-control" id="exampleInputname" name="name" value="{{ $editinfo->name }}">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputaddress" class="form-label">Address</label>
                          <input type="text" class="form-control" id="exampleInputaddress" name="address" value="{{ $editinfo->address }}">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ $editinfo->email }}">
                          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputcontact" class="form-label">Contact Number</label>
                          <input type="text" class="form-control" id="exampleInputcontact" name="contact" value="{{ $editinfo->contact }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputlogo" class="form-label">Old Logo</label><br>
                            <img src="{{ asset('backend/img/'.$editinfo->logo) }}" alt="Logo" style="width: 300px; height:300px">
                            <input type="hidden" name="old_logo" value="{{ $editinfo->logo }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputlogo" class="form-label">Logo</label>
                            <input type="file" class="form-control" id="exampleInputlogo" name="logo">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    @endforeach
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
