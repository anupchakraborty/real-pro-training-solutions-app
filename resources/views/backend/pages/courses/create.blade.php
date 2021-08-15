@extends('backend.layouts.master')

@section('title')
    Create Course | Admin Dashboard
@endsection
@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endsection

@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Course</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('admin.course.create') }}">Create New Course</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>    <!-- /.content-header -->

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Create New Course</h3>
          <p class="float-right mb-2">
            <a class="btn btn-primary text-white" href="{{ route('admin.course.index') }}">All Courses</a>
        </p>

        </div>
        <div class="card-body">
            <form action="{{ route('admin.course.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                    <div class="form-group col-md-12">
                        <label for="title">Course Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Your Course Title">
                    </div>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group col-md-12">
                        <label for="feature">Course Feature</label>
                        <textarea name="feature" id="feature" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    @error('feature')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group col-md-12">
                        <label for="desctription">Course Description</label>
                        <textarea name="desctription" id="desctription" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="price">Course Price</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Enter Your Course price">
                    </div>
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group col-md-12">
                        <label for="duration">Course Duration</label>
                        <input type="text" class="form-control" id="duration" name="duration" placeholder="Enter Your Course duration">
                    </div>
                    @error('duration')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group col-md-12">
                        <label for="started_date">Course Started Date</label>
                        <input type="date" class="form-control" id="started_date" name="started_date" placeholder="Enter Your Course started_date">
                    </div>
                    @error('started_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group col-md-12">
                        <label for="duration">Course Type</label>
                        <select name="course_type" id="courese_type" class="form-control">
                            <option selected>Select Course Type</option>
                            <option value="online_course">Online Course</option>
                            <option value="live_courese">Live Course</option>
                        </select>
                    </div>
                    @error('duration')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group col-md-12">
                        <label for="duration">Course Sessions</label>
                        <select name="course_session" id="courese_session" class="form-control">
                            <option selected>Select Course Session</option>
                            <option value="morining_session">Morining Session</option>
                            <option value="afternoon_session">Afternon Session</option>
                            <option value="weekend_session">Weekend Session</option>
                            <option value="evening_session">Evening Session</option>
                        </select>
                    </div>
                    @error('duration')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group col-md-12">
                        <label for="admin_id">Author</label>
                        <select name="admin_id" id="admin_id" class="form-control">
                            <option checked>Select One Author</option>
                            @foreach($admins as $admin)
                            @if($admin->username == 'superadmin' || $admin->username == 'sysowner'|| $admin->username == 'sysadmin')

                            @else
                                <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    @error('admin_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group col-md-12">
                        <label for="image">Course Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Course</button>
            </form>
        </div>

    </div><!-- /.card -->

</div><!-- /.content-wrapper -->

@endsection
