@extends('frontend.layouts.master')

@section('title')
    Stripe Payment | Real Pro Training Solutions
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

    <div class="cart-box-main">
      <div class="container">
          @if(Session::has('flash_message_error'))
          <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
              </button>
          <strong>{{ session('flash_message_error') }}</strong>
          </div>
          @endif
          @if(Session::has('flash_message_success'))
          <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
              </button>
          <strong>{{ session('flash_message_success') }}</strong>
          </div>
          @endif
          <h1 class="text-center">Thanks For Purchasing With Us!</h1> <br><br>
          <div class="row">
              <div class="col-lg-6">
                  <div class="text-center">
                      <h2>YOUR  ORDER HAS BEEN PLACED</h2>
                      <p>Your Order Number is #RPTS{{Session::get('order_id')}} and total payable amount is ${{Session::get('grand_total')}}</p>
                      <b>Please make payment by entering your credit or debit card</b>
                  </div>
              </div>
              <div class="col-lg-6">
                  <script src="https://js.stripe.com/v3/"></script>

                      <form action={{ route('checkout.stripe') }} method="post" id="payment-form">
                        @csrf
                        <div class="form-row">
                           <b>Total Amount To Be Paid</b>
                           <input readonly name="total_amount" value="{{Session::get('grand_total')}}" class="form-control">
                           <b>Your Name</b>
                           <input type="text" name="name" placeholder="Enter Your Name" class="form-control">
                           <b>Card Number</b>
                           <div id="card-element" class="form-control">

                           </div>
                        </div>

                           <button class="btn btn-success btn-mini" style="float:right;margin-top:10px;">Submit Payment</button>
                      </form>
                      <div id="card-error" role="alert"></div>
              </div>
          </div>
      </div>
  </div>

        <!-- Start Footer
    ============================================= -->
    @include('frontend.partials.footer')
        <!-- End Footer
    ============================================= -->


    <script>
      // Create a Stripe client.
   var stripe = Stripe('pk_test_51JGzlGED79i73WPI4o7S30AdLJin9f46hBJ3H3fT45IQgf9xXNF9DBMHT06liXo2N11136oVCwf6v8qt5Q9ZBDhM00B26KQlfm');
   
   // Create an instance of Elements.
   var elements = stripe.elements();
   
   // Custom styling can be passed to options when creating an Element.
   // (Note that this demo uses a wider set of styles than the guide below.)
   var style = {
    base: {
      color: '#32325d',
      fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
      fontSmoothing: 'antialiased',
      fontSize: '16px',
      '::placeholder': {
        color: '#aab7c4'
      }
    },
    invalid: {
      color: '#fa755a',
      iconColor: '#fa755a'
    }
   };
   
   // Create an instance of the card Element.
   var card = elements.create('card', {style: style});
   
   // Add an instance of the card Element into the `card-element` <div>.
   card.mount('#card-element');
   
 
   
   // Handle form submission.
   var form = document.getElementById('payment-form');
   form.addEventListener('submit', function(event) {
    event.preventDefault();
   
    stripe.createToken(card).then(function(result) {
      if (result.error) {
        // Inform the user if there was an error.
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
      } else {
        // Send the token to your server.
        stripeTokenHandler(result.token);
      }
    });
   });
   
   // Submit the form with the token ID.
   function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
   
    // Submit the form
    form.submit();
   }
   </script>
@endsection

@section('scripts')

@endsection

@php
  Session::forget('order_id');
  Session::forget('grand_total');
@endphp