<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Chapter;
use Validator;
use App\Models\Lesson;
use File;
use App\Models\Extraassignment;
use App\Models\Auth\User;
use App\Models\Guidbookanswer;
use App\Models\Guidbookquestion;
use Response;

class chapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            
        $Chapter = Chapter::with('chaptercomments.ChapterCommentReplys')->orderBy('id', 'desc')->first();

        $history = Chapter::orderBy('id', 'desc')->value('histories_id');

        // dd($history);

        $six_answers = Guidbookanswer::with('history')->where('histories_id', $history)->get();

        // dd($modalanswers);

        return view('frontend.chapter.edit', compact('Chapter', 'six_answers', 'history'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
    {
        //return view('frontend.chapter.create');
    }


    public function add_chp($id)
    {
        return view('frontend.chapter.create');
    }






    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $chapterStore = new Chapter;

        $chapterStore->histories_id = $request->histories_id;
        $chapterStore->title = $request->title_id;
        $chapterStore->description = $request->Value;

        $chapterStore->save();

        return Response::json();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($HistID)
    {
        $user = auth()->user(); 
        $id = array();
        $noti_id = array();
        foreach ($user->Notifications as $notification) {
            if ($notification->type == 'App\Notifications\ExtraAssignment') {
                $noti_id[] = $notification->id;
                $id[] = $notification->data['ExtraAssignment_id'];
            }
        }
        $ExtraAssignment1 = Extraassignment::whereIn('id',$id)->get();
          $purchased_cours = auth()->user()->purchasedCourses()->last();

          $lesson = '';

          if($purchased_cours != '') {
            $lesson = Lesson::with('course')->where('course_id', $purchased_cours->id)->first();
        }


        $history = History::findOrfail($HistID);
        $chapters = Chapter::where('histories_id', $HistID)->orderBy('id', 'desc')->get();

        $six_answers = Guidbookanswer::where([
        
            'user_id' => auth()->user()->id,
            'histories_id' => $HistID

        ])->get();


        $courses = Course::withoutGlobalScope('filter')->canDisableCourse()->where('published', 1)->where('popular', '=', 1)->inRandomOrder()->take(3)->get();
        return view('frontend.chapter.index',compact('history', 'modalanswers', 'modalquestions' ,'chapters','user', 'noti_id', 'purchased_cours', 'lesson' , 'ExtraAssignment1', 'answers', 'courses'));

        
        // dd($six_answers);

        return view('frontend.chapter.index',compact('history' ,'chapters','user', 'noti_id', 'purchased_cours', 'lesson' , 'ExtraAssignment1', 'six_answers'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $Chapter = Chapter::findOrfail($id);

    //     return view('frontend.chapter.edit' ,compact('Chapter'));
    // }

    public function chapterEdit($chapterID, $historyID)
    
    {
        $user = auth()->user(); 
        $idd = array();
        $noti_id = array();
        foreach ($user->Notifications as $notification) {
            if ($notification->type == 'App\Notifications\ExtraAssignment') {
                $noti_id[] = $notification->id;
                $idd[] = $notification->data['ExtraAssignment_id'];
            }
        }
        $ExtraAssignment1 = Extraassignment::whereIn('id',$idd)->get();
        $purchased_cours = auth()->user()->purchasedCourses()->last();

       $lesson = '';

          if($purchased_cours != '') {
            $lesson = Lesson::with('course')->where('course_id', $purchased_cours->id)->first();
        }

        $Chapter = Chapter::with('chaptercomments.ChapterCommentReplys')->findOrfail($chapterID);
        $history = History::findOrfail($historyID);

         $six_answers = Guidbookanswer::where([
        
            'user_id' => auth()->user()->id,
            'histories_id' => $historyID

        ])->get();

        return view('frontend.chapter.edit', compact('history','Chapter', 'user','noti_id', 'purchased_cours', 'lesson' , 'ExtraAssignment1', 'six_answers'));
    }


     public function chapterShow($chapterID)
    {
        $user = auth()->user(); 
        $idd = array();
        $noti_id = array();
        foreach ($user->Notifications as $notification) {
            if ($notification->type == 'App\Notifications\ExtraAssignment') {
                $noti_id[] = $notification->id;
                $idd[] = $notification->data['ExtraAssignment_id'];
            }
        }
        $ExtraAssignment1 = Extraassignment::whereIn('id',$idd)->get();
         $purchased_cours = auth()->user()->purchasedCourses()->last();

         $modalanswers = Guidbookanswer::with('guidebookquestion')->where('user_id', auth()->user()->id)->get();
        $modalquestions = Guidbookquestion::with(["guidebookanswer"=>function($q) {
            $q->where("user_id",auth()->user()->id);
        }
        ])->get();

        $Chapter = Chapter::findOrfail($chapterID);
        return view('frontend.chapter.view' ,compact('Chapter', 'modalanswers', 'modalquestions' , 'user', 'noti_id', 'purchased_cours' , 'ExtraAssignment1'));
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
        $this->validator($request);
        $data = Chapter::with('history')->findOrfail($id);
        $histories_id = $data->history->id;
        $data->update(['title'=>$request->title,'description'=>$request->description]);
        return redirect(url('chapter/'.$histories_id))->with('success','updated successfully');
    }

    public function chapterstore(Request $request){
        $id = $request->id;
        $data = Chapter::with('history')->findOrfail($id);
        $data->update(['title'=>$request->title,'description'=>$request->Value]);
    }

    public function studentchapterupdate(Request $request, $id){
        $data = Chapter::with('history')->findOrfail($id);
        $histories_id = $data->history->id;
        $data->update(['status'=>1]);
        return redirect(url('chapter/'.$histories_id))->with('success','Sent to teacher successfully');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chapter::where('id',$id)->delete();

        return back()->with('success','Chapter Delete Successfully');
    }

    public function validator($request){

        $request->validate([
            'title'=>'required',
            'description'=>'required'
            // 'file'=>'file|mimes:png,jpg,jpeg,pdf,zip,docx,webp'
        ]);
    }
}
