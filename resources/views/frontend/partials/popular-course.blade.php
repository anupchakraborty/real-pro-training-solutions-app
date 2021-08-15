    <!-- Start Popular Courses
    ============================================= -->
    <div class="popular-courses circle bg-gray carousel-shadow default-padding">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Popular Courses</h2>
                        <p>
                            Discourse assurance estimable applauded to so. Him everything melancholy uncommonly but solicitude inhabiting projection off. Connection stimulated estimating excellence an to impression.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="popular-courses-items popular-courses-carousel owl-carousel owl-theme">
                        @foreach($courses as $course)
                            @php
                                $slug = \Illuminate\Support\Str::slug($course->title);
                            @endphp
                            <!-- Single Item --->
                            <div class="item">
                                <div class="thumb">
                                    <a href="{{ route('course.details', ['id' => $course->id,'slug' => $slug]) }}">
                                        <img src="{{ asset('backend/img/courses/'.$course->image) }}" alt="Thumb" id="course_image">
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
                                    </a>
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
                                                <i class="fas fa-clock"></i> {{ $course->duration }}:00
                                            </li>
                                        </ul>
                                        @include('frontend.partials.enroll_button')
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Item -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Popular Courses -->
