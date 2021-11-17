<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Course;
use App\Models\Topic;

class TopicController extends Controller
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
        $courses = ''; 
        $topics = '';

        $courses = Course::ofTeacher()->pluck('title', 'id')->prepend('Please select', '');

        $courses = Course::has('category')->ofTeacher()->pluck('title', 'id')->prepend('Please select', '');



         if ($request->courses_id != "") {
            $topics = Topic::query()->where('courses_id', '=', $request->courses_id)->orderBy('created_at', 'desc')->get();

        }

        
        

        return view('backend.topic.index', compact('courses','topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $courses = Course::ofTeacher()->pluck('title', 'id')->prepend('Please select', '');

        $courses = Course::has('category')->ofTeacher()->pluck('title', 'id')->prepend('Please select', '');

        return view('backend.topic.create', compact('courses'));
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
            
            'title' => 'required',
            'courses_id' =>'required',
            
        ], ['courses_id.required' => 'The course field is required']);

        $data = $request->all();
        $topic = Topic::create($data);
        // dd($topic);

        return redirect()->route('topic.index', ['courses_id' => $request->courses_id])->withFlashSuccess(trans('alerts.backend.general.created'));
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
      

        $courses = Course::ofTeacher()->pluck('title', 'id')->prepend('Please select', '');

        $courses = Course::has('category')->ofTeacher()->pluck('title', 'id')->prepend('Please select', '');


         $topic = Topic::findOrFail($id);

        return view('backend.topic.edit', compact('topic', 'courses'));
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
            'courses_id' => 'required',
            'title' => 'required',

        ], ['course_id.required' => 'The course field is required']);
        //dd($request->input());

        if (! Gate::allows('test_edit')) {
            return abort(401);
        }
        $topic = Topic::findOrFail($id);
        $topic->update($request->all());
        $topic->save();


        return redirect()->route('topic.index')->withFlashSuccess(trans('alerts.backend.general.updated'));
        
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
}
