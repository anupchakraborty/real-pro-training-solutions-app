@extends('frontend.layouts.master')


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
        <!-- Start Login
    ============================================= -->
    @include('frontend.auth.login')
        <!-- End Login
    ============================================= -->

        <!-- Start Register
    ============================================= -->
    @include('frontend.auth.register')
        <!-- End Register
    ============================================= -->
        <!-- Start banner
    ============================================= -->
    @include('frontend.partials.start-banner')
        <!-- End banner
    ============================================= -->

        <!-- Start about
    ============================================= -->
    @include('frontend.partials.about')
        <!-- End about
    ============================================= -->

        <!-- Start why chose us
    ============================================= -->
    @include('frontend.partials.why-chose-us')
        <!-- End why chose us
    ============================================= -->

        <!-- Start Featured course
    ============================================= -->
    @include('frontend.partials.featured-course')
        <!-- End Featured course
    ============================================= -->

        <!-- Start popular course
    ============================================= -->
    @include('frontend.partials.popular-course')
        <!-- End popular course
    ============================================= -->

        <!-- Start avdvisor area
    ============================================= -->
    @include('frontend.partials.advisor-area')
        <!-- End avdvisor area
    ============================================= -->

        <!-- Start fun factor
    ============================================= -->
    @include('frontend.partials.fun-factor')
        <!-- End fun factor
    ============================================= -->

        <!-- Start Event
    ============================================= -->
    @include('frontend.partials.event')
        <!-- End Event
    ============================================= -->

        <!-- Start Regsistion
    ============================================= -->
    @include('frontend.partials.regsistion')
        <!-- End Regsistion
    ============================================= -->

        <!-- Start Testimonial
    ============================================= -->
    @include('frontend.partials.testimonial')
        <!-- End Testimonial
    ============================================= -->

            <!-- Start Footer
    ============================================= -->
    @include('frontend.partials.footer')
        <!-- End Footer
    ============================================= -->

@endsection
