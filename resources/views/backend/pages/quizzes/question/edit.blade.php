@extends('backend.layouts.master')

@section('title')
    Edit Question | Admin Dashboard
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
              <li class="breadcrumb-item active"><a href="#">Edit Question</a></li>
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

        @include('backend.partials.message')

        </div>
        <div class="card-body">
            <form action="{{ route('admin.course.content.question.update',$question->id) }}" method="POST">
                @csrf
                @method('PUT')
                    <div class="form-group col-md-12">
                        <label for="quiz_id">Selcet A Quiz</label>
                        <select name="quiz_id" id="quiz_id" class="form-control">
                            <option selected>Select Quiz Name</option>
                            @foreach ($quizzes as $quiz)
                                <option value="{{ $quiz->id }}"{{ ($quiz->id == $question->quiz_id)?'selected':'' }}>{{ $quiz->quiz_name }}</option> 
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
                        <input type="text" class="form-control" id="question" name="question" value="{{ $question->question }}">
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
                            
                            @foreach ($answers as $key => $answer)
                            <div>
                                <div class="form-group">
                                    <label for="answer1">option {{ $key+1 }}</label>
                                    <input type="text" class="form-control" id="answer1" name="options[]" aria-describedby="optionsHelp" value="{{ $answer->answer }}">
                                    <input type="hidden" class="form-control" name="answers_id[]" value="{{ $answer->id }}">
                                </div>
                                <small id="choicesHelp" class="form-text text-muted">Write your question option but remember donot remove comma.</small>
                            </div>
                            @endforeach
                        </fieldset>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="answer">Right Answer</label>
                        <input type="text" class="form-control" id="answer" name="right_answer" value="{{ $question->right_answer }}">
                    </div>
                    @error('answer')
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
