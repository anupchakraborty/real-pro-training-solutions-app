<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

use App\Models\Cart;
use App\Models\Order;
use Session;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.shoping.checkout');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function thanks()
    {
        $id = Auth::guard('web')->user()->id;
        $orders = Order::where('user_id',$id)->get();
        return view('frontend.pages.shoping.thanks',compact('orders'));
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
            'message' => 'required'
        ]);
        $order = new Order();
        if(Auth::check()){
            $order->user_id = Auth::id();
        }
        
        $order->payment_id = $request->payment_method;
        $order->ip_address= request()->ip();
        $order->phone_no= $request->phone;
        $order->name= $request->first_name .$request->last_name;
        $order->shipping_address= $request->shipping_address;
        $order->email= $request->email;
        $order->message= $request->message;
        $order->grand_total= $request->grand_total;
        $order->save();

        $order_id = DB::getPdo()->lastinsertID();
        Session::put('order_id',$order_id);
        Session::put('grand_total',$request->grand_total);

        if($request->payment_method == 1){
            foreach(Cart::totalcarts() as $cart){
                $cart->order_id = $order->id;
                $cart->save();
            }
            return redirect()->route('checkouts.thanks');
        }else{
            return redirect()->route('checkout.stripe');
        }
        //dd($order);
    }
    public function stripe(Request $request)
    {
        $id = Auth::guard('web')->user()->id;
        $order = Order::where('user_id',$id)->first();
        if($request->isMethod('post')){
            $data = $request->all();
            //echo "<pre>";print_r($data);die;
            // Set your secret key. Remember to switch to your live secret key in production!
            // See your keys here: https://dashboard.stripe.com/account/apikeys
            \Stripe\Stripe::setApiKey('sk_test_51JGzlGED79i73WPIqVT0nGMlcB28ysp2Xi79UWjP3RUCULqIOOkSJGWX8AsF5nyBnplR61YWaDGn97z0wJaGJDbU00yyRqBD74');

            $token = $_POST['stripeToken'];
            $charge = \Stripe\charge::Create([
                
              'amount' => $request->input('total_amount')*100,
              'currency' => 'USD',
              'description' => $request->input('name'), 
              'source' => $token,
            ]);
            //dd($charge);
            foreach(Cart::totalcarts() as $cart){
                $cart->order_id = $order->id;
                $cart->save();
            }
            return redirect()->back()->with('flash_message_success','Your Payment Successfully Done!');
        }
        return view('frontend.pages.shoping.stripe');
    }
}
