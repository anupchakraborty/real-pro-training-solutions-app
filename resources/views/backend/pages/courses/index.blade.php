@extends('backend.layouts.master')

@section('title')
    Course List | Admin Dashboard
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
              <li class="breadcrumb-item active"><a href="{{ route('admin.course.index') }}">Courses List</a></li>
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
            <a class="btn btn-primary text-white" href="{{ route('admin.course.create') }}">Create New Course</a>
            @endif
        </p>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th width="5%">Sl</th>
                <th width="15%">Title</th>
                <th width="10%">Price</th>
                <th width="10%">Duration</th>
                <th width="10%">Started Date</th>
                <th width="10%">Course Type</th>
                <th width="10%">Course Sessions</th>
                <th width="10%">Author</th>
                <th width="10%">Image</th>
                @if(Auth::guard('admin')->user()->can('course.edit') || Auth::guard('admin')->user()->can('course.delete') )
                <th width="10%">Action</th>
                @endif
            </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $course->title }}</td>
                        <td>$ {{ $course->price }}</td>
                        <td>{{ $course->duration }} Hours</td>
                        <td>{{ $course->started_date }}</td>
                        <td>
                            @if($course->course_type == 'online_course')
                                Online Course
                            @elseif($course->course_type == 'live_course')
                                Live Course
                            @else

                            @endif
                        </td>
                        <td>
                            @if($course->course_session == 'morining_session')
                                Morining Session
                            @elseif($course->course_session == 'afternoon_session')
                                Afternon Session
                            @elseif($course->course_session == 'weekend_session')
                                Weekend Session
                            @elseif($course->course_session == 'evening_session')
                                Evening Session
                            @else
                            
                            @endif
                        </td>
                        <td>
                            @php
                                $admin = App\Models\Admin::where('id',$course->admin_id)->first();
                            @endphp
                            {{ $admin->name }}
                        </td>
                        <td>{{ $course->image }}</td>

                        <td style="text-align:center;">
                            @if(Auth::guard('admin')->user()->can('course.edit'))
                            <a class="btn btn-success btn-sm text-white" href="{{ route('admin.course.edit', $course->id) }}">
                                <i class="fas fa-edit"></i></a>
                            @endif
                            @if(Auth::guard('admin')->user()->can('course.delete'))
                            <a class="btn btn-danger btn-sm text-white" href="#delete-form{{ $course->id }}" data-toggle="modal">
                                <i class="fas fa-trash"></i>
                                </a>
                            @endif
                            @if(Auth::guard('admin')->user()->can('course.delete'))
                                <!--Delete Modal -->
                            <div id="delete-form{{ $course->id }}" class="modal fade">
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
                                            <form action="{{ route('admin.course.destroy', $course->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    @endif
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th width="5%">Sl</th>
                <th width="15%">Title</th>
                <th width="10%">Price</th>
                <th width="10%">Duration</th>
                <th width="10%">Started Date</th>
                <th width="10%">Course Type</th>
                <th width="10%">Course Sessions</th>
                <th width="10%">Author</th>
                <th width="10%">Image</th>
                @if(Auth::guard('admin')->user()->can('course.edit') || Auth::guard('admin')->user()->can('course.delete') )
                <th width="10%">Action</th>
                @endif
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
    </div><!-- /.card -->

</div><!-- /.content-wrapper -->

@endsection
