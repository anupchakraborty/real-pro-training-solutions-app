@extends('frontend.layouts.master')

@section('title')
    Congrats | Real Pro Training Solutions
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
            <!-- Start Login
    ============================================= -->
    @include('frontend.partials.login')
        <!-- End Login
    ============================================= -->

        <!-- Start Register
    ============================================= -->
    @include('frontend.partials.register')
        <!-- End Register
    ============================================= -->

    <div class="cart-box-main mt-4">
        <div class="container">
            <h1 class="text-center">Thanks For Purchasing With Us!</h1> <br><br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h2>YOUR COD ORDER HAS BEEN PLACED</h2>
                        @foreach($orders as $key => $order)
                            <p><span>{{ $key+1 }}.</span> Your Order Number is #RPS{{ $order->id }} and total payable amount is ${{ $order->grand_total }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Start Footer
    ============================================= -->
    @include('frontend.partials.footer')
        <!-- End Footer
    ============================================= -->
@endsection