@extends('frontend.layouts.master')

@section('title')
    Checkouts | Real Pro Training Solutions
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
    <div class="breadcrumb-area shadow dark text-center bg-fixed text-light" style="background-image: url({{ asset('frontend/assets/img/banner/21.jpg') }});">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Checkout</h1>
                    <ul class="breadcrumb">
                        <li><a href="{{ route('index') }}"><i class="fas fa-home"></i> Home</a></li>
                        <li class="active">Checkouts</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    @if(App\Models\Cart::totalItems() > 0)
    <!-- Start Checkout -->
    <section class="shop checkout section">
        <div class="container">
            <!-- Form -->
            <form role="form" class="form" method="POST" action="{{ route('checkouts.store') }}">

                @csrf
                <div class="row">
                    <div class="col-lg-8 col-12">
                        <div class="checkout-form">
                            <h2>Make Your Checkout Here</h2>
                            <p>Please register in order to checkout more quickly</p>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>First Name<span>*</span></label>
                                            <input type="text" name="first_name" value="{{ Auth::check() ?Auth::user()->fname : '' }}" placeholder="Enter Your First Name" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Last Name<span>*</span></label>
                                            <input type="text" name="last_name" value="{{ Auth::check() ?Auth::user()->lname : '' }}" placeholder="Enter Your Last Name" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Email Address<span>*</span></label>
                                            <input type="email" name="email" value="{{ Auth::check() ?Auth::user()->email : '' }}" placeholder="Enter Your Email Address" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Phone Number<span>*</span></label>
                                            <input type="text" name="phone" value="{{ Auth::check() ?Auth::user()->phone : '' }}" placeholder="Enter Your Phone Number" required="required">
                                        </div>
                                    </div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Message<span>*</span></label>
											<input type="text" name="message" placeholder="" required="required">
										</div>
									</div>
                                    <div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Billing Address<span>*</span></label>
											<input type="text" name="shipping_address" placeholder="" required="required">
										</div>
									</div>
									<div class="col-12">
										<div class="form-group create-account">
											<input id="cbox" type="checkbox">
											<label>Create an account?</label>
										</div>
									</div>
                                </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="order-details">
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>CART  DETAILS</h2>
                                <div class="content">
                                    @php
                                        $total_price = 0;
                                    @endphp
                                    @foreach (App\Models\Cart::totalcarts() as $cart)
                                        @php
                                            $total_price += $cart->course_quantity * $cart->course->price;
                                        @endphp
                                    @endforeach
                                    <ul>
                                        <li>Sub Total<span>${{ $total_price }}</span></li>
                                        <li>(+) Shipping<span>
                                            @php
                                                $shipping_cost = App\Models\Companyinfo::first()->shipping_cost;
                                            @endphp
                                            ${{ $shipping_cost }}</span>
                                        </li>
                                        @php
                                            $grand_total = $total_price + $shipping_cost;
                                        @endphp
                                        <li class="last">Total<span>${{ $grand_total }}</span></li>
                                        <input type="hidden" name="grand_total" value="{{ $grand_total }}">
                                    </ul>
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Order Widget -->
							<div class="single-widget">
								<h2>Payments</h2>
								<div class="content">
                                    @php
                                        $payments_type = App\Models\Payment::all();
                                    @endphp

                                    <div class="checkbox">
                                        @foreach ($payments_type as $payment_type)
                                            <label class="checkbox" for="1">
                                                <input name="payment_method" id="{{ $payment_type->payment_type }}" type="checkbox" value="{{ $payment_type->id }}"> 
                                                <p>{{ $payment_type->name }}</p>
                                            </label>
                                        @endforeach
									</div>
								</div>
							</div>
							<!--/ End Order Widget -->
                            <!-- Payment Method Widget -->
                            <div class="single-widget payement">
                                <div class="content">
                                    <img src="{{ asset('frontend/assets/img/payment-method.png') }}" alt="#">
                                </div>
                            </div>
                            <!--/ End Payment Method Widget -->
                            <!-- Button Widget -->
                            <div class="single-widget get-button">
                                <div class="content">
                                    <div class="button">
                                        <button type="submit" onclick="return selectPaymentMethod();" class="btn">proceed to checkout</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
                <!--/ End Form -->
        </div>
    </section>
    <!--/ End Checkout -->
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

@section('scripts')
<script>
    function selectPaymentMethod(){
      if($('#stripe').is(':checked') || $('#cash_on_delivery').is(':checked')){
        //alert('checked');
      }else{
        alert('Please Select Payment Method');
        return false;
      }
    }
</script>
@endsection
