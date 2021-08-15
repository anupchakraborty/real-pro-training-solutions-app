@extends('backend.layouts.master')

@section('title')
    Quiz Question | Admin Dashboard
@endsection

@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Quiz Question</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('admin.course.content.question.index') }}">Question List</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Qustion List</h3>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Quiz Name</th>
                <th>Question Title</th>
                <th>Right Answer</th>
                <th>User</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($questions as $question )
                    <tr>
                        <td>#{{ $question->id}}</td>
                        <td>{{ $question->quiz->quiz_name }}</td>
                        <td>{{ $question->question }}</td>
                        <td>{{ $question->right_answer }}</td>
                        <td>
                            
                        </td>
                        <td>{{ $question->status }}</td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="{{Route('admin.course.content.question.edit', $question->id)}}">
                                <i class="fas fa-edit"></i></a>
                            <a class="btn btn-sm btn-secondary" href="{{Route('admin.course.content.question.show', $question->id)}}">
                                <i class="fas fa-eye"></i></a>
                            <a  href="#deleteModal{{ $question->id }}" class="btn btn-sm btn-danger" data-toggle="modal">
                                <i class="fa fa-trash"></i></a>
                            <!--Delete Modal1 -->
                            <div id="deleteModal{{ $question->id }}" class="modal fade">
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
                                            <form action="{!! Route('admin.course.content.question.destroy', $question->id) !!}" method="post">
                                                @csrf
                                                @method('DELETE')
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
                <th>Question Title</th>
                <th>Right Answer</th>
                <th>User</th>
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
