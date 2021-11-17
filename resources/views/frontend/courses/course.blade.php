@extends('newtheme.layout')

@section('content')
<style>
    .dropdown-course {
          display: none;
          width: 259px;
         
          background-color: #fff;
            margin-left: 1px;
            text-align: center;
          white-space: pre-wrap;
          transition:  .3s ease;
          line-height: 1.3;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }
    .dropdown-course a {
          color: #273044;
          padding: 0px 27px;
          font-weight: 500;
          font-size: 14px;
          line-height: 1.3;
        white-space: pre-wrap;
        transition: .3s ease;
          text-decoration: none;
          display: block;
        }
        hr{
            width: 225px;
        }
        .dropdown-course a:hover { color: #2fbe5b;}

</style>


<style type="text/css">
  .popup-overlay {

  /*Hides pop-up when there is no "active" class*/
  visibility: hidden;
  position: absolute;
  background: #FEFEFE;
  border: 3px solid #666666;
  left: 40%;
  top: 84px;
  padding: 13px;

}

.popup-overlay.active {
  /*displays pop-up when "active" class is present*/
  visibility: visible;
  text-align: center;
  z-index: 99;
}

.popup-content {
  /*Hides pop-up content when there is no "active" class */
  visibility: hidden;
}

.popup-content.active {
  /*Shows pop-up content when "active" class is present */
  visibility: visible;
}


</style>

<style>
  .trend-badge-2 {
    top: -10px;
    left: -52px;
    color: #fff;
    font-size: 12px;
    font-weight: 700;
    position: absolute;
    padding: 40px 40px 12px;
    -webkit-transform: rotate(-45deg);
    transform: rotate(-45deg);
    background-color: #ff5a00;
  }

  .progress {
    background-color: #b6b9bb;
    height: 2em;
    font-weight: bold;
    font-size: 0.8rem;
    text-align: center;
  }

  .best-course-pic {
    background-color: #333333;
    background-position: center;
    background-size: cover;
    height: 150px;
    width: 100%;
    background-repeat: no-repeat;
  }
</style>

<style type="text/css">
    .text {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 2; /* number of lines to show */
   -webkit-box-orient: vertical;
}
</style>



    <script src='https://js.stripe.com/v2/' type='text/javascript'></script>



<div class="popup-overlay">
  <!--Creates the popup content-->
  <div class="popup-content">
    <div class="row" style="width: 100%;margin: 0;display: flex;">

        <div style="width: 90%; text-align: center;">
    <h4> Comparte este enlace </h4>
            
        </div>

        <div style="width: 10%; text-align: right;">
            <span style="    font-size: 28px;
    font-weight: bold;">X</span>
        </div>
        
    </div>

    <hr>

    <div class="row" style="width: 100%;margin: 0;display: flex;">

       <div style="font-size: 21px;text-align: left;">
            
            <img width="90px" height="90px" src="{{asset('storage/uploads/'.$course->course_image)}}" style="border-radius: 10px;" />
             
             &nbsp;
    <span style="text-decoration: none;
    color: black !important;
    font-weight: 500;"> {{$course->title}} </span>

       </div>

        
    </div>



    
    <div class="row" style="width: 100%;margin: 0;margin-top: 25px;">
      <span style="font-weight: bold;"> Redes Sociales</span>
    </div> <br>

    <div class="row" style="width: 100%;display: flex;margin: 0;">

      <div style="width: 50%; font-size: 21px;text-align: left;">
        
  <a href="https://www.facebook.com/sharer/sharer.php?u=abc&display=popup" id="share-fb" target="_blank">

    <i class="fa fa-2x fa-facebook-square" style="color: #00A7E7;"></i> &nbsp;
    <span style="text-decoration: none;
    color: black !important;
    font-weight: 500;"> Facebook </span>
  </a>

      </div>
     
      <div style="width: 50%; font-size: 21px;text-align: left;">
        
  <a href="https://twitter.com/share?text=abc" target="_blank">
    <i class="fab fa-2x fa-twitter" style="color: #00A7E7;"></i>  &nbsp; 

    <span style="text-decoration: none;
    color: black !important;
    font-weight: 500;"> Twitter </span>

  </a>



      </div>
      
    </div>

   <div class="row" style="width: 100%;margin: 0;margin-top: 25px;">
    
    </div> <br>

    <div class="row" style="width: 100%;display: flex;margin: 0;text-align: left;">

       <div style="width: 50%; font-size: 21px;text-align: left;">

        <a href="http://www.facebook.com/dialog/send?app_id=[app-id]" target="_blank"> 
            <i class="fab fa-2x fa-facebook-messenger" style="color: #00A7E7;"></i>
          &nbsp; 
           <span style="text-decoration: none;
    color: black !important;
    font-weight: 500;"> Messenger </span>
        </a>



      </div>


       <div style="width: 50%; font-size: 21px;text-align: left;">

        @if(auth()->user())
    <a href="https://api.whatsapp.com/send?text={{route('signup', ['refferal_code'=>auth()->user()->refferal_code])}}" target="_blank">
        @else

        <a href="https://api.whatsapp.com/send?text=abc" target="_blank">
        @endif

         <img src="{{ asset('fonts/whatsapp.png') }}" alt="share" width="40px" height="40px" style="border-radius: 13px;">

         &nbsp; 
           <span style="text-decoration: none;
    color: black !important;
    font-weight: 500;display: inline-block;
    margin-top: 8px;"> WhatsApp </span>

      </a>

      </div>

     
      
    </div>
    @auth
    <div class="row" style="width: 100%;margin: 0;margin-top: 25px;margin-bottom: 5px;">
      <span style="font-weight: bold;"> Copia el enlace</span>

    </div> <br>



      <div class="row" style="width: 100%;margin: 0;">
      
      <p id="p2" style="border: 1px solid lightgrey;margin: 0;"> 

       <span style="margin-top: 3px;display: inline-block;"> {{route('signup', ['refferal_code'=>auth()->user()->refferal_code])}}</span>
      
      </p>
    &nbsp;
    &nbsp;
      <button style="font-size: 15px;border: 1px solid;" onclick="copysharelink('#p2')"  >Copiar</button>
      
      </div>
@endauth
  

      
    
   

    <!--popup's close button-->
    <div class="row" style="justify-content: center;margin-top: 40%;margin-bottom: 2%;">

      <a href="#" class="close" style="font-size: 30px;"> Cerrar </a>
    
      
    </div>

  </div>
</div>

   <div id="main">


            <div class="stm-lms-wrapper">
                <div class="container" style=" max-width: 1900px;">


                    <div class="row">

                        <div class="col-md-9">

                            @if(session()->has('danger'))
                                <div class="alert alert-dismissable alert-danger fade show">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    {!! session('danger')  !!}
                                </div>
                                @endif
                                @if(session()->has('success'))
                                    <div class="alert alert-dismissable alert-success fade show">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        {{session('success')}}
                                    </div>
                                @endif
                            

                            <h1 class="stm_lms_course__title" style="color: #273044">{{$course->title}}</h1>



                            <div class="single_product_after_title">
                                <div class="clearfix">

                                    <div class="pull-left meta_pull">


                                        <div class="pull-left stm_lms_teachers">
                                            <a href="{{url('teacher-profile')}}">
                                                <div class="meta-unit teacher clearfix">
                                                    <div class="pull-left">
                                                        <img alt src="{{ asset('newtheme/images/59f9b8d60fe1f-bpfull6fb4.jpg')}}"
                                                            class="avatar avatar-215 photo jetpack-lazy-image"
                                                            height="215" width="215" loading="lazy"
                                                            data-lazy-srcset="{{ asset('newtheme/images/59f9b8d60fe1f-bpfull6fb4.jpg')}}"
                                                            data-lazy-src="{{ asset('newtheme/images/59f9b8d60fe1f-bpfull6fb4.jpg')}}"><img
                                                            alt='' src="{{ asset('newtheme/images/59f9b8d60fe1f-bpfull6fb4.jpg')}}"
                                                            class='avatar avatar-215 photo' height='215' width='215'
                                                            loading='lazy' style="height: 100%;" />
                                                    </div>
                                                    <div class="meta_values">
                                                        <div class="label h6">Profesor</div>
                                                        <div class="value heading_font h6">Ray Bolívar Sosa</div>
                                                    </div>
                                                </div>
                                            </a>

                                        </div>

                                        <div class="pull-left xs-product-cats-left">
                                            <div class="meta-unit categories clearfix">
                                                <div class="pull-left">
                                                    <i class="fa-icon-stm_icon_category secondary_color"></i>
                                                </div>
                                                <div class="meta_values">
                                                    <div class="label h6"> Categoría:</div>
                                                    <div class="value h6">
                                                        <a href='#'
                                                            title='General (todos)'>
                                                            @if($course->category)
                                                            {{$course->category->name}}
                                                            @else 
                                                                General
                                                            @endif
                                                            </a>, {{-- <a
                                                            href='../../course/pildoras/index.html'
                                                            title='Píldoras'>Píldoras</a> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                    <div class="pull-right xs-comments-left">
                                       
                                    </div>


                                </div>

                            </div>




                            <ul class="nav nav-tabs" role="tablist">

                                <li role="presentation" class="active">
                                    <a href="#description" data-toggle="tab">
                                        Descripción </a>
                                </li>
                                <li role="presentation" class="">
                                    <a href="#curriculum" data-toggle="tab">
                                        Curriculum </a>
                                </li>
                                {{-- <li role="presentation" class="">
                                    <a href="#faq" data-toggle="tab">
                                        FAQ </a>
                                </li> --}}
                                {{-- <li role="presentation" class="">
                                    <a href="#announcement" data-toggle="tab">
                                        Announcement </a>
                                </li> --}}
                                <li role="presentation" class="">
                                    <a href="#reviews" data-toggle="tab">
                                        Opiniones </a>
                                </li> 

                            </ul>



                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="description">
                                    <div class="stm_lms_course__image">
                                        <img width="100%" height="440"
                                            src="{{asset('storage/uploads/'.$course->course_image)}}"
                                            class="attachment-img-870-440 size-img-870-440 wp-post-image jetpack-lazy-image"
                                            alt="" loading="lazy"
                                            data-lazy-src="{{asset('storage/uploads/'.$course->course_image)}}"
                                            srcset="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" />
                                    </div>


                                    <div class="stm_lms_course__content">
                                        <h2><strong>{{$course->title}}</strong></h2>
                                        <p data-css="tve-u-161d5e9b508"><span data-css="tve-u-16638773682">{!! $course->description !!}</p>
                                        
                                        {{-- <p><strong>Curso intensivo</strong></p>
                                        <p>Está diseñado para enseñar lo esencial en pocas lecciones. Si no quieres
                                            perder tiempo en conocimientos estériles este curso es ideal.</p>
                                        <p><strong>Inicio inmediato</strong></p>
                                        <p data-css="tve-u-16638625e01">El curso está disponible para
                                            empezar.<strong> </strong></p>
                                        <p data-css="tve-u-1663862a044"><strong>Ventajas adicionales</strong></p>
                                        <p data-css="tve-u-1663862a044"><strong>​</strong><span
                                                data-css="tve-u-16638634069">Los interesados también pueden acudir a
                                                las<strong> clases que se imparten por videoconferencia</strong> los
                                                tres primeros martes de cada mes a las 20.00 pm. <a
                                                    href="javascript:void(0)" target="_blank" rel="noopener">Inscríbete
                                                    a las clases adicionales
                                                    en este enlace. </a></span></p>
                                        <p data-css="tve-u-161d5e9b50e"><strong>Días:</strong> martes.</p>
                                        <p data-css="tve-u-161d5e9b510"><strong>Horario:</strong> 20.00.</p>
                                        <p data-css="tve-u-161d5e9b511"><strong>Modalidad</strong>: Videoconferencia.
                                        </p>
                                        <h2><strong>Metodología</strong></h2>
                                        <p data-css="tve-u-16638654771">El curso está compuesto por
                                            material <strong>multimedia, videos, ejercicios y lecciones
                                                especializadas</strong> propuestas por el profesor que abarcan un gran
                                            número de conocimientos.</p>
                                        <p data-css="tve-u-166386bfef6"><strong>Formación teórica práctica</strong></p>
                                        <p data-css="tve-u-16638654771">El enfoque del curso es eminentemente práctico.
                                            Los alumnos deberán realizar ejercicios, proponer soluciones, escribir
                                            textos, etc.</p>
                                        <p data-css="tve-u-166386d6047"><strong>Correcciones​</strong></p>
                                        <p data-css="tve-u-16638654771">Los alumnos matriculados deberán escribir textos
                                            durante el período de la formación. Además recibirán correcciones con
                                            sugerencias personalizadas.</p>
                                        <p data-css="tve-u-166386f159f"><strong>Aclaración de dudas por email</strong>
                                        </p>
                                        <p data-css="tve-u-166386719b4"><span data-css="tve-u-1663869a391">Los
                                                alumnos <strong>pueden realizar consultas por email</strong>, solicitar
                                                aclaraciones, participar libremente en el foro o en el grupo de Facebook
                                                en el que compartimos recursos adicionales. <a
                                                    href="https://www.facebook.com/groups/1404729079560733/?ref=bookmarks"
                                                    target="_blank" rel="noopener">Únete al grupo de Facebook</a> en
                                                este enlace. </span></p>
                                        <p data-css="tve-u-1663869a37b"><strong>Dudas con tu nivel</strong></p>
                                        <p data-css="tve-u-161d5e9b514">Si tienes dudas con tu nivel <a
                                                href="../test-de-competencia-comunicativa-para-escritores/index.html"
                                                target="_blank" rel="noopener">haz clic aquí para realizar un test de
                                                nivel. </a></p>
                                        <h2 data-css="tve-u-161d5e9b515"><strong>​​<span data-css="tve-u-1663870be96">Un
                                                    curso para aprender con la ayuda de un profesor
                                                    especializado</span></strong></h2>
                                        <p data-css="tve-u-161d5e9b51c">Este curso te ayudará a mejorar tus habilidades
                                            escriturales y a profundizar en la técnica literaria.</p>
                                        <h2 data-css="tve-u-161d5e9b51d"><strong>​<span
                                                    data-css="tve-u-166387211c4">Objetivos prácticos</span></strong>
                                        </h2>
                                        <ol>
                                            <li data-css="tve-u-161d5e9b522"><strong>Redacción de textos de alto valor
                                                    comunicativo </strong>dirigidos a provocar emociones en los
                                                lectores.</li>
                                            <li data-css="tve-u-161d5e9b524"><strong>Generación de
                                                    emociones </strong>utilizando los verbos adecuados.</li>
                                            <li data-css="tve-u-161d5e9b524"><strong>Desarrollo de escenas y comienzos
                                                    memorables</strong> que despierten la atención del lector.</li>
                                        </ol>
                                        <h2 data-css="tve-u-161d5e9b526"><strong>¿Qué aprenderás?</strong></h2>
                                        <p data-css="tve-u-161d5e9b527">-Despierta la atención del lector con
                                            inteligencia.</p>
                                        <p data-css="tve-u-161d5e9b528">-Comunica ideas y emociones con facilidad.</p>
                                        <p data-css="tve-u-161d5e9b52a">-Mejorara tu técnica literaria.</p>
                                        <p data-css="tve-u-161d5e9b52a">-Plasma tus ideas con éxito.</p>
                                        <p data-css="tve-u-161d5e9b52a"> --}}
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane " id="curriculum">


                                    <div class="stm-curriculum">


                                        <div class="stm-curriculum-section">
                                            <h3>Inicio del curso</h3>
                                        </div>
   
    <?php
        $title = App\Models\CompleteLesson::colortitle();
        $assignments = App\Models\Assignment::assignment();
    ?>

  @foreach($topics as $key=>$topic)
 @php $i = 1; @endphp   

{{-- {{ dd($topic->course->lessons) }} --}}

  @foreach($course->courseTimeline()->where('topic_id',$topic->id)->orderBy('id')->get() as $key=>$item)
                                   
                                        {{--@php $key++; @endphp--}}

        <div class="stm-curriculum-item has-excerpt" style="margin-bottom: 1%;" >
                      
                <div  class="" data-toggle="collapse" class="heading_font collapsed" data-parent="#accordion" href="#" aria-expande ="true" aria-controls="collapse0">

                               <div class="stm-curriculum-item__num col-md-1">
                                                        
                                     <i class="stmlms-text"></i>                    

                                </div>

                                <div style="display: flex;justify-content: space-between;">

                                    <div class="heading_font" style="font-weight: 600;" href="#">

                                            {{$item->model->title}}

                         
                                    </div>


                                <div href="#">
                                                           
                                         <!-- <button class="btn btn-success" style="padding: 4px; border-radius: 9px;"> Preview </button> -->
                                </div>


                                </div>
                </div>

        </div>
  @foreach($assignments as $assignment)

@if($assignment->lesson_id == $item->model->id)

 <div class="stm-curriculum-item has-excerpt" style="margin-bottom: 1%;" >
                      
                <div  class="" data-toggle="collapse" class="heading_font collapsed" data-parent="#accordion" href="#" aria-expande ="true" aria-controls="collapse0">

                               <div class="stm-curriculum-item__num col-md-1">
                                                        
                                     <i class="stmlms-text"></i>                    


                                </div>
                </div>

        </div>
  @foreach($assignments as $assignment)

@if($assignment->lesson_id == $item->model->id)

 <div class="stm-curriculum-item has-excerpt" style="margin-bottom: 1%;" >
                      
                <div  class="" data-toggle="collapse" class="heading_font collapsed" data-parent="#accordion" href="#" aria-expande ="true" aria-controls="collapse0">

                               <div class="stm-curriculum-item__num col-md-1">
                                                        
                                     <i class="stmlms-text"></i>                    

                                </div>

                                <div style="display: flex;justify-content: space-between;">

                                    <div class="heading_font" style="font-weight: 600;" href="#">

                                            {{$assignment->title}}

                                    </div>

                                <div style="display: flex;justify-content: space-between;">

                                    <div class="heading_font" style="font-weight: 600;" href="#">

                                            {{$assignment->title}}

                                    </div>


                                <div href="#">
                                                           
                                         <!-- <button class="btn btn-success" style="padding: 4px; border-radius: 9px;"> Preview </button> -->
                                </div>

                                </div>
                </div>

        </div>
    @endif
    @endforeach

@endforeach
@endforeach


                     

                                    </div>

                                </div>
            <div role="tabpanel" class="tab-pane " id="faq">

                                    <div class="panel-group" id="stm_lms_faq" role="tablist"
                                        aria-multiselectable="true">

                                        <div class="panel panel-default">
                                            <div class="panel-heading" role="tab" id="heading0">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse"
                                                        class="heading_font collapsed" data-parent="#accordion"
                                                        href="#collapse0" aria-expanded="true"
                                                        aria-controls="collapse0">
                                                        <i class="fa fa-angle-down"></i>
                                                        ¿Cuánto cuesta el curso? </a>
                                                </h4>
                                            </div>
                                            <div id="collapse0" class="panel-collapse collapse" role="tabpanel"
                                                aria-labelledby="heading0">
                                                <div class="panel-body">
                                                    El curso está disponible en cualquiera de las opciones de
                                                    suscripción. También puedes pagar un precio único de 8.50€. </div>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <div role="tabpanel" class="tab-pane " id="announcement">

                                    <div class="stm_lms_announcement">
                                        <h3>No hay anuncios. </h3>
                                        <p><br></p>
                                    </div>
                                </div>
    <div role="tabpanel" class="tab-pane " id="reviews">


            <div class="clearfix stm_lms_average__rating">

                                        <!-- Reviews Average ratings -->
                <div class="average_rating" style=" float: none; font-weight: 800; font-size: 22px;;">

                                <div>
                                    
                                           @if($course_rating < 0 || $course_rating == '' )

                                           <div>
                                              Sé el primero en agregar una opinión
                                           </div>

                                           @elseif($course_rating > 0)

                                           <div>
                                               
                                               Gracias por tu opinión




                                           </div>

                                           @endif




                                </div>  
                 </div>

            <br>
                                        <!-- Reviews Average ratings END -->

                                        <!-- Review detailed Rating -->
    <div class="detailed_rating" style="float: none;">

                 <div class="course-review">
                        <div class="section-title-2 mb20 headline text-left">
                            <h2>Opiniones del curso</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="ratting-preview">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="avrg-rating ul-li">
                                                <b>Puntuación media</b>
                                                <span class="avrg-rate">{{$course_rating}}</span>
                                                <ul>
                                                    @for($r=1; $r<=$course_rating; $r++)
                                                        <li><i class="fas fa-star"></i></li>
                                                    @endfor
                                                </ul>
                                                <b>{{$total_ratings}} Cantidad de opiniones</b>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="avrg-rating ul-li">
                                                <span><b>Detalles</b></span>
                                                @for($r=5; $r>=1; $r--)
                                                    <div class="rating-overview">
                                                        <span class="start-item">{{$r}} Estrellas</span>
                                                        <span class="start-bar"></span>
                                                        <span class="start-count">{{$course->reviews()->where('rating','=',$r)->get()->count()}}</span>
                                                    </div>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /review overview -->

                    <div class="couse-comment">
                        <div class="blog-comment-area ul-li about-teacher-2">
                            @if(count($course->reviews) > 0)
                                <ul class="comment-list">
                                    @foreach($course->reviews as $item)
                                        <li class="d-block">
                                            <div class="comment-avater">
                                                <img src="{{$item->user->picture}}" alt="">
                                            </div>

                                            <div class="author-name-rate">
                                                <div class="author-name float-left">
                                                    Por:
                                                    <span>{{$item->user->full_name}}</span>
                                                </div>
                                                <div class="comment-ratting float-right ul-li">
                                                    <ul>
                                                        @for($i=1; $i<=(int)$item->rating; $i++)
                                                            <li><i class="fas fa-star"></i></li>
                                                        @endfor
                                                    </ul>
                                                    @if(auth()->check() && ($item->user_id == auth()->user()->id))
                                                        <div>
                                                       
                                                            <a href="{{route('courses.review.delete',['id'=>$item->id])}}"
                                                               class="text-danger">@lang('labels.general.delete')</a>
                                                        </div>

                                                    @endif
                                                </div>
                                                <div class="time-comment float-right">{{$item->created_at->diffforhumans()}}</div>
                                            </div>
                                            <div class="author-designation-comment">
                                                <p>{{$item->content}}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <h4> Sin opiniones</h4>
                            @endif

                            @if ($purchased_course)
                                @if(isset($review) || ($is_reviewed == false))
                                    <div class="reply-comment-box">
                                        <div class="review-option">
                                            <div class="section-title-2  headline text-left float-left">
                                                <h2>Agregar opinión</h2>
                                            </div>
                                            <div class="review-stars-item float-right mt15">
                                                <span> Clasificación: </span>
                                                <div class="rating">
                                                    <label>
                                                        <input type="radio" name="stars" value="1"/>
                                                        <span class="icon"><i class="fas fa-star"></i></span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="stars" value="2"/>
                                                        <span class="icon"><i class="fas fa-star"></i></span>
                                                        <span class="icon"><i class="fas fa-star"></i></span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="stars" value="3"/>
                                                        <span class="icon"><i class="fas fa-star"></i></span>
                                                        <span class="icon"><i class="fas fa-star"></i></span>
                                                        <span class="icon"><i class="fas fa-star"></i></span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="stars" value="4"/>
                                                        <span class="icon"><i class="fas fa-star"></i></span>
                                                        <span class="icon"><i class="fas fa-star"></i></span>
                                                        <span class="icon"><i class="fas fa-star"></i></span>
                                                        <span class="icon"><i class="fas fa-star"></i></span>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="stars" value="5"/>
                                                        <span class="icon"><i class="fas fa-star"></i></span>
                                                        <span class="icon"><i class="fas fa-star"></i></span>
                                                        <span class="icon"><i class="fas fa-star"></i></span>
                                                        <span class="icon"><i class="fas fa-star"></i></span>
                                                        <span class="icon"><i class="fas fa-star"></i></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="teacher-faq-form">
                                            @php
                                                if(isset($review)){
                                                    $route = route('courses.review.update',['id'=>$review->id]);
                                                }else{
                                                   $route = route('courses.review',['id'=> $course->id]);
                                                }
                                            @endphp

                                            <form method="POST"
                                                  action="{{$route}}"
                                                  data-lead="Residential">
                                                @csrf
                                                <input type="hidden" name="rating" id="rating">
                                                <label for="review">Mensaje</label>
                                                <textarea name="review" class="mb-2" id="review" rows="2"
                                                          cols="20">@if(isset($review)){{$review->content}} @endif</textarea>
                                                <span class="help-block text-danger">{{ $errors->first('review', ':message') }}</span>
                                                <div class="nws-button text-center  gradient-bg text-uppercase">
                                                    <button type="submit"
                                                            value="Submit">Agregar opinión ahora
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            @endif


                        </div>
                    </div>
                    @if($course->bundles && (count($course->bundles) > 0))
                        <div class="course-details-category ul-li mt-5">
                            <h3 class="float-none text-dark">@lang('labels.frontend.course.available_in_bundles')</h3>
                        </div>
                        <div class="genius-post-item mb55">
                            <div class="tab-container">
                                <div id="tab1" class="tab-content-1 pt35">
                                    <div class="best-course-area best-course-v2">
                                        <div class="row">
                                            @foreach($course->bundles as $bundle)

                                                <div class="col-md-4">
                                                    <div class="best-course-pic-text relative-position">
                                                        <div class="best-course-pic relative-position"
                                                             @if($bundle->course_image != "") style="background-image: url('{{asset('storage/uploads/'.$course->course_image)}}')" @endif>

                                                            @if($bundle->trending == 1)
                                                                <div class="trend-badge-2 text-center text-uppercase">
                                                                    <i class="fas fa-bolt"></i>
                                                                    <span>@lang('labels.frontend.badges.trending')</span>
                                                                </div>
                                                            @endif
                                                            @if($bundle->free == 1)
                                                                <div class="trend-badge-3 text-center text-uppercase">
                                                                    <i class="fas fa-bolt"></i>
                                                                    <span>@lang('labels.backend.courses.fields.free')</span>
                                                                </div>
                                                            @endif

                                                            <div class="course-rate ul-li">
                                                                <ul>
                                                                    @for($i=1; $i<=(int)$bundle->rating; $i++)
                                                                        <li><i class="fas fa-star"></i></li>
                                                                    @endfor
                                                                </ul>
                                                            </div>
                                                            <div class="course-details-btn">
                                                                <a href="{{ route('bundles.show', [$bundle->slug]) }}">@lang('labels.frontend.course.bundle_detail')
                                                                    <i class="fas fa-arrow-right"></i></a>
                                                            </div>
                                                            <div class="blakish-overlay"></div>
                                                        </div>
                                                        <div class="best-course-text">
                                                            <div class="course-title mb20 headline relative-position">
                                                                <h3>
                                                                    <a href="{{ route('bundles.show', [$bundle->slug]) }}">{{$bundle->title}}</a>
                                                                </h3>
                                                            </div>
                                                            <div class="course-meta">
                                                            <span class="course-category">
            {{-- <a href="{{route('courses.category',['category'=>$bundle->category->slug])}}">{{$bundle->category->name}}</a></span> --}}
                                                                <span class="course-author"><a href="#">{{ $bundle->students()->count() }}
                                                                        @lang('labels.frontend.course.students')</a></span>
                                                                <span class="course-author mr-0">{{ $bundle->courses()->count() }}
                                                                    @if($bundle->courses()->count() > 1 )
                                                                        @lang('labels.frontend.course.courses')
                                                                    @else
                                                                        @lang('labels.frontend.course.course')
                                                                    @endif
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endforeach
                                        <!-- /course -->
                                        </div>
                                    </div>
                                </div><!-- /tab-1 -->
                            </div>
                        </div>
                    @endif
    </div>




                                        <!-- Review detailed Rating END -->
        </div>

                                    {{-- <div id="stm-lms-reviews" v-bind:class="{'loading' : loading}">
                                        <div class="stm-lms-reviews">
                                            <div class="stm-lms-reviews-single" v-for="(review, id) in reviews">
                                                <div class="stm-lms-reviews-top">
                                                    <h4>review.user </h4>
                                                    <div class="stm-lms-ago">
                                                        review.time
                                                    </div>
                                                </div>
                                                <div class="media">
                                                    <div class="media-left media-top">
                                                        <div class="testimonial-media-unit">
                                                            <img v-bind:src="review.avatar_url" width="96" height="96"
                                                                class="testimonial-media-unit-rounded" />
                                                        </div>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="star-rating">
                                                            <span
                                                                v-bind:style="{width: ((review.mark * 100) / 5) +'%'}">&nbsp;</span>
                                                        </div>
                                                        <p v-html="review.content" v-if="review.content"></p>
                                                    </div>
                                                </div>

                                            </div>

                                            <a @click="getReviews()" v-if="!total" class="btn btn-default"
                                                v-bind:class="{'loading' : loading}">
                                                <span>Show more</span>
                                            </a>
                                        </div>
                                    </div>




                                    <div id="stm_lms_add_review">
                                        Please, <a href="javascript:void(0)">login</a> to leave a review
                                    </div> --}}
    </div>
                            </div>
                            <div class="stm_lms_related_courses">
                                <h2>Cursos relacionados</h2>
                                <div class="stm_lms_courses__grid stm_lms_courses__grid_3 stm_lms_courses__grid_right  stm_lms_courses__grid_found_17"
                                    data-pages="6">

                                    @if($courses->count() > 0)

                                    @foreach($courses as $cours)

                                        <div
                                            class="stm_lms_courses__single stm_lms_courses__single_animation no-sale style_1 ">

                                            <div class="stm_lms_courses__single__inner">


                                                <div class="stm_lms_courses__single--image">




                                                    <a href="{{ route('courses.show', [$cours->slug]) }}" class="heading_font"
                                                        data-preview="Preview this course">
                                                        <div>
                                                            <div class='stm_lms_lazy_image'><img
                                                                    data-src="{{asset('storage/uploads/'.$cours->course_image)}}"
                                                                    src="{{asset('storage/uploads/'.$cours->course_image)}}"
                                                                    alt='' class="lazyload lazyload" /></div>
                                                        </div>
                                                    </a>

                                                </div>
                                                <div class="stm_lms_courses__single--inner">


                                                    <div class="stm_lms_courses__single--terms">
                                                        <div class="stm_lms_courses__single--term">
                                                            {{$cours->category->name}}  </div>
                                                    </div>

                                                    <div class="stm_lms_courses__single--title">
                                                        <a href="{{ route('courses.show', [$cours->slug]) }}">
                                                            <h5>{{$cours->title}}</h5>
                                                        </a>
                                                    </div>
                                                    <div class="stm_lms_courses__single--meta">


                                                        <div class="stm_lms_courses__hours">
                                                            <i class="stmlms-lms-clocks"></i>
                                                            <span>2 horas</span>
                                                        </div>


                                                        <div class="stm_lms_courses__single--price heading_font">
                                                            <strong>
                                                                @if($cours->free == 1)
                                                                    {{trans('labels.backend.courses.fields.free')}}
                                                                @else
                                                                    {!!  $cours->strikePrice  !!}
                                                                    {{$appCurrency['symbol'].' '.$cours->price}}
                                                                @endif
                                                            </strong>
                                                        </div>

                                                    </div>

                                                </div>



                                                <div class="stm_lms_courses__single--info">
                                                    <div class="stm_lms_courses__single--info_author">
                                                        <div class="stm_lms_courses__single--info_author__avatar">
                                                            <img alt src="{{ asset('newtheme/images/59f9b8d60fe1f-bpfull.jpg')}}"
                                                                class="avatar avatar-215 photo jetpack-lazy-image"
                                                                height="215" width="215" loading="lazy"
                                                                data-lazy-srcset="{{ asset('newtheme/images/59f9b8d60fe1f-bpfull.jpg 2x')}}"
                                                                data-lazy-src="{{ asset('newtheme/images/59f9b8d60fe1f-bpfull.jpg?is-pending-load=1')}}"><img
                                                                alt='' src="{{ asset('newtheme/images/59f9b8d60fe1f-bpfull.jpg')}}"
                                                                class='avatar avatar-215 photo' height='215' width='215'
                                                                loading='lazy' />
                                                        </div>
                                                        <div class="stm_lms_courses__single--info_author__login">
                                                            Ray Bolívar Sosa </div>
                                                    </div>

                                                    <div class="stm_lms_courses__single--info_title">
                                                        <a href="javascript:void(0)">
                                                            <h4>{{$cours->title}}</h4>
                                                        </a>
                                                    </div>

                                                    <div class="stm_lms_courses__single--info_rate">



                                                    </div>

                                                   <div class="stm_lms_courses__single--info_excerpt text">
                                                        {!! strip_tags($cours->description) !!}
                                                    </div>

                                                    <div class="stm_lms_courses__single--info_meta">


                                                        <div class="stm_lms_course__meta">
                                                            <i class="stmlms-cats"></i>
                                                            2 Lecturas
                                                        </div>

                                                        <div class="stm_lms_course__meta">
                                                            <i class="stmlms-lms-clocks"></i>
                                                            2 horas
                                                        </div>

                                                    </div>

                                                    <div class="stm_lms_courses__single--info_preview">
                                                        <a href="{{ route('courses.show', [$cours->slug]) }}" title="La teoría del iceberg"
                                                            class="heading_font">
                                                            Echar un vistazo </a>
                                                    </div>

                                                    <div class="stm_lms_courses__single--info_bottom">

                                                        <div class="stm-lms-wishlist" data-add="Add to Wishlist"
                                                            data-add-icon="far fa-heart" data-remove="Wishlisted"
                                                            data-remove-icon="fa fa-heart" data-id="52034">
                                                            <i class="far fa-heart"></i>
                                                            <span> Agregar a la lista de deseos.</span>
                                                        </div>

                                                        <div class="stm_lms_courses__single--price heading_font">
                                                            <strong>
                                                                @if($cours->free == 1)
                                                                    {{trans('labels.backend.courses.fields.free')}}
                                                                @else
                                                                    {!!  $cours->strikePrice  !!}
                                                                    {{$appCurrency['symbol'].' '.$cours->price}}
                                                                @endif
                                                            </strong>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                        </div>

                                    @endforeach

                                    @endif
                                </div>
                            </div>

                        </div>
                       
                
                        <div class="col-md-2">



                            <div class="stm-lms-course__sidebar">


                                <div class="stm-lms-wishlist" data-add="Add to Wishlist" data-add-icon="far fa-heart"
                                    data-remove="Wishlisted" data-remove-icon="fa fa-heart" data-id="5036">
                                    {{-- <i class="far fa-heart"></i> --}}
                                    {{-- <span>Add to Wishlist</span> --}}
                                </div>



                                <div
                                    class="stm-lms-buy-buttons stm-lms-buy-buttons-mixed stm-lms-buy-buttons-mixed-pro sssss dssssssssss">


                                    <div class="stm_lms_mixed_button subscription_enabled">


                                        <div class="course-side-bar-widget">

                                            @if (!$purchased_course)
                                    <h3>
                                        

                                    @if(auth()->check() && (auth()->user()->hasRole('student')) && (Cart::session(auth()->user()->id)->get( $course->id)))
                                        <button class="btn genius-btn btn-block text-center my-2 text-uppercase  btn-success text-white bold-font"
                                                type="submit">@lang('labels.frontend.course.added_to_cart')
                                        </button>

                                    @elseif(!auth()->check())
                                        @if($course->free == 1)
                                        <div style="width: 350px;display: flex;">
                                        <div id="openLoginModal" class="stm-lms-wishlist" style="width: 214px;">
                                            <i class="far fa-heart"></i>
                                            <span>Agregar a la lista de deseos.</span>
                                        </div>

                                        <div style="width: 134px;">
                                             <a style="font-size: 19px; font-weight: bold;font-family: 'Circular-Loom';color: black;" href="#" class="open"> 
    <img src="{{ asset('fonts/upload.png') }}" alt="share" width="21px" height="21px"> Compartir

            </a>
                                        </div>

                                    </div>

                                            <a id="openLoginModal"
                                               class="btn btn-default" style="margin: 0;
    display: inline-block;
    width: 264px;
                                               background-color: #2fbe5b!important; padding: 13px; font-weight: 700; color: white; text-align: center;" 
                                               data-target="#myModal" href="#">Comprar <i
                                                        class="fas fa-caret-right"></i></a>
                                        @else
                                        <div style="width: 350px; display: flex;">
                                            
                                        <div id="openLoginModal" class="stm-lms-wishlist" style="width: 214px;">
                                            <i class="far fa-heart"></i>
                                            <span>Agregar a la lista de deseos.</span>
                                        </div>

                                        <div style="width: 134px;">
                                             <a style="font-size: 19px; font-weight: bold;font-family: 'Circular-Loom';color: black;" href="#" class="open"> 
    <img src="{{ asset('fonts/upload.png') }}" alt="share" width="21px" height="21px"> Compartir

            </a>
                                        </div>

                                        </div>
                                        
                                            <a id="openLoginModal"
                                               class="btn btn-default" style="margin: 0;
    display: inline-block;
    width: 264px;background-color: #2fbe5b!important; padding: 13px; font-weight: 700; color: white; text-align: left;" 
                                               data-target="#myModal" href="#"> Comprar<span style="text-align: right; color: white;font-weight: 500; font-size: x-large; padding: 43px;" >
                                                   
                                                   @if($course->free == 1)
                                                    {{trans('labels.backend.courses.fields.free')}}
                                                    @else
                                                        {!!  $course->strikePrice  !!}
                                                        {{$appCurrency['symbol'].' '.$course->price}}
                                                    @endif
                                               </span></a>

                                            {{-- <a id="openLoginModal"
                                               class="genius-btn btn-block my-2 bg-dark text-center text-white text-uppercase "
                                               data-target="#myModal" href="#">@lang('labels.frontend.course.add_to_cart') <i
                                                        class="fa fa-shopping-bag"></i></a>

                                            <a id="openLoginModal"
                                               class="genius-btn btn-block text-white  gradient-bg text-center text-uppercase  bold-font"
                                               data-target="#myModal" href="#">@lang('labels.frontend.course.subscribe')</a> --}}

                                        @endif

                                        @elseif(auth()->check() && (auth()->user()->hasRole('student')))

                                            @if($course->free == 1)
                                                <form id="wishlist-form">
                                                @csrf
                                                    <input type="hidden" name="course" value="{{ $course->id }}">
                                                    <input type="hidden" name="price" value="{{($course->free == 1) ? 0 : $course->price}}">
                                         <div style="width: 350px; display: flex;">           

                                        <div  style="width: 214px;" onclick="wishlist()"  id="openLoginModal" class="stm-lms-wishlist" data-add="Add to Wishlist" data-add-icon="far fa-heart"
                                    data-remove="Wishlisted" data-remove-icon="fa fa-heart" data-id="5036">
                                                        <i class="far fa-heart"></i>
                                                        <span>Agregar a la lista de deseos.</span>
                                        </div>

                                        <div style="width: 134px;">
                                             <a style="font-size: 19px; font-weight: bold;font-family: 'Circular-Loom';color: black;" href="#" class="open"> 
    <img src="{{ asset('fonts/upload.png') }}" alt="share" width="21px" height="21px"> Compartir

            </a>
                                        </div>
                                            </div>


                                                </form>
                                                <form action="{{ route('cart.getnow') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="course_id" value="{{ $course->id }}"/>
                                                    <input type="hidden" name="amount" value="{{($course->free == 1) ? 0 : $course->price}}"/>
                                                    <button class="btn btn-default" style="background-color: #2fbe5b!important;text-align: center;color: white; padding:13px; font-weight: 700;" 
                                                            href="#">
                                                            Matricular 
                                                            <i class="fas fa-caret-right"></i></button>
                                                </form>

                                            @else
                                                <form id="wishlist-form">
                                                @csrf
                                                    <input type="hidden" name="course" value="{{ $course->id }}">
                                                    <input type="hidden" name="price" value="{{($course->free == 1) ? 0 : $course->price}}">
    <div style=" width: 350px;display: flex;">
    <div onclick="wishlist()" style=" width: 214px;"  id="openLoginModal" class="stm-lms-wishlist" data-add="Add to Wishlist" data-add-icon="far fa-heart"
                                    data-remove="Wishlisted" data-remove-icon="fa fa-heart" data-id="5036">
                                                        <i class="far fa-heart"></i>
                                                        <span>Agregar a la lista de deseos</span>
                                                    </div>
                                                      <div style="width: 134px;">
                                             <a style="font-size: 19px; font-weight: bold;font-family: 'Circular-Loom';color: black;" href="#" class="open"> 
    <img src="{{ asset('fonts/upload.png') }}" alt="share" width="21px" height="21px"> Compartir

            </a>
                                        </div>

    </div>
                                                </form>
                                                
                                                    
                                            @if(auth()->user()->subscription('default') && !auth()->user()->subscription('default')->ended())
                                                    <form action="{{ route('subscription.course_subscribe') }}" method="POST" >
                                                        @csrf
                                                    <input type="hidden" name="course_id" value="{{ $course->id }}"/>
                                                        <input type="hidden" name="amount" value="{{($course->free == 1) ? 0 : $course->price}}"/>    
                                                    <button type="submit"  
                                               class="btn btn-default" style="margin: 0;
    display: inline-block;
    width: 224px;background-color: #315fc9!important; padding: 13px; font-weight: 700; color: white; text-align: center;">Comenzar curso</button>
                                           </form>
                                               @else
                                               <a  id="openLoginModal"
                                               class="btn btn-default dropbtncourse" style="margin: 0;
    display: inline-block;
    width: 264px;background-color: #2fbe5b!important; padding: 13px; font-weight: 700; color: white; text-align: left;" 
                                               data-target="#myModal" href="#">Comprar<span style="text-align: right; color: white;font-weight: 500; font-size: x-large; margin: -8px; padding: 34px;" >
                                                   
                                                   @if($course->free == 1)
                                                    {{trans('labels.backend.courses.fields.free')}}
                                                    @else
                                                        {!!  $course->strikePrice  !!}
                                                        {{$appCurrency['symbol'].' '.$course->price}}
                                                    @endif <i class="fas fa-caret-down"></i>
                                               </span></a>
                                               @endif
                                                
                                    <div class="dropdown-course" style="">

                                        <div style="margin-top: -98px;margin-bottom: -88px;">
                                                <form id="asset-form" style="margin: -72px;">
                                                    
                                                    <input type="hidden" id="course_id" name="course_id" value="{{ $course->id }}"/>
                                                    <input type="hidden" id="amount" name="amount" value="{{($course->free == 1) ? 0 : $course->price}}"/>
                                                  <a href="#" id="openLoginModal"  onclick="cart()" data-target="#myModal" 
                                                  style=" margin: 93px;margin-top: -14px;margin-bottom: -22px;">
                                                  Pago único</a>
                                                  <hr/>
                                                  </form>


                                                </div>

                                                  @if(auth()->user()->subscription('default'))

                                       <div>
                                           
                                       
                                                    <form action="{{ route('subscription.course_subscribe') }}" method="POST" 
                                                    style="margin: -119px;
                                                      margin-bottom: -157px;">
                                                        @csrf
                                                        <input type="hidden" name="course_id" value="{{ $course->id }}"/>
                                                        <input type="hidden" name="amount" value="{{($course->free == 1) ? 0 : $course->price}}"/>

                            <button type="submit" class="btn btn-default" style="    background-color: transparent !important;
    color: black;
    width: 250px;
    padding: 17px;
    margin-left: -91px;">Inscríbase como miembro</button>

                                                    </form>
                                    </div>
                                                @else

                                            <div style="margin: -16%;">
                                                <a href="#" onclick="priceplan()">Disponible en plan bronce 39.99€/mes</a>
                                                  <a href="#" onclick="priceplanoro()">Disponible en plan oro 68€/mes</a>

                                             </div>     
                                    </div>
                                                @endif
                                                 
                                                 

                                                {{-- <form action="{{ route('cart.addToCart') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="course_id" value="{{ $course->id }}"/>
                                                    <input type="hidden" name="amount" value="{{($course->free == 1) ? 0 : $course->price}}"/>
                                                    <button type="submit"
                                                            class="genius-btn btn-block my-2 bg-dark text-center text-white text-uppercase ">
                                                        @lang('labels.frontend.course.add_to_cart') <i
                                                                class="fa fa-shopping-bag"></i></button>
                                                </form> --}}
                                                {{-- @if(auth()->user()->subscription('default'))
                                                <form action="{{ route('subscription.course_subscribe') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="course_id" value="{{ $course->id }}"/>
                                                    <input type="hidden" name="amount" value="{{($course->free == 1) ? 0 : $course->price}}"/>
                                                    <button type="submit"
                                                            class="genius-btn btn-block text-white  gradient-bg text-center text-uppercase  bold-font">
                                                        @lang('labels.frontend.course.subscribe')</button>
                                                </form>
                                                @else
                                                <a class="genius-btn btn-block text-white  gradient-bg text-center text-uppercase  bold-font"
                                                   href="{{ route('subscription.plans') }}">@lang('labels.frontend.course.subscribe')</a>
                                                @endif --}}
                                            @endif


                                        @else
                                            <h6 class="alert alert-danger"> @lang('labels.frontend.course.buy_note')</h6>
                                        @endif
                                        {{-- {{dd($course->id)}} --}}
                                        
                                    @else

                                        @if($continue_course)

                                         <div style="text-align: center;">
                                             <a style="font-size: 19px; font-weight: bold;font-family: 'Circular-Loom';color: black;" href="#" class="open"> 
    <img src="{{ asset('fonts/upload.png') }}" alt="share" width="21px" height="21px"> Compartir

            </a>
                                        </div> <br>

                                            <a href="{{route('lessons.show',['course_id' => $course->id,'slug'=>$continue_course->model->slug])}}"
                                               class="btn btn-default" style="background-color: #195ec8!important; padding: 13px; font-weight: 700; color: white; text-align: center;">

                                                Iniciar curso

                                                <i class="fa fa-arow-right"></i>
                                            </a>
                                        @endif
                                        

                                    @endif


                                                </div>
                                                {{-- <div class="modal fade" id="cartmodal" role="dialog">
                                                    <div class="modal-dialog">
                                                    
                                                      <!-- Modal content-->
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          
                                                          <h4 class="" style="text-align: center;">Checkout</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                          <p>Some text in the modal.</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                      </div>
                                                      
                                                    </div>
                                                  </div> --}}
                                                {{-- <div class="stm_lms_mixed_button__list">



                                                    <a class="stm_lms_mixed_button__single" href="#?level-modal=oneTime"
                                                        id="st_lms_oneTimePayment" data-target=".stm-lms-modal-checkout"
                                                        data-lms-modal="checkout" data-course-price="8.5" data-course-id="5036">
                                                        <span>One Time Payment</span>
                                                    </a>


                                                    <!--Check course available only in one plan as a category-->

                                                    <a href="#?level-modal=1"
                                                        class="btn btn-default btn-subscription btn-outline btn-save-checkpoint"
                                                        data-target=".stm-lms-modal-login" data-lms-modal="login">
                                                        <span>Available in &quot;Bronce 39.99/mes&quot; plan</span>
                                                    </a>




                                                    <a href="#?level-modal=2"
                                                        class="btn btn-default btn-subscription btn-outline btn-save-checkpoint"
                                                        data-target=".stm-lms-modal-login" data-lms-modal="login">
                                                        <span>Available in &quot;Oro 68€/mes&quot; plan</span>
                                                    </a> --}}






                                        </div>

                                    </div>



                                </div>



                                <div id="subscriptionModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-body">
                                            </div>
                                        </div>

                                    </div>
                                </div>




                                <div class="stm-lms-course-info heading_font">
                                    <div class="stm-lms-course-info__single">
                                        <div class="stm-lms-course-info__single_label">
                                            <span>Matriculados</span>:
                                            <strong>35 estudiantes </strong>
                                        </div>
                                        <div class="stm-lms-course-info__single_icon">
                                            <i class="fa-icon-stm_icon_users"></i>
                                        </div>
                                    </div>
                                    <div class="stm-lms-course-info__single">
                                        <div class="stm-lms-course-info__single_label">
                                            <span>Duración</span>:
                                            <strong>10 horas</strong>
                                        </div>
                                        <div class="stm-lms-course-info__single_icon">
                                            <i class="fa-icon-stm_icon_clock"></i>
                                        </div>
                                    </div>
                                    <div class="stm-lms-course-info__single">
                                        <div class="stm-lms-course-info__single_label">
                                            <span>Lecturas</span>:
                                            <strong>3</strong>
                                        </div>
                                        <div class="stm-lms-course-info__single_icon">
                                            <i class="fa-icon-stm_icon_bullhorn"></i>
                                        </div>
                                    </div>
                                </div>


                                <div class="stm-lms-dynamic_sidebar">
                                    <div id="stm_lms_popular_courses-3" class="widget widget_stm_lms_popular_courses">
                                        <div class='widget_title'>
                                            <h3>Cursos populares</h3>
                                        </div>
                                        <ul class="stm_product_list_widget widget_woo_stm_style_2">

                                            @if($courses->count() > 0)

                                            @foreach($courses as $cours)
                                            <li>
                                                <a href="{{ route('courses.show', [$cours->slug]) }}">
                                                    <img width="75" height="75"
                                                        src="{{asset('storage/uploads/'.$cours->course_image)}}"
                                                        class="attachment-img-75-75 size-img-75-75 wp-post-image jetpack-lazy-image"
                                                        alt="" loading="lazy"
                                                        data-lazy-srcset="{{asset('storage/uploads/'.$cours->course_image)}}"
                                                        data-lazy-sizes="(max-width: 75px) 100vw, 75px"
                                                        data-lazy-src="{{asset('storage/uploads/'.$cours->course_image)}}"
                                                        srcset="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" />
                                                    <div class="meta">
                                                        <div class="title h5">{{$cours->title}}</div>
                                                        <div class="stm_featured_product_price">
                                                            <div class="price price-free">
                                                            @if($cours->free == 1)
                                                                    {{trans('labels.backend.courses.fields.free')}}
                                                                @else
                                                                    {!!  $cours->strikePrice  !!}
                                                                    {{$appCurrency['symbol'].' '.$cours->price}}
                                                                @endif
                                                             </div>
                                                        </div>
                                                        <div class="expert">By Ray Bolívar Sosa</div>
                                                    </div>
                                                </a>
                                            </li>

                                            @endforeach
                                            @endif
                                            

                                        </ul>

                                    </div>
                                    <div class="multiseparator"></div>
                                    <div id="archives-4" class="widget widget_archive">
                                        <h4 class="widgettitle">Archivo</h4> <label class="screen-reader-text"
                                            for="archives-dropdown-4">Archivo</label>
                                        <select id="archives-dropdown-4" name="archive-dropdown">

                                            <option value="">Select Month</option>
                                            <option value='../../2020/12/index.html'> December 2020 </option>
                                            <option value='../../2020/10/index.html'> October 2020 </option>
                                            <option value='../../2020/09/index.html'> September 2020 </option>
                                            <option value='../../2020/08/index.html'> August 2020 </option>
                                            <option value='../../2020/07/index.html'> July 2020 </option>
                                            <option value='../../2020/05/index.html'> May 2020 </option>
                                            <option value='../../2020/04/index.html'> April 2020 </option>
                                            <option value='../../2020/03/index.html'> March 2020 </option>
                                            <option value='../../2020/02/index.html'> February 2020 </option>
                                            <option value='../../2020/01/index.html'> January 2020 </option>
                                            <option value='../../2019/12/index.html'> December 2019 </option>
                                            <option value='../../2019/11/index.html'> November 2019 </option>
                                            <option value='../../2019/10/index.html'> October 2019 </option>
                                            <option value='../../2019/09/index.html'> September 2019 </option>
                                            <option value='../../2019/08/index.html'> August 2019 </option>
                                            <option value='../../2019/07/index.html'> July 2019 </option>
                                            <option value='../../2019/06/index.html'> June 2019 </option>
                                            <option value='../../2019/05/index.html'> May 2019 </option>
                                            <option value='../../2019/04/index.html'> April 2019 </option>
                                            <option value='../../2019/03/index.html'> March 2019 </option>
                                            <option value='../../2018/02/index.html'> February 2018 </option>
                                            <option value='../../2017/10/index.html'> October 2017 </option>
                                            <option value='../../2008/09/index.html'> September 2008 </option>

                                        </select>

                                        <script type="text/javascript">
                                            /* <![CDATA[ */
                                            (function () {
                                                var dropdown = document.getElementById("archives-dropdown-4");
                                                function onSelectChange() {
                                                    if (dropdown.options[dropdown.selectedIndex].value !== '') {
                                                        document.location.href = this.options[this.selectedIndex].value;
                                                    }
                                                }
                                                dropdown.onchange = onSelectChange;
                                            })();
/* ]]> */
                                        </script>
                                    </div>
                                    <div class="multiseparator"></div>
                                    <div id="stm_recent_posts-4" class="widget widget_stm_recent_posts">
                                        <h4 class="widgettitle">Últimos artículos</h4>
                                        <div class="widget_media clearfix widget_media_style_1">
                                            <a href="javascript:void(0)">
                                                <img width="63" height="50"
                                                    src="../../../i1.wp.com/escuela-ray-bolivar-sosa.com/wp-content/uploads/2020/12/elmejortaller-1b3dc.jpg?resize=63%2C50&amp;ssl=1"
                                                    class="img-responsive wp-post-image jetpack-lazy-image" alt=""
                                                    loading="lazy"
                                                    data-lazy-srcset="https://i1.wp.com/escuela-ray-bolivar-sosa.com/wp-content/uploads/2020/12/elmejortaller-1.jpg?resize=480%2C380&amp;ssl=1 480w, https://i1.wp.com/escuela-ray-bolivar-sosa.com/wp-content/uploads/2020/12/elmejortaller-1.jpg?resize=63%2C50&amp;ssl=1 63w, https://i1.wp.com/escuela-ray-bolivar-sosa.com/wp-content/uploads/2020/12/elmejortaller-1.jpg?zoom=2&amp;resize=63%2C50&amp;ssl=1 126w, https://i1.wp.com/escuela-ray-bolivar-sosa.com/wp-content/uploads/2020/12/elmejortaller-1.jpg?zoom=3&amp;resize=63%2C50&amp;ssl=1 189w"
                                                    data-lazy-sizes="(max-width: 63px) 100vw, 63px"
                                                    data-lazy-src="https://i1.wp.com/escuela-ray-bolivar-sosa.com/wp-content/uploads/2020/12/elmejortaller-1.jpg?resize=63%2C50&amp;ssl=1&amp;is-pending-load=1"
                                                    srcset="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" />
                                                <span class="h6">El mejor taller gratuito de escritura creativa
                                                    online</span>
                                            </a>
                                            <div class="cats_w">
                                                <a href="../../category/consejos-a-escritores/index.html">
                                                    consejos a escritores </a><span class="comma">,</span>
                                            </div>
                                        </div>
                                        <div class="widget_media clearfix widget_media_style_1">
                                            <a href="../../el-varon-de-negro/index.html">
                                                <span class="h6">El Varón de Negro</span>
                                            </a>
                                            <div class="cats_w">
                                                <a href="javascript:void(0)">
                                                    Historias para ser contadas </a><span class="comma">,</span>
                                            </div>
                                        </div>
                                        <div class="widget_media clearfix widget_media_style_1">
                                            <a href="javascript:void(0)">
                                                <span class="h6">Entrevista a Jorge Sánchez López</span>
                                            </a>
                                            <div class="cats_w">
                                                <a href="javascript:void(0)">
                                                    consejos a escritores </a><span class="comma">,</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="multiseparator"></div>
                                    <div id="stm_lms_popular_courses-4" class="widget widget_stm_lms_popular_courses">
                                        <div class='widget_title'>
                                            <h3>Cursos populares</h3>
                                        </div>
                                        <ul class="stm_product_list_widget widget_woo_stm_style_2">

                                            @if($courses->count() > 0)

                                            @foreach($courses as $cours)
                                            <li>
                                                <a href="{{ route('courses.show', [$cours->slug]) }}">
                                                    <img width="75" height="75"
                                                        src="{{asset('storage/uploads/'.$cours->course_image)}}"
                                                        class="attachment-img-75-75 size-img-75-75 wp-post-image jetpack-lazy-image"
                                                        alt="" loading="lazy"
                                                        data-lazy-srcset="{{asset('storage/uploads/'.$cours->course_image)}}"
                                                        data-lazy-sizes="(max-width: 75px) 100vw, 75px"
                                                        data-lazy-src="{{asset('storage/uploads/'.$cours->course_image)}}"
                                                        srcset="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" />
                                                    <div class="meta">
                                                        <div class="title h5">{{$cours->title}}</div>
                                                        <div class="stm_featured_product_price">
                                                            <div class="price price-free">
                                                            @if($cours->free == 1)
                                                                    {{trans('labels.backend.courses.fields.free')}}
                                                                @else
                                                                    {!!  $cours->strikePrice  !!}
                                                                    {{$appCurrency['symbol'].' '.$cours->price}}
                                                                @endif
                                                             </div>
                                                        </div>
                                                        <div class="expert">By Ray Bolívar Sosa</div>
                                                    </div>
                                                </a>
                                            </li>

                                            @endforeach
                                            @endif
                                            

                                        </ul>

                                    </div>
                                    <div class="multiseparator"></div>
                                </div>

                            </div>
                        </div>

                    </div>

                    <div class="stm_lms_course_sticky_panel">

                        <div class="container">

                            <div class="stm_lms_course_sticky_panel__inner">

                                <div class="stm_lms_course_sticky_panel__left">


                                    <div class="stm_lms_course_sticky_panel__title heading_font">
                                        {{$course->title}} </div>


                                    <div class="stm_lms_course_sticky_panel__panel single_product_after_title">


                                        <div class="stm_lms_course_sticky_panel__category">

                                            <div class="pull-left xs-product-cats-left">
                                                <div class="meta-unit categories clearfix">
                                                    <div class="pull-left">
                                                        <i class="fa-icon-stm_icon_category secondary_color"></i>
                                                    </div>
                                                    <div class="meta_values">
                                                        <div class="label h6">Category:</div>
                                                        <div class="value h6">
                                                            <a href='#'
                                                                title='General (todos)'>
                                                                @if($course->category)
                                                            {{$course->category->name}}
                                                            @else 
                                                                General
                                                            @endif

                                                            </a>,
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>



                                        <div class="stm_lms_course_sticky_panel__teacher">

                                            <div class="pull-left stm_lms_teachers">
                                                <a href="{{url('teacher-profile')}}">
                                                    <div class="meta-unit teacher clearfix">
                                                        <div class="pull-left">
                                                            <img alt src="{{ asset('newtheme/images/59f9b8d60fe1f-bpfull6fb4.jpg')}}"
                                                                class="avatar avatar-215 photo jetpack-lazy-image"
                                                                height="215" width="215" loading="lazy"
                                                                data-lazy-srcset="https://149550655.v2.pressablecdn.com/wp-content/uploads/avatars/1/59f9b8d60fe1f-bpfull.jpg 2x"
                                                                data-lazy-src="https://149550655.v2.pressablecdn.com/wp-content/uploads/avatars/1/59f9b8d60fe1f-bpfull.jpg?is-pending-load=1"><img
                                                                alt='' src="{{ asset('newtheme/images/59f9b8d60fe1f-bpfull6fb4.jpg')}}"
                                                                class='avatar avatar-215 photo' height='215' width='215'
                                                                loading='lazy' />
                                                        </div>
                                                        <div class="meta_values">
                                                            <div class="label h6">Profesor</div>
                                                            <div class="value heading_font h6">Ray Bolívar Sosa</div>
                                                        </div>
                                                    </div>
                                                </a>

                                            </div>
                                        </div>



                                        <div class="stm_lms_course_sticky_panel__rating">
                                            <div class="average-rating-stars">
                                                <div class="average-rating-stars__top">
                                                    <div class="star-rating" title="Rated 4 out of 5">
                                                        <span style="width:80%">
                                                            <strong class="rating">4</strong>
                                                            out of 5 </span>
                                                    </div>
                                                    <div class="average-rating-stars__av heading_font">4</div>
                                                </div>

                                                <div class="average-rating-stars__reviews">
                                                    6 reviews </div>

                                            </div>

                                        </div>


                                    </div>

                                </div>

                                <div class="stm_lms_course_sticky_panel__right">


                                    <div class="stm_lms_course_sticky_panel__price">
                                        <h6>Precio:</h6>
                                        <div class="stm_lms_courses__single--price heading_font">
                                            <strong>
                                                @if($course->free == 1)
                                                    Gratis
                                                @else
                                                    {!!  $course->strikePrice  !!}
                                                    {{$appCurrency['symbol'].' '.$course->price}}
                                                @endif
                                            </strong>
                                        </div>
                                    </div>


                                    @if($continue_course)
                                    <div class="stm_lms_course_sticky_panel__button">
                                        <a href="{{route('lessons.show',['course_id' => $course->id,'slug'=>$continue_course->model->slug])}}"
                                               class="btn btn-default dropbtncourse">

                                               Continuar curso

                                                <i class="fa fa-arow-right"></i></a>
                                    </div>
                                    @else
                                    <div class="stm_lms_course_sticky_panel__button">
                                        <a href="#" class="btn btn-default">
                                            Comprar </a>
                                    </div>
                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>

        </div>
        
        
<script>
  function cart(){
    var course_id = $("#course_id").val();
    $(".cartbody").empty();
    $.ajax({
        type: "POST",
        url: "{{ url('cart/checkout') }}",
        data:$("#asset-form").serialize(),
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success:function (data) {
            $('#cartmodal').modal('show');
            var htmlData='';
            console.log(data);
                htmlData+='<div id="'+data.id+'">';
                htmlData+='<table class="table table-hover">';
                htmlData+='<thead><tr><th></th><th>Curso</th><th></th><th>Precio del curso</th></tr></thead>';
                htmlData+='<tbody><tr><td><i class="fa fa-times" onclick= "del_rec(\''+data.id+'\',\'{{url('cart/remove?course=')}}'+data.id+'\')"></i></a></td><td><img src="'+data.image+'" style="width: 120px;"></td><td><h6>'+data.title+'</h6></td><td>'+data.price+'</td></tr></tbody>';
                htmlData+='</table>';
                htmlData+='Total: $'+data.price+'';
                htmlData+='</div>';
            // htmlData+='<br>';
            //     htmlData+='<table class="table table" style="margin-top: 30px;">';
            //     htmlData+='<thead></thead>';
            //     htmlData+='<tbody><tr><td><input type="radio" id="paypal" name="paypal" value="0">Paypal</td><td></td><td></td></tr><tr><td><input type="radio" id="stripe" name="stripe" value="stripe">Stripe</td><td></td><td></td></tr></tbody>';
            //     htmlData+='</table>';
            //     htmlData+='<button type="submit" class="btn btn-default" data-dismiss="modal">Purchase</button>';
            $('.cartbody').append(htmlData);
        }
    });
  }
</script>



<script>
    function del_rec(id, route){
        $.ajax({
            url : route,

            success:function(){
                $("#"+id).hide();
            }
        })
    }
</script>
<script>
    function wishlist(){
        $.ajax({
            type: "POST",
            url: "{{ url('add-to-wishlist') }}",
            data:$("#wishlist-form").serialize(),
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

            success:function(data){
                
            }

        })
    }
</script>
<script>
    $(document).ready(function(){
      $(".dropbtncourse").click(function(){
       
        $(".dropdown-course").toggle();
        
       
      });
    });
</script>
@push('after-scripts')
    {{-- @if(config('services.stripe.active') == 1) --}}
        <script type="text/javascript" src="{{asset('js/stripe-form.js')}}"></script>
    {{-- @endif --}}
    {{-- <script>
        $(document).ready(function () {
            $(document).on('click', 'input[type="radio"]:checked', function () {
                $('#accordion .check-out-form').addClass('disabled')
                $(this).closest('.payment-method').find('.check-out-form').removeClass('disabled')
            })

            $(document).on('click', '#applyCoupon', function () {
                var coupon = $('#coupon');
                if (!coupon.val() || (coupon.val() == "")) {
                    coupon.addClass('warning');
                    $('#coupon-error').html("<small>{{trans('labels.frontend.cart.empty_input')}}</small>").removeClass('d-none')
                    setTimeout(function () {
                        $('#coupon-error').empty().addClass('d-none')
                        coupon.removeClass('warning');

                    }, 5000);
                } else {
                    $('#coupon-error').empty().addClass('d-none')
                    $.ajax({
                        method: 'POST',
                        url: "{{route('cart.applyCoupon')}}",
                        data: {
                            _token: '{{csrf_token()}}',
                            coupon: coupon.val()
                        }
                    }).done(function (response) {
                        if (response.status === 'fail') {
                            coupon.addClass('warning');
                            $('#coupon-error').removeClass('d-none').html("<small>" + response.message + "</small>");
                            setTimeout(function () {
                                $('#coupon-error').empty().addClass('d-none');
                                coupon.removeClass('warning');

                            }, 5000);
                        } else {
                            $('.purchase-list').empty().html(response.html)
                            $('#applyCoupon').removeClass('btn-dark').addClass('btn-success')
                            $('#coupon-error').empty().addClass('d-none');
                            coupon.removeClass('warning');
                        }
                    });

                }
            });


            $(document).on('click','#removeCoupon',function () {
                $.ajax({
                    method: 'POST',
                    url: "{{route('cart.removeCoupon')}}",
                    data: {
                        _token: '{{csrf_token()}}',
                    }
                }).done(function (response) {
                    $('.purchase-list').empty().html(response.html)
                });
            })

        })
    </script>

    @if(session()->get('razorpay'))
        @php
            $cart = session()->get('razorpay');
        @endphp

        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            var options = {
                "key": "{{ config('services.razrorpay.key') }}", // Enter the Key ID generated from the Dashboard
                "amount": "{{ $cart['amount'] }}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                "currency": "{{ $cart['currency'] }}",
                "name": "{{ config('app.name') }}",
                "description": "{{ $cart['description'] }}",
                "image": "{{asset("storage/logos/".config('logo_b_image'))}}",
                "order_id": "{{ $cart['order_id'] }}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                "handler": function (response){
                    $('#razorpay_payment_id').val(response.razorpay_payment_id);
                    $('#razorpay_order_id').val(response.razorpay_order_id);
                    $('#razorpay_signature').val(response.razorpay_signature)
                    $("#razorpay-callback-form").submit();
                },
                "prefill": {
                    "name": "{{ $cart['name'] }}",
                    "email": "{{ $cart['email'] }}",
                }
            };
            var rzp1 = new Razorpay(options);
            document.getElementById('razor-pay-btn').onclick = function(e){
                rzp1.open();
                e.preventDefault();
            }
            window.onload = function () {
                document.getElementById('razor-pay-btn').click();
            }
        </script>
    @endif --}}




<script type="text/javascript" src="jquery-1.3.2.min.js"></script>



<script type="text/javascript">

$(document).ready(function() {
    $("div[href]").click(function () {
        window.location = $(this).attr("href");
    });
});

</script>

  <script type="text/javascript">
  $(".open").on("click", function() {
  $(".popup-overlay, .popup-content").addClass("active");
});

//removes the "active" class to .popup and .popup-content when the "Close" button is clicked 
$(".close, .popup-overlay").on("click", function() {
  $(".popup-overlay, .popup-content").removeClass("active");
});

   
    </script>

  <script>
       function copysharelink(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
    

    }

        </script> 



<script type="text/javascript">
    function coupon(){
      var coupon = $("#coupon").val();
      $.ajax({
        type: "GET",
        data: 'coupon='+coupon,
        url: "{{url('/coupon')}}",
        success:function(data){
           if(data == ''){
            $(".couponmsg").append('<div class="alert alert-success couponmsg"><strong>Invalid Coupon!</strong></div>');
           }else{
            $(".coupon").hide();
            $(".couponmsg").empty();
            $(".couponmsg").append('<div class="alert alert-success couponmsg"><strong>Coupon Applied!</strong></div');
           }
        }
      })
    }
</script>
<script type="text/javascript">
     $(".couponmsg").empty();
</script>

<script>
   function priceplan() {
        $('#priceplan').modal('show');
        $(".memname").html('Nivel de membresía $39.99 cada mes');
        $('.discription').html('<div style=""><h2 style="">€39.99/mes</h2><br><b style=""> Precio </b> <b>€39.99 cada mes</b><br><b style="">Descripción</b></div><ol style="padding-top: 14px;"><li>Incluye acceso a todos los cursos</li><li>Incluye acceso al curso de novela y al máster</li><li>Incluye acceso a todas las píldoras</li><li>Tutorías y correcciones personalizadas por email</li><li>Acceso al taller (videoconferencia)</li></ol> ');
        @if(auth()->user())
        @if(auth()->user()->subscribed('default'))
        ($('#subscribe-form').attr('action','{{ route('subscription.update',['plan' => 2]) }}'));
        @else
        ($('#subscribe-form').attr('action','{{ route('subscription.subscribe',['plan' => 2]) }}'));
        @endif
        @endif
   }
</script>
<script>
    function priceplanoro(){
        $('#priceplan').modal('show');
        $(".memname").html('Nivel de membresía $68 cada mes');
        $('.discription').html('<div style=""><h2 style="">€68/mes</h2><br><b style=""> Precio</b> <b>€68 cada mes</b><br><br><b style="">Descripción</b></div><ol style="padding-top: 14px;"><li>Incluye acceso a todos los cursos</li><li>Incluye acceso al curso de novela y al máster</li><li>Incluye acceso a todas las píldoras</li><li>Incluye tutorías, correcciones, (llamadas)</li><li>Acceso al taller (videoconferencia)</li></ol> ');
        @if(auth()->user())
        @if(auth()->user()->subscribed('default'))
        ($('#subscribe-form').attr('action','{{ route('subscription.update',['plan' => 3]) }}'));
        @else
        ($('#subscribe-form').attr('action','{{ route('subscription.subscribe',['plan' => 3]) }}'));
        @endif
        @endif
    }
</script>


<script>
        const stripe = Stripe('{{ config('services.stripe.key')}}', {locale: "{{ str_replace('_', '-', app()->getLocale()) }}"}); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const classes = {
            base:"form-control"
        };
        /**
         * Card Element
         */
        var cardElement = elements.create("card", {
            iconStyle: "solid",
            classes:{
                base:"form-control py-2"
            }
        });
        cardElement.mount("#card");
        const cardHolderName = document.getElementById('name');
        const cardButton = document.getElementById('card-button');
        const city = document.getElementById('city');
        const state = document.getElementById('state');
        const country_code = document.getElementById('country_code');
        const zip = document.getElementById('zip');
        const address = document.getElementById('address');
        var $form = $("#subscribe-form");
        const clientSecret = cardButton.dataset.secret;
        cardButton.addEventListener('click', (e) => {
            e.preventDefault();
            if(city.value == '' || state.value == '' || zip.value == '' || address.value == '' || country_code.value == ''){
                alert('Please fill Billing Address Field');
            }else{
                $('#card-button').attr('disabled', true);
                stripe.handleCardSetup(clientSecret,cardElement,{
                    payment_method_data:{
                        billing_details: {
                            name: cardHolderName.value,
                            address:{
                                city: city.value,
                                country:country_code.value,
                                line1:address.value,
                                line2:null,
                                postal_code:zip.value,
                                state:state.value
                            }
                        }
                    }
                }).then(function (result) {
                    if (result.error) {
                        $('#card-button').attr('disabled', false);
                        // Inform the user if there was an error.
                        $('#card-errors')
                            .removeClass('d-none')
                            .find('.alert')
                            .text(result.error.message);
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.setupIntent.payment_method);
                    }
                });
            }
        });
        // Submit the form with the token ID.
        function stripeTokenHandler(paymentMethod) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('subscribe-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'paymentMethod');
            hiddenInput.setAttribute('value', paymentMethod);
            form.appendChild(hiddenInput);
            // Submit the form
            form.submit();
        }
    </script>



@endpush
@endsection


@push('after-scripts')
    <script src="https://cdn.plyr.io/3.5.3/plyr.polyfilled.js"></script>

    <script>
        const player = new Plyr('#player');

        $(document).on('change', 'input[name="stars"]', function () {
            $('#rating').val($(this).val());
        })
                @if(isset($review))
        var rating = "{{$review->rating}}";
        $('input[value="' + rating + '"]').prop("checked", true);
        $('#rating').val(rating);
        @endif
    </script>
@endpush
