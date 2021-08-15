@extends('frontend.layouts.master')

@section('title')
    Profile | Real Pro Training Solutions
@endsection

@section('user_content')
        <!-- Start Header Top
    ============================================= -->
    @include('frontend.partials.header-top')
        <!-- End Header Top
    ============================================= -->

        <!-- Start Header
    ============================================= -->
    @include('frontend.partials.header')
        <!-- End Header
    ============================================= -->

    <!-- Start Breadcrumb
    ============================================= -->
    <div class="breadcrumb-area shadow dark text-center bg-fixed text-light" style="background-image: url({{ asset('frontend/assets/img/banner/11.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Profile</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('index') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Students Profiel
    ============================================= -->
    <div class="students-profiel adviros-details-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-5 thumb">
                    <img src="{{ asset('frontend/assets/img/profile/'.$user->image) }}" alt="Thumb">
                </div>
                <div class="col-md-7 info main-content">
                    <!-- Star Tab Info -->
                    <div class="tab-info">
                        <!-- Tab Nav -->
                        <ul class="nav nav-pills">
                            <li class="active">
                                <a data-toggle="tab" href="#tab1" aria-expanded="true">
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab2" aria-expanded="false">
                                    Orders
                                </a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab3" aria-expanded="false">
                                    Edit Profile
                                </a>
                            </li>
                        </ul>
                        <!-- End Tab Nav -->
                        <!-- Start Tab Content -->
                        <div class="tab-content tab-content-info">
                            <!-- Single Tab -->
                            <div id="tab1" class="tab-pane fade active in">
                                <div class="info title">
                                    <p>
                                        {{ $user->about_you }}
                                    </p>
                                    <ul>
                                        <li>
                                            Contact <span>{{ $user->phone }}</span>
                                        </li>
                                        <li>
                                            Email <span>{{ $user->email }}</span>
                                        </li>
                                        <li>
                                            Address <span>{{ $user->address }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Single Tab -->

                            <!-- Single Tab -->
                            <div id="tab2" class="tab-pane fade">
                                <div class="info title">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Order</th>
                                                    <th>Title</th>
                                                    <th>Purchase Date</th>
                                                    <th>Price</th>
                                                    <th>Access</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($orders as $key => $order)
                                                    <tr>
                                                        <td>#RPTS021{{ $key+1 }}</td>
                                                            @php
                                                                $cart = App\Models\Cart::where('order_id',$order->id)->first();
                                                                $course = App\Models\Course::where('id',$cart->course_id)->first();
                                                            @endphp
                                                        <td><a href="#">{{ $course->title }}</a></td>
                                                        <td>{{ $order->created_at }}</td>
                                                        <td>${{ $course->price }}</td>
                                                        <td><a href="#">Preview</a></td>
                                                    </tr>                                                  
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Tab -->

                            <!-- Single Tab -->
                            <div id="tab3" class="tab-pane">
                                <div class="info title">
                                    <p>
                                        {{ $user->about_you }}
                                    </p>
                                    <div class="row">
                                        <form action="{{ route('user.profile.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input class="form-control" name="fname" value="{{ $user->fname }}" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input class="form-control" name="lname" value="{{ $user->lname }}" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input class="form-control" name="email" value="{{ $user->email }}" type="email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input class="form-control" name="phone" value="{{ $user->phone }}" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Date of Birth</label>
                                                    <input class="form-control" name="dateofbirth" type="date">
                                                </div>
                                                @error('dateofbirth')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Upload Your Profile Picture</label>
                                                    <input class="form-control" name="image" type="file">
                                                </div>
                                                @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input class="form-control" name="address" type="text">
                                                </div>
                                                @error('address')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group comments">
                                                    <label>Tell Me About You</label>
                                                    <textarea name="about_you" placeholder="About You" class="form-control"></textarea>
                                                </div>
                                                @error('about_you')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-12">
                                                <button type="submit">
                                                    Update
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="update-pass">
                                        <h4>Change Password</h4>
                                        <p>
                                            Please Be carefull! when you fill the information. If you face any help then contact us.
                                        </p>
                                        <div class="row">
                                            
                                            <form action="{{ route('user.password.update',$user->id) }}" method="POST">
                                                @csrf
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Chose Password" type="password">
                                                    </div>
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Retype Password" type="password">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input class="form-control @error('old_password') is-invalid @enderror" placeholder="Old Password" name="old_password" type="password">
                                                    </div>
                                                    @error('old_password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Tab -->
                        </div>
                        <!-- End Tab Content -->
                    </div>
                    <!-- End Tab Info -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Students Profile -->
@endsection
