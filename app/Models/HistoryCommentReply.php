<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryCommentReply extends Model
{
    use HasFactory;

    public function Historycomment(){
        return $this->belongsTo('App\Models\HistoryComment');
    }
}
