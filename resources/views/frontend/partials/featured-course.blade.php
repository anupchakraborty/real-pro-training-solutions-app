   <!-- Start Featured Courses
    ============================================= -->
    <div id="featured-courses" class="featured-courses-area left-details default-padding">
        <div class="container">
            <div class="row">
                <div class="featured-courses-carousel owl-carousel owl-theme">
                    @foreach($courses as $course)
                        <!-- Start Single Item -->
                        <div class="item">
                            <div class="col-md-5">
                                <div class="thumb">
                                    <img src="{{ asset('backend/img/courses/'.$course->image) }}" alt="Thumb">
                                    <div class="live-view">
                                        @if(!empty($course->courese_type))
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
                                        @if(!empty($course->courese_session))
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
                                </div>
                            </div>
                            <div class="col-md-7 info">
                                <h2>
                                    <a href="#">{{ $course->title }}</a>
                                </h2>
                                <h4>featured courses</h4>
                                <p>
                                    {{ $course->feature }}
                                </p>
                                <h3>Learning outcomes</h3>
                                <ul>
                                    {{ $course->desctription }}
                                </ul>

                                <form class="form-inline" action="{{ route('carts.store') }}" method="POST">
                                    @csrf
                                
                                    @if(!empty(Auth::guard('web')->user()->id))
                                        <input type="hidden" name="user_id" value="{{ Auth::guard('web')->user()->id }}">
                                
                                        <input type="hidden" name="course_id" value="{{ $course->id }}">

                                        <input type="hidden" name="course_id" value="{{ $course->id }}">

                                            <a type="button" title="Enroll Now" onclick="addTocart({{ $course->id }},{{ Auth::user()->id }})" class="btn btn-theme effect btn-md" data-animation="animated slideInUp">Enroll Now</a>
                                        @else
                                            <a type="button" title="Enroll Now" onclick="addTocart({{ $course->id }})" class="btn btn-theme effect btn-md" data-animation="animated slideInUp">Enroll Now</a>

                                    @endif
                                </form>
                                <div class="bottom-info align-left">
                                    <div class="item">
                                        <h4>Author</h4>
                                        <a href="#">
                                            <span>{{ $course->admin->name }}</span>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <h4>Students enrolled</h4>
                                        @php
                                            $carts = App\Models\Cart::where('course_id',$course->id)
                                                                    ->whereNotNull('order_id')
                                                                    ->get();
                
                                            $enroll_students = count($carts);

                                        @endphp
                                        <span>{{ $enroll_students }}</span>
                                    </div>
                                    <div class="item">
                                        <h4>Rating</h4>
                                        <span class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </span>
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
    <!-- End Featured Courses -->
