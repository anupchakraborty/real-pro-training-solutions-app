@extends('backend.layouts.master')

@section('title')
    Create Question | Admin Dashboard
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
            <h1 class="m-0 text-dark">Question</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('admin.course.content.question.create') }}">Create New Question</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>    <!-- /.content-header -->

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Create New Question</h3>
          <p class="float-right mb-2">
            <a class="btn btn-primary text-white" href="{{ route('admin.course.content.question.index') }}">All Question</a>
        </p>

        </div>
        <div class="card-body">
            <form action="{{ route('admin.course.content.question.store') }}" method="POST">
                @csrf

                    <div class="form-group col-md-12">
                        <label for="quiz_id">Selcet A Quiz</label>
                        <select name="quiz_id" id="quiz_id" class="form-control">
                            <option selected>Select Quiz Name</option>
                            @foreach ($quizzes as $quiz)
                                <option value="{{ $quiz->id }}">{{ $quiz->quiz_name }}</option> 
                            @endforeach
                        </select>
                    </div>
                    @error('quiz_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group col-md-12">
                        <label for="question">Question</label>
                        <input type="text" class="form-control" id="question" name="question" placeholder="Enter Your question">
                    </div>
                    @error('question')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group col-md-12">
                        <fieldset>
                            <legend>Choices</legend>
                            <small id="choicesHelp" class="form-text text-muted">Give choices that give you the best insight into your question.</small>
                            <div>
                                <div class="form-group">
                                    <label for="answer1">option 1</label>
                                    <input type="text" class="form-control" id="answer1" name="options[]" aria-describedby="optionsHelp" placeholder="Enter option 1">
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="answer2">option 2</label>
                                    <input type="text" class="form-control" id="answer2" name="options[]" aria-describedby="optionsHelp" placeholder="Enter option 2">
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="answer3">option 3</label>
                                    <input type="text" class="form-control" id="answer3" name="options[]" aria-describedby="optionsHelp" placeholder="Enter option 3">
                                </div>
                            </div>
                            <div>
                                <div class="form-group">
                                    <label for="answer4">option 4</label>
                                    <input type="text" class="form-control" id="answer4" name="options[]" aria-describedby="optionsHelp" placeholder="Enter choice 4">
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="right_answer">Right Answer</label>
                        <input type="text" class="form-control" id="right_answer" name="right_answer" placeholder="Enter Your Correct right_answer">
                    </div>
                    @error('right_answer')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror


                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Question</button>
            </form>
        </div>

    </div><!-- /.card -->

</div><!-- /.content-wrapper -->

@endsection
