@extends('newtheme.lessonlayout')


@push('after-styles')
    {{--<link rel="stylesheet" href="{{asset('plugins/YouTube-iFrame-API-Wrapper/css/main.css')}}">--}}
    <link rel="stylesheet" href="https://cdn.plyr.io/3.5.3/plyr.css"/>
    <link href="{{asset('plugins/touchpdf-master/jquery.touchPDF.css')}}" rel="stylesheet">
    
    
    <script src="https://cdn.plyr.io/3.6.8/plyr.js"></script>
<link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />

   
    <style>

        .test-form {
            color: black;
        }

        .course-details-category ul li {
            width: 100%;
        }

        .sidebar.is_stuck {
            top: 15% !important;
        }

        .course-timeline-list {
            max-height: 300px;
            overflow: scroll;
        }

        .options-list li {
            list-style-type: none;
        }

        .options-list li.correct {
            color: green;
            font-weight: 600;

        }

        .options-list li.incorrect {
            color: red;
            font-weight: 600;

        }

        .options-list li.correct:before {
            content: "\f058"; /* FontAwesome Unicode */
            font-family: 'Font Awesome\ 5 Free';
            display: inline-block;
            color: green;
            margin-left: -1.3em; /* same as padding-left set on li */
            width: 1.3em; /* same as padding-left set on li */
        }

        .options-list li.incorrect:before {
            content: "\f057"; /* FontAwesome Unicode */
            font-family: 'Font Awesome\ 5 Free';
            display: inline-block;
            color: red;
            margin-left: -1.3em; /* same as padding-left set on li */
            width: 1.3em; /* same as padding-left set on li */
        }

        .options-list li:before {
            content: "\f111"; /* FontAwesome Unicode */
            font-family: 'Font Awesome\ 5 Free';
            display: inline-block;
            color: black;
            margin-left: -1.3em; /* same as padding-left set on li */
            width: 1.3em; /* same as padding-left set on li */
        }

        .touchPDF {
            border: 1px solid #e3e3e3;
        }

        .touchPDF > .pdf-outerdiv > .pdf-toolbar {
            height: 0;
            color: black;
            padding: 5px 0;
            text-align: right;
        }

        .pdf-tabs {
            width: 100% !important;
        }

        .pdf-outerdiv {
            width: 100% !important;
            left: 0 !important;
            padding: 0px !important;
            transform: scale(1) !important;
        }

        .pdf-viewer {
            left: 0px;
            width: 100% !important;
        }

        .pdf-drag {
            width: 100% !important;
        }

        .pdf-outerdiv {
            left: 0px !important;
        }

        .pdf-outerdiv {
            padding-left: 0px !important;
            left: 0px;
        }

        .pdf-toolbar {
            left: 0px !important;
            width: 99% !important;
            height: 30px;
        }

        .pdf-viewer {
            box-sizing: border-box;
            left: 0 !important;
            margin-top: 10px;
        }

        .pdf-title {
            display: none !important;
        }

        @media screen  and  (max-width: 768px) {

        }
        .stm-curriculum__title{
            padding-right: 200px;
            font-family: 'Montserrat';
            color: #273044;
            font-size: 26px;
            font-weight: 700;
            margin-bottom: 24px;
            line-height: 34px;
        }
       
        .box:hover {
            box-shadow: 0 5px 10px rgb(0 0 0 / 18%);
            z-index: 90;
            background-color: rgba(240,244,250,.65);
        }

        .heading_font{
            font-weight: 500;
            text-align: left;
        }
    </style>
@endpush
<style>

body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #f0f4fa;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.fluid-container {
    width: 80%;
    margin: 0 auto;
}

/*.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}
*/
/*.sidenav a:hover {
  color: #f1f1f1;
}*/

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}


</style>
<style>
    .stm-lms-lesson_navigation {
    display: flex;
    margin: 30px 0 0;
    padding: 40px 30px 30px;
    border-top: 1px solid #ddd;
    justify-content: space-between;
}

.stm-lms-curriculum-trigger {
    display: inline-block;
    vertical-align: top;
    width: 50px;
    height: 50px;
    text-align: center;
    line-height: 46px;
    color: #f0f4fa;
    border-radius: 50%;
    font-size: 16px;
    background-color: #385bce;
    border: 2px solid #385bce;
    cursor: pointer;
    transition: .3s ease;
}
.stm-lms-curriculum-trigger:hover {
    color: #385bce;
    background-color: #fff;
}
</style>



<style type="text/css">
  


.box1 {
  position: relative;
  height: 400px;
  width: 400px;
  background-color: #e7e7e7;
}

.list {
  display: none;
  position: absolute;
  list-style: none;
  background-color: lightgrey;
  width: 170px;
  padding: 1px;
  z-index: 9999999 !important;
  top: 45% !important;
 
}

.list li {
  padding: 10px;
  cursor: pointer;
}

.list li a{
  padding: 0;
  text-decoration: none;
  color: #333;
}

.list li .orange::before{
  content: "";
  background-color: orange;
  padding:  0px 9px 0px 7px;
  border-radius: 30px;
  margin: 10px;
}



.list li .yellow::before{
  content: "";
  background-color: yellow;
  padding: 0px 9px 0px 7px;
  border-radius: 30px;
  margin: 10px;
}


.list li .pink::before{
  content: "";
  background-color: pink;
  padding: 0px 9px 0px 7px;
  border-radius: 30px;
  margin: 10px;
}


.list li .blue::before{
  content: "";
  background-color: blue;
  padding: 0px 9px 0px 7px;
  border-radius: 30px;
  margin: 10px;
}


.list li a:hover, .list li:hover a{
  text-decoration: none;
  color: #fff;
}

.list li:hover {
  background-color: #333;
  color: #fff;
}
</style>

<style type="text/css">
    .black-box{
      background-color: black ;
      color: white;
      width: 36%;
      border-radius: 8px;
      display: flex;
      justify-content: center;
      align-items: center;
      width: 28%;
      margin: auto;

    }
</style>




<style type="text/css">
    
.saved-notes {

    padding-left:1% ;
}

.open-button{
    color:#FFF;
    background:#0066CC;
    padding:10px;
    text-decoration:none;
    border:1px solid #0157ad;
    border-radius:3px;
}
   
.open-button:hover{
    background:#01478e;
}
 
