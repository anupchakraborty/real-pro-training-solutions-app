    <!-- Start Login Form
    ============================================= -->
    <form action="{{ route('login.submit') }}" method="POST" id="login-form" class="mfp-hide white-popup-block">
        @csrf
        <div class="col-md-4 login-social">
            <h4>Login with social</h4>
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
        <div class="col-md-8 login-custom">
            <h4>login to your registered account!</h4>
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <input class="form-control" name="email" placeholder="Email*" type="email">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group">
                        <input class="form-control" name="password" placeholder="Password*" type="password">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <label for="login-remember"><input type="checkbox" name="remember" id="login-remember">Remember Me</label>
                    <a title="Lost Password" href="#" class="lost-pass-link">Lost your password?</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <button type="submit">
                        Login
                    </button>
                </div>
            </div>
            <p class="link-bottom">Not a member yet? <a href="{{ route('register') }}">Register now</a></p>
        </div>
    </form>
    <!-- End Login Form -->
