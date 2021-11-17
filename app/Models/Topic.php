<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = ['courses_id', 'title', 'published'];

    public function course()
    {
        return $this->belongsTo(Course::class,'courses_id');
    }
    public function lesson(){
        return $this->hasMany(Lesson::class);
    }
}