.popup {
    position:fixed;
    top:0px;
    left:0px;
  
    width:100%;
    height:100%;
    display:none;
}
 
/* Popup inner div */
.popup-content {
    width: 30%;
    height: 68%;
    margin: 0 auto;
    box-sizing: border-box;
    padding: 40px;
    margin-top: 300px;
    margin-right: 100px;
    box-shadow: 0px 2px 6px rgba(0,0,0,1);
    border-radius: 3px;
    background: #fff;
    position: relative;
    overflow-y: scroll;
}
 
/* Popup close button */
.close-button {
   width: 32px;
    height: 33px;
    position: absolute;
    top: 2px;
    right: 11px;
    border-radius: 20px;
    background: rgba(0,0,0,0.8);
    font-size: 20px;
    text-align: center;
    color: #fff;
    text-decoration:none;
}
 
.close-button:hover {
    background: rgba(0,0,0,1);
}
 
 @media  screen and  (min-width: 768px){
     

.col-md-1 {
    -ms-flex: 0 0 8.333333%;
    flex: 0 0 4.333333% !important;
    max-width: 4.333333% !important;
}
 }
 
 
@media screen and (max-width: 720px) {
.popup-content {
    width:90%;
    } 
}


#link {
    color: blue;
    background-color: transparent;
    text-decoration: none;
}





</style>

<style type="text/css">


#popUpBox{

  width: 85%;
  height: 90%;
 
  overflow-y: scroll;

  background: pink;

  box-shadow: 0 0 10px black;

  border-radius: 10px;

  position: absolute;

  top: 50%;

  left: 50%;

  transform: translate(-50%, -50%);

  z-index: 9999;

  padding: 10px;

  text-align: center;

  display: none;

}
</style>


<style type="text/css">
    #demo{
    background: #FFF;

}
</style>

<style type="text/css">
    
.radio {
    background-color: white;
    padding: 1%;
    font-size: 16px;
    text-transform: capitalize;
    margin-bottom: 2% !important;
    transition: box-shadow .3s;
    width: 40%;
    
    
}

.radio:hover {

     box-shadow: 10px 10px 11px rgba(33,33,33,.2);
}

.testform-input {
    color: black;
    font-weight: 700 !important;
    font-size: 16px;

}


</style>

<style type="text/css">
    
.testParagraph {

    
    padding: 1%;
}

.testParagraphImage {
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover; 
    background-color: ghostwhite;
    margin-right: -24%;
    margin-left: -20%;
    margin-top: 2%;
 
} 


@media screen and (max-width: 600px) {


 .testParagraphImage {
     margin-right: 0%;
    margin-left: 0%;
    margin-top: 0%;
    
}




}




</style>


<!-- MEIDA QUIRIES -->

<style type="text/css">

@media screen and (max-width: 600px) {


 .stm_header_top_search.sbc {
    padding: 3% !important;
    
}

.stm_header_top_toggler.mbc {

padding: 3% !important;

}



}
    

</style>


