<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = "histories";

    protected $fillable = ['title','description', 'comment', 'user_id', 'file', 'status'];

    public function user(){
        return $this->belongsTo(Auth\User::class,'user_id','id');
    }

    public function historycomments(){
        return $this->hasMany('App\Models\HistoryComment','histories_id','id');
    }

}
