<!DOCTYPE html>
<html lang="en">
<head>

    <title>
        Invoice - #ORPTS{{ $order->id }}
    </title>
<style>
html {
    font: normal 12px Arial, Helvetica, Sans-serif;
    background: white;
}
body {
    margin: 30px;
    padding: 10px;
}
.invoice{
    
}
.page-header{
    display: block;
    height: 100px;
}
.page-header h2 {
    float: left;
    margin-left: 10px;
}
.page-header small {
    float: right;
    margin-top: 10px;
    margin-right: 10px;
}
.invoice-info{
    display: inline-block;
    font-size: 12px;
}
.invoice-col address{
    width: 40%;
    float: left;
    margin-left: 10px
}
.invoice-col address strong{
    size: 30px;
}
.invoice-col-to address{
    width: 30%;
    float: left;
    margin-left: 10px;
}
.invoice-col-order{
    margin: 0px;
}

/* table */
.table{
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    font-size: 14px;
}
.table td, .table th {
  border: 1px solid #ddd;
  padding: 8px;
}
.table tr:nth-child(even){background-color: #f2f2f2;}

.table tr:hover {background-color: #ddd;}

.table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: gray;
  color: white;
}
.footer{
    display: inline-block;
    margin-top: 30px;
    border: 1px solid gray;
    width: 100%;
}
.payments-left{
    float: left;
    width: 60%;
}
.payments-right {
    float: right;
    width: 40%;
}
.payments-right p{
    padding: 10px;
    font-size: 14px;
}
.payment-table{
    font-family: Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    font-size: 14px;
}
.payment-table td, .payment-table th {
  padding: 8px;
}
.payment-table th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  color: rgb(51, 51, 51);
  font-size: 14px;
}


.payment-table tr:hover {background-color: #ddd;}
</style>
</head>
<body>
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="page-header">
        <div>
          <h2>Real Training Pro Solutions</h2>
        </div>
        <div>
            <small>Date: {{ $order->created_at }}</small>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="invoice-info">
        <div class="invoice-col">
          From
          <address>
            <strong>Real Training Pro Solutions</strong><br>
            795 Folsom Ave, Suite 600<br>
            San Francisco, CA 94107<br>
            Phone: (804) 123-5432<br>
            Email: realtrainingprosolutions@email.com
          </address>
        </div>
        <!-- /.col -->
        <div class="invoice-col-to">
          To
          <address>
            <strong>{{ $order->name }}</strong><br>
            {{ $order->shipping_address }}<br>
            Phone: {{ $order->phone_no }}<br>
            Email: {{ $order->email }}
          </address>
        </div>
        <!-- /.col -->
        <div class="invoice-col-order">
            <b>Invoice #ORTPS{{ $order->id }}</b><br>
            <br>
            <b>Order ID:</b> #ORTPS{{ $order->id }}<br>
            {{-- <b>Payment Due:</b> 2/22/2014<br> --}}
            <b>Payment Method:</b> {{ $order->payment->name }}
          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  
      <!-- Table row -->
      <div class="row">
        <div class="col-12 table-responsive">
          <table class="table">
            <thead>
            <tr>
              <th>Qty</th>
              <th>Product</th>
              <th>Serial #</th>
              <th>Description</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
                @php
                    $carts = App\Models\Cart::where('order_id',$order->id)->get();
                @endphp
                @foreach($carts as $key => $cart)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        @php
                            $course = App\Models\Course::where('id',$cart->course_id)->first();
                        @endphp
                        <td>{{ $course->title }}</td>
                        <td>2021-0{{ $course->id }}</td>
                        <td>{{ $course->desctription }}</td>
                        <td>${{ $course->price }}</td>
                    </tr>  
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
  
      <div class="footer">
        <!-- accepted payments column -->
        <div class="payments-left">
          
        </div>
        <!-- /.col -->
        <div class="payments-right">
            <p class="lead">Amount pay: {{ $order->created_at }}</p>

            <div class="table-responsive">
              <table class="payment-table">
                <tr>
                  <th style="width:50%">Subtotal:</th>
                  <td>${{ $order->grand_total }}</td>
                </tr>
                <tr>
                  <th>Tax (0%)</th>
                  <td>$00.00</td>
                </tr>
                <tr>
                    @php
                        $companyinfo = App\Models\Companyinfo::first();
                    @endphp
                  <th>Shipping:</th>
                  <td>${{ $companyinfo->shipping_cost }}</td>
                </tr>
                <tr>
                  <th>Total:</th>
                  <td>${{ $order->grand_total }}</td>
                </tr>
              </table>
            </div>
          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- ./wrapper -->
  <!-- Page specific script -->
  <script>
    window.addEventListener("load", window.print());
  </script>
  </body>
  </html>