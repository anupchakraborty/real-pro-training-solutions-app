<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id', 'content_id', 'admin_id','quiz_name','description', 'quiz_date', 'status'
    ];

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }

    public function course()
    {
    	return $this->belongsTo(Course::class);
    }

    public function content()
    {
    	return $this->belongsTo(CourseContent::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
