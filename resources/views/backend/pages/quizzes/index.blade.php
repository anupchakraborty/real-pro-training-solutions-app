@extends('backend.layouts.master')

@section('title')
    Quizzes | Admin Dashboard
@endsection

@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Quizzes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('admin.course.content.quiz.index') }}">Quiz List</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Quiz List</h3>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Quiz Name</th>
                <th>Course Title</th>
                <th>Content Title</th>
                <th>Admin</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($quizzes as $quiz )
                    <tr>
                        <td>#{{ $quiz->id}}</td>
                        <td>{{ $quiz->quiz_name }}</td>
                        <td>{{ $quiz->course->title }}</td>
                        <td>{{ $quiz->content->title }}</td>
                        <td>{{ $quiz->admin->name }}</td>
                        <td>{{ $quiz->status }}</td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="{{Route('admin.course.content.quiz.edit', $quiz->id)}}">
                                <i class="fas fa-edit"></i></a>
                            <a class="btn btn-sm btn-secondary" href="{{Route('admin.course.content.quiz.show', $quiz->id)}}">
                                <i class="fas fa-eye"></i></a>
                            <a  href="#deleteModal{{ $quiz->id }}" class="btn btn-sm btn-danger" data-toggle="modal">
                                <i class="fa fa-trash"></i></a>
                            <!--Delete Modal1 -->
                            <div id="deleteModal{{ $quiz->id }}" class="modal fade">
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
                                            <form action="{!! Route('admin.course.content.quiz.destroy', $quiz->id) !!}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>#</th>
                <th>Quiz Name</th>
                <th>Course Title</th>
                <th>Content Title</th>
                <th>Admin</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
    </div><!-- /.card -->

</div><!-- /.content-wrapper -->

@endsection
