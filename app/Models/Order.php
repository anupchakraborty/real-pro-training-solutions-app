<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable, HasRoles;

    protected $fillable = [
        'user_id', 'course_id', 'phone_no','name','shipping_address', 'email', 'message', 'is_paid','is_completed', 'discount'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function carts(){
        return $this->belongsTo(Cart::class);
    }

    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
