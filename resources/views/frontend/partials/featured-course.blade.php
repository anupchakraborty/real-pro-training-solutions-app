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
                                        <a href="{{ asset('backend/img/courses/'.$course->image) }}" class="item popup-link">
                                            <i class="fa fa-camera"></i>
                                        </a>
                                        <a class="popup-youtube" href="https://www.youtube.com/watch?v=vQqZIFCab9o">
                                            <i class="fa fa-video"></i>
                                        </a>
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

                                <div class="bottom-info align-left">
                                    <div class="item">
                                        <h4>Author</h4>
                                        <a href="#">
                                            <span>{{ $course->admin->name }}</span>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <h4>Students enrolled</h4>
                                        <span>5455</span>
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
