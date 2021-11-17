<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\refferal_income;
use App\Models\Auth\User;
use App\Models\Category;
use App\Models\Extraassignment;
use App\Models\Course;

class ReferalIncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        

        $referrer_persons = refferal_income::with('user')->groupBy('user_id')->orderBy('id','DESC')->get();
        return view('backend.affiliate.index',compact('referrer_persons'));
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
        $referrer_persons = refferal_income::with('RefUser')->UserIncome($id)->orderBy('id','DESC')->get();
        return view('backend.affiliate.show',compact('referrer_persons'));
        
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

    public function getemail(Request $request){

        $user = User::findOrFail($request->user_id);
        $user->referrer_email = $request->referrer_email;
        $user->save(); 

        return redirect()->route('admin.Student_affliate')->withFlashSuccess('está inscrito con éxito en el sistema de referencia');
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
        refferal_income::where('id',$id)->update(['paidstatus'=>1]);

        return redirect()->back()->withFlashSuccess(trans('alerts.backend.general.updated'));
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
    public function contacto(){

        $purchased_cours = '';
        $id = array();
        $noti_id = array();
        $ExtraAssignment = array();
        $user = '';

        if(\Auth::check()){
        $user = auth()->user(); 
         
        foreach ($user->Notifications as $notification) {
            if ($notification->type == 'App\Notifications\ExtraAssignment') {
                $noti_id[] = $notification->id;
                $id[] = $notification->data['ExtraAssignment_id'];
            }
        }
        
  
        $ExtraAssignment = Extraassignment::whereIn('id',$id)->get();
        $purchased_cours = auth()->user()->purchasedCourses()->last();
         }   

        $categories = Category::where('status','=',1)->get();

         $initial_course_level = Course::where('published', 1)->where('level', 'Inicial')->get();
        $Intermedio_course_level = Course::where('published', 1)->where('level', 'Intermedio')->get();
        $Avanzado_course_level = Course::where('published', 1)->where('level', 'Avanzado')->get();

         $pildora_categories = Category::with('courses')->where('status', '=', 1)->where('name', 'Píldoras')->first();


        return view('frontend.contacto', compact('categories', 'pildora_categories' ,'ExtraAssignment','purchased_cours','user', 'initial_course_level', 'Intermedio_course_level', 'Avanzado_course_level'));
    }
}
