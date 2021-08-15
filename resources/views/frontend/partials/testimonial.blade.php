    <!-- Start Testimonials 
    ============================================= -->
    <div class="testimonials-area carousel-shadow default-padding bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Students Review</h2>
                        <p>
                            Able an hope of body. Any nay shyness article matters own removal nothing his forming. Gay own additions education satisfied the perpetual. If he cause manor happy. Without farther she exposed saw man led. Along on happy could cease green oh. 
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="clients-review-carousel owl-carousel owl-theme">
                        @php
                            $comments = App\Models\Comment::all();
                        @endphp
                        @foreach($comments as $comment)
                            @php
                                $user = App\Models\User::where('id',$comment->user_id)->first();
                            @endphp
                            <!-- Single Item -->
                            <div class="item">
                                <div class="col-md-5 thumb">
                                    <img src="{{ asset('frontend/assets/img/profile/'.$user->image) }}" alt="Thumb">
                                </div>
                                <div class="col-md-7 info">
                                    <p>
                                        {{ $comment->comment }}
                                    </p>
                                    <h4>{{ $user->fname }} {{ $user->lname }}</h4>
                                    <span>Student</span>
                                </div>
                            </div>
                            <!-- Single Item -->                          
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonials -->