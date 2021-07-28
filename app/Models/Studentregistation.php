<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentregistation extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'lname',
        'email',
        'course_id',
        'phone',

    ];
}
