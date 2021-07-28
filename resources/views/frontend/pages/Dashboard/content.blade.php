@extends('frontend.layouts.master')
@section('title')
    Course Content | Real Pro Training Solutions
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


        <!-- Start Content With Left Sidebar
    ============================================= -->
    <div class="faq-area left-sidebar course-details-area default-padding">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        @php
                            $teacher = App\Models\Admin::where('id',$course->admin_id)->first();
                        @endphp

                        <h2>{{ $course->title }} by {{ $teacher->name }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Start Sidebar -->
                <div class="left-sidebar col-md-4">
                    <div class="sidebar">
                        <aside>
                            <!-- Sidebar Item -->
                            <div class="sidebar-item search">
                                <div class="sidebar-info">
                                    <form>
                                        <input type="text" placeholder="Course name" class="form-control">
                                        <input type="submit" value="search">
                                    </form>
                                </div>
                            </div>
                            <!-- End Sidebar Item -->

                            <!-- Sidebar Item -->
                            <div class="sidebar-item category">
                                <div class="title">
                                    <h4>Your Course</h4>
                                </div>
                                <div class="sidebar-info">
                                    
                                    <ul>
                                        @foreach($contents as $key => $content)
                                            <li>
                                                <a href="{{ route('user.course.contant',$content->id) }}" class="content">
                                                    @if($content->view_status == 1)
                                                        <i class="fas fa-eye"></i>
                                                    @else
                                                        <i class="fas fa-eye-slash"></i>
                                                    @endif
                                                    
                                                    <p>{{ $key+1 }}. {{ $content->title }}</p>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <!-- End Sidebar Item -->
                        </aside>
                    </div>
                </div>
                <!-- End Sidebar -->
                <!--start-course-content-->
                    <div class="col-md-8 faq-content">
                        <div class="card">
                            <div class="card-body mt-3">
                                <h2 class="card-title">{{ $course->title }}</h2>
                                <p class="card-text">{{ $course->desctription }}</p>
                            </div>
                        </div>
                    </div>
                <!--end-course-content-->
            </div>
        </div>
    </div>
    <!-- End Content  -->


        <!-- Start Footer
    ============================================= -->
    @include('frontend.partials.footer')
        <!-- End Footer
    ============================================= -->

@endsection
