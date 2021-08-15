<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id', 'quiz_id','user_id','answer',
    ];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

}
