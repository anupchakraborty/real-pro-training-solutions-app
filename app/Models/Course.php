<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title', 'feature', 'desctription','admin_id','price','duration','started_date','courese_type','image'
    ];

    public function admin()
    {
    	return $this->belongsTo(Admin::class);
    }

    public function contents()
    {
    	return $this->hasMany(Coursecontent::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
