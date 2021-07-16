    <!-- Start Advisor Area
    ============================================= -->
    <section id="advisor" class="advisor-area bg-gray carousel-shadow default-padding bottom-less">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Experience Advisors</h2>
                        <p>
                            Able an hope of body. Any nay shyness article matters own removal nothing his forming. Gay own additions education satisfied the perpetual. If he cause manor happy. Without farther she exposed saw man led. Along on happy could cease green oh.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="advisor-items advisor-carousel-solid owl-carousel owl-theme text-center text-light">
                        @foreach($admins as $admin)

                        @if($admin->username == 'superadmin' || $admin->username == 'sysowner' || $admin->username == 'sysadmin')

                            @else
                                <!-- Single Item -->
                                <div class="advisor-item">
                                    <div class="info-box">
                                        <img src="{{ asset('backend/img/admin/'.$admin->image) }}" alt="Thumb">
                                        <div class="info-title">
                                            <h4>{{ $admin->name }}</h4>
                                            <span>Specialist</span>
                                        </div>
                                        <div class="overlay">
                                            <div class="box">
                                                <div class="content">
                                                    <div class="overlay-content">
                                                        <h4>About {{ $admin->name }}</h4>
                                                        <p>
                                                            Great explorer of the truth, the master-builder of human happiness.
                                                        </p>
                                                        <a href="#">Read More</a>
                                                        <div class="social">
                                                            <ul>
                                                                <li>
                                                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#"><i class="fab fa-pinterest"></i></a>
                                                                </li>
                                                                <li>
                                                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Item -->
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Advisor Area -->
