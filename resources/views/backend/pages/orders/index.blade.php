@extends('backend.layouts.master')

@section('title')
    Orders | Admin Dashboard
@endsection

@section('admin_content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Orders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('admin.orders.index') }}">Order List</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Order List</h3>

        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Customer Phone</th>
                <th>Shipping Address</th>
                <th>Payment Status</th>
                <th>Order Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order )
                    <tr>
                        <td>#OIRPTS{{ $order->id}}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->phone_no }}</td>
                        <td>{{ $order->shipping_address }}</td>
                        <td>
                            @if($order->payment_id == 1)
                                <a href="">
                                    <span class="badge bg-warning">Cash On Delivery</span>
                                </a>
                            @else
                                <a href="{{Route('admin.order.paid',$order->id)}}">
                                    <span class="badge bg-success">Paid
                                        <br/>
                                        <small class="text-dark">
                                            -by{{ $order->payment->name }}
                                        </small>
                                    </span>
                                </a>
                            @endif
                        </td>
                        <td>
                            @if($order->is_completed == 1)
                                <a href="{{Route('admin.order.completed',$order->id)}}">
                                    <span class="badge bg-light">Completed</span>
                                </a>
                            @else
                                <a href="{{Route('admin.order.panding',$order->id)}}">
                                    <span class="badge bg-primary">Panding</span>
                                </a>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="{{Route('admin.order.invoice', $order->id)}}">
                                <i class="fas fa-file-pdf"></i> Invoice</a>
                            <a class="btn btn-sm btn-secondary" href="{{Route('admin.orders.show', $order->id)}}">
                                <i class="fas fa-eye"></i></a>
                            <a  href="#deleteModal{{ $order->id }}" class="btn btn-sm btn-danger" data-toggle="modal">
                                <i class="fa fa-trash"></i></a>
                            <!--Delete Modal1 -->
                            <div id="deleteModal{{ $order->id }}" class="modal fade">
                                <div class="modal-dialog modal-confirm">
                                    <div class="modal-content">
                                        <div class="modal-header flex-column">
                                            <div class="icon-box">
                                                <i class="material-icons">&#xE5CD;</i>
                                            </div>
                                            <h4 class="modal-title w-100">Are you sure?</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Do you really want to delete these records? This process cannot be undone.</p>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <form action="{!! Route('admin.orders.destroy', $order->id) !!}" method="post">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Customer Phone</th>
                <th>Shipping Address</th>
                <th>Payment Status</th>
                <th>Order Status</th>
                <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
    </div><!-- /.card -->

</div><!-- /.content-wrapper -->

@endsection
