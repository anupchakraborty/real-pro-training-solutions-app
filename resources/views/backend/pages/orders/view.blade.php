@extends('backend.layouts.master')

@section('title')
    Orders | Admin Dashboard
@endsection

@section('admin_content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Order</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">view Order</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
        <div class="card card-solid">
            <div class="card-header">
                <h5>View Order ID: #OIRPTS{{ $order->id }}</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-7">
                        @php
                            $carts = App\Models\Cart::where('order_id', $order->id)->get();
                        @endphp
                        @foreach($carts as $cart)
                        <div class="card">
                            @php
                                $product = App\Models\Product::where('id', $cart->product_id)->first();
                                $Image = App\Models\ProductImage::where('product_id', $product->id)->first();
                            @endphp
                            <div class="card-body">
                                <img src="{{ asset('backend/img/products/'.$Image->image) }}" alt="" style="width:550px; height:400px;">
                                <h4 class="mt-2 ml-3">Product Name: {{ $product->product_title }}</h4>
                                <p class="mt-2 ml-3">Product Description: {{ $product->product_description }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div><!-- /.col-sm-7 -->
                    <div class="col-sm-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="my-2">Orderer Name: {{ $order->name }}</h4>
                                <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                                <h5 class="my-2">Payment Type: <span class="badge badge-info"> {{ $order->payment->name }}</span></h5>
                                <p class="my-2">Orderer Phone: {{ $order->phone_no }}</p>
                                <p class="my-2">Orderer Email: {{ $order->email }}</p>
                                <p class="my-2">Orderer Shipping Address: {{ $order->shipping_address }}</p>

                                <p class="my-3">Order Status:
                                    <span class="badge badge-danger">
                                        @if($order->is_completed == 1)
                                            Completed
                                        @else
                                            Panding
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div><!-- /.col-sm-5 -->
                </div><!-- /.row -->

                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Product Name</td>
                                <td>Quantity</td>
                                <td>Unit Price</td>
                                <td>Sub Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $carts = App\Models\Cart::where('order_id', $order->id)->get();

                            @endphp

                            @foreach ($carts as $cart)
                                @php
                                    $product = App\Models\Product::where('id', $cart->product_id)->first();
                                    $total_price = 0;
                                @endphp
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $product->product_title }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->buy_price }}</td>
                                    <td>
                                        @php
                                                $total_price += $cart->product_quantity * $cart->product->buy_price;
                                        @endphp
                                            {{ $cart->product_quantity * $cart->product->buy_price }} TK
                                    </td>
                                </tr>
                            @endforeach
                                <tr>
                                    <td colspan="4">Total</td>
                                    <td>{{ $total_price }} Tk</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div><!-- /.card-body -->
        </div> <!-- /.card-solid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection