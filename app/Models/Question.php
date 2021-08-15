<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'quiz_id', 'question','answer','status','right_answer'
    ];

    public function content(){
        return $this->belongsTo(Coursecontent::class);
    }

    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }
}
