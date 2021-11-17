<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['title','published'];

    public function courses(){
        return $this->belongsToMany('App\Models\Course')->withTimestamps();
    }

}