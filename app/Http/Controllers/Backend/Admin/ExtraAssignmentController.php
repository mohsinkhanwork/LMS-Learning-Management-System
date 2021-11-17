<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auth\User;
use Illuminate\Support\Facades\Gate;
use App\Models\Extraassignment;
use App\Models\Lesson;
use App\Models\Course;
use App\Models\CompleteExtraAssignment;
use App\Notifications\ExtraAssignment as assignmentnotification;

class ExtraAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('test_create')) {
            return abort(401);
        }
        
        //  $lesson = Lesson::with('course')->where('course_id', $purchased_cours->id)->first();

        $ExtraAssignments = Extraassignment::with('users')->orderBy('id','desc')->get();
        // return view('backend.extra-Assignment.index', compact('ExtraAssignments', 'lesson' ,));
        return view('backend.extra-Assignment.index', compact('ExtraAssignments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('test_create')) {
            return abort(401);
        }
        
        $users = User::role('student')->pluck('first_name','id');

        
        return view('backend.extra-Assignment.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request);
        $data = $request->input();

        $ExtraAssignment = Extraassignment::create($data);

        $ExtraAssignment->users()->sync($request->user_id);

        //$user = User::find($User_id)->notify(new Commenthistory($history_id)); 
        $users = $ExtraAssignment->users()->get();

        foreach ($users as $key => $user) {
            $user->notify(new assignmentnotification($ExtraAssignment->id)); 
        }

        return redirect()->route('extra-assignment.index')->withFlashSuccess(trans('alerts.backend.general.created'));
    }

    public function submit(Request $request,$id,$noti_id,$user_id)

    {

        $user = User::find($user_id);

        $user->unreadNotifications->where('id',$noti_id)->markAsRead();

        $ExtraAssignment = Extraassignment::with(['CompleteExtraAssignment'=>function($q){
            $q->where('user_id',auth()->user()->id);
        }])->where('id',$id)->first(); 

          $id = array();
        $noti_id = array();
        foreach (auth()->user()->Notifications as $notification) {
            if ($notification->type == 'App\Notifications\ExtraAssignment') {
                $noti_id[] = $notification->id;
                $id[] = $notification->data['ExtraAssignment_id'];
            }
        }
        $ExtraAssignment1 = Extraassignment::whereIn('id',$id)->get();
        $ExtraAssignment1All = Extraassignment::with('users')->orderBy('id','desc')->get();
        $purchased_cours = auth()->user()->purchasedCourses()->last();
        if($purchased_cours){
        $lesson = Lesson::with('course')->where('course_id', $purchased_cours->id)->first();
        }else{
            $lesson = "";
        }
        $courses = Course::withoutGlobalScope('filter')->canDisableCourse()->where('published', 1)->where('popular', '=', 1)->inRandomOrder()->take(3)->get();
        return view('backend.extra-Assignment.showextraassignment', compact('ExtraAssignment', 'purchased_cours', 'lesson' ,'user_id', 'courses', 'noti_id','ExtraAssignment1', 'ExtraAssignment1All'));


    }

    public function getAssignment(Request $request){
        $this->validate($request, [
            
            'assignment' => 'required',
            
        ]);

        if ($request->id != '') {
            CompleteExtraAssignment::where('id',$request->id)->update(['assignment'=>$request->assignment]);
        }else{
            $data = $request->input();

            CompleteExtraAssignment::create($data);
        }
        

        // return redirect()->back()->with('success', 'Assignment Submitted successfully');
        return redirect(url('/'));
      
    }

    public function getdata(Request $request){

         $Assignments = CompleteExtraAssignment::query()->where('marks', '<', 4)->orderBy('created_at', 'desc')->get();

         return view('backend.extra-Assignment.checkassignment', compact('Assignments'));

    }
    public function showassign($id){


        $Assignment = CompleteExtraAssignment::query()->where('id', '=', $id)->orderBy('created_at', 'desc')->first();

        return view('backend.extra-Assignment.showAssignment', compact('Assignment'));
    }

    public function updateassign(Request $request){
        $this->validate($request, [
            'marks' => 'required',
            'comment'=>'required',
            ]);
        $Assignment = CompleteExtraAssignment::query()->where('id', '=', $request->id)->orderBy('created_at', 'desc')->first();

        $Assignment->approved = 1;
        $Assignment->marks = $request->marks;
        $Assignment->comment = $request->comment;
        $Assignment->save();

        return redirect()->back()->with('success', 'Submit Report successfully');
    } 

    public function getappdata(Request $request){
        $Assignments = CompleteExtraAssignment::query()->where('marks', '>', 4)->orderBy('created_at', 'desc')->get();

        return view('backend.extra-Assignment.appassignment', compact('Assignments'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Extraassignment = Extraassignment::with('users')->findOrFail($id);

        $users = User::role('student')->pluck('first_name','id');

        $user_id = array();

        foreach ($Extraassignment->users as $key => $value) {
            $user_id[] = $value->id;
        }
        return view('backend.extra-Assignment.edit', compact('user_id','Extraassignment','users'));
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
        $data = $request->input();
        $user_id = Extraassignment::with('users')->where('id',$id)->first();
        $old_user_id = array();
        foreach ($user_id->users as $key => $value) {
           $old_user_id[] = $value->id;
        }
        $new_user_id = $data['user_id'];
        $result=array_diff($new_user_id,$old_user_id);
        //update
        $ExtraAssignment =  Extraassignment::findOrFail($id);
        $ExtraAssignment->update(['title'=>$request->title,'description'=>$request->description,'published'=>$request->published]);
        $ExtraAssignment->users()->sync($request->user_id);
        //notification
        $users = User::whereIn('id',$result)->get();
        if($users != ''){
        foreach ($users as $key => $user) {
            $user->notify(new assignmentnotification($ExtraAssignment->id));
        }
        }
        return redirect()->route('extra-assignment.index')->withFlashSuccess(trans('alerts.backend.general.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assignment = Extraassignment::findOrFail($id);
        //$test->chapterStudents()->where('course_id', $test->course_id)->forceDelete();
        $assignment->delete();

        return back()->withFlashSuccess(trans('alerts.backend.general.deleted'));
    }
    public function validator($request){

        $request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);
    }
}
