<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $table = "chapters";

    protected $fillable = ['title','description', 'comment' ,'histories_id', 'status', 'file'];

    public function history(){
        return $this->belongsTo(History::class,'histories_id','id');
    }

    public function chaptercomments(){
        return $this->hasMany('App\Models\ChapterComment','chapters_id','id');
    }
}