@section('content')

    <?php
        $title = App\Models\CompleteLesson::colortitle();
        $assignments = App\Models\Assignment::assignment();
    ?>

    {{-- @if(in_array($ ->model->id,$completed_lessons)) --}}

    <!-- Start of breadcrumb section
        ============================================= -->
    {{-- <section id="breadcrumb" class="breadcrumb-section relative-position backgroud-style">
        <div class="blakish-overlay"></div>
        <div class="container">
            <div class="page-breadcrumb-content text-center">
                <div class="page-breadcrumb-title">
                    <h2 class="breadcrumb-head black bold">
                        <span>{{$lesson->course->title}}</span><br> {{$lesson->title}} </h2>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End of breadcrumb section
        ============================================= -->


    <!-- Start of course details section
        ============================================= -->

    <section id="course-details" class="course-details-section" style="padding: 0px;">



        <div class="body">    
        <div class="fluid-container " style="width: 100%">
            <div class="row main-content" style="justify-content:center">
                    


        
            <div class="stm-lms-curriculum-trigger side" onclick="openNav()">
                        <i class="fa fa-list-ul" style="padding-top: 14px;" ></i>
            </div>
             <div class="col-md-2" >
            </div>
                   
                               
                
                

                <div class="col-md-7" style="display:inline-block;">
<br>
<br>
<br>
<br>
<br>

                     @if($previous_lesson == NULL)
                    <table class="table">
                      <thead class="thead" style="text-align: center; background-color: lightgreen; ">
                        <tr>
                          <th scope="col">Table of Contents</th>
                        </tr>
                      </thead>
                      <tbody style="text-align: left;" id="link">
                        @foreach($lesson->course->courseTimeline()->orderBy('id')->get() as $key=>$item)
                         @if($item->model && $item->model->published == 1)
                            <tr>
                              <td><a href="{{route('lessons.show',['course_id' => $lesson->course->id,'slug'=>$item->model->slug])}}">{{$key+1}}. {{$item->model->title}}</a></td>
                            </tr>
                            @endif
                        @endforeach
                      </tbody>
                    </table>
                    @endif

                    <br />


    

                    <div id="mySidenav" class="sidenav" style="z-index: 2;">
                      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                      {{-- <a href="#">About</a>
                      <a href="#">Services</a>
                      <a href="#">Clients</a>
                      <a href="#">Contact</a> --}}
                      <div class="stm-lms-course__curriculum">
                

                            

                            <div class="stm-curriculum">
                                <h3 class="stm-curriculum__title" style="text-transform: capitalize;" >
                                    Course sections            </h3>
                                
                                    @if($lesson->course->progress() == 100 && $status == true)
                                @if(!$lesson->course->isUserCertified())
                                    <form method="post" action="{{route('admin.certificates.generate')}}">
                                        @csrf
                                        <input type="hidden" value="{{$lesson->course->id}}" name="course_id">
                                        <button class="btn btn-success btn-block text-white mb-3 text-uppercase font-weight-bold"
                                                id="finish">@lang('labels.frontend.course.finish_course')</button>
                                    </form>
                                @else
                                    <div class="alert alert-success" style="width:85%; margin: 35px;">
                                        @lang('labels.frontend.course.certified')
                                    </div>
                                @endif
                            @endif
                                                    <div class="stm-curriculum-section opened container">
                                        <div class="stm-curriculum-item stm-curriculum-item__section opened" style="background-color: #385bce; color: white;">
                                            <div class="stm-curriculum-section__info">
                                                <span>Section 1</span>
                                                                </div>
                                        </div>
                                        
                     <div class="stm-curriculum-section__lessons">
                                            
                                                                 
                @foreach($lesson->course->courseTimeline()->orderBy('id')->get() as $key=>$item)

                    @if($item->model && $item->model->published == 1)

                                        {{--@php $key++; @endphp--}}
        <div class="@if($lesson->id == $item->model->id) active @endif " >




               <a class="stm-curriculum-item1 text is-completed prev-status-opened box" 

                {{-- @if(in_array($ ->model->id,$completed_lessons)) --}}


                href="{{route('lessons.show',['course_id' => $lesson->course->id,'slug'=>$item->model->slug])}}"

                {{-- @endif --}}>




                                        <div class="row" style="margin-top: 4%;" >   
                                                <div class="col-sm-1" style="color: black;">
                                                    <div class="">
                                                        <i class="stmlms-text"></i>
                                                    </div>
                                                </div>

                                                <div class="col-sm-1" style="color: black;">
                                                        {{$key+1}}                      


                                                </div>

                                                <div class="col-sm-8">
                                                     

                                                                <div style="color: black;">

                                                            {{$item->model->title}}

                                                                </div>

                                                            @if($item->model_type == 'App\Models\Test')
                                                                <p class="mb-0 text-primary">
                                                                    - @lang('labels.frontend.course.test')</p>
                                                            @endif                           

                                                

                                                </div>

                                                 
                                                    @if($lesson->id == $item->model->id) 
                                                <div class="col-sm-1">
                                                                <i class="fa fa-check-circle" style="font-size:25px;color:green"></i>
                                                </div>
                                                    @elseif(in_array($item->model->id,$completed_lessons)) 
                                                <div class="col-sm-1">
                                                            <i class="fas fa-check-circle" style="font-size:25px;"></i>    
                                                </div>
                                                    @endif

                                                      

                                        </div>

                                        <div class="row">

                                            @foreach($assignments as $assignment)

                                            @if($assignment->lesson_id == $item->model->id)
                                                
                                                <div class="col-md-7 offset-md-2" style=" margin-right: 30px; font-weight: 600;">
                                                        @if($assignment->completeassignment != '' && $assignment->completeassignment->user_id == auth()->user()->id)
                                                        @if($assignment->completeassignment->marks > 4 && $assignment->completeassignment->user_id == auth()->user()->id)
                                                        <a href="{{url('/student/assignment',['assign_id'=>$assignment->id])}}"> Assignment Approved </a>
                                                        @elseif($assignment->completeassignment->approved == 0 && $assignment->completeassignment->attempt == 0 && $assignment->completeassignment->user_id == auth()->user()->id)
                                                        <a href="#"> Pending for Approvel </a>
                                                        @elseif($assignment->completeassignment->attempt == 1 && $assignment->completeassignment->approved == 0 && $assignment->completeassignment->user_id == auth()->user()->id)
                                                        <a href="#"> Pending for Approvel </a>
                                                        @elseif($assignment->completeassignment->attempt == 1 && $assignment->completeassignment->marks < 5 && $assignment->completeassignment->approved == 1 && $assignment->completeassignment->user_id == auth()->user()->id)
                                                        <a href="#"> Contact Your Teacher </a>
                                                        @elseif($assignment->completeassignment->marks < 5 && $assignment->completeassignment->user_id == auth()->user()->id)
                                                        <a href="{{url('/student/assignment',['assign_id'=>$assignment->id])}}"> Not Approved(Submit again) </a>
                                                        @else
                                                        <a href="#">  </a>
                                                        @endif
                                                        @else
                                                        <a href="{{url('/student/assignment',['assign_id'=>$assignment->id])}}"> - Assignment <br>
                                                        {{$assignment->title}}
                                                        @endif
                                                    </a>
                                            </div>



                                                @endif
                                                     @endforeach

                                            
                                        </div> 

                                        
                                                
                         </a>
        </div>
                                                @endif
                                @endforeach

                              </div>                                    
                                    </div>
                                        
                            </div>            </div>
                                                </div>
                    @if(session()->has('success'))
                        <div class="alert alert-dismissable alert-success fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            {{session('success')}}
                        </div>
                    @endif
                    @include('includes.partials.messages')

                    <div class="course-details-item border-bottom-0 mb-0">
                        @if($lesson->lesson_image != "")
                            <div class="course-single-pic mb30">
                                <img src="{{asset('storage/uploads/'.$lesson->lesson_image)}}"
                                     alt="">
                            </div>
                        @endif


                        @if ($test_exists)

                        <div class="testParagraphImage" style="background-image: url('{{ asset('assets/quiz_bg.png')}}');">
                        <div class="testParagraph" >
                            <div class="course-single-text">
                                <div class="course-title mt10 headline relative-position">
                                    <h3>
                                        <b>@lang('labels.frontend.course.test')
                                            : {{$lesson->title}}</b>
                                    </h3>
                                </div>
                                <div class="course-details-content">
                                    <p> {!! $lesson->full_text !!} </p>
                                </div>
                            </div>
                            <hr/>
                            @if (!is_null($test_result))
                                <div class="alert alert-info">@lang('labels.frontend.course.your_test_score')
                                    : {{ $test_result->test_result }}</div>
                                @if(config('retest'))
                                    <form action="{{route('lessons.retest',[$test_result->test->slug])}}" method="post">
                                        @csrf
                                        <input type="hidden" name="result_id" value="{{$test_result->id}}">
                                        <button type="submit" class="btn gradient-bg font-weight-bold text-white"
                                                href="">
                                            @lang('labels.frontend.course.give_test_again')
                                        </button>
                                    </form>
                                @endif
                                @if(count($lesson->questions) > 0  )
                                    <hr>

                                    @foreach ($lesson->questions as $question)

                                        <h4 class="mb-0">{{ $loop->iteration }}
                                            . {!! $question->question !!}   @if(!$question->isAttempted($test_result->id))
                                                <small class="badge badge-danger"> @lang('labels.frontend.course.not_attempted')</small> @endif
                                        </h4>
                                        <br/>
                                        <ul class="options-list pl-4">
                                            @foreach ($question->options as $option)

                                                <li class="@if(($option->answered($test_result->id) != null && $option->answered($test_result->id) == 1) || ($option->correct == true)) correct @elseif($option->answered($test_result->id) != null && $option->answered($test_result->id) == 2) incorrect  @endif" style=""> {{ $option->option_text }}

                                                    @if($option->correct == 1 && $option->explanation != null)
                                                        <p class="text-dark">
                                                            <b>@lang('labels.frontend.course.explanation')</b><br>
                                                            {{$option->explanation}}
                                                        </p>
                                                    @endif
                                                </li>

                                            @endforeach
                                        </ul>
                                        <br/>
                                    @endforeach

                                @else
                                    <h3>@lang('labels.general.no_data_available')</h3>

                                @endif
                            @else
                                <div class="test-form" >
                                    @if(count($lesson->questions) > 0  )
                                        <form action="{{ route('lessons.test', [$lesson->slug]) }}" method="post">
                                            {{ csrf_field() }}
                                            @foreach ($lesson->questions as $question)
                                                <h4 class="mb-0">{{ $loop->iteration }}. {!! $question->question !!}  </h4>
                                                <br/>
                                                @foreach ($question->options as $option)
                                                    <div class="radio">
                                                        <label class="testform-input">
                                                            <input type="radio" name="questions[{{ $question->id }}]"
                                                                   value="{{ $option->id }}"/>
                                                            <span class="cr" style="border-radius: 0px !important; border-style: solid; border-color: darkgray; background-color: white;">
                                                                <i class="cr-icon fa fa-circle"></i>
                                                            </span>
                                                            {{ $option->option_text }}<br/>
                                                        </label>
                                                    </div>
                                                @endforeach
                                                <br/>
                                            @endforeach
                                            <div style="text-align: center;">
                                            <input class="btn gradient-bg text-white font-weight-bold" style="padding: 2%;font-family: 'Montserrat'; border-radius: 43px; font-size: 19px;" type="submit" value=" Submit Quiz "/>
                                            </div>
                                        </form>
                                    @else
                                        <h3>@lang('labels.general.no_data_available')</h3>

                                    @endif
                                </div>
                            @endif
                            <hr/>

                        </div>

                        </div>

                        @else
                            <div class="course-single-text">
                                <div class="course-title mt10 headline relative-position" 
                                style="
                                text-transform: capitalize; 
                                font-weight: 700;
                                line-height: 50px;
                                letter-spacing: -2.2px;
                                font-size: 45px;
                                font-family: 'Montserrat';
                                ">

                                    <h3>
                                        <b>{{$lesson->title}}</b>
                                    </h3>
                                </div>
<div class="course-details-content" style="margin-bottom: 30px;margin: 0 0 10px; font-size: 18px;line-height: 36px;font-family: Open Sans; ">


                                    @if($lesson->live_lesson)
                                        Discription: 
                                        <p>{{ $lesson->short_text }}</p>

                                    @else

                       
                       <section class="section">

<div class="black-box">
</div>

                                        {{-- str_replace("world","Peter","Hello world!"); --}}
                                        <div class="" id="box1">
                                            <p style="text-align: justify;">  {!!  $lee !!}</p>


                                            <ul class="list" id="list">
                                            <li>
                                              <a class="orange" href="#" id="change_color_orange"></a>
                                              <a class="yellow" href="#" id="change_color_yellow"></a>
                                              <a class="pink" href="#" id="change_color_pink" ></a>
                                              <a class="blue" href="#" id="change_color_blue" ></a>
                                            </li>
                                            
                                            <hr>
                                       <li><a href="#" onclick="myfunction()" data-toggle="modal" data-target="#modalSubscriptionForm">Add Note +</a> </li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                           
                                          </ul>
                                        
                                      </div>

                            

                        </section>

                                <br/><br/>

 

 
                                    @endif
                                </div>

                               <!--  @if($lesson->live_lesson) -->
                                <h4 class="my-4"><a href="{{url('/user/student_dashboard')}}" target="_blank">Click here</a> to join Live Session </h4>
                               <!-- <div class="affiliate-market-guide mb65">
                                    <div class="affiliate-market-accordion">
                                        <div id="accordion" class="panel-group">
                                            @php $count = 0; @endphp
                                            @foreach($lesson->liveLessonSlots as $lessonSlot)
                                                @php $count++ @endphp
                                                <div class="panel position-relative">
                                                    <div class="panel-title" id="headingOne">
                                                        <div class="ac-head">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                                    data-target="#collapse{{$count}}" aria-expanded="false"
                                                                    aria-controls="collapse{{$count}}">
                                                                <span>{{ sprintf("%02d", $count)}}</span>
                                                                {{$lessonSlot->topic}}
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div id="collapse{{$count}}" class="collapse" aria-labelledby="headingOne"
                                                         data-parent="#accordion">
                                                        <div class="panel-body">
                                                            {!! $lessonSlot->description !!}
                                                            <p class="my-auto"><span class="font-weight-bold">@lang('labels.frontend.course.live_lesson_meeting_date')</span> : {{ $lessonSlot->start_at->format('d-m-Y') }} <strong>({{ config('zoom.timezone') }})</strong></p>
                                                            <p class="my-auto"><span class="font-weight-bold">@lang('labels.frontend.course.live_lesson_meeting_duration')</span> : {{ $lessonSlot->duration }}</p>
                                                           @if($lesson->lessonSlotBooking && $lesson->lessonSlotBooking->where('user_id', auth()->user()->id)->count())
                                                               @if(auth()->user()->lessonSlotBookings()->where('live_lesson_slot_id',$lessonSlot->id)->first())
                                                                    @if($lessonSlot->start_at->timezone(config('zoom.timezone'))->gt(\Carbon\Carbon::now(new DateTimeZone(config('zoom.timezone')))))
                                                                    <p class="my-auto"><span class="font-weight-bold">@lang('labels.frontend.course.live_lesson_meeting_id')</span> : {{ $lessonSlot->meeting_id }}</p>
                                                                    <p class="my-auto"><span class="font-weight-bold">@lang('labels.frontend.course.live_lesson_meeting_password')</span> : {{ $lessonSlot->password }}</p>

                                                                    <a class="btn btn-info mt-3"
                                                                       href="{{ $lessonSlot->join_url }}" target="_blank">
                                                                        <span class="text-white font-weight-bold ">@lang('labels.frontend.course.live_lesson_join_url')</span>
                                                                    </a>
                                                                    @endif
                                                               @endif
                                                           @else
                                                                @if($lessonSlot->lessonSlotBookings->count() >= $lessonSlot->student_limit)

                                                                    <span class="btn btn-danger mt-3">
                                                                        <span class="text-white font-weight-bold ">@lang('labels.frontend.course.full_slot')</span>
                                                                    </span>
                                                                @else
                                                                    <form method="post" action="{{route('lessons.course.book-slot')}}">
                                                                        @csrf
                                                                        <input type="hidden" value="{{$lessonSlot->id}}" name="live_lesson_slot_id">
                                                                        <input type="hidden" value="{{$lesson->id}}" name="lesson_id">
                                                                        <button class="btn btn-info mt-3"
                                                                        >@lang('labels.frontend.course.book_slot')</button>
                                                                    </form>
                                                                @endif
                                                           @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endif -->
                            </div>
                        @endif

                        @if($lesson->mediaPDF)
                            <div class="course-single-text mb-5">
                                {{--<iframe src="{{asset('storage/uploads/'.$lesson->mediaPDF->name)}}" width="100%"--}}
                                {{--height="500px">--}}
                                {{--</iframe>--}}
                                <div id="myPDF"></div>

                            </div>
                        @endif

                       @if($lesson->mediaVideo && $lesson->mediavideo->count() > 0)

                            <div class="course-single-text">
                                @if($lesson->mediavideo != "")

                                <div class="course-details-content mt-3">

                                <div class="video-container mb-5" data-id="{{$lesson->mediavideo->id}}">
                                            

                                 @if($lesson->mediavideo->type == 'youtube')
   

                             <div class="container" style="">

                                       <div class="plyr__video-embed" id="player">

                                                  <iframe
                                                    src="https://www.youtube.com/embed/{{$lesson->mediavideo->file_name}}?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                                                    allowfullscreen
                                                    allowtransparency
                                                    allow="autoplay"
                                                  ></iframe>
                                        </div>
                            </div>                        
                                                
                                @elseif($lesson->mediavideo->type == 'vimeo')

                             <div class="container" style="margin: 20px auto; max-width: 75%;">

                                       <div class="plyr__video-embed" id="player">

                                                  <iframe
                                                    src="https://player.vimeo.com/video/{{$lesson->mediavideo->file_name}}?loop=false&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media"
                                                    allowfullscreen
                                                    allowtransparency
                                                    allow="autoplay"
                                                  ></iframe>
                                        </div>
                            </div>                        
                                        
                                 @elseif($lesson->mediavideo->type == 'upload')

                                <video poster="" id="player" class="js-player" playsinline controls>
                                                
                                                <source src="{{$lesson->mediavideo->url}}" type="video/mp4"/>
                                </video>
                                @elseif($lesson->mediavideo->type == 'embed')
                                            
                                            {!! $lesson->mediavideo->url !!}
                                @endif

                                    </div>

                            </div>

                                @endif
                            </div>
                        @endif

                        @if($lesson->mediaAudio)
                            <div class="course-single-text mb-5">
                                <audio id="audioPlayer" controls>
                                    <source src="{{$lesson->mediaAudio->url}}" type="audio/mp3"/>
                                </audio>
                            </div>
                        @endif


                        @if(($lesson->downloadableMedia != "") && ($lesson->downloadableMedia->count() > 0))
                            <div class="course-single-text mt-4 px-3 py-1 gradient-bg text-white">
                                <div class="course-title mt10 headline relative-position">
                                    <h4 class="text-white">
                                        @lang('labels.frontend.course.download_files')
                                    </h4>
                                </div>

                                @foreach($lesson->downloadableMedia as $media)
                                    <div class="course-details-content text-white">
                                        <p class="form-group">
                                            <a href="{{ route('download',['filename'=>$media->name,'lesson'=>$lesson->id]) }}"
                                               class="text-white font-weight-bold"><i
                                                        class="fa fa-download"></i> {{ $media->name }}
                                                ({{ number_format((float)$media->size / 1024 , 2, '.', '')}} @lang('labels.frontend.course.mb')
                                                )</a>
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <!-- /course-details -->

                    <!-- /market guide -->

                    <!-- /review overview -->
                </div>

                 <div class="col-md-1" >
            </div>

                <div class="saved-notes" style=" display:inline-block;">

                    <br>
<br>
<br>
<br>
<br>
                       <a class="open-button" popup-open="popup-1" href="javascript:void(0)"> Show saved Notes </a>

                               
                <div class="popup" popup-name="popup-1">
                             <div class="popup-content">


                <div style="padding: 10px;">
        
                    <!-- <button type="button" onclick="studynote()" data-toggle="modal" data-target="#studynote" class="btn btn-secondary">Add Study Card</button> -->
                    <input type="button" class="btn btn-secondary" target="_blank" onclick="location.href='{{url('/NotesPDF')}}';" value="Export" />
                    <!-- <button onclick="Alert.render('You look very pretty today.')" class="btn btn-secondary">Show Study Card</button> -->


                            
                            <div id="popUpOverlay"></div>
                            
                            <div id="popUpBox">
                            
                            <div id="box">
                        
                            <i class="fas fa-check-circle fa-5x"></i>
                            
                            <h1>Here are your Study Notes</h1>

                <p class="scard" style="text-align: left;">

                     @foreach($cards as $card)
                                <div id="{{$card->id}}">
                                <h5 style="text-align: justify;"> Q) {{$card->question}} </h5>
                                <p style="text-align: justify;">A) {{$card->card}} <i class="fa fa-trash-o" style="cursor: pointer;" onclick="card('{{$card->id}}','{{url('/studycard')}}/{{$card->id}}')"></i>
                                </p>
                                </div>
                     @endforeach


                </p>
                            
                            <div id="closeModal"></div>
                            
                            </div>
                            
                            </div>
                            
                            




                 </div>


                                <div style="background-color: lightgrey; text-align: center; padding: 10px;">
                                    FOREWORD
                                </div>

                                            <?php $i = 1 ?>
                                            @foreach($notes as $note)
                                            <h2><i class="far fa-star"></i> {{"Note ".$i}} </h2>
                                        <p>
                                            {{$note->note}}
                                        </p>
                                        <?php $i++ ?>
                                        @endforeach
                                        <a class="close-button" popup-close="popup-1" href="javascript:void(0)">x</a>
                                         </div>


                                </div>


                        </div>






           
            </div>
        </div>
        





