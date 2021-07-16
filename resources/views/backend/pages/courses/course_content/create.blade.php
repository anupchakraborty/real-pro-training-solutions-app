@extends('backend.layouts.master')

@section('title')
    Create Course Content | Admin Dashboard
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
            <h1 class="m-0 text-dark">Course Content</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('admin.course.content.create') }}">Create New Course Content</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>    <!-- /.content-header -->

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Upload Course Content</h3>
          <p class="float-right mb-2">
            <a class="btn btn-primary text-white" href="{{ route('admin.course.content.index') }}">All Courses</a>
        </p>

        </div>
        <div class="card-body">
            <form action="{{ route('admin.course.content.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                    <div class="form-group col-md-12">
                        <label for="title">Content Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Your Course Title">
                    </div>
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group col-md-12">
                        <label for="course_id">Select Your Content</label>
                        <select name="course_id" id="course_id" class="form-control">
                            <option checked>Select One Course</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('course_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group col-md-12">
                        <label for="desctription">Content Description</label>
                        <textarea name="desctription" id="desctription" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    @error('desctription')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group col-md-12">
                        <label for="file">Content File</label>
                        <input type="file" class="form-control" id="file" name="file">
                    </div>
                    @error('file')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Course Content</button>
            </form>
        </div>

    </div><!-- /.card -->

</div><!-- /.content-wrapper -->

@endsection
