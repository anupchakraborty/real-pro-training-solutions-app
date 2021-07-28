<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\Cart;
use PDF;

class OrderController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();
        return view('backend.pages.orders.index', compact('orders'));
    }

    //paid--------
    public function paid(Request $request, $id)
    {
        DB::table('orders')
                ->where('id', $id)
                ->update(['is_paid'=> 0]);

                $notification = array(
                    'message' => 'Payment Status Updated !!',
                    'alert-type' => 'success'
                );
        return redirect()->route('admin.order.manage')->with($notification);
    }

    //Order Status--------
    public function completed(Request $request, $id)
    {
        DB::table('orders')
                ->where('id', $id)
                ->update(['is_completed'=> 0]);

                $notification = array(
                    'message' => 'Order Status Updated !!',
                    'alert-type' => 'success'
                );
        return redirect()->route('admin.order.index')->with($notification);
    }

    //Order Status--------
    public function panding(Request $request, $id)
    {
        DB::table('orders')
                ->where('id', $id)
                ->update(['is_completed'=> 1]);

                $notification = array(
                    'message' => 'Order Status Updated !!',
                    'alert-type' => 'success'
                );
        return redirect()->route('admin.order.index')->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return view('backend.pages.orders.view', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function invoice($id)
    {
        $order = Order::find($id);
        $carts = Cart::where('order_id',$id)->get();
        return view('backend.pages.orders.invoice', compact('order','carts'));
    }
    public function generateinvoice($id)
    {
        $order = Order::find($id);

        $pdf = PDF::loadView('backend.pages.orders.generateinvoice', compact('order'));
        return $pdf->stream('invoice.pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id); //product model name finding this id
        $order->delete();

        $notification = array(
            'message' => 'Order has Deleted Successfully !!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
