<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\Cart;
use App\Models\Order;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$payments = Payment::orderby('priority', 'asc')->get();
        return view('frontend.pages.shoping.checkout');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'shipping_address' => 'required',
            'payment_id' => 'required',
            'message' => 'required'
        ]);
        $order = new Order();
        if(Auth::check()){
            $order->user_id = Auth::id();
        }
        if($request->payment_method_id != 3){
            $order->payment_id = $request->payment_id;
            $order->ip_address= request()->ip();
            $order->phone_no= $request->phone;
            $order->name= $request->first_name .$request->last_name;
            $order->shipping_address= $request->shipping_address;
            $order->email= $request->email;
            $order->message= $request->message;
            $order->save();
        }else{
            echo "Stripe method are working!!";
        }

        foreach(Cart::totalcarts() as $cart){
            $cart->order_id = $order->id;
            $cart->save();
        }
        //dd($order);
        session()->flash('success', 'Your order has taken!!! Plese wait admin will confirm it.');
        return redirect()->route('dashboard');
    }
}
