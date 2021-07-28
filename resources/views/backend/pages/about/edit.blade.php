@extends('backend.layouts.master')

@section('title')
    Edit About Section | Admin Dashboard - Real Pro Training Solutions
@endsection

@section('admin_content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark" style="text-transform: capitalize;">{{ Auth::guard('admin')->user()->name }} Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Edit About Section</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class = "card">
                <div class="card-header">
                    <h3 class="card-title">About Company Information</h3>
                    <p class="float-right mb-2">
                      {{-- @if(Auth::guard('admin')->user()->can('role.create')) --}}
                      <a class="btn btn-primary text-white" href="{{ route('admin.about.index') }}">About Info</a>
                      {{-- @endif --}}
                  </p>
                </div>
                <div class="card-body">
                    @foreach($editinfos as $editinfo)
                    <form action="{{ route('admin.about.update',$editinfo->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputname" class="form-label">About Title</label>
                          <input type="text" class="form-control @error('title') is-invalid @enderror" id="exampleInputname" name="title" value="{{ $editinfo->title }}">
                        </div>
                        @error('title')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="mb-3">
                          <label for="exampleInputaddress" class="form-label">About Description</label>
                          {{-- <input type="text" class="form-control" id="exampleInputaddress" name="description" value=""> --}}
                          <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="10">{{ $editinfo->description }}</textarea>
                        </div>
                        @error('description')
                          <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="mb-3">
                            <label for="exampleInputimage" class="form-label">Old Image</label><br>
                            <img src="{{ asset('backend/img/'.$editinfo->image) }}" alt="image" style="width: 300px; height:300px">
                            <input type="hidden" name="old_image" value="{{ $editinfo->image }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputimage" class="form-label">New Image</label>
                            <input type="file" class="form-control" id="exampleInputimage" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                    @endforeach
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