<div class="stm-lms-lesson_navigation heading_font uncompleted" data-completed="Completed" style="display: flex;justify-content: center;" id="demo">
    
    <div class="row" style="width: 100%">

        <div class="col-md-4" style="text-align:left; z-index: 1;">

            <div class="stm-lms-lesson_navigation_side stm-lms-lesson_navigation_prev">
                                @if ($previous_lesson)
                                <a href="{{ route('lessons.show', [$previous_lesson->course_id, $previous_lesson->model->slug]) }}">
                                    <i class="lnr lnr-chevron-left"></i>
                                                            <span>{{$previous_lesson->model->slug}}</span>
                                </a>
                                @endif
                </div>
        </div>






     <div class="col-md-4" style="text-align:center;">

        <div class="stm-lms-lesson_navigation_complete">

            <a href="#" class="stm_lms_complete_lesson uncompleted" data-course="52034" data-lesson="52039" onclick="javascript:myFunction();">

                            <form id="color">
                            <input type="hidden" name="title" value="{{$lesson->title}}">
                            <input type="hidden" name="status" value="1">   
                            </form> 

                            @if(in_array($lesson->title,$title))

                            <div style="background-color: #17d292; margin-left: -113%; margin-right: -113%; margin-top: -8%; padding: 3%;">
                                
                            <a style=" border-radius: 40px;padding: 18px 30px;font-size: 20px; border: 1px solid; font-weight: 800; background-color: white;" class="btn btn-default stm_lms_complete_lesson uncompleted" data-course="52034" data-lesson="52039">
                                <span style=""> <i class="fa fa-check-circle" style="font-size:23px; color: green;"></i> Completada </span>
                            </a>

                            </div>
                            
                            @else
                                <button onclick="colorbutton()" class="btn btn-default" id="btnbtn"
                            style="border-radius: 30px;padding: 18px 30px;font-size: 17px; border: 1px solid; font-weight: 600;">
                             &#x2714; Completar 
                            </button>
                            
                            @endif
                            
                            

            </a>
        </div> 

    </div>




            <div class="col-md-4" style="text-align:left;">
                            <div class="stm-lms-lesson_navigation_side stm-lms-lesson_navigation_next">
                                @if($next_lesson)

                                                    <a href="{{ route('lessons.show', [$next_lesson->course_id, $next_lesson->model->slug]) }}" style="">
                                                                    <span style="">{{$next_lesson->model->slug}}</span>
                                            <i class="lnr lnr-chevron-right"></i>
                                        </a>
                                @endif
                            </div>  
            </div>
                            
        </div>
        </div>
    
    </div>
    </section>
    <!-- End of course details section
    ============================================= -->

