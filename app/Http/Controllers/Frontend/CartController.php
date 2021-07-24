<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Cart;
use App\Models\Course;
use App\Models\Order;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('frontend.pages.shoping.cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd('okk');
        $this->validate($request, [
            'course_id' => 'required'
        ],
        [
            'course_id.required' => 'Please Selcet Any course First !'
        ]);

        if(!empty($request->user_id)){
        $cart = Cart::where('user_id', $request->user_id)
                    ->where('course_id', $request->course_id)
                    ->where('order_id', NULL)
                    ->first();
        }else{
            $cart = Cart::where('ip_address', request()->ip())
                    ->where('course_id', $request->course_id)
                    ->where('order_id', NULL)
                    ->first();

        }

        if(!is_null($cart)){
            $cart->increment('course_quantity');
        }
        else{
            $cart = new Cart();
            if(!empty($request->user_id)){
                $cart->user_id = $request->user_id;
            }
            $cart->ip_address = request()->ip();
            $cart->course_id = $request->course_id;
            $cart->save();
        }

        session()->flash('success', 'This course are added to cart');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);

        if(!is_null($cart)){
            $cart->course_quantity = $request->course_quantity;
            $cart->save();
        }else{
            return redirect()->route('carts');
        }
        session()->flash('success', 'Cart course updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);

        if(!is_null($cart)){
            $cart->delete();
        }else{
            return redirect()->route('carts');
        }
        session()->flash('error', 'Cart Course Deleted successfully');
        return back();
    }
}
