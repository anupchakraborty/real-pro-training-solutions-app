@extends('backend.layouts.master')

@section('title')
    Course Content List  | Admin Dashboard
@endsection

@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Course Content List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('admin.course.content.index') }}">Course Content List</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Courses List</h3>
          <p class="float-right mb-2">
            @if(Auth::guard('admin')->user()->can('course.create'))
            <a class="btn btn-primary text-white" href="{{ route('admin.course.content.create') }}">Upload Course Content</a>
            @endif
        </p>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                @foreach ($courses_id as $key => $course_id)
                <div class="col-12" id="accordion">
                    <div class="card card-primary card-outline">
                        <a class="d-block w-100" data-toggle="collapse" href="#collapse{{ $key }}">
                            <div class="card-header">
                                @php
                                    $content_title = App\Models\Course::where('id',$course_id->course_id)->first();
                                @endphp
                                <h4 class="card-title w-100">
                                   {{ $key+1 }}. {{ $content_title->title }}
                                </h4>
                            </div>
                        </a>
                        <div id="collapse{{ $key }}" class="collapse show" data-parent="#accordion">
                            <div class="card-body">
                                @php
                                    $contents = App\Models\CourseContent::where('course_id',$course_id->course_id)->get();
                                @endphp
                                <div class="row">
                                    @foreach($contents as $key => $content)
                                        <div class="col">
                                            <div class="card">
                                                <video width="320" height="240" controls>
                                                    <source src="{{ asset('backend/courses_content/'.$content->file) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $content->title }}</h5>
                                                    <p class="card-text">{{ $content->desctription }}</p>
                                                </div>
                                                <div class="card-footer">
                                                    <a class="btn btn-success text-white" href="{{ route('admin.course.content.edit', $content->id) }}"><i class="fas fa-edit"></i></a>
                                                    @if(Auth::guard('admin')->user()->can('course.edit'))
                                                        <a class="btn btn-danger text-white" href="#delete-form{{ $content->id }}" data-toggle="modal">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    @endif

                                                    @if(Auth::guard('admin')->user()->can('course.delete'))
                                                    <!--Delete Modal -->
                                                    <div id="delete-form{{ $content->id }}" class="modal fade">
                                                        <div class="modal-dialog modal-confirm">
                                                            <div class="modal-content">
                                                                <div class="modal-header flex-column">
                                                                    <div class="icon-box">
                                                                        <i class="material-icons">&#xE5CD;</i>
                                                                    </div>
                                                                    <h4 class="modal-title w-100">Are you sure?</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                                                                </div>
                                                                <div class="modal-footer justify-content-center">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                    <form action="{{ route('admin.course.destroy', $content->id) }}" method="POST">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- /.card-body -->
    </div><!-- /.card -->

</div><!-- /.content-wrapper -->

@endsection
