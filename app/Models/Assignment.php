<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description','lesson_id','slug','published', 'course_id'];

    public function lesson(){
        return $this->belongsTo('App\Models\Lesson');
    }
    
    public function completeassignment(){
        return $this->hasOne(CompleteAssignment::class, 'assignment_id');
    }


    public static function assignment(){
        $result = Self::with(["completeassignment"=>function($q){
            $q->where('user_id',auth()->user()->id ?? '');
        }])->where('published','=',1)->get();
        return $result;
    }

}
