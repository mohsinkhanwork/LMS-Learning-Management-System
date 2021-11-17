<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Test;
use App\Models\CompleteAssignment;
use App\Models\Auth\User;
use App\Helpers\Auth\Auth;
use App\Models\Extraassignment;
use App\Models\Topic;

class AssignmentController extends Controller
{
    /**   
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (! Gate::allows('test_access')) {
            return abort(401);
        }
        $Assignments = ''; 
        $courses = \App\Models\Course::ofTeacher()->get();
        $courses_ids = $courses->pluck('id');
        $courses = $courses->pluck('title', 'id')->prepend('Please select', '');
        $lessons = \App\Models\Lesson::whereIn('course_id', $courses_ids)->get()->pluck('title', 'id')->prepend('Please select', '');

         if ($request->lesson_id != "") {
            $Assignments = Assignment::query()->where('lesson_id', '=', $request->lesson_id)->orderBy('created_at', 'desc')->get();
        }

        
        

        return view('backend.Assignments.index', compact('lessons','Assignments'));
    }
    public function getData(Request $request)
    {
        
        if (! Gate::allows('test_access')) {
            return abort(401);
        }
        $Assignments = ''; 
        $courses = \App\Models\Course::ofTeacher()->get();
        $courses_ids = $courses->pluck('id');
        $courses = $courses->pluck('title', 'id')->prepend('Please select', '');
        $lessons = \App\Models\Lesson::whereIn('course_id', $courses_ids)->get()->pluck('title', 'id')->prepend('Please select', '');

         
            $Assignments = CompleteAssignment::query()->where('marks', '<', 4)->orderBy('created_at', 'desc')->get();
        

        
         

        return view('backend.Assignments.checkassignment', compact('lessons','Assignments'));
        
    }
    public function getappdata(){

        $Assignments = CompleteAssignment::query()->where('marks', '>', 4)->orderBy('created_at', 'desc')->get();

        return view('backend.Assignments.appassignment', compact('Assignments'));
        
    }
    public function showassign($id){

        $Assignment = CompleteAssignment::query()->where('id', '=', $id)->orderBy('created_at', 'desc')->first();

        return view('backend.Assignments.showAssignment', compact('Assignment'));
    }

    public function updateassign(Request $request){
        $this->validate($request, [
            'marks' => 'required',
            'comment'=>'required',
            ]);
        $Assignment = CompleteAssignment::query()->where('id', '=', $request->id)->orderBy('created_at', 'desc')->first();

        $Assignment->approved = 1;
        $Assignment->marks = $request->marks;
        $Assignment->comment = $request->comment;
        $Assignment->save();

        return redirect()->back()->with('success', 'Submit Report successfully');
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
        $courses = \App\Models\Course::ofTeacher()->get();
        $courses_ids = $courses->pluck('id');
        $courses = $courses->pluck('title', 'id')->prepend('Please select', '');
        $lessons = \App\Models\Lesson::whereIn('course_id', $courses_ids)->get()->pluck('title', 'id')->prepend('Please select', '');

        return view('backend.Assignments.create', compact('courses','lessons'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'lesson_id' => 'required',
            'title' => 'required',
            'description' => 'required'
        ], ['course_id.required' => 'The course field is required']);
        //dd($request->input());
        if (! Gate::allows('test_create')) {
            return abort(401);
        }
        $lesson = Lesson::where('id',$request->lesson_id)->first();
        $data = $request->input();
        $Assignment = Assignment::create($data);
        $Assignment->slug = str_slug($request->title);
        $Assignment->course_id = $lesson->course->id;
        $Assignment->save();


        return redirect()->route('assignment.index', ['lesson_id'=>$request->lesson_id])->withFlashSuccess(trans('alerts.backend.general.created'));

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
        if (! Gate::allows('test_edit')) {
            return abort(401);
        }
        $courses = \App\Models\Course::ofTeacher()->get();
        $courses_ids = $courses->pluck('id');
        $courses = $courses->pluck('title', 'id')->prepend('Please select', '');
        $lessons = \App\Models\Lesson::whereIn('course_id', $courses_ids)->get()->pluck('title', 'id')->prepend('Please select', '');

        $assignment = Assignment::findOrFail($id);

        return view('backend.Assignments.edit', compact('assignment', 'courses', 'lessons'));
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
        $this->validate($request, [
            'lesson_id' => 'required',
            'title' => 'required',
            'description' => 'required'
        ], ['course_id.required' => 'The course field is required']);
        //dd($request->input());

        if (! Gate::allows('test_edit')) {
            return abort(401);
        }
        $lesson = Lesson::where('id',$request->lesson_id)->first();
        $assignment = Assignment::findOrFail($id);
        $assignment->update($request->all());
        $assignment->slug = str_slug($request->title);

        $assignment->course_id = $lesson->course->id;

        $Assignment->course_id = $lesson->course->id;

        $assignment->save();


        return redirect()->route('assignment.index', ['lesson_id'=>$request->lesson_id])->withFlashSuccess(trans('alerts.backend.general.updated'));
    }

    public function showform($id, $course_id){

        
        $assign = Assignment::with(["completeassignment"=>function($q) {
            $q->where('user_id',auth()->user()->id);
        }
        ])
        ->where('id',$id)->first();
        //dd($assignment);

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

        $CourseLessonslesson = Lesson::with('course')->where('course_id', $course_id)->where('published', '=', 1)->first();
        // dd($CourseLessonslesson);
        
          $completed_lessons = \Auth::user()->chapters()
            ->where('course_id', $CourseLessonslesson->course->id)
            ->get()
            ->pluck('model_id')
            ->toArray();


         $course = Course::where('id', $course_id)->where('published', '=', 1)->first();
            
         // submitted check assignmnt   

        $issues = CompleteAssignment::with('assignment')->where('course_id',$course->id)->where('user_id',auth()->user()->id)->get();
        $submit_assignment_lesson = $issues->count();
        $assignment_lesson = Assignment::where('course_id',$course->id)->pluck('id')->count();
        $check = false;
        if ($submit_assignment_lesson == $assignment_lesson) {
            $check = true;
        }
        $status = $check == true ? true : false ;
        if($check == true){
        if($issues != ''){
        foreach ($issues as $key => $issue) {
            if ($issue->marks > 4) {
                $status = true;
            }else{
                $status = false;
                break;
            }
        }
    }
    }
        // ended

        $topics = Topic::with('lesson.course')->where('courses_id', $CourseLessonslesson->course->id)->where('published', 1)->get();

        return view('backend.Assignments.assignment', compact('assign', 'status' , 'CourseLessonslesson', 'topics' , 'user', 'lesson' , 'ExtraAssignment1', 'purchased_cours' , 'noti_id', 'completed_lessons' ));
    }

    public function getAssignment(Request $request){
        $this->validate($request, [
            'lesson_id' => 'required',
            'assignment' => 'required',
            'attempt'=>'required'
        ]);
        
        $les_id = Lesson::with('course')->where('id',$request->lesson_id)->first();
        $course_id = $les_id->course->id;

        if($request->attempt == "0"){
         CompleteAssignment::create(['lesson_id'=>$request->lesson_id,'assignment'=>$request->assignment,'user_id'=>auth()->user()->id, 'course_id'=>$course_id, 'assignment_id'=>$request->assignment_id]);
        }
        else{
                    CompleteAssignment::where('lesson_id',$request->lesson_id)->update(['lesson_id'=>$request->lesson_id,'assignment'=>$request->assignment,'user_id'=>auth()->user()->id, 'attempt'=>$request->attempt,'approved'=>0,'assignment_id'=>$request->assignment_id]); 
        }
        return redirect()->back()->with('success', 'Assignment Submitted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('test_delete')) {
            return abort(401);
        }
        $assignment = Assignment::findOrFail($id);
        //$test->chapterStudents()->where('course_id', $test->course_id)->forceDelete();
        $assignment->delete();

        return back()->withFlashSuccess(trans('alerts.backend.general.deleted'));
    }
}
