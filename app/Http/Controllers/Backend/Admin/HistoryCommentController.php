<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HistoryComment;
use App\Models\HistoryCommentReply;
use App\Notifications\Commenthistory;
use App\Models\Auth\User;

class HistoryCommentController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'comment'=>'required|max:1000',
            'select_text'=>'required'
        ]);

        $HistoryComment = new HistoryComment();

        $HistoryComment->user_id = $request->user_id;
        $HistoryComment->histories_id = $request->histories_id;
        $HistoryComment->select_text = $request->select_text;
        $HistoryComment->comment = $request->comment;

        $HistoryComment->save();
        $user = User::find($request->user_id)->notify(new Commenthistory($request->histories_id));

        return redirect()->back()->withFlashSuccess(trans('alerts.backend.general.updated'));
    }


    public function replystore(Request $request){
        $request->validate([
            'comment'=>'required|max:500',
        ]);
        $HistoryCommentReply = new HistoryCommentReply();
        $HistoryCommentReply->history_comments_id = $request->history_comments_id;
        $HistoryCommentReply->comment = $request->comment;
        $HistoryCommentReply->save();
        return redirect()->back()->withFlashSuccess(trans('alerts.backend.general.updated'));
    }
}
