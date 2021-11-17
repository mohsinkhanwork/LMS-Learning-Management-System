<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Gate;
use App\Models\Skill;

class SkillsController extends Controller
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
        $courses = \App\Models\Course::ofTeacher()->get();
        $courses_ids = $courses->pluck('id');
        $courses = $courses->pluck('title', 'id');

        $skills = Skill::with('courses')->get();
        return view('backend.skills.index', compact('courses','skills'));
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
        $courses = $courses->pluck('title', 'id');

        return view('backend.skills.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->input();
        $skils = Skill::create($data);

        $skils->courses()->sync($request->course_id);

        return redirect()->route('skills.index')->withFlashSuccess(trans('alerts.backend.general.created'));
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
        if (! Gate::allows('test_create')) {
            return abort(401);
        }
        $courses_id = [];
        $courses = \App\Models\Course::ofTeacher()->get();
        $courses_ids = $courses->pluck('id');
        $courses = $courses->pluck('title', 'id');

        $skill = Skill::with('courses')->findOrFail($id);
        foreach ($skill->courses as $key => $value) {
            $courses_id[]= $value->id;
        }
        return view('backend.skills.edit', compact('skill','courses','courses_id'));
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

        $skill = Skill::findOrfail($id);
        $skill->update(['title'=>$request->title,'published'=>$request->published]);

        $skill->courses()->sync($request->course_id);

        return redirect()->route('skills.index')->withFlashSuccess(trans('alerts.backend.general.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }
}
