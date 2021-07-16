    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->

    <!-- Start Header Top
    ============================================= -->
    <div class="top-bar-area address-two-lines bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 address-info">
                    <div class="info box">
                            <ul>
                                <li>
                                    <span><i class="fas fa-map"></i> Address</span>
                                    @if(!empty($companyinfo->address))
                                        {{ $companyinfo->address }}
                                    @else
                                        Satpai
                                    @endif
                                </li>
                                <li>
                                    <span><i class="fas fa-envelope-open"></i> Email</span>
                                    @if(!empty($companyinfo->email))
                                        {{ $companyinfo->email }}
                                    @else
                                        anup9449@gmail.com
                                    @endif

                                </li>
                                <li>
                                    <span><i class="fas fa-phone"></i> Contact</span>
                                    @if(!empty($companyinfo->contact))
                                        {{ $companyinfo->contact }}
                                    @else
                                        12345678
                                    @endif

                                </li>
                            </ul>
                    </div>
                </div>

                @if(!empty(Auth::guard('web')->user()->id))
                <div class="user-login text-right col-md-4">
                    <a href="{{ route('user.profile') }}">
                        <i class="fas fa-edit"></i> Profile
                    </a>
                    <a href="{{ route('logout.user') }}"onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="fas fa-user"></i> {{ Auth::guard('web')->user()->fname }} | {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout.user') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                @else
                <div class="user-login text-right col-md-4">
                    <a class="popup-with-form" href="#register-form">
                        <i class="fas fa-edit"></i> Register
                    </a>
                    <a  class="popup-with-form" href="#login-form">
                        <i class="fas fa-user"></i> Login
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- End Header Top -->
