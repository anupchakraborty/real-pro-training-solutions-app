    <!-- Start Footer
    ============================================= -->
    <footer class="bg-dark default-padding-top text-light">
        <div class="container">
            <div class="row">
                <div class="f-items">
                    <div class="col-md-4 item">
                        <div class="f-item">
                            <img src="{{ asset('frontend/assets/img/logo-light.png') }}" alt="Logo">
                            <p>
                                Excellence decisively nay man yet impression for contrasted remarkably. There spoke happy for you are out. Fertile how old address did showing because sitting replied six. Had arose guest visit going off child she new.
                            </p>
                            <p class="text-italic">
                                Please write your email and get our amazing updates, news and support
                            </p>
                            <div class="subscribe">
                                <form action="#">
                                    <div class="input-group stylish-input-group">
                                        <input type="email" placeholder="Enter your e-mail here" class="form-control" name="email">
                                        <button type="submit">
                                            <i class="fa fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 item">
                        <div class="f-item link">
                            <h4>Links</h4>
                            <ul>
                                <li>
                                    <a href="{{ route('courses') }}">Courses</a>
                                </li>
                                <li>
                                    <a href="#">Event</a>
                                </li>
                                <li>
                                    <a href="#">Gallery</a>
                                </li>
                                <li>
                                    <a href="#">Faqs</a>
                                </li>
                                <li>
                                    <a href="{{ route('teacher') }}">Teachers</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 item">
                        <div class="f-item link">
                            <h4>Support</h4>
                            <ul>
                                <li>
                                    <a href="#">Documentation</a>
                                </li>
                                <li>
                                    <a href="#">Forums</a>
                                </li>
                                <li>
                                    <a href="#">Language Packs</a>
                                </li>
                                <li>
                                    <a href="#">Release Status</a>
                                </li>
                                <li>
                                    <a href="#">LearnPress</a>
                                </li>
                                <li>
                                    <a href="#">Feedback</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 item">
                        <div class="f-item address">
                            <h4>Address</h4>
                            <ul>
                                <li>
                                    <i class="fas fa-envelope"></i>
                                    <p>Email <span><a href="#">
                                        @if(!empty($companyinfo->email))
                                        {{ $companyinfo->email }}
                                        @else
                                            anup9449@gmail.com
                                        @endif
                                    </a></span></p>
                                </li>
                                <li>
                                    <i class="fas fa-map"></i>
                                    <p>Office <span>
                                        @if(!empty($companyinfo->address))
                                        {{ $companyinfo->address }}
                                        @else
                                            Satpai
                                        @endif
                                    </span></p>
                                </li>
                            </ul>
                            <div class="opening-info">
                                <h5>Opening Hours</h5>
                                <ul>
                                    <li> <span> Mon - Tues :  </span>
                                      <div class="pull-right"> 6.00 am - 10.00 pm </div>
                                    </li>
                                    <li> <span> Wednes - Thurs :</span>
                                      <div class="pull-right"> 8.00 am - 6.00 pm </div>
                                    </li>
                                    <li> <span> Sun : </span>
                                      <div class="pull-right closed"> Closed </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <p>&copy; Copyright 2021 &copy; by <a href="#">Real Pro Traning Solutions</a></p>
                        </div>
                        <div class="col-md-6 text-right link">
                            <ul>
                                <li>
                                    <a href="#">Terms of user</a>
                                </li>
                                <li>
                                    <a href="#">License</a>
                                </li>
                                <li>
                                    <a href="#">Support</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!-- End Footer -->
