<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompleteLesson extends Model
{
    use HasFactory;

    protected $fillable = ['status', 'title','user_id'];

    public static function colortitle(){
        
        $result = Self::where('user_id',auth()->user()->id ?? '')->pluck('title')->toArray();

        return $result;
    }

}
