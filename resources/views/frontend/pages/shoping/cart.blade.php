@extends('frontend.layouts.master')

@section('title')
    Cart | Real Pro Training Solutions
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

    <!-- Start Breadcrumb
    ============================================= -->
    <div class="breadcrumb-area shadow dark text-center bg-fixed text-light" style="background-image: url({{ asset('frontend/assets/img/banner/2.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Cart</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('index') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">Carts</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    @php
        $ip = request()->ip();
        $carts = App\Models\Cart::where('ip_address',$ip)
                                    ->where('order_id',NULL)
                                    ->get();
    @endphp
    @if(!empty($carts))
        @if(App\Models\Cart::totalItems() > 0)
            <!-- Shopping Cart -->
            <div class="shopping-cart section">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- Shopping Summery -->
                            <table class="table shopping-summery">
                                <thead>
                                    <tr class="main-hading">
                                        <th>PRODUCT</th>
                                        <th>NAME</th>
                                        <th class="text-center">UNIT PRICE</th>
                                        <th class="text-center">QUANTITY</th>
                                        <th class="text-center">TOTAL</th>
                                        <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total_price = 0;
                                    @endphp
                                    @foreach (App\Models\Cart::totalcarts() as $cart)
                                    <tr>
                                        <td class="image" data-title="No">

                                            @if($cart->course->image > 0)
                                                <img src="{{asset('backend/img/courses/'. $cart->course->image)}}" alt="#">
                                            @endif
                                        </td>
                                        <td class="product-des" data-title="Description">
                                            <p class="product-name"><a href="{{ route('course.details',$cart->course->id) }}">{{ $cart->course->title }}</a></p>
                                            <p class="product-des">{{ $cart->course->description }}</p>
                                        </td>
                                        <td class="price" data-title="Price"><span>{{ $cart->course->price }} $</span></td>

                                        <td class="qty" data-title="Qty"><!-- Input Order -->
                                            <form action="{{ route('carts.update',$cart->id) }}" method="POST">
                                                @csrf
                                                <div class="input-group">
                                                    <input type="text" name="course_quantity" value="{{ $cart->course_quantity }}" class="input-number"  data-min="1" data-max="100">
                                                    <div class="button check">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <!--/ End Input Order -->
                                        </td>
                                        <td class="total-amount" data-title="Total">
                                            <span>
                                                @php
                                                    $total_price += $cart->course_quantity * $cart->course->price;
                                                @endphp
                                                {{ $cart->course_quantity * $cart->course->price }} $
                                            </span>
                                        </td>
                                        <td class="action" data-title="Remove">
                                            <form action="{{ route('carts.delete',$cart->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="cart_id" value="">
                                                <button type="submit"><i class="fas fa-trash-alt"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <!--/ End Shopping Summery -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- Total Amount -->
                            <div class="total-amount">
                                <div class="row">
                                    <div class="col-lg-8 col-md-5 col-12">
                                        <div class="left">
                                            <div class="coupon">
                                                <form action="#" target="_blank">
                                                    <input name="Coupon" placeholder="Enter Your Coupon">
                                                    <button class="btn">Apply</button>
                                                </form>
                                            </div>
                                            <div class="checkbox">
                                                    @php
                                                        $shipping_cost = App\Models\Companyinfo::first()->shipping_cost;
                                                    @endphp
                                                <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping ({{-- $shipping_cost --}} $)</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-7 col-12">
                                        <div class="right">
                                            <ul>
                                                <li>Cart Subtotal
                                                    <span>{{ $total_price }}  $ </span>
                                                </li>
                                                <li>Shipping<span>{{ $shipping_cost }} $</span>
                                                </li>
                                                <li>You Save<span>00.00 $</span></li>
                                                <li class="last">You Pay<span>{{ $total_price+$shipping_cost }}  $ </span></li>
                                            </ul>
                                            <div class="button5">
                                                <a href="{{ route('checkouts') }}" class="btn">Checkout</a>
                                                <a href="{{ route('courses') }}" class="btn">Continue shopping</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Total Amount -->
                        </div>
                    </div>
                </div>
            </div>
            <!--/ End Shopping Cart -->
        @endif
    @else
        <div class="container">
            <div class="alert alert-warning">
                <strong> <p class="text-danger"> There is no Item in Your Cart.</p></strong>
            </div>
        </div>
    @endif


        <!-- Start Footer
    ============================================= -->
    @include('frontend.partials.footer')
        <!-- End Footer
    ============================================= -->
@endsection
