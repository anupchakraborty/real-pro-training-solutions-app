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

        <!-- Start Event
    ============================================= -->
    @include('frontend.partials.event')
        <!-- End Event
    ============================================= -->

        <!-- Start Footer
    ============================================= -->
    @include('frontend.partials.footer')
        <!-- End Footer
    ============================================= -->

@endsection
