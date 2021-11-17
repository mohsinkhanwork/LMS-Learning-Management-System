<?php

namespace App\Http\Controllers\backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Chapter;
use App\Models\Auth\User;
use App\Notifications\Commenthistory;
use App\Notifications\CommentChapter;

class GuidebookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historys = History::query()->where([
            ['status','=',1],
            ['move','=',null],
            ['answer','=',null]
        ])->with('user')->orderBy('id','desc')->get();

        return view('backend.guidebook.index', compact('historys'));
    }

    public function move($id){

        history::where('id',$id)->update(['move'=>1]);
        return redirect()->route('guidebook.index')->withFlashSuccess('moved successfully');
    }

    public function moveancient(Request $request){


        $historys = History::query()->where('move','=',1)->with('user')->orderBy('id','desc')->get();
        return view('backend.guidebook.ancient', compact('historys'));
    }
    public function answer($id){
         history::where('id',$id)->update(['answer'=>1]);
        return redirect()->route('guidebook.index')->withFlashSuccess('answered successfully');
    }

    public function moveanswer(){
        $historys = History::query()->where('answer','=',1)->with('user')->orderBy('id','desc')->get();
        return view('backend.guidebook.ancient', compact('historys'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $history = History::with(['user','historycomments'])->findOrfail($id);
        return view('backend.guidebook.show', compact('history'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'comment'=>'required',
        ]);

        $historyUserId = History::where('id',$id)->first();
        $history_id = $historyUserId->id;
        $User_id = $historyUserId->user_id;
        $history = History::where('id',$id)->update(['comment'=>$request->comment]);

        $user = User::find($User_id)->notify(new Commenthistory($history_id)); 

        return redirect()->route('guidebook.index')->withFlashSuccess(trans('alerts.backend.general.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function chapter($history_id){
        $history = History::with('user')->where('id',$history_id)->first();
        $chapters = Chapter::where('histories_id',$history_id)->where('status',1)->get();
        return view('backend.chapter.index', compact('chapters','history'));
    }

    public function showchapter($id){
        $chapter = Chapter::with(['history.user','chaptercomments.ChapterCommentReplys'])->findOrfail($id);
        return view('backend.chapter.show', compact('chapter'));
    }

    public function updatechapter(Request $request ,$id){
        $request->validate([
            'comment'=>'required',
        ]);

        $Chapter = Chapter::where('id',$id)->update(['comment'=>$request->comment]);
        $history = Chapter::with('history.user')->where('id',$id)->first();


        // notification chapter
        $User_id = $history->history->user->id;
        $history_id = $history->history->id;
        $chapter_id = Chapter::where('id', $id)->first()->id;

        $user = User::find($User_id)->notify(new CommentChapter($history_id,$chapter_id)); 

        // end notification


        return redirect(url('history_chapter/history_id/'.$history->history->id))->withFlashSuccess(trans('alerts.backend.general.updated'));
    }

}
