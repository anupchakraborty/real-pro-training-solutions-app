@extends('frontend.layouts.master')

@section('title')
    Register | Real Pro Training Solutions
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
        <!-- Start Login
    ============================================= -->
    @include('frontend.partials.login')
        <!-- End Login
    ============================================= -->

        <!-- Start Register
    ============================================= -->
    @include('frontend.partials.register')
        <!-- End Register
    ============================================= -->

    <!-- Start Login
    ============================================= -->
    <div class="login-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                        <form action="{{ route('register') }}" id="register-form" class="white-popup-block" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="col-md-4 login-social">
                            <h4>Register with social</h4>
                            @php
                                $app_secret_key = \App\Models\Socialite::first()->app_secret_key;
                            @endphp
                            <ul>
                                <li class="facebook">
                                    <a href="{{ url("auth/facebook?secret_key={$app_secret_key}") }}">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li class="twitter">
                                    <a href="#">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="google">
                                    <a href="{{ url("auth/google?secret_key={$app_secret_key}") }}">
                                        <i class="fab fa-google"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-8 login-custom">
                            <h4>Register a new account</h4>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control @error('fname') is-invalid @enderror" name="fname" placeholder="Enter First name*" type="text">
                                    </div>
                                    @error('fname')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control @error('lname') is-invalid @enderror" name="lname" placeholder="Enter Last name*" type="text">
                                    </div>
                                    @error('lname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Your Email*" type="email">
                                    </div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Enter Your Phone No*" type="text">
                                    </div>
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Your Password*" type="text">
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group">
                                        <input class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Repeat Password*" type="text">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="row">
                                    <button type="submit">
                                        Sign up
                                    </button>
                                </div>
                            </div>
                            <p class="link-bottom">Are you a member? <a href="{{ route('login') }}">Login now</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login Area -->
                    <!-- Start Footer
    ============================================= -->
    @include('frontend.partials.footer')
        <!-- End Footer
    ============================================= -->

@endsection
