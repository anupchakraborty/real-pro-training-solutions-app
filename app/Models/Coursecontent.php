<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coursecontent extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id', 'title', 'desctription','file'
    ];

    public function course()
    {
    	return $this->belongsTo(Course::class);
    }

    public function quizzes()
    {
    	return $this->hasMany(Quiz::class);
    }

}
