<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChapterComment;
use App\Models\ChapterCommentReply;
use App\Models\Chapter;
use App\Notifications\CommentChapter;
use App\Models\Auth\User;

class ChapterCommentController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'comment'=>'required|max:1000',
            'select_text'=>'required'
        ]);

        $ChapterComment = new ChapterComment();

        $ChapterComment->user_id = $request->user_id;
        $ChapterComment->chapters_id = $request->chapters_id;
        $ChapterComment->select_text = $request->select_text;
        $ChapterComment->comment = $request->comment;

        $ChapterComment->save();

        $history = Chapter::with('history.user')->where('id',$request->chapters_id)->first();
        // notification chapter
        $User_id = $history->history->user->id;
        $history_id = $history->history->id;
        $chapter_id = $request->chapters_id;

        $user = User::find($User_id)->notify(new CommentChapter($history_id,$chapter_id)); 

        // end notification

        return redirect()->back()->withFlashSuccess(trans('alerts.backend.general.updated'));
    }
    public function replystore(Request $request){

        $this->validator($request);
        $ChapterCommentReply = new ChapterCommentReply();
        $ChapterCommentReply->chapter_comments_id = $request->chapter_comments_id;
        $ChapterCommentReply->comment = $request->comment;

        $ChapterCommentReply->save();

        return redirect()->back()->withFlashSuccess(trans('alerts.backend.general.updated'));
    }

    public function validator($request){
        $request->validate([
            'comment'=>'required|max:100',
        ]);
    }
}
