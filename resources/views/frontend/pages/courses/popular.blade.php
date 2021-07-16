@extends('frontend.layouts.master')

@section('title')
    Courses | Real Pro Traning Solutions
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
    <div class="breadcrumb-area shadow dark text-center bg-fixed text-light" style="background-image: url({{ asset('frontend/assets/img/banner/2.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Courses</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('index') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">Course</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Popular Courses
    ============================================= -->
    <div class="popular-courses default-padding bottom-less without-carousel">
        <div class="container">
            <div class="row">
                <div class="popular-courses-items">
                    @foreach($courses as $course)
                        <!-- Single Item -->
                        <div class="col-md-4 col-sm-6 equal-height">
                            <div class="item">
                                <div class="thumb">
                                    {{-- @php
                                        $slug = Str::slug($course->title);
                                    @endphp --}}
                                    <a href="{{ route('course.details',$course->id) }}">
                                        <img src="{{ asset('backend/img/courses/'.$course->image) }}" alt="Thumb">
                                    </a>
                                    <div class="price">Price: {{ $course->price }}$</div>
                                </div>
                                <div class="info">
                                    <div class="author-info">
                                        <div class="thumb">
                                            <a href="#"><img src="{{ asset('backend/img/admin/'.$course->admin->image) }}" alt="Thumb"></a>
                                        </div>
                                        <div class="others">
                                            <a href="#">{{ $course->admin->name }}</a>
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <span>4.5 (23,890)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <h4><a href="{{ route('course.details',$course->id) }}">{{ $course->title }}</a></h4>
                                    <p>
                                        {{ $course->desctription }}
                                    </p>
                                    <div class="bottom-info">
                                        <ul>
                                            <li>
                                                <i class="fas fa-user"></i> 6,690
                                            </li>
                                            <li>
                                                <i class="fas fa-clock"></i> {{ $course->duration }}.00
                                            </li>
                                        </ul>
                                        <a href="#">Enroll Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Item -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- End Popular Courses -->
@endsection
