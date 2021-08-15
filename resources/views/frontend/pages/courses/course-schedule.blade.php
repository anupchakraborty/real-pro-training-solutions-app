@extends('frontend.layouts.master')

@section('title')
    Course Schedule | Real Pro Training Solutions
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
    <div class="breadcrumb-area shadow dark text-center bg-fixed text-light" style="background-image: url({{ asset('frontend/assets/img/banner/8.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Course Schedule</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('index') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="{{ route('course.schedule') }}">Course Schedule</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->
    <div class="course-details-area">
        <div class="limiter">
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table100 ver1 m-b-110">
                        <div class="table100-head">
                            <table>
                                <thead>
                                    <tr class="row100 head">
                                        <th class="cell100 column1">Course Title</th>
                                        <th class="cell100 column2">Course Type</th>
                                        <th class="cell100 column3">Started Date</th>
                                        <th class="cell100 column4">Price</th>
                                        <th class="cell100 column5">Availability</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
    
                        <div class="table100-body js-pscroll">
                            <table>
                                <tbody>
                                    @foreach($courses as $key => $course)
                                        <tr class="row100 body">
                                            <td class="cell100 column1">{{ $course->title }}</td>
                                            <td class="cell100 column2">
                                                @if($course->course_type == 'online_course')
                                                    Online Course
                                                @elseif($course->course_type == 'live_course')
                                                    Live Course
                                                @else

                                                @endif
                                            </td>
                                            <td class="cell100 column3">{{ $course->started_date }}</td>
                                            <td class="cell100 column4">${{ $course->price }}</td>
                                            <td class="cell100 column5">
                                                @if($course->course_session == 'morining_session')
                                                    Morining Session
                                                @elseif($course->course_session == 'afternoon_session')
                                                    Afternon Session
                                                @elseif($course->course_session == 'weekend_session')
                                                    Weekend Session
                                                @elseif($course->course_session == 'evening_session')
                                                    Evening Session
                                                @else
                                                
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
    <!-- End Course Details -->

    @endsection