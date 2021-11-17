<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterComment extends Model
{
    use HasFactory;

    public function ChapterCommentReplys(){
        return $this->hasMany('App\Models\ChapterCommentReply','chapter_comments_id','id');
    }
}
