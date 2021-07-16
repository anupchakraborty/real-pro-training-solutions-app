@extends('backend.layouts.master')

@section('title')
    Profile | Admin Dashboard
@endsection

@section('admin_content')
<section class="content">
    <div class="card">
      <div class="row">
        <div class="col-2"></div>

        <div class="col-10">
            <div class="card">
                <div class="card-body">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Update Your Information</h3>
                                    @include('backend.partials.message')
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.profile.update.submit',$profile_info->id) }}" method="post">
                                        @csrf

                                         <div class="form-group">
                                            <label for="exampleInputname">Name</label>
                                            <input type="text" name="name" class="form-control" id="exampleInputname" aria-describedby="nameHelp" value="{{ $profile_info->name }}">
                                            <small id="nameHelp" class="form-text text-muted">We'll never share your name with anyone else.</small>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                          </div>
                                         <div class="form-group">
                                            <input type="hidden" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $profile_info->email }}">
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputusername">Username</label>
                                            <input type="text" name="username" class="form-control" id="exampleInputusername" aria-describedby="usernameHelp" value="{{ $profile_info->username }}">
                                            <small id="usernameHelp" class="form-text text-muted">We'll never share your username with anyone else.</small>
                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                          </div>
                                          <div class="form-group">
                                            <label for="exampleInputPassword1">New Password</label>
                                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your New Password">
                                            <small id="usernameHelp" class="form-text text-muted">We'll never share your password with anyone else.</small>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                          </div>
                                          @if(!is_null($profile_info->image))
                                            <div class="form-group">
                                                <label for="exampleInputimage">Upload Profile Picture</label>
                                                <input type="hidden" name="old_image" class="form-control" value="{{ $profile_info->image }}"><br>
                                                <img src="{{ asset('backend/img/admin/'.$profile_info->image) }}" alt="Admin Image" style="width: 300px; height:300px">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputimage">Upload Profile Picture</label>
                                                <input type="file" name="image" class="form-control" id="exampleInputfile">
                                                <small id="userimageHelp" class="form-text text-muted">We'll never share your image with anyone else.</small>
                                            </div>
                                          @else
                                            <div class="form-group">
                                                <label for="exampleInputimage">Upload Profile Picture</label>
                                                <input type="file" name="image" class="form-control" id="exampleInputfile">
                                                <small id="userimageHelp" class="form-text text-muted">We'll never share your image with anyone else.</small>
                                            </div>
                                          @endif
                                          <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                      </div>
                      <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- /.col -->


      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection

