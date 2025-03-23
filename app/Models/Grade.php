<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['user_id', 'course_code', 'course_title', 'credit_hours', 'grade', 'term']; 

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

