@extends('backend.layouts.master')

@section('title')
    Sliders | Admin Dashboard
@endsection

@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sliders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('admin.sliders.index') }}">Slider List</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Slider List</h3>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th width="5%">Sl</th>
                <th width="20%">Heading</th>
                <th width="25%">Title</th>
                <th width="15%">Image</th>
                <th width="15%">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $slider)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $slider->heading }}</td>
                            <td>{{ $slider->title }}</td>
                            <td>{{ $slider->image }}</td>
                            <td style="text-align:center;">
                                <a class="btn btn-success text-white" href="{{ route('admin.sliders.edit', $slider->id) }}">
                                <i class="fas fa-edit"></i></a>
                                <a class="btn btn-danger text-white" href="#delete-form{{ $slider->id }}" data-toggle="modal">
                                <i class="fas fa-trash"></i>
                                </a>

                                <!--Delete Modal -->
                                <div id="delete-form{{ $slider->id }}" class="modal fade">
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
                                                <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST">
                                                @method('DELETE')
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
                <th width="5%">Sl</th>
                <th width="20%">Heading</th>
                <th width="25%">Title</th>
                <th width="15%">Image</th>
                <th width="15%">Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
    </div><!-- /.card -->

</div><!-- /.content-wrapper -->

@endsection
