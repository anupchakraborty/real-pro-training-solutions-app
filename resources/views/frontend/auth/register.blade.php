    <!-- Start Register Form
    ============================================= -->
    <form action="{{ route('register') }}" id="register-form" class="mfp-hide white-popup-block" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-md-2 login-social">
            <h4>Register with social</h4>
            <ul>
                <li class="facebook">
                    <a href="#">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                </li>
                <li class="twitter">
                    <a href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                </li>
                <li class="linkedin">
                    <a href="#">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-10 login-custom">
            <h4>Register a new account</h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control @error('fname') is-invalid @enderror" name="fname" placeholder="Enter First name*" type="text">
                        </div>
                        @error('fname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control @error('lname') is-invalid @enderror" name="lname" placeholder="Enter Last name*" type="text">
                        </div>
                        @error('lname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Your Email*" type="email">
                        </div>
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Enter Your Phone No*" type="text">
                        </div>
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Your Password*" type="text">
                        </div>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Repeat Password*" type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control @error('dateofbirth') is-invalid @enderror" name="dateofbirth" type="date">
                        </div>
                        @error('dateofbirth')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control @error('image') is-invalid @enderror" name="image" placeholder="Enter Your Phone No*" type="file">
                        </div>
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="submit">
                            Sign up
                        </button>
                    </div>
                </div>
            <p class="link-bottom">Are you a member? <a class="popup-with-form" href="#login-form">Login now</a></p>
        </div>
    </form>
    <!-- End Register Form -->
