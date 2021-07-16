@extends('frontend.layouts.master')

@section('title')
    Course Details | Real Pro Traning Solutions
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
                    <h1>Course Details</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('index') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="{{ route('user.courses') }}">Course</a></li>
                        <li class="active">Single</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Course Details
    ============================================= -->
    <div class="course-details-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="course-details-info">
                        <!-- Star Top Info -->
                        <div class="top-info">
                            <!-- Title-->
                            <div class="title">
                                <h2>{{ $course->title }}</h2>
                            </div>
                            <!-- End Title-->

                            <!-- Thumbnail -->
                            <div class="thumb">
                                <img src="{{ asset('backend/img/courses/'.$course->image) }}" alt="Thumb">
                            </div>
                            <!-- End Thumbnail -->

                            <!-- Course Meta -->
                            <div class="course-meta">
                                <div class="item author">
                                    <div class="thumb">
                                        <a href="#"><img alt="Thumb" src="{{ asset('backend/img/admin/'.$course->admin->image) }}"></a>
                                    </div>
                                    <div class="desc">
                                        <h4>Author</h4>
                                        <a href="#">{{ $course->admin->name }}</a>
                                    </div>
                                </div>
                                <div class="item category">
                                    <h4>Category</h4>
                                    <a href="#">Science</a>
                                </div>
                                <div class="item rating">
                                    <h4>Rating</h4>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span>4.5 (16)</span>
                                </div>
                                <div class="item price">
                                    <h4>Price</h4>
                                    <span>{{ $course->price }} $</span>
                                </div>
                                <div class="align-right">
                                    <a class="btn btn-dark effect btn-sm" href="#">
                                        <i class="fas fa-chart-bar"></i> Enroll
                                    </a>
                                </div>
                            </div>
                            <!-- End Course Meta -->
                        </div>
                        <!-- End Top Info -->

                        <!-- Star Tab Info -->
                        <div class="tab-info">
                            <!-- Tab Nav -->
                            <ul class="nav nav-pills">
                                <li class="active">
                                    <a data-toggle="tab" href="#tab1" aria-expanded="true">
                                        Overview
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab2" aria-expanded="false">
                                        Curriculum
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab3" aria-expanded="false">
                                        Advisor
                                    </a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab4" aria-expanded="false">
                                        Reviews
                                    </a>
                                </li>
                            </ul>
                            <!-- End Tab Nav -->
                            <!-- Start Tab Content -->
                            <div class="tab-content tab-content-info">
                                <!-- Single Tab -->
                                <div id="tab1" class="tab-pane fade active in">
                                    <div class="info title">
                                        <h4>Course Desscription</h4>
                                        <p>
                                            {{ $course->desctription }}
                                        </p>
                                        <h4>Certification</h4>
                                        <p>
                                            Calling nothing end fertile for venture way boy. Esteem spirit temper too say adieus who direct esteem. It esteems luckily mr or picture placing drawing no. Apartments frequently or motionless on reasonable projecting expression. Way mrs end gave tall walk fact bed.
                                        </p>
                                        <h4>Learning Outcomes</h4>
                                        <ul>
                                            {{ $course->feature }}
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Single Tab -->

                                <!-- Single Tab -->
                                <div id="tab2" class="tab-pane fade">
                                    <div class="info title">
                                        <p>
                                            Placing assured be if removed it besides on. Far shed each high read are men over day. Afraid we praise lively he suffer family estate is. Ample order up in of in ready. Timed blind had now those ought set often which. Or snug dull he show more true wish. No at many deny away miss evil. On in so indeed spirit an mother. Amounted old strictly but marianne admitted. People former is remove remain as.
                                        </p>
                                        <h4>List Of Courses</h4>
                                        <!-- Start Course List -->
                                        <div class="course-list-items acd-items acd-arrow">
                                            <div class="panel-group symb" id="accordion">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#ac1">
                                                                Java Programming
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="ac1" class="panel-collapse collapse in">
                                                        <div class="panel-body">
                                                            <ul>
                                                                <li>
                                                                    <div class="item name">
                                                                        <i class="fas fa-play"></i>
                                                                        <span>Lecture 1.1</span>
                                                                    </div>
                                                                    <div class="item title">
                                                                        <h5>Introduction of java</h5>
                                                                    </div>
                                                                    <div class="item info">
                                                                        <span>Duration: 1 hours 30 min</span>
                                                                       <a href="#">Preview</a>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="item name">
                                                                        <i class="fas fa-file"></i>
                                                                        <span>Lecture 1.2</span>
                                                                    </div>
                                                                    <div class="item title">
                                                                        <h5>Basic development</h5>
                                                                    </div>
                                                                    <div class="item info">
                                                                        <span>Duration: 3 hours 15 min</span>
                                                                        <a href="#">Preview</a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Course List -->
                                        <!-- Start Course List -->
                                        <div class="course-list-items acd-items acd-arrow">
                                            <div class="panel-group symb" id="accordion">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#ac2">
                                                                PHP Programmig
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="ac2" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                            <ul>
                                                                <li>
                                                                    <div class="item name">
                                                                        <i class="fas fa-play"></i>
                                                                        <span>Lecture 1.1</span>
                                                                    </div>
                                                                    <div class="item title">
                                                                        <h5>Introduction</h5>
                                                                    </div>
                                                                    <div class="item info">
                                                                        <span>Duration: 1 hours 30 min</span>
                                                                       <a href="#">Preview</a>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div class="item name">
                                                                        <i class="fas fa-file"></i>
                                                                        <span>Lecture 1.2</span>
                                                                    </div>
                                                                    <div class="item title">
                                                                        <h5>Benifits of function</h5>
                                                                    </div>
                                                                    <div class="item info">
                                                                        <span>Duration: 2 hours 12 min</span>
                                                                        <a href="#">Preview</a>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Course List -->
                                    </div>
                                </div>
                                <!-- End Single Tab -->

                                <!-- Single Tab -->
                                <div id="tab3" class="tab-pane fade">
                                    <div class="info title">
                                        <div class="advisor-list-items">
                                            <!-- Advisor Item -->
                                            <div class="item">
                                                <div class="thumb">
                                                    <img src="assets/img/team/7.jpg" alt="Thumb">
                                                </div>
                                                <div class="info">
                                                    <h4>Devid Mark</h4>
                                                    <span>senior lecturer</span>
                                                    <p>
                                                        Several carried through an of up attempt gravity. Situation to be at offending elsewhere distrusts if. Particular use for considered projection cultivated. Worth of do doubt shall
                                                    </p>
                                                    <ul>
                                                        <li>
                                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fab fa-dribbble"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fab fa-youtube"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- End Advisor Item -->
                                            <!-- Advisor Item -->
                                            <div class="item">
                                                <div class="thumb">
                                                    <img src="assets/img/team/8.jpg" alt="Thumb">
                                                </div>
                                                <div class="info">
                                                    <h4>Andolin Paul</h4>
                                                    <span>Java Developer</span>
                                                    <p>
                                                        Several carried through an of up attempt gravity. Situation to be at offending elsewhere distrusts if. Particular use for considered projection cultivated. Worth of do doubt shall
                                                    </p>
                                                    <ul>
                                                        <li>
                                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fab fa-dribbble"></i></a>
                                                        </li>
                                                        <li>
                                                            <a href="#"><i class="fab fa-youtube"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- End Advisor Item -->
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Tab -->

                                <!-- Single Tab -->
                                <div id="tab4" class="tab-pane fade">
                                    <div class="info title">
                                        <div class="course-rating-list">
                                            <h4>Average Rating</h4>
                                            <div class="item rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                                <span>4.5 (16)</span>
                                            </div>
                                            <ul>
                                                <li>
                                                    <span>5 Star</span>
                                                    <div class="rating-bar"></div>
                                                    <span>13</span>
                                                </li>
                                                <li>
                                                    <span>4 Star</span>
                                                    <div class="rating-bar"></div>
                                                    <span>1</span>
                                                </li>
                                                <li>
                                                    <span>3 Star</span>
                                                    <div class="rating-bar"></div>
                                                    <span>0</span>
                                                </li>
                                                <li>
                                                    <span>2 Star</span>
                                                    <div class="rating-bar"></div>
                                                    <span>1</span>
                                                </li>
                                                <li>
                                                    <span>1 Star</span>
                                                    <div class="rating-bar"></div>
                                                    <span>0</span>
                                                </li>
                                            </ul>
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
                <!-- Start Sidebar -->
                <div class="col-md-4">
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
                                    <h4>Courses Category</h4>
                                </div>
                                <div class="sidebar-info">
                                    <ul>
                                        <li>
                                            <a href="#">Java Programming <span>23</span></a>
                                        </li>
                                        <li>
                                            <a href="#">Social Science <span>0</span></a>
                                        </li>
                                        <li>
                                            <a href="#">Business Management <span>12</span></a>
                                        </li>
                                        <li>
                                            <a href="#">Online Learning <span>17</span></a>
                                        </li>
                                        <li>
                                            <a href="#">Course Management <span>0</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Sidebar Item -->

                            <!-- Sidebar Item -->
                            <div class="sidebar-item recent-post">
                                <div class="title">
                                    <h4>Popular Courses</h4>
                                </div>
                                @php
                                    $courses = App\Models\Course::all();
                                @endphp
                                @foreach($courses as $popular_course)
                                    <div class="item">
                                        <div class="content">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img src="{{ asset('backend/img/courses/'.$popular_course->image) }}" alt="Thumb">
                                                </a>
                                            </div>
                                            <div class="info">
                                                <h4>
                                                    <a href="#">{{ $popular_course->title }}</a>
                                                </h4>
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                    <span>4.5 (23,890)</span>
                                                </div>
                                                <div class="meta">
                                                    <i class="fas fa-user"></i> By <a href="#">{{ $popular_course->admin->name }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- End Sidebar Item -->

                        </aside>
                    </div>
                </div>
                <!-- End Sidebar -->
            </div>
        </div>
    </div>
    <!-- End Course Details -->

@endsection
