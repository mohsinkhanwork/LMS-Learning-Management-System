<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guidbookanswer extends Model
{
    use HasFactory;

     protected $table = 'guidbookanswers';

     protected $fillable = ['answers', 'user_id', 'guidbookquestions_id', 'histories_id'];

     public function user(){
        return $this->belongsTo(Auth\User::class,'user_id','id');
    } 

    public function guidebookquestion(){
        return $this->belongsTo(Guidbookquestion::class,'guidbookquestions_id','id');
    }

     public function history(){

        return $this->belongsTo(History::class,'histories_id', 'id');
    }




}
