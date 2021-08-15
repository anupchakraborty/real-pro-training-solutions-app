@extends('frontend.layouts.master')

@section('title')
    Course Details | Real Pro Training Solutions
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
                    <h1>Course Details</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('index') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li><a href="{{ route('courses') }}">Course</a></li>
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
                                <img src="{{ asset('backend/img/courses/'.$course->image) }}" alt="Thumb" id="thumb_img">
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
                                    <h4>Course Type</h4>
                                    <span>
                                        @if($course->course_type == 'live_course')
                                            Live Course
                                        @elseif($course->course_type == 'online_course')
                                            Online Course
                                        @else

                                        @endif
                                    </span>
                                </div>
                                <div class="item rating">
                                    <h4>Started</h4>
                                    <span>{{ $course->started_date }}</span>
                                </div>
                                <div class="item price">
                                    <h4>Price</h4>
                                    <span>${{ $course->price }}</span>
                                </div>
                                <div class="align-right">
                                    @if(!empty(Auth::guard('web')->user()->id))
                                        <input type="hidden" name="user_id" value="{{ Auth::guard('web')->user()->id }}">

                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                        <a type="button" class="btn btn-dark effect btn-sm" title="Enroll Now" onclick="addTocart({{ $course->id }},{{ Auth::user()->id }})"><i class="fas fa-chart-bar"></i> Enroll</a>
                                    @else
                                        <a type="button" class="btn btn-dark effect btn-sm" title="Enroll Now" onclick="addTocart({{ $course->id }})"><i class="fas fa-chart-bar"></i> Enroll</a>
                                    @endif
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
                                        @php
                                            $teacher_id = $course->admin_id;
                                            $courses = App\Models\Course::where('admin_id',$teacher_id)->get();
                                        @endphp
                                        @foreach($courses as $course)
                                        <h4>Courses Desctription</h4>
                                        <p>
                                            {{ $course->desctription }}
                                        </p>
                                        <h4>List Of Courses</h4>
                                        <!-- Start Course List -->
                                        <div class="course-list-items acd-items acd-arrow">
                                            <div class="panel-group symb" id="accordion">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h4 class="panel-title">
                                                            <a data-toggle="collapse" data-parent="#accordion" href="#ac1">
                                                                {{ $course->title }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div id="ac1" class="panel-collapse collapse in">
                                                        <div class="panel-body">
                                                            <ul>
                                                                @php
                                                                    $contents = App\Models\CourseContent::where('course_id',$course->id)->get();
                                                                @endphp
                                                                @foreach($contents as $key => $content)
                                                                <li>
                                                                    <div class="item name">
                                                                        <i class="fas fa-play"></i>
                                                                        <span>Lecture {{ $key+1 }}</span>
                                                                    </div>
                                                                    <div class="item title">
                                                                        <h5>{{ $content->title }}</h5>
                                                                    </div>
                                                                    <div class="item info">
                                                                        <span>Duration:
                                                                         {{ $duration }}
                                                                        </span>
                                                                       <a href="#">Preview</a>
                                                                    </div>
                                                                </li>                                                                   
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Course List -->
                                        @endforeach
                                    </div>
                                </div>
                                <!-- End Single Tab -->

                                <!-- Single Tab -->
                                <div id="tab3" class="tab-pane fade">
                                    <div class="info title">
                                        <div class="advisor-list-items">
                                            @php
                                                $admin_id = $course->admin_id;
                                                $admin = App\Models\Admin::where('id',$admin_id)->first();
                                            @endphp
                                            <!-- Advisor Item -->
                                            <div class="item">
                                                <div class="thumb">
                                                    <img src="{{ asset('backend/img/admin/'.$admin->image) }}" alt="Thumb">
                                                </div>
                                                <div class="info">
                                                    <h4>{{ $admin->name }}</h4>
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

                        <!-- start-comments -->
                            <!--/.Comments-->
                        <div class="container">
                            <div class="be-comment-block">
                            <h1 class="comments-title">Comments {{ $course->id }}</h1>
                            @php
                                $comments = App\Models\Comment::where('course_id', $course->id)->get();
                            @endphp
                                @foreach ($comments as $comment)
                                    @if($comment->course_id == $course->id)
                                        @php
                                            $id = $comment->user_id;
                                            $user = App\Models\User::where('id',$id)->first();
                                        @endphp
                                    <div class="be-comment">
                                        <div class="be-img-comment">
                                        <a href="blog-detail-2.html">
                                            <img src="{{ URL::To('frontend/assets/img/profile/'.$user->image) }}" alt="" class="be-ava-comment">
                                        </a>
                                        </div>
                                        <div class="be-comment-content">
                                            <span class="be-comment-name">
                                            <a href="blog-detail-2.html">
                                                {{ $user->fname }} {{ $user->lname }}
                                            </a>
                                            </span>
                                            <span class="be-comment-time">
                                                <i class="fa fa-clock-o"></i>
                                                {{ $comment->created_at->format('D,d,M,Y') }}
                                            </span>
                                            <p class="be-comment-text">
                                            {{ $comment->comment }}
                                            </p>
                                        </div>
                                    </div>
                                    @else
                                        <div class="be-comment">
                                            <strong>No Comments Yet !!</strong>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                            <!--/.Comments-->
                        <!--/.Reply-->
                            <form class="form-block" action="{{ route('user.comments.store',$course->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group fl_icon">
                                            <div class="icon"><i class="fa fa-user"></i></div>
                                            <input class="form-input" type="text" name="name" placeholder="Your name">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 fl_icon">
                                        <div class="form-group fl_icon">
                                            <div class="icon"><i class="fas fa-envelope"></i></div>
                                            <input class="form-input" type="text" name="email" placeholder="Your email">
                                        </div>
                                    </div>
                                    <div>
                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <textarea class="form-input" name="comment" required="" placeholder="Your text" aria-describedby="commentHelp"></textarea>
                                            @error('comment')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right">submit</button>
                                </div>
                            </form>
                        <!--/.Reply-->
                        <!-- end-comments -->
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
                            <div class="sidebar-item recent-post">
                                <div class="title">
                                    <h4>Popular Courses</h4>
                                </div>
                                @php
                                    $courses = App\Models\Course::all();
                                @endphp
                                @foreach($courses as $popular_course)
                                    @php
                                        $slug = \Illuminate\Support\Str::slug($popular_course->title);
                                    @endphp
                                    <div class="item">
                                        <div class="content">
                                            <div class="thumb">
                                                <a href="{{ route('course.details', ['id' => $popular_course->id,'slug' => $slug]) }}">
                                                    <img src="{{ asset('backend/img/courses/'.$popular_course->image) }}" alt="Thumb">
                                                </a>
                                            </div>
                                            <div class="info">
                                                <h4>
                                                    <a href="{{ route('course.details', ['id' => $popular_course->id,'slug' => $slug]) }}">{{ $popular_course->title }}</a>
                                                </h4>
                                                <div class="meta">
                                                    <span>Course Started: {{ $popular_course->started_date }}</span>
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
