@extends('backend.layouts.master')

@section('title')
    About Section | Admin Dashboard - Real Pro Training Solutions
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
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">About</li>
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
                    <h3 class="card-title">About Company Information</h3>
                    <p class="float-right mb-2">
                      <a class="btn btn-primary text-white" href="{{ route('admin.about.edit',$about->id) }}">Edit Info</a>
                    </p>
                </div>
                <div class="card-body">
                        <div class="company-info">
                            <div class="company-title">
                                <h3>About Title</h3>
                                <hr>
                                <div class="comapny-details">
                                    <p>{{ $about->title }}</p>
                                </div>
                            </div>
                            <div class="company-title">
                                <h3>About Description</h3>
                                <hr/>
                                <div class="comapny-details">
                                    <p>{{ $about->description }}</p>
                                </div>
                            </div>
                            <div class="company-title">
                                <h3>About Section Image</h3>
                                <hr/>
                                <div class="comapny-details">
                                    <img src="{{ asset('backend/img/'.$about->image) }}" alt="" style="width: 500px; height:400px">
                                </div>

                            </div>
                        </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
