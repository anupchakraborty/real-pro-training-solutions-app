@extends('backend.layouts.master')

@section('title')
    Slider Edit | Admin Dashboard
@endsection
@section('styles')
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
            <h1 class="m-0 text-dark">Slider Edit</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('admin.sliders.index') }}">All Slider</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>    <!-- /.content-header -->

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Edit Slider - {{ $slider->heading }}</h3>
        </div>
        @include('backend.partials.message');
        <div class="card-body">
            <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12 col-sm-12">
                        <label for="heading">Slider Heading</label>
                        <input type="text" class="form-control @error('heading') is-invalid @enderror" id="heading" name="heading" value="{{ $slider->heading }}">
                    </div>
                    @error('heading')
                        <span class="text-danger">{{ $message }}</span>
                     @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12 col-sm-12">
                        <label for="title">Slider Title</label>
                        <input type="title" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $slider->title }}">
                    </div>
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="exampleInputimage">Old Slider Image</label><br>
                        <input type="hidden" name="old_image" class="form-control" value="{{ $slider->image }}">
                        <img src="{{ asset('backend/img/slider/'.$slider->image) }}" alt="Slider Image" style="width: 500px; height:400px">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12 col-sm-12">
                        <label for="exampleInputimage">Upload Slider Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="exampleInputimage">
                    </div>
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update Slider</button>
            </form>
        </div>

    </div><!-- /.card -->

</div><!-- /.content-wrapper -->

@endsection


