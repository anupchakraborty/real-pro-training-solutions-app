@extends('backend.layouts.master')

@section('title')
    Orders Invoice | Admin Dashboard
@endsection

@section('admin_content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the Generate PDF to test.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Real Training Pro Solutions
                    <small class="float-right">Date: {{ $order->created_at }}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
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
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{ $order->name }}</strong><br>
                    {{ $order->shipping_address }}<br>
                    Phone: {{ $order->phone_no }}<br>
                    Email: {{ $order->email }}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
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
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Course</th>
                      <th>Serial #</th>
                      <th>Description</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
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

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount pay: {{ $order->created_at }}</p>

                  <div class="table-responsive">
                    <table class="table">
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

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="{{ Route('admin.order.generateinvoice', $order->id) }}" type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection