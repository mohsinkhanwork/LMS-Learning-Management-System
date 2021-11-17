<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Guidbookanswer;
use App\Models\Guidbookquestion;
use App\Models\History;
use Response;

class GuideBookAnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

     $Guidbookanswer = new Guidbookanswer();

     $Guidbookanswer->user_id = $request->user_id;
     $Guidbookanswer->guidbookquestions_id = $request->guidbookquestions_id;
     $Guidbookanswer->answers = $request->answers;
     $Guidbookanswer->histories_id = $request->histories_id;

     $Guidbookanswer->save();


     return redirect()->route('history.create')->with('success', 'Respuesta enviada correctamente.');

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_answer = Guidbookanswer::find($id)->delete();

        return redirect()->back()->with('success', 'Answer Deleted SuccessFully');
    }




}
