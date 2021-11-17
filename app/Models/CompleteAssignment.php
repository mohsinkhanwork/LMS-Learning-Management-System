<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompleteAssignment extends Model
{
    use HasFactory;

    protected $fillable = ['lesson_id', 'user_id','assignment','comment','course_id', 'marks','attempt','assignment_id'];

    public function lesson(){
        return $this->belongsTo('App\Models\Lesson');
    }

    public function user(){
        return $this->belongsTo('App\Models\Auth\User');
    }

    public function assignment(){
        return $this->belongsTo('App\Models\Assignment');
    }

    
    public static function checkAproval($user_id,$lesson_id){
        $check = self::where('user_id',$user_id)->where('lesson_id',$lesson_id)->first();

        return $check;
    }
}
