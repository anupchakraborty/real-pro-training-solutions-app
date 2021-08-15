@extends('backend.layouts.master')

@section('title')
   Edit Courses | Admin Dashboard
@endsection

@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Courses</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('admin.course.index') }}">Edit Courses</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Courses</h3>
          <p class="float-right mb-2">
            @if(Auth::guard('admin')->user()->can('course.create'))
            <a class="btn btn-primary text-white" href="{{ route('admin.course.create') }}">Create New Course</a>
            @endif
        </p>
        </div>

        @include('backend.partials.message')

        <!-- /.card-header -->
        <div class="card-body">
            <form action="{{ route('admin.course.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                    <div class="form-group col-md-12">
                        <label for="title">Course Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $course->title }}">
                    </div>
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group col-md-12">
                        <label for="feature">Course Feature</label>
                        <textarea name="feature" id="feature" class="form-control @error('feature') is-invalid @enderror" cols="30" rows="10">{{ $course->feature }}</textarea>
                    </div>
                    @error('feature')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group col-md-12">
                        <label for="desctription">Course Description</label>
                        <textarea name="desctription" id="desctription" class="form-control @error('desctription') is-invalid @enderror" cols="30" rows="10">{{ $course->desctription }}</textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="price">Course Price</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $course->price }}">
                    </div>
                    @error('price')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group col-md-12">
                        <label for="duration">Course Duration</label>
                        <input type="text" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" value="{{ $course->duration }}">
                    </div>
                    @error('duration')
                         <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group col-md-12">
                        <label for="started_date">Course Started Date</label>
                        <input type="date" class="form-control" id="started_date" name="started_date" value="{{ $course->started_date }}">
                    </div>
                    @error('started_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group col-md-12">
                        <label for="duration">Course Type</label>
                        <select name="course_type" id="course_type" class="form-control">
                                @if($course->course_type == 'online_course')
                                    <option value="{{ $course->course_type }}"{{ ($course->course_type == 'online_course') ? 'selected':'' }}>Online Course</option>
                                    <option value="live_course">Live Course</option>
                                @elseif($course->course_type == 'live_course')
                                    <option value="{{ $course->course_type }}"{{ ($course->course_type == 'live_courese') ? 'selected':'' }}>Live Course</option>
                                    <option value="online_course">Online Course</option>
                                @else
                                    <option selected>Select Course Type</option>
                                    <option value="online_course">Online Course</option>
                                    <option value="live_course">Live Course</option>
                                @endif
                        </select>
                    </div>
                    @error('duration')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group col-md-12">
                        <label for="duration">Course Sessions</label>
                        <select name="course_session" id="course_session" class="form-control">
                                @if($course->course_session == 'morining_session')
                                    <option value="{{ $course->course_session }}"{{ ($course->course_session == 'morining_session')? 'selected':'' }}>Morining Session</option>
                                    <option value="afternoon_session">Afternon Session</option>
                                    <option value="weekend_session">Weekend Session</option>
                                    <option value="evening_session">Evening Session</option>   
                                @elseif($course->course_session == 'afternoon_session')
                                    <option value="{{ $course->course_session }}"{{ ($course->course_session == 'afternoon_session')? 'selected':'' }}>Afternon Session</option>
                                    <option value="morining_session">Morining Session</option>
                                    <option value="weekend_session">Weekend Session</option>
                                    <option value="evening_session">Evening Session</option>       
                                @elseif($course->course_session == 'weekend_session')
                                    <option value="{{ $course->course_session }}"{{ ($course->course_session == 'weekend_session')? 'selected':'' }}>Weekend Session</option>
                                    <option value="morining_session">Morining Session</option>
                                    <option value="afternoon_session">Afternon Session</option>
                                    <option value="evening_session">Evening Session</option>  
                                @elseif($course->course_session == 'evening_session')
                                    <option value="{{ $course->course_session }}"{{ ($course->course_session == 'evening_session')? 'selected':'' }}>Evening Session</option>
                                    <option value="morining_session">Morining Session</option>
                                    <option value="afternoon_session">Afternon Session</option>
                                    <option value="weekend_session">Weekend Session</option>
                                @else
                                    <option selected>Select Course Session</option>
                                    <option value="morining_session">Morining Session</option>
                                    <option value="afternoon_session">Afternon Session</option>
                                    <option value="weekend_session">Weekend Session</option>
                                    <option value="evening_session">Evening Session</option>     
                                @endif
                        </select>
                    </div>
                    @error('duration')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-group col-md-12">
                        <label for="admin_id">Author</label>
                        <select name="admin_id" id="admin_id" class="form-control @error('admin_id') is-invalid @enderror">
                            <option selected>Select One Author</option>
                            @foreach($admins as $admin)
                            @if($admin->username == 'superadmin' || $admin->username == 'sysowner'|| $admin->username == 'sysadmin')

                            @else
                                <option value="{{ $admin->id }}" {{ $course->admin_id == $admin->id? 'selected' : '' }}>{{ $admin->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    @error('admin_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="form-group col-md-12">
                        <label for="image">Course Old Image</label><br/>
                        <img src="{{ asset('backend/img/courses/'.$course->image) }}" style="width: 300px; height:200px">
                        <input type="hidden" name="old_image" value="{{ $course->image }}">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="image">Course Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update Course</button>
            </form>
        </div>
    </div><!-- /.card -->

</div><!-- /.content-wrapper -->

@endsection
