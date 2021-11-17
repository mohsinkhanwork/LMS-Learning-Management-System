<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompleteExtraAssignment extends Model
{
    use HasFactory;

    protected $fillable = ['extraassignment_id', 'user_id','assignment','comment','course_id', 'marks','attempt','assignment_id'];

    public function extraassignment(){
        return $this->belongsTo('App\Models\Extraassignment','extraassignment_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\Auth\User');
    }
}
