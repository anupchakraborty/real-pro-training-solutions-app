@extends('frontend.layouts.master')

@section('title')
    Courses | Real Pro Training Solutions
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
                    <div class="site-heading text-center">
                        <div class="col-md-8 col-md-offset-2">
                            <h2>Our Courses</h2>
                            <p>
                                @php
                                    $course_type_live = 'live_course';
                                    $course_type_online = 'online_course';
                                @endphp
                                <a href="{{ route('courses') }}" class="btn btn-outline-success">All</a>
                                <a href="{{ route('course.type',$course_type_live) }}" class="btn btn-outline-info">Live Classrooms</a>
                                <a href="{{ route('course.type',$course_type_online) }}" class="btn btn-outline-warning">Virtual Classrooms</a>
                            </p>
                        </div>
                    </div>

                    @foreach($courses as $course)
                        @php
                            $slug = \Illuminate\Support\Str::slug($course->title);
                        @endphp
                        <!-- Single Item -->
                        <div class="col-md-4 col-sm-6 equal-height">
                            <div class="item">
                                <div class="thumb">
                                    <a href="{{ route('course.details', ['id' => $course->id,'slug' => $slug]) }}">
                                        <img src="{{ asset('backend/img/courses/'.$course->image) }}" alt="Thumb" id="popular_image">
                                    </a>
                                    <div class="live-view">
                                        @if(!empty($course->course_type))
                                        <span class="badge badge-warning">
                                            <i class="fas fa-bullhorn"></i>
                                            @if($course->course_type == 'live_course')
                                                Live Course
                                            @elseif($course->course_type == 'online_course')
                                                Online Course
                                            @else

                                            @endif
                                        </span>
                                        @else

                                        @endif
                                        @if(!empty($course->course_session))
                                            <span class="badge badge-warning">
                                                <i class="fas fa-clipboard-list"></i>
                                                @if($course->course_session == 'morining_session')
                                                    Morining Session
                                                @elseif($course->course_session == 'afternoon_session')
                                                    Afternoon Session
                                                @elseif($course->course_session == 'weekend_session')
                                                    Weekend Session
                                                @elseif($course->course_session == 'evening_session')
                                                    Evening Session
                                                @else
                                                    
                                                @endif
                                            </span>
                                        @else

                                        @endif
                                    </div>
                                    <div class="price">Price: ${{ $course->price }}</div>
                                    @if(!empty($course->started_date))
                                        <div class="price">Course Started: {{ $course->started_date }}</div>
                                    @else

                                    @endif
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
                                    <h4><a href="{{ route('course.details', ['id' => $course->id,'slug' => $slug]) }}">{{ $course->title }}</a></h4>
                                    <p>
                                        {{ \Illuminate\Support\Str::limit($course->desctription, 150, $end='...') }}
                                    </p>
                                    <div class="bottom-info">
                                        <ul>
                                            <li>
                                                @php
                                                    $carts = App\Models\Cart::where('course_id',$course->id)
                                                                            ->whereNotNull('order_id')
                                                                            ->get();
                        
                                                    $enroll_students = count($carts);

                                                @endphp
                                                <i class="fas fa-user"></i> {{ $enroll_students }}
                                            </li>
                                            <li>
                                                <i class="fas fa-clock"></i> {{ $course->duration }}.00
                                            </li>
                                        </ul>
                                        @include('frontend.partials.enroll_button')
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
