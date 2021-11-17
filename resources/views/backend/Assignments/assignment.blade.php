    @extends('newtheme.assignmentlayout')

    @section('content')

    <style type="text/css">
      

    .body1 {

      background-color: whitesmoke;
    }

    .assignBack {


      text-align: left;
       justify-content: center;

    }


    @media screen and (max-width: 425px) {
    .assignBack {

    width: 100% !important;
        
        } 
    }


    #respond {
      margin-top: 40px;
    }
    .commentBox {
      transition: box-shadow .3s;
      border: 2px solid #ccc;
      padding: 10px;
      box-shadow: 5px 10px #888888;
    }
    .commentBox:hover {
      box-shadow: 0 0 11px rgba(33,33,33,.2);
    }




    .blueAssign {

      text-align: center;
    }

    </style>

    <style type="text/css">

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



    .sidenav .closebtn {
      position: absolute;
      top: 0;
      right: 25px;
      font-size: 36px;
      margin-left: 50px;
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

    </style>


    </head>


    <div class="body1">

    @if( Session::has('success'))
      <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
      </div>
      @endif
      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      
      @endif

    <div class="row">
      
     <?php
            $title = App\Models\CompleteLesson::colortitle();
            $assignments = App\Models\Assignment::assignment();
        ?>

    <div class="col-md-1 col-12 blueAssign">

       <div class="stm-lms-curriculum-trigger side" onclick="openNav()" style="margin-right: 4%;margin-top: 20px;">
                            <i class="fa fa-list-ul" style="padding-top: 14px;" ></i>
                </div>


                <div id="mySidenav" class="sidenav" style="z-index: 2;">
                          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      
                          <div class="stm-lms-course__curriculum">
                    
                                <div class="stm-curriculum">
                                    <h3 class="stm-curriculum__title" style="text-align: left;" >
                                        Curso
                                      </h3>
                                    
                                     @if($CourseLessonslesson->course->progress() == 100 && $status == true)
                                    @if(!$CourseLessonslesson->course->isUserCertified())
                                        <form method="post" action="{{route('admin.certificates.generate')}}">
                                            @csrf
                                            <input type="hidden" value="{{$CourseLessonslesson->course->id}}" name="course_id">
                                            <button class="btn btn-success btn-block text-white mb-3 text-uppercase font-weight-bold"
                                                    id="finish">
                                                Finalizar curso
                                            </button>
                                        </form>
                                    @else
                                        <div class="alert alert-success" style="text-align: center;">
                                            @lang('labels.frontend.course.certified')
                                        </div>
                                    @endif
                                     @endif
                                
                                      <div class="stm-curriculum-section opened container">
                                            <div class="stm-curriculum-item stm-curriculum-item__section opened" style="background-color: #385bce; color: white;">
                                                <div class="stm-curriculum-section__info">
                                                    <span>Tema 1</span>
                                              </div>
                                            </div>
                                            
    <style type="text/css">

    /*span::after {
      float: right;
      right: 10%;
      content: "+";
    }
    */
    .slide {
      clear:both;
      width:100%;
      height:0px;
      overflow: hidden;
      transition: height .4s ease;
    }


    #touch0 {
        position: absolute; opacity: 0; height: 0px;
    }    

    #touch0:checked + .slide 
    {
        height: auto;
    }
    #touch1 {position: absolute; opacity: 0; height: 0px;}    

    #touch1:checked + .slide 
    {
        height: auto;
    }
    #touch2 {position: absolute; opacity: 0; height: 0px;}    

    #touch2:checked + .slide 
    {
        height: auto;
    }
    #touch3 {position: absolute; opacity: 0; height: 0px;}    

    #touch3:checked + .slide 
    {
        height: auto;
    }
    #touch4 {position: absolute; opacity: 0; height: 0px;}    

    #touch4:checked + .slide 
    {
        height: auto;
    }
    #touch5 {position: absolute; opacity: 0; height: 0px;}    

    #touch5:checked + .slide 
    {
        height: auto;
    }
    #touch6 {position: absolute; opacity: 0; height: 0px;}    

    #touch6:checked + .slide 
    {
        height: auto;
    }
    #touch7 {position: absolute; opacity: 0; height: 0px;}    

    #touch7:checked + .slide 
    {
        height: auto;
    }
    #touch8 {position: absolute; opacity: 0; height: 0px;}    

    #touch8:checked + .slide 
    {
        height: auto;
    }
    #touch9 {position: absolute; opacity: 0; height: 0px;}    

    #touch9:checked + .slide 
    {
        height: auto;
    }



    .triangle_down {
      width: 0;
      height: 0;
      border-left: 15px solid transparent;
      border-right: 15px solid transparent;
      border-top: 15px solid #2f2f2f;
      font-size: 0;
      line-height: 0;
      float: left;
      margin-top: 14px;
    }

    </style>   
                         <div class="stm-curriculum-section__lessons">

                            @foreach($topics as $key=>$topic)
                                            @php $i = 1; @endphp   


    <nav style=" background: white;">

    <label for="touch{{$key}}" style="width: 100%; display: flex;cursor: pointer;">

        <div style="width: 10%;padding: 8px;"> 
            {{-- >  --}}

            <div class="triangle_down"></div>

        </div>

    <div style=" 
    padding: 12px;
        font-size: 1.2em;
        cursor: pointer;
        color: black;
        font-weight: bold;
     display: block;">
       {{$topic->title}} 
    </div>

    </label>  

                                    <input type="checkbox" id="touch{{$key}}"> 
                                     <p class="slide">

                @foreach($CourseLessonslesson->course->courseTimeline()->where('topic_id',$topic->id)->orderBy('id')->get() as $key=>$item)
                          @if($item->model && $item->model->published == 1)

                           <span class="@if($CourseLessonslesson->id == $item->model->id) active @endif">

         <a class="stm-curriculum-item1 text is-completed prev-status-opened box"  href="{{route('lessons.show',['course_id' => $CourseLessonslesson->course->id,'slug'=>$item->model->slug])}}">
                        
                               <span class="row" style="margin-top: 4%;" >   
                                                    <span class="col-sm-1" style="color: black;">
                                                            <i class="stmlms-text"></i>

                                                    </span>

                                                    <span class="col-sm-1" style="color: black;">
                                                            {{$i++}}                      
                                                    </span>

                                                    <span class="col-sm-8" style="padding: 0; text-align: left;">
                                                         

                                                        <span style="color: black;">

                                                                {{$item->model->title}}

                                                        </span>
                                                        <span>
                                                              @if($item->model_type == 'App\Models\Test')
                                                                    <span class="mb-0 text-primary" style="color: black !important">
                                                                        - @lang('labels.frontend.course.test')

                                                                    </span>
                                                                @endif         
                                                            
                                                        </span>
                                                                                

                                                    </span>

                                                     
                                                        @if($CourseLessonslesson->id == $item->model->id) 
                                                    <span class="col-sm-1">
                                                                    <i class="fa fa-check-circle" style="font-size:25px;color:green"></i>
                                                    </span>
                                                        @elseif(in_array($item->model->id,$completed_lessons)) 
                                                    <span class="col-sm-1">
                                                                <i class="fas fa-check-circle" style="font-size:25px;color: green;"></i>    
                                                    </span>
                                                        @endif       

                                            </span>

                                             </a>

                                            
                                            <span class="row" style="margin-top: 4%;">

                                                @foreach($assignments as $assignment)

                                                @if($assignment->lesson_id == $item->model->id)
                                                        
                                                    <span class="col-sm-1" style="color: black;">
                                                
                                                            <i class="stmlms-text"></i>
                                             
                                                    </span>


                                                     <span class="col-sm-1" style="">

                                                          {{$i++}}  

                                                     </span> 

            <span class="col-sm-8" style="padding: 0; text-align: left;">

                @if($assignment->completeassignment != '' && $assignment->completeassignment->user_id == auth()->user()->id)

                @if($assignment->completeassignment->marks > 4 && $assignment->completeassignment->user_id == auth()->user()->id)

                <a href="{{url('/student/assignment',['assign_id'=>$assignment->id, 'course_id' => $CourseLessonslesson->course->id])}}" style="text-decoration: none; color: black;"> Tarea aprobada </a>

                @elseif($assignment->completeassignment->approved == 0 && $assignment->completeassignment->attempt == 0 && $assignment->completeassignment->user_id == auth()->user()->id)

                <a href="#"> Pendiente de aprobación </a>

                @elseif($assignment->completeassignment->attempt == 1 && $assignment->completeassignment->approved == 0 && $assignment->completeassignment->user_id == auth()->user()->id)

                <a href="#" style="text-decoration: none; color: black;"> Pendiente de aprobación </a>

                @elseif($assignment->completeassignment->attempt == 1 && $assignment->completeassignment->marks < 5 && $assignment->completeassignment->approved == 1 && $assignment->completeassignment->user_id == auth()->user()->id)

                <a href="#" style="text-decoration: none; color: black;">  Contacta al profesor </a>

                @elseif($assignment->completeassignment->marks < 5 && $assignment->completeassignment->user_id == auth()->user()->id)

                <a href="{{url('/student/assignment',['assign_id'=>$assignment->id, 'course_id' => $CourseLessonslesson->course->id])}}" style="text-decoration: none; color: black;"> 
                Tarea no aprobada, hazla otra vez y envíala </a>

                @else

                <a href="#" style="text-decoration: none; color: black;"></a>

                @endif

                @else

                <a href="{{url('/student/assignment',['assign_id'=>$assignment->id, 'course_id' => $CourseLessonslesson->course->id])}}" style="text-decoration: none; color: black;"> 
                Ejercicio-{{$assignment->title}}
                </a>

                @endif 
        </span>

                                                     <span class="col-sm-1">
                                                         <i class="fas fa-check-circle" style="font-size:25px;color: green;"></i>    
                                                     </span>   
                                                    @endif
                                                 @endforeach
                                            </span>   
                                          </span>      
                                            @endif 
                                 @endforeach
                        </p>
                        </nav>
                            @endforeach 
                        </div> 
                    </div>
                </div>
            </div>
      </div>


      
    </div>

    <div class="col-md-11 col-12">


    <h1>{{$assign->title}}</h1><br>



     <p><a data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
       Ver las instrucciones <i class="fas fa-chevron-up"></i> </a></p><br>

       
    <div class="collapse" id="collapseExample1">

          
    {{-- <p style="font-weight: bold;"> {{$assignment->title}}</p> <br> --}}

    <p>{{$assign->description}}<br>


    </div>

    <form method="post" action="{{url('/student/assignment')}}">
      @csrf

    <textarea name="assignment"  cols="80" id="editor10" rows="10" data-sample-short required></textarea>
    <input type="hidden" name="lesson_id" value="{{$assign->lesson_id}}">
    <input type="hidden" name="assignment_id" value="{{$assign->id}}">
    <?php $check =  App\Models\CompleteAssignment::checkAproval(auth()->user()->id,$assign->lesson_id) ?>
    @if($check != '')
    <input type="hidden" name="attempt" value="1">
    @else
    <input type="hidden" name="attempt" value="0">
    @endif
      <script>
        // We need to turn off the automatic editor creation first.
        CKEDITOR.disableAutoInline = true;

        CKEDITOR.replace('editor10');
      </script>


    <div style=" text-align: center; margin: 3%;">
          @if($assign->completeassignment != '')
          @if($assign->completeassignment->marks < 4 && $assign->completeassignment->approved == 1)
          <button type="submit" class="btn btn-primary" style="padding: 1%; border-radius: 18px;"> Enviar tarea </button>
          @elseif($assign->completeassignment->marks > 4)
          <button type="button" class="btn btn-primary" style="padding: 1%; border-radius: 18px;"> Tarea aprobada </button>
          @else
          <button type="button" class="btn btn-primary" style="padding: 1%; border-radius: 18px;"> Tarea enviada </button>
          @endif
          @else
          <button type="submit" class="btn btn-primary" style="padding: 1%; border-radius: 18px;"> Enviar tarea </button>
          @endif

    </div>

    </form>


    @if($assign->completeassignment != '')
          @if($assign->completeassignment->approved == 1)
    <div id="respond">
      <h3 class="commentBox"> Comentarios del profesor:- </h3>
    </div>
    <table class="table">
      
      <tbody>
        <tr>
          <td>{!! $assign->completeassignment->comment !!}</td>
          
        </tr>
      </tbody>
    </table>
          @endif
    @endif


      
    </div>


    </div>
      
    </div>


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

    @endsection