@endsection


<script type="text/javascript">

    function myFunction() { 
    var e = document.getElementById("demo");
    var c = window.getComputedStyle(e).backgroundColor;
    if (c === "rgb(255, 255, 255)") {
    document.getElementById("demo").style.background = "#17d292"; //green
    document.getElementById("btnbtn").innerHTML = " <span style='color:black'> <i class='fa fa-check-circle' style='font-size:22px;color:green'></i> Completed</span> ";
    document.getElementById("btnbtn").style.background = "white";

} 
}
</script>

<script>

function openNav() {
  $(".Side").hide();
  
  document.getElementById("mySidenav").style.width = "500px";
  document.getElementById("main").style.marginLeft = "250px";
  // document.body.style.backgroundColor = "rgba(0,0,0,0.4)";

 
}

function closeNav() {
    $(".Side").show();
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
@push('after-scripts')
    {{--<script src="//www.youtube.com/iframe_api"></script>--}}
    <script src="{{asset('plugins/sticky-kit/sticky-kit.js')}}"></script>
    <script src="https://cdn.plyr.io/3.5.3/plyr.polyfilled.js"></script>
    <script src="{{asset('plugins/touchpdf-master/pdf.compatibility.js')}}"></script>
    <script src="{{asset('plugins/touchpdf-master/pdf.js')}}"></script>
    <script src="{{asset('plugins/touchpdf-master/jquery.touchSwipe.js')}}"></script>
    <script src="{{asset('plugins/touchpdf-master/jquery.touchPDF.js')}}"></script>
    <script src="{{asset('plugins/touchpdf-master/jquery.panzoom.js')}}"></script>
    <script src="{{asset('plugins/touchpdf-master/jquery.mousewheel.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>


    <script>
        @if($lesson->mediaPDF)
        $(function () {
            $("#myPDF").pdf({
                source: "{{asset('storage/uploads/'.$lesson->mediaPDF->name)}}",
                loadingHeight: 800,
                loadingWidth: 800,
                loadingHTML: ""
            });

        });
                @endif

        var storedDuration = 0;
        var storedLesson;
        storedDuration = Cookies.get("duration_" + "{{auth()->user()->id}}" + "_" + "{{$lesson->id}}" + "_" + "{{$lesson->course->id}}");
        storedLesson = Cookies.get("lesson" + "{{auth()->user()->id}}" + "_" + "{{$lesson->id}}" + "_" + "{{$lesson->course->id}}");
        var user_lesson;

        if (parseInt(storedLesson) != parseInt("{{$lesson->id}}")) {
            Cookies.set('lesson', parseInt('{{$lesson->id}}'));
        }


                @if($lesson->mediaVideo && $lesson->mediaVideo->type != 'embed')
        var current_progress = 0;


        @if($lesson->mediaVideo->getProgress(auth()->user()->id) != "")
            current_progress = "{{$lesson->mediaVideo->getProgress(auth()->user()->id)->progress}}";
                @endif



        const player2 = new Plyr('#audioPlayer');

        const player = new Plyr('#player');
        duration = 10;
        var progress = 0;
        var video_id = $('#player').parents('.video-container').data('id');
        player.on('ready', event => {
            player.currentTime = parseInt(current_progress);
            duration = event.detail.plyr.duration;


            if (!storedDuration || (parseInt(storedDuration) === 0)) {
                Cookies.set("duration_" + "{{auth()->user()->id}}" + "_" + "{{$lesson->id}}" + "_" + "{{$lesson->course->id}}", duration);
            }

        });

        {{--if (!storedDuration || (parseInt(storedDuration) === 0)) {--}}
        {{--Cookies.set("duration_" + "{{auth()->user()->id}}" + "_" + "{{$lesson->id}}" + "_" + "{{$lesson->course->id}}", player.duration);--}}
        {{--}--}}


        setInterval(function () {
            player.on('timeupdate', event => {
                if ((parseInt(current_progress) > 0) && (parseInt(current_progress) < parseInt(event.detail.plyr.currentTime))) {
                    progress = current_progress;
                } else {
                    progress = parseInt(event.detail.plyr.currentTime);
                }
            });
            if(duration !== 0 || parseInt(progress) !== 0 ) {
                saveProgress(video_id, duration, parseInt(progress));
            }
        }, 3000);


        function saveProgress(id, duration, progress) {
            $.ajax({
                url: "{{route('update.videos.progress')}}",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'video': parseInt(id),
                    'duration': parseInt(duration),
                    'progress': parseInt(progress)
                },
                success: function (result) {
                    if (progress === duration) {
                        location.reload();
                    }
                }
            });
        }


        $('#notice').on('hidden.bs.modal', function () {
            location.reload();
        });

        @endif

        $("#sidebar").stick_in_parent();


        @if((int)config('lesson_timer') != 0)
        //Next Button enables/disable according to time

        var readTime, totalQuestions, testTime;
        user_lesson = Cookies.get("user_lesson_" + "{{auth()->user()->id}}" + "_" + "{{$lesson->id}}" + "_" + "{{$lesson->course->id}}");

        @if ($test_exists )
            totalQuestions = '{{count($lesson->questions)}}'
        readTime = parseInt(totalQuestions) * 30;
        @else
            readTime = parseInt("{{$lesson->readTime()}}") * 60;
        @endif

        @if(!$lesson->isCompleted())
            storedDuration = Cookies.get("duration_" + "{{auth()->user()->id}}" + "_" + "{{$lesson->id}}" + "_" + "{{$lesson->course->id}}");

            storedLesson = Cookies.get("lesson" + "{{auth()->user()->id}}" + "_" + "{{$lesson->id}}" + "_" + "{{$lesson->course->id}}");

        if(storedDuration > 0){
             var totalLessonTime = parseInt(storedDuration) ? parseInt(storedDuration) : 0;
        }
        else {
            var totalLessonTime = readTime + (parseInt(storedDuration) ? parseInt(storedDuration) : 0);
        }


        var storedCounter = (Cookies.get("storedCounter_" + "{{auth()->user()->id}}" + "_" + "{{$lesson->id}}" + "_" + "{{$lesson->course->id}}")) ? Cookies.get("storedCounter_" + "{{auth()->user()->id}}" + "_" + "{{$lesson->id}}" + "_" + "{{$lesson->course->id}}") : 0;
        var counter;
        if (user_lesson) {
            if (user_lesson === 'true') {
                counter = 1;
            }
        } else {
            if ((storedCounter != 0) && storedCounter < totalLessonTime) {
                counter = storedCounter;
            } else {
                counter = totalLessonTime;
            }
        }
        var interval = setInterval(function () {
            counter--;
            // Display 'counter' wherever you want to display it.
            if (counter >= 0) {
                // Display a next button box
                $('#nextButton').html("<a class='btn btn-block bg-danger font-weight-bold text-white' href='#'>@lang('labels.frontend.course.next') (in " + counter + " seconds)</a>")
                Cookies.set("duration_" + "{{auth()->user()->id}}" + "_" + "{{$lesson->id}}" + "_" + "{{$lesson->course->id}}", counter);

            }
            if (counter === 0) {
                Cookies.set("user_lesson_" + "{{auth()->user()->id}}" + "_" + "{{$lesson->id}}" + "_" + "{{$lesson->course->id}}", 'true');
                Cookies.remove('duration');

                @if ($test_exists && (is_null($test_result)))
                $('#nextButton').html("<a class='btn btn-block bg-danger font-weight-bold text-white' href='#'>@lang('labels.frontend.course.complete_test')</a>")
                @else
                @if($next_lesson)
                $('#nextButton').html("<a class='btn btn-block gradient-bg font-weight-bold text-white'" +
                    " href='{{ route('lessons.show', [$next_lesson->course_id, $next_lesson->model->slug]) }}'>@lang('labels.frontend.course.next')<i class='fa fa-angle-double-right'></i> </a>");
                @else
                $('#nextButton').html("<form method='post' action='{{route("admin.certificates.generate")}}'>" +
                    "<input type='hidden' name='_token' id='csrf-token' value='{{ Session::token() }}' />" +
                    "<input type='hidden' value='{{$lesson->course->id}}' name='course_id'> " +
                    "<button class='btn btn-success btn-block text-white mb-3 text-uppercase font-weight-bold' id='finish'>@lang('labels.frontend.course.finish_course')</button></form>");

                @endif

                @if(!$lesson->isCompleted())
                courseCompleted("{{$lesson->id}}", "{{get_class($lesson)}}");
                @endif
                @endif
                clearInterval(counter);
            }
        }, 1000);

        @endif
        @endif

        function courseCompleted(id, type) {
            $.ajax({
                url: "{{route('update.course.progress')}}",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'model_id': parseInt(id),
                    'model_type': type,
                },
            });
        }

    </script>

    <script type="text/javascript">
        $(".black-box").hide();
    </script>





