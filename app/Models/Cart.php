<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    protected $fillable = [
        'user_id', 'course_id', 'order_id','course_quantity','ip_address'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function course(){
        return $this->belongsTo(Course::class);
    }

    // return number of total cart
    public static function totalcarts()
    {
        if(Auth::check()){
            $carts = Cart::where('user_id', Auth::id())
                    ->where('order_id', NULL)
                    ->get();
        }else{
            $carts = Cart::where('ip_address', request()->ip())
                            ->where('order_id', NULL)
                            ->get();
        }
        return $carts;
    }

    // return number of cart item1
    public static function totalItems()
    {
        if(Auth::check()){
            $carts = Cart::where('user_id', Auth::id())
                    ->where('order_id', NULL)
                    ->get();
        }else{
            $carts = Cart::where('ip_address', request()->ip())
                            ->where('order_id', NULL)
                            ->get();
        }

        $total_item = 0;
        foreach($carts as $cart){
            $total_item += $cart->course_quantity;
        }
        return $total_item;
    }
}
