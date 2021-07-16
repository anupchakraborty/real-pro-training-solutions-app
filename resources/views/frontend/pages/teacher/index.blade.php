@extends('frontend.layouts.master')

@section('title')
    Teacher | Real Pro Traning Solutions
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
    <!-- Start Breadcrumb
    ============================================= -->
    <div class="breadcrumb-area shadow dark text-center bg-fixed text-light" style="background-image: url({{ asset('frontend/assets/img/banner/25.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Advisor</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('index') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">Advisor</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start Advisor Area
    ============================================= -->
    <section id="advisor" class="advisor-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="advisor-carousel owl-carousel owl-theme text-center text-light">
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
@endsection