<script type="text/javascript">
        $(function () {
  $("p").bind('mouseup', function (e) {
    var selection;
    if (window.getSelection) {
      selection = window.getSelection();
    } else if (document.selection) {
      selection = document.selection.createRange();
    }
    //selection.toString() !== '' && alert('"' + selection.toString() + '" was selected at ' + e.pageX + '/' + e.pageY);
    var sel = selection.toString();
    $.ajax({
        type: "get",
        url: "{{url('/selection')}}",
        data: {
        sel : sel
    },
    success:function(data){
        console.log(data);
        if(data > 0){
        $(".black-box").show();
        $('.black-box').html(""+data+" users mark this text");
        }else{
            $(".black-box").hide();
        }
    }
    })
  });
});


  const element = document.getElementById("box1");

const listElement = document.getElementById("list");

const onClickOutside = (event) => {
  listElement.style.display = "none";
  document.removeEventListener("click", onClickOutside);
};

listElement.addEventListener("contextmenu", (event) => {
  event.stopPropagation();
});

listElement.addEventListener("mouseup", (event) => {
  event.stopPropagation();
});

document.addEventListener("contextmenu", (event) => {
  listElement.style.display = "none";
});

listElement.addEventListener("click", (event) => {
  event.stopPropagation();
});

element.addEventListener("mouseup", (event) => {
  event.stopPropagation();
  if (event.button === 2) {
    return;
  }
});

