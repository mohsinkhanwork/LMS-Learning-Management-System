<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Chapter;
use App\Models\Lesson;
use Validator;
use App\Models\Auth\User;
use File;
use App\Models\Extraassignment;
use App\Models\Guidbookquestion;
use App\Models\Guidbookanswer;
use App\Models\Course;


class historyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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



        $historys = History::query()->where('user_id',auth()->user()->id ?? '')->with('user')->get();
        return view('frontend.history.index', compact('historys', 'user','noti_id', 'purchased_cours' , 'lesson' , 'ExtraAssignment1',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $questions = Guidbookquestion::with(["guidebookanswer"=>function($q) {
            $q->where([
                'user_id' => auth()->user()->id,
                'histories_id' => 0,

            ]);
        }
        ])->get();

         // dd($questions1);

        $AllsubmittedAnsZero = Guidbookanswer::where([
        'histories_id' => 0,
        'user_id' => auth()->user()->id,

        ])->get();

        
        return view('frontend.history.create', compact('questions', 'AllsubmittedAnsZero' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $history = new History;

        $history->user_id = $request->user_id;
        $history->title = $request->title;
        $history->description = $request->description;
        $history->save();


        $history = $history->id;

        // dd($history);

        Guidbookanswer::query()->where('histories_id', 0)->where('user_id', auth()->user()->id)->update(['histories_id' => $history]);

        return redirect()->route('history.index')->with('success','Historia Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

        // $history = History::find($id);
        
        $history = History::with('historycomments')->find($id);


        return view('frontend.history.edit', compact('history' ,'user','noti_id', 'purchased_cours' , 'lesson' , 'ExtraAssignment1'));
        
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
        $data = History::findOrfail($id);
        $data->update(['title'=>$request->title,'description'=>$request->description]);
        return redirect()->back()->with('success','Updated successfully');
    }

    public function historystore(Request $request){
        $input = $request->all();
        $id = $request->id;
        $data = History::findOrfail($id);
        $data->update(['title'=>$request->title,'description'=>$request->Value]);
    }

    public function markread($noti_id,$user_id,$history_id,$chapter_id){
        if ($chapter_id == 0) {
           $user = User::find($user_id);
           $user->unreadNotifications->where('id',$noti_id)->markAsRead();
           return redirect(url('Edit_history/'.$history_id));
        }else{
            $user = User::find($user_id);
            $user->unreadNotifications->where('id',$noti_id)->markAsRead();
           return redirect(url('chapter/'.$chapter_id.'/history/'.$history_id));
        }
    }


    public function studenthistoryupdate(Request $request ,$id)
    {
        $data = History::findOrfail($id);
        $data->update(['status'=>1]);
        return redirect()->route('history.index')->with('success','Sent to teacher successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        History::where('id',$id)->delete();

        return back()->with('success','History Delete Successfully');
    }

    public function validator($request){

        $request->validate([
            'title'=>'required',
            'description'=>'required|min:3'
            // 'file'=>'file|mimes:png,jpg,jpeg,pdf,zip,docx,webp,doc'
        ]);
    }
}
