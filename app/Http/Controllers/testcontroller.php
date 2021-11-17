<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\colortext;
use App\Models\Note;
use App\Models\Course;
use App\Models\CompleteLesson;
use PDF; 


use Response;

class testcontroller extends Controller
{
    public function index(){
        $categories = Category::where('status', '=', 1)->get();

         $initial_course_level = Course::where('published', 1)->where('level', 'Inicial')->get();
        $Intermedio_course_level = Course::where('published', 1)->where('level', 'Intermedio')->get();
        $Avanzado_course_level = Course::where('published', 1)->where('level', 'Avanzado')->get();

        $pildora_categories = Category::with('courses')->where('status', '=', 1)->where('name', 'Píldoras')->first();


        return view('newtheme.pages.detail',compact('categories', 'pildora_categories' , 'initial_course_level', 'Intermedio_course_level', 'Avanzado_course_level' ));
    }


    public function mytest() {

        return view('newtheme.test');
    }

    public function teacher_profile() {


        $courses = Course::where('published', 1)->orderBy('id', 'desc')->get();
        // $courses = Course::withoutGlobalScope('filter')->canDisableCourse()->where('published', 1)->where('popular', '=', 1)->orderBy('id', 'desc')->get()->take(12);

        // dd($courses->lessons);

        $categories = Category::where('status', '=', 1)->get();

        $initial_course_level = Course::where('published', 1)->where('level', 'Inicial')->get();
        $Intermedio_course_level = Course::where('published', 1)->where('level', 'Intermedio')->get();
        $Avanzado_course_level = Course::where('published', 1)->where('level', 'Avanzado')->get();

        $pildora_categories = Category::with('courses')->where('status', '=', 1)->where('name', 'Píldoras')->first();



        return view('newtheme.teacher_profile',compact('categories', 'pildora_categories' , 'initial_course_level', 'Intermedio_course_level', 'Avanzado_course_level' , 'courses'));
    }

    public function Taller_gratuito() {

        $initial_course_level = Course::where('published', 1)->where('level', 'Inicial')->get();
        $Intermedio_course_level = Course::where('published', 1)->where('level', 'Intermedio')->get();
        $Avanzado_course_level = Course::where('published', 1)->where('level', 'Avanzado')->get();

        $pildora_categories = Category::with('courses')->where('status', '=', 1)->where('name', 'Píldoras')->first();


        return view('newtheme.Taller_gratuito.Taller_gratuito', compact('initial_course_level', 'pildora_categories' , 'Intermedio_course_level', 'Avanzado_course_level'));
    }

      public function SERVICIO_DE_CORRECCIÓN_DE_LIBROS() {

        
        return view('newtheme.servicio.LandingPage');
    }

     public function publicar_libro() {

        
        return view('newtheme.publicar.publicar');
    }

     public function correction() {

        
        return view('newtheme.correction.correction');
    }

    


    public function term_condition(){
        $courses = Course::withoutGlobalScope('filter')->canDisableCourse()->where('published', 1)->where('popular', '=', 1)->orderBy('id', 'desc')->get()->take(12);
        $categories = Category::where('status', '=', 1)->get();

        $initial_course_level = Course::where('published', 1)->where('level', 'Inicial')->get();
        $Intermedio_course_level = Course::where('published', 1)->where('level', 'Intermedio')->get();
        $Avanzado_course_level = Course::where('published', 1)->where('level', 'Avanzado')->get();


        $courses = Course::withoutGlobalScope('filter')->canDisableCourse()->where('published', 1)->orderBy('id', 'desc')->get()->take(12);
        // $courses = Course::withoutGlobalScope('filter')->canDisableCourse()->where('published', 1)->where('popular', '=', 1)->orderBy('id', 'desc')->get()->take(12);


        $pildora_categories = Category::with('courses')->where('status', '=', 1)->where('name', 'Píldoras')->first();


        return view('newtheme.termcondition',compact('categories', 'pildora_categories',  'courses', 'initial_course_level', 'Intermedio_course_level', 'Avanzado_course_level'));
    }
    public function policy(){
        $courses = Course::withoutGlobalScope('filter')->canDisableCourse()->where('published', 1)->where('popular', '=', 1)->orderBy('id', 'desc')->get()->take(12);
        $categories = Category::where('status', '=', 1)->get();
        return view('newtheme.policy',compact('categories', 'courses'));
    }




public function color(Request $request){
        $color = $request->color;
        $style = $request->text;
        $result = colortext::where('simpletext','like','%'.$request->text.'%')->count();
        $text = '<span style="background:'.$color.';">'.$style.'</span>';
        $user_id = auth()->user()->id;
        $data = ['color'=>$color,'text'=>$text,'user_id'=>$user_id,'simpletext'=>$style];
        colortext::create($data);
        if ($result > 0) {
            return Response::json($result);
        }
    }

    public function selection(Request $request){
        $result = colortext::where('simpletext','like','%'.$request->sel.'%')->count();
        if ($result > 0) {
            return Response::json($result);
        }
    }



    public function NotesPDF(){
        $data = Note::where('user_id',auth()->user()->id)->get();
        $pdf = PDF::loadView('newtheme.pages.notesPDF', compact('data'));
        return $pdf->download('Notes.pdf');
    }

    public function colortitle(Request $request){
        $data = [];

        //$data = $request->input();
        $data = ["status"=>$request->status,"title"=>$request->title,"user_id"=>auth()->user()->id];
        CompleteLesson::create($data);
    }


    public function coupon(Request $request){
        $stripe = new \Stripe\StripeClient(
          'sk_test_51IiCdWKVTXdRaMhE6DT6sxet32tliKIrWJKjTunIFIPXudNNiN9SgzmvI63hHGySkb2LXDhfA85g25IWfIfiRR3f00SPYwEbdu'
        );
        $array = $stripe->coupons->all()['data'];
        $valid = [];
        foreach ($array as $key => $value) {
            if($request->coupon == $value['name']){
                $valid =  $value['id'];
            }else{
                $valid = '';
            }
        }
        return Response::json($valid);
    }


    public function test_page() {
  
        return view('frontend.test_page');
    }

    public function SinglePDF($id){
        $data = Note::where([
            ['user_id',auth()->user()->id],
            ['id',$id],
        ])->get();
        $pdf = PDF::loadView('newtheme.pages.notesPDF', compact('data'));
        return $pdf->download('Notes.pdf');
    }


}