element.addEventListener("contextmenu", (event) => {
  event.preventDefault();
  event.stopPropagation();
  document.addEventListener("click", onClickOutside);
  const x = event.offsetX;
  const y = event.offsetY - 15;
  listElement.style.display = "block";
  listElement.style.top = y + "px";
  listElement.style.left = x + "px";
});
</script>


<script type="text/javascript">
  

  document.getElementById("change_color_orange").onclick = function() {
  // Get Selection
  sel = window.getSelection();
  var text = sel.toString()
  var color = "orange";
  console.log(color);
  $.ajax({
    type: "get",
    url: "{{url('/color')}}",
    data: {
        color : color,
        text : text
    },
    success:function(data){
        // console.log(data);
        // if(data > 0){
        // $(".black-box").show();
        // $('.black-box').html(""+data+" person selected this text").fadeOut(2000);
        // }else{
        //     $(".black-box").hide();
        // }
    }
  })
  if (sel.rangeCount && sel.getRangeAt) {
    range = sel.getRangeAt(0);
  }
  // Set design mode to on
  document.designMode = "on";
  if (range) {
    sel.removeAllRanges();
    sel.addRange(range);
  }
  // Colorize text
  document.execCommand("BackColor", false, "orange");
  // Set design mode to off
  document.designMode = "off";
}
</script>



