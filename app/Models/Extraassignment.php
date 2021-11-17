<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extraassignment extends Model
{
    use HasFactory;

    protected $table = 'extraassignments';

    protected $fillable = ['title','description','published'];

    public function users(){
        return $this->belongsToMany('App\Models\Auth\User')->withTimestamps();
    }

    public function CompleteExtraAssignment(){
        return $this->hasOne('App\Models\CompleteExtraAssignment');
    }
}
