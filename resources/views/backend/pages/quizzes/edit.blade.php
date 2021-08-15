@extends('backend.layouts.master')

@section('title')
    Edit Quiz | Admin Dashboard
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
            <h1 class="m-0 text-dark">Edit Quiz</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="#">Edit Quiz</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>    <!-- /.content-header -->

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Quiz</h3>
          <p class="float-right mb-2">
            <a class="btn btn-primary text-white" href="{{ route('admin.course.content.quiz.index') }}">All Quiz</a>
        </p>

        </div>
        <div class="card-body">
            <form action="{{ route('admin.course.content.quiz.update',$quiz->id) }}" method="POST">
                @csrf
                @method('PUT')

                    <div class="form-group col-md-12">
                        <label for="quiz_name">Quiz Name</label>
                        <input type="text" class="form-control" id="quiz_name" name="quiz_name" value="{{ $quiz->quiz_name }}">
                    </div>
                    @error('quiz_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group col-md-12">
                        <label for="course_id">Selcet A Course</label>
                        <select name="course_id" id="course_id" class="form-control">
                            <option selected>Select Course</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}"{{ ($quiz->course_id==$course->id)?'selected':'' }}>{{ $course->title }}</option> 
                            @endforeach
                        </select>
                    </div>
                    @error('course_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group col-md-12">
                        <label for="content_id">Selcet A Lession</label>
                        <select name="content_id" id="content_id" class="form-control">
                            <option selected>Select Course</option>
                            @foreach ($contents as $content)
                                <option value="{{ $content->id }}"{{ ($quiz->content_id==$content->id)?'selected':'' }}>{{ $content->title }}</option> 
                            @endforeach
                        </select>
                    </div>
                    @error('content_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group col-md-12">
                        <input type="hidden" class="form-control" value="{{ $quiz->admin_id }}" name="admin_id">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="description">Quiz Description</label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ $quiz->description }}</textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="quiz_date">Quiz Publish Date</label>
                        <input type="date" class="form-control" id="quiz_date" name="quiz_date" value="{{ $quiz->quiz_date }}">
                    </div>
                    @error('quiz_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update Quiz</button>
            </form>
        </div>

    </div><!-- /.card -->

</div><!-- /.content-wrapper -->

@endsection