<script type="text/javascript">
  

  document.getElementById("change_color_yellow").onclick = function() {
  // Get Selection
  sel = window.getSelection();
  var text = sel.toString()
  var color = "yellow";
  console.log(color);
  $.ajax({
    type: "get",
    url: "{{url('/color')}}",
    data: {
        color : color,
        text : text
    },
    success:function(data){
       //  console.log(data);
       //  if(data > 0){
       //  $(".black-box").show();
       // $('.black-box').html(""+data+" person selected this text").fadeOut(2000);
       //  }else{
       //      $(".black-box").hide();
       //  }
    }
  })
  if (sel.rangeCount && sel.getRangeAt) {
    range = sel.getRangeAt(0);
  }
  // Set design mode to on
  document.designMode = "on";
  if (range) {
    sel.removeAllRanges();
    sel.addRange(range);
  }
  // Colorize text
  document.execCommand("BackColor", false, "yellow");
  // Set design mode to off
  document.designMode = "off";
}
</script>




<script type="text/javascript">
  

  document.getElementById("change_color_pink").onclick = function() {
  // Get Selection
  sel = window.getSelection();
  var text = sel.toString()
  var color = "pink";
  console.log(color);
  $.ajax({
    type: "get",
    url: "{{url('/color')}}",
    data: {
        color : color,
        text : text
    },
   success:function(data){
      //   console.log(data);
      //   if(data > 0){
      //   $(".black-box").show();
      // $('.black-box').html(""+data+" person selected this text").fadeOut(2000);
      //   }else{
      //       $(".black-box").hide();
      //   }
    }
  })
  if (sel.rangeCount && sel.getRangeAt) {
    range = sel.getRangeAt(0);
  }
  // Set design mode to on
  document.designMode = "on";
  if (range) {
    sel.removeAllRanges();
    sel.addRange(range);
  }
  // Colorize text
  document.execCommand("BackColor", false, "pink");
  // Set design mode to off
  document.designMode = "off";
}
</script>


<script type="text/javascript">


  document.getElementById("change_color_blue").onclick = function() {
  // Get Selection
  sel = window.getSelection();
  var text = sel.toString()
  var color = "blue";
  console.log(color);
  $.ajax({
    type: "get",
    url: "{{url('/color')}}",
    data: {
        color : color,
        text : text
    },
    success:function(data){
        // console.log(data);
        // if(data > 0){
        // $(".black-box").show();
        // $('.black-box').html(""+data+" person selected this text").fadeOut(2000);
        // }else{
        //     $(".black-box").hide();
        // }
    }
  })
  if (sel.rangeCount && sel.getRangeAt) {
    range = sel.getRangeAt(0);
  }
  // Set design mode to on
  document.designMode = "on";
  if (range) {
    sel.removeAllRanges();
    sel.addRange(range);
  }
  // Colorize text
  document.execCommand("BackColor", false, "blue");
  // Set design mode to off
  document.designMode = "off";
}
</script>




<script type="text/javascript">
    function myfunction(){
        $("#modalSubscriptionForm").modal('show');

    }

</script>


<script type="text/javascript">
    function studynote(){
        $("#studynote").modal('show');

    }

</script>




<script type="text/javascript">
    $(function() {
    // Open Popup
    $('[popup-open]').on('click', function() {
        var popup_name = $(this).attr('popup-open');
 $('[popup-name="' + popup_name + '"]').fadeIn(300);
    });
 
    // Close Popup
    $('[popup-close]').on('click', function() {
 var popup_name = $(this).attr('popup-close');
 $('[popup-name="' + popup_name + '"]').fadeOut(300);
    });
 
    // Close Popup When Click Outside
    $('.popup').on('click', function() {
 var popup_name = $(this).find('[popup-close]').attr('popup-close');
 $('[popup-name="' + popup_name + '"]').fadeOut(300);
    }).children().click(function() {
 return false;
    });
 
});
</script>


<script type="text/javascript">
    var Alert = new CustomAlert();


function CustomAlert(){

  this.render = function(){

      //Show Modal

      let popUpBox = document.getElementById('popUpBox');

      popUpBox.style.display = "block";

      //Close Modal

      document.getElementById('closeModal').innerHTML = '<button onclick="Alert.ok()">OK</button>';

  }

  

this.ok = function(){

  document.getElementById('popUpBox').style.display = "none";

  document.getElementById('popUpOverlay').style.display = "none";

}

}
</script>

<script type="text/javascript">
    function card(id,route){
        $.ajax({
            url: route,
            type: "DELETE",
            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
            success:function(data){
                $("#"+id).hide();
            }
        })
    }
</script>



<script src="path/to/plyr.js"></script>
<script>
  const player = new Plyr('#player');
</script>

<script>
    function colorbutton(){
        
            $.ajax({
                url: "{{url('/colortitle')}}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:"POST",
                dataType:"JSON",
                data:$("#color").serialize(),

            });
        
    }
</script>

    
@endpush