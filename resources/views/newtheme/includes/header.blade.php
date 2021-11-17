<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


<style>

.NewsideHeader {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 999 !important;
  top: 0px;
  right: 0;
  background-color: #F0F4FA !important;
  overflow-x: hidden;
  transition: 0.5s;

}




.closeheader {
    border: 1px solid black;
    margin-left: 18px;
    text-align: center;
    padding: 1%;
    border-radius: 54px;
    height: 55px;
    font-size: 27px;
    width: 56px;
}


@media screen and (max-height: 450px) {
  .NewsideHeader {padding-top: 15px;}
  .NewsideHeader a {font-size: 18px;}
}

.listNewButton1 {

       margin-top: 5%;
    font-size: 24px;
    font-weight: bold;
    color: #77CAF5 !important;
}

.progressBar {
        display: flex;
    margin-left: 3%;
    font-size: 19px;
    font-weight: bold;
    color: #77CAF5 !important;
    width: 88%;
}

.listNewButton {

  
    font-size: 17px;
  
}




</style>



<style type="text/css">
    
.nav-pills .nav-link.active, .nav-pills .show > .nav-link{
background-color: #17A2B8;
}
.dropdown-menu{
top: 65px;
right: 0px;
left: unset;
<<<<<<< HEAD
width: 36% !important;
=======
width: 25% !important;
>>>>>>> 01c8e8b33f7e541cac16bd5284d6f96fd11d0959
box-shadow: 0px 5px 7px -1px #c1c1c1;
padding-bottom: 0px;
padding: 0px;
}

@media screen                                           
  and (min-device-width: 1200px) 
  and (max-device-width: 1600px) 
  and (-webkit-min-device-pixel-ratio: 1) { 

.dropdown-menu {
width: 48% !important;

}

}


.dropdown-menu:before{
content: "";
position: absolute;
top: -20px;
right: 12px;
border:10px solid #343A40;
border-color: transparent transparent #343A40 transparent;
}
.head{
padding:5px 15px;
border-radius: 3px 3px 0px 0px;
}
.footer{
padding:5px 15px;
border-radius: 0px 0px 3px 3px;
}
.notification-box{
padding: 10px 0px;
}
.bg-gray{
background-color: #eee;
}
@media (max-width: 640px) {
.dropdown-menu{
width: 262px;
}
.nav{
display: block;
}
.nav .nav-item,.nav .nav-item a{
padding-left: 0px;
}
.message{
font-size: 13px;
}
}
</style>


<style>
    .dropbtn{
        padding: 15px 30px;
        background-color: #f0f4fa;
        border: 1px solid #f0f4fa;
        font-size: 14px;
        border-radius: 23px;
        outline: 0!important;
        transition: .3s ease;
        min-width: 186px;
    }
    .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f0f4fa;
          margin-top: 0px;
            margin-left: 1px;
            text-align: left;
          min-width: 186px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }
    .dropdown-content a {
          color: black;
          padding: 12px 16px;
          font-weight: 300;
          text-decoration: none;
          display: block;
        }
    .dropdown-content a:hover
     {
        background-color: #195ec8; 
    }

    .dropdown:hover .dropbtn {
      background-color: #f0f4fa;
      border-radius: 2px
    }




</style>

<style type="text/css">
    
    @media screen and (max-width: 755px) {


 .stm_header_top_search.sbc {
    padding: 2% !important;
    
}

.stm_header_top_toggler.mbc {

padding: 2% !important;

}
.stm_header_top_toggler.mbc {

text-align: center;

}



}
</style>
<style type="text/css">


.zoom-img {

background-image: url("{{ asset('/assets/img/Card.png') }}");

</style>

<div id="header" class="transparent_header_off" data-color="">




            <div class="header_default header_2">
                <div class="header_top_bar header_2_top_bar">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="header_2_top_bar__inner">
                                    <div class="stm_lms_wpml_switcher">

                                        <div class="pull-left">
                                            <ul class="top_bar_info clearfix">
                                                <li class="hidden-info" style="font-weight: normal;">English</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="top_bar_right_part">

                                        <div class="stm_menu_toggler" data-text="Menu"></div>
                                        <div class="header_main_menu_wrapper clearfix" style="margin-top:5px;">

                                            <div class="pull-right hidden-xs right_buttons">


                                                <div class="stm_lms_wishlist_button not-logged-in">
                                                    <a href="wishlist/index.html" data-text="Favorites">
                                                        <i class="far fa-bookmark mtc_h"></i>
                                                    </a>
                                                </div>
                                                <div class="search-toggler-unit">
                                                    <div class="search-toggler" data-toggle="modal"
                                                        data-target="#searchModal"><i class="fa fa-search"></i>
                                                    </div>
                                                </div>

                                                <div class="pull-right">
                                                    <div class="header_top_bar_socs">
                                                        <ul class="clearfix">
                                                            <li><a href='javascript:void(0)'><i
                                                                        class='fab fa-facebook'></i></a></li>
                                                            <li><a href='javascript:void(0)'><i
                                                                        class='fab fa-twitter'></i></a></li>
                                                            <li><a href='javascript:void(0)'><i
                                                                        class='fab fa-instagram'></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="collapse navbar-collapse pull-right">
                                                <ul class="header-menu clearfix">
                                                    <li id="menu-item-53357"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-53357">
                                                        <a href="#">Eventos</a>
                                                        <ul class="sub-menu">
                                                            <li id="menu-item-52774"
                                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52774">
                                                                <a
                                                                    href="#">Página
                                                                    de Ayuda</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li id="menu-item-958"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-958">
                                                        <a href="{{url('/courses')}}">Cursos</a>
                                                        <ul class="sub-menu">
                                                            <li id="menu-item-52777"
                                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-52777">
                                         <a href="{{ route('courses.show', ['slug' => 'test-de-competencia-comunicativa-para-escritores']) }}">Test
                                                                    (empieza por aquí)</a>
                                                            </li>
                                                            <li id="menu-item-52782"
                                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52782">
                                                                <a href="{{ route('Taller_gratuito') }}" target="_blank">Taller
                                                                    gratuito de escritura</a>
                                                            </li>
                                                            <li id="menu-item-52546"
                                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-52546">
                                                                <a href="{{ url('/teacher-profile') }}">Profesor</a>
                                                            </li>
                                                        </ul>
                                                    </li>
    <li id="menu-item-52184" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-52184">
                                        <a href="{{url('subscription/price_plans')}}">Planes y Precios</a>


                                                        <ul class="sub-menu">
                                                            <li id="menu-item-52432"
                                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-52432">
                                                                <a href="#">Servicios</a>
                                                                <ul class="sub-menu">
                                                                    <li id="menu-item-52430"
                                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52430">
                                                                        <a href="{{ route('publicar_libro') }}" target="_blank">Publicar
                                                                            libro en Amazon</a>
                                                                    </li>
                                                                    <li id="menu-item-52429"
                                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52429">
                                                                        <a
                                                                            href="{{ route('correction') }}" target="_blank">Corrección
                                                                            de libros</a>
                                                                    </li>
                                                                    <li id="menu-item-52431"
                                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52431">
                                                                        <a
                                                                            href="#">Asesoría
                                                                            Literaria</a>
                                                                    </li>
                                                                    <li id="menu-item-52428"
                                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52428">
                                                                        <a
                                                                            href="#">Diseño
                                                                            de páginas web para autores y escritores</a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                            <li id="menu-item-52433"
                                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52433">
                                                                <a
                                                                    href="{{ route('subscription.price_plans') }}">Accede
                                                                    a todos los cursos por 39.99€/mes</a>
                                                            </li>
                                                            <li id="menu-item-53355"
                                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-53355">
                                                                <a href="#">Asesoría (Programar)</a>
                                                            </li>
                                                        </ul>
                                                    </li>
       



                                                    <li id="menu-item-960"
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-960">
                                                        <a href="{{url('/contacto')}}">Contacto</a>
                                                    </li>

     @if(auth()->user())

        <li style="height: 43px;margin-bottom: 0px;">
                                              
                                    <nav class="navbar navbar-collapse pull-right" style="margin: -6%;">


<div class="collapse navbar-collapse" id="navbarSupportedContent" style="display: unset !important;">

<ul class="nav nav-pills mr-auto justify-content-end">


<li class="nav-item dropdown">
<a style="font-size: 20px;" class="nav-link text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i style="color: blue;" class="fas fa-th"></i>
</a>

<ul class="dropdown-menu" style="width: 308px !important;">

<li class="head text-light bg-dark">
<div class="row">
<div class="col-sm-2">
    <div style="text-align: right">Crear</div>
    </div>

</div>
</li>


<li class="notification-box">
    <div class="row">

    <div class="col-sm-2" style="text-align: center;">

    <div style="margin-left: 3px;background-color: lightgray;border-radius: 10px;font-size: 17px;">
        <i class="fas fa-book-open"></i>
    </div>

    </div>
    <div class="col-sm-4" style="font-weight: bold"><a href="{{url('history')}}"> Historia </a></div>
</div>


</li>

<li class="notification-box">
    <div class="row">
<div class="col-sm-2" style="text-align: center;">
<div style="margin-left: 3px;background-color: lightgray;border-radius: 10px;font-size: 17px;">
    <i class="fas fa-edit"></i>
</div>  
</div>
<div class="col-sm-4" style="font-weight: bold">

<a href="{{url('history/create')}}">Escena</a>

</div>
</div>


</li>


</ul>

</li>
</ul>
</div>
</nav>
                                
                     </li>

                     @endif
                                                </ul>
                                            </div>

                                        </div>
                                        <div class="pull-right">
                                            <div class="header_top_bar_socs">
                                                <ul class="clearfix">
                                                    <li><a href='javascript:void(0)'><i class='fab fa-facebook'></i></a>
                                                    </li>
                                                    <li><a href='javascript:void(0)'><i class='fab fa-twitter'></i></a>
                                                    </li>
                                                    <li><a href='javascript:void(0)'><i
                                                                class='fab fa-instagram'></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="header_top">

                                <div class="logo-unit">
                                    <a href="{{url('/')}}">
                                        <img class="img-responsive logo_transparent_static visible"
                                            src="{{ asset('newtheme/images/Copy-of-Ray-6.png')}}" style="width: 253px;"
                                            alt="Escuela de Escritura Creativa" />
                                    </a>
                                </div>


                                <div class="center-unit">
                                    <div class="stm_courses_search">
                                        <div class="stm_lms_categories">
                                            <i class="stmlms-hamburger"></i>
                                            <span class="heading_font">Categorías</span>

                                            <div class="stm_lms_categories_dropdown">

                                                <div class="stm_lms_categories_dropdown__parents">
                                                    <div class="stm_lms_categories_dropdown__parent">



<style>

.men-u{
    
    background-color: #fff;
    margin: auto;
    transition: 1s;
    padding: 0;
}
.men-u li{
    list-style: none;
    text-transform: uppercase;
}
.men-u li a{
    display: block;
    text-decoration: none;
    padding: 9px 15px;
    transition: 0.5s;
    
}
.men-u li a:hover{
    background-color: rgba(0, 0, 255, 0.753);
    color: #fff;
}
.sub-mnu{
    position: absolute;
    left: 100%;
    top: 0%;
    background-color: white;
    display: none;
    opacity: 0;
}

.sub-here{
    position: relative;
    transition: 1s;
    margin:  0;
}
.sub-here:hover .sub-mnu{
    opacity: 1;
    display: block;
}

.sub-sub-mnu{
    background-color: #fff;
    position: absolute;
    top: 0;
    left: 100%;
    display: none;
    opacity: 0;
}
.sublink1:hover~.sublink1,.sublink2:hover~.sublink2,.sublink3:hover~.sublink3{
    opacity: 1;
    display: block;
}
.sub-sub-mnu:hover{
    opacity: 1;
    display: block;
}



</style>

                                                         <ul class="men-u">
                                                            <li class="sub-here"> <a href="#">General</a>
                                                                <div class="sub-mnu">
                                                                    <a class="sublink1" href="#">Inicial</a>
                                                                        <div class="sub-sub-mnu sublink1">
                                                                    @foreach($initial_course_level as $initialCourse)
                                                                            <a href="{{ route('courses.show', [$initialCourse->slug]) }}">
                                                                            {{$initialCourse->title}}</a>
                                                                    @endforeach
                                                                           
                                                                            
                                                                        </div>

                                                                    <a class="sublink2" href="#">Intermedio</a>
                                                                      <div class="sub-sub-mnu sublink2">
                                                                     @foreach($Intermedio_course_level as $Intermedio)
                                                                            
                                                                            <a href="{{ route('courses.show', [$Intermedio->slug]) }}">
                                                                                {{$Intermedio->title}}</a>
                                                                    @endforeach
                                                                           
                                                                            
                                                                        </div>

                                                                    <a class="sublink3" href="#">Avanzado</a>
                                                                     @foreach($Avanzado_course_level as $Avanzado)
                                                                      <div class="sub-sub-mnu sublink3">
                                                                            <a href="#">{{$Avanzado->title}}</a>
                                                                            <a href="#"></a>
                                                                            <a href="#"></a>
                                                                            <a href="#"></a>
                                                                           
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </li>
                                                        </ul>

                                                        @if($categories->count() > 0)

                                                                        @foreach($categories as $category)
                                                                        <a href="{{route('courses.category',['category'=>$category->slug])}}" class="sbc_h">
                                                                            {{$category->name}}
                                                                        </a>
                                                        @endforeach
                                                        @endif


                                                    </div>

                                                </div>

                                            </div>

                                        </div>


                                        <script>
                                            var stm_lms_search_value = '';
                                        </script>

                                        <div class="stm_lms_courses_search vue_is_disabled" id="stm_lms_courses_search"
                                            v-bind:class="{'is_vue_loaded' : vue_loaded}">
                                            <form action="{{route('search-course')}}" method="get">
                                                <input type="hidden" name="category">
                                                <a>

                                                    <button type="submit" class="stm_lms_courses_search__button sbc" style="width: 7%; height: fit-content;">
                                                        <i class="lnr lnr-magnifier"></i>
                                                    </button>
                                                </a>
                                                <autocomplete name="q" placeholder="Buscar curso"
                                                     param="search" anchor="value"
                                                    label="label" :on-select="searchCourse" :on-input="searching"
                                                    :debounce="1000" model="search">
                                                </autocomplete>
                                            </form>
                                        </div>

                                    </div>

                                </div>

                                <div class="right-unit">

                                    {{-- <a href="#" class="stm_lms_log_in" data-text="Login"
                                        data-target=".stm-lms-modal-login" data-lms-modal="login">--}}

                                                       @if(auth()->check())
                                            @if(Auth()->user()->hasRole('student'))
                                                <div class="dropdown">
                                                    <button class="dropbtn" onclick="show()" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="lnr lnr-user" style="color: #385bce;"></i>
                                                        <span class="login_name">Hola, {{auth()->user()->first_name}}...</span>
                                                        <span class="caret"></span>
                                                    </button>
                                                        <div class="dropdown-content">
                                                          <a class="a" href="{{url('/user/student_dashboard')}}">Cuenta</a>
                                                          {{-- <a href="#">Link 2</a> --}}
                                                          <a class="b" href="{{ route('frontend.auth.logout') }}">Cerrar sesión</a>
                                                          </div>
                                                    
                                                </div>

                                            @else
                                            
                                                {{-- <a href="{{ route('admin.dashboard') }}">@lang('navs.frontend.dashboard')</a>


                                                <a href="{{ route('frontend.auth.logout') }}"><i class="fas fa-sign-out-alt"></i></a> --}}
                                                <div class="dropdown">
                                                    <button class="dropbtn" onclick="show()" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="lnr lnr-user" style="color: #385bce;"></i>
                                                        <span class="login_name">Hola, {{auth()->user()->first_name}}...</span>
                                                        <span class="caret"></span>
                                                    </button>
                                                        <div class="dropdown-content">
                                                          <a class="a" href="{{url('user/dashboard')}}">Cuenta</a>
                                                          {{-- <a href="#">Link 2</a> --}}
                                                          <a class="b" href="{{ route('frontend.auth.logout') }}">Cerrar sesión</a>
                                                          </div>
                                                    
                                                </div>
                                            
                                            @endif
                                            @else

                                                <div class="log-in mt-0">
                                                    <i class="stmlms-user" style="color: #195ec8 ; margin-right: -13px;"></i>
                                                        <a id="openLoginModal" data-target="#myModal"
                                                       href="#" style="color: #337ab7; font-size: 13px; font-weight: normal;">Entrar</a>
                                                    {{--@include('frontend.layouts.modals.loginModal')--}}

                                                </div>
                                        <a href="{{url('/signup')}}" class="btn btn-default" data-text="Sign in">
                                        <span style="color: white; font-weight: normal;">Crear cuenta</span>
                                    </a>
                                        @endif

                                    {{-- </a> --}} 

                        <div class=" float-right ul-li">
                                <ul>
                                    <li>
                                        @if(!auth()->check())
                                        <a id="openLoginModal" style="color: blue; font-size: 27px; cursor: pointer;"><i class="lnr lnr-heart "></i>
                                            @endif
                                            @if(auth()->check())
                                                <a id="openLoginModal" style="color: blue; font-size: 27px" href="{{url('user/wishlist')}}"><i class="lnr lnr-heart "></i>
                                            @endif
                                        </a>
                                    </li>
                                </ul>
                            </div>

                           <div style="font-size: 23px;margin: 0px;">
                                 @if(auth()->check())

           
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color: black;">
              <i class="fa fa-bell-o" style="color: blue;">
              @if(auth()->user()->unreadNotifications->count())
               <span class="badge badge-pill <?= auth()->user()->unreadNotifications->count() ? 'badge-success' : '' ?> ">
                    {{auth()->user()->unreadNotifications->count() }}
                </span>
                    @endif
            </i>
           

                    <!-- @if(auth()->user()->unreadNotifications->count())
               <span class="badge badge-light <?= auth()->user()->unreadNotifications->count() ? 'badge-success' : '' ?> ">
                    {{auth()->user()->unreadNotifications->count() }}
                </span>
                    @endif -->
            </a>

            <div class="dropdown-menu dropdown-menu-right" style="padding: 10px;">
                <div class="dropdown-header text-center" style="background: none;padding: 14px;">
                 

            
            <div class="dropdown-menu dropdown-menu-right" style=" top: 25px !important;">
                <div class="dropdown-header text-center" style="background: none;">
                
                


                <div class="unreadMessages">
                
                    @foreach(auth()->user()->unreadNotifications as $notification)

                       @if($notification->type == 'App\Notifications\SkillComplete') 

               
                        <i class="far fa-comment-alt" style="font-size: 19px;margin-right: 18px;"></i>
                        <a style="color: black;text-decoration: none;font-family: system-ui;font-size: 17px;" href="{{url('user/markread')}}/{{$notification->id}}/{{auth()->user()->id}}">
                         {{$notification->data['skill']}} 

                       <ul>
                           <li>
                       
                        <a style="color: black;text-decoration: none;font-weight: 600;font-family: system-ui;font-size: 15px;" href="{{url('user/markread')}}/{{$notification->id}}/{{auth()->user()->id}}">
                        &nbsp; {{$notification->data['skill']}} 

                        </a>


                        <br>


                       @elseif($notification->type == 'App\Notifications\Commenthistory')

                       <i class="far fa-comment-alt" style="font-size: 19px;margin-right: 18px;"></i>
                       <a style="color: black;text-decoration: none;font-family: system-ui;font-size: 17px;" href="{{url('markread')}}/{{$notification->id}}/{{auth()->user()->id}}/{{$notification->data['history_id'] ?? 0}}/{{$notification->data['chapter_id'] ?? 0}}">
                        {{$notification->data['comment']}} 
                        <br>
                        </a>
                        


                       @elseif($notification->type == 'App\Notifications\CommentChapter')
                    
                    <i class="far fa-comment-alt" style="font-size: 19px;margin-right: 18px;"></i>
                    
                       <a style="color: black;text-decoration: none;font-family: system-ui;font-size: 17px;" href="{{url('markread')}}/{{$notification->id}}/{{auth()->user()->id}}/{{$notification->data['history_id'] ?? 0}}/{{$notification->data['chapter_id'] ?? 0}}">
                        {{$notification->data['comment']}} 
                        </a>
                        <br>

                       @elseif($notification->type == 'App\Notifications\ExtraAssignment')
                
                    <i class="far fa-comment-alt" style="font-size: 19px;margin-right: 18px;"></i> 
                       <a style="font-size: 17px;cursor: pointer;color: black;" onclick="openheader()">
                         {{$notification->data['comment']}} 
                       <br> 
                       </a>
                          

                            </li>
                        </ul> 
                        
                        <div class="notification">
                            <i class="far fa-comment-alt"></i>
                            <span style="font-size: 15px;cursor: pointer;color: black;font-weight: 500;" onclick="openheader()">{{$notification->data['skill']}} </span>
                        </div>

                       @elseif($notification->type == 'App\Notifications\Commenthistory')
                       <div class="notification">
                            <i class="far fa-comment-alt"></i>
                            <span style="font-size: 15px;cursor: pointer;color: black;font-weight: 500;" onclick="openheader()">{{$notification->data['comment']}}</span>
                        </div>
                       


                       @elseif($notification->type == 'App\Notifications\CommentChapter')
                       <div class="notification">
                            <i class="far fa-comment-alt"></i>
                            <span style="font-size: 15px;cursor: pointer;color: black;font-weight: 500;" onclick="openheader()">{{$notification->data['comment']}}</span>
                        </div>
                       
                       @elseif($notification->type == 'App\Notifications\ExtraAssignment')
                       <div class="notification">
                            <i class="far fa-comment-alt"></i>
                            <span style="font-size: 15px;cursor: pointer;color: black;font-weight: 500;" onclick="openheader()">{{$notification->data['comment']}}</span>
                        </div>
                        
>>>>>>> 01c8e8b33f7e541cac16bd5284d6f96fd11d0959
                       @else
                       {{''}}
           
                       @endif
                      
                       @endforeach

                        @if(auth()->user()->unreadNotifications->count() == 0)
<<<<<<< HEAD
                        <i class="far fa-comment-alt" style="font-size: 17px;margin-right: 18px;"></i>
                       <span style="font-size: 17px;cursor: pointer;color: black;" onclick="openheader()">
                       Tarea extra de la profesora
                        </span>
=======
                       <!-- <span style="font-size: 15px;cursor: pointer;color: black;font-weight: 500;" onclick="openheader()">Tarea extra de la profesora</span> -->
                       <div class="notification">
                            <i class="far fa-comment-alt"></i>
                            <span style="font-size: 15px;cursor: pointer;color: black;font-weight: 500;" onclick="openheader()">Tarea extra de la profesora</span>
                        </div>
>>>>>>> 01c8e8b33f7e541cac16bd5284d6f96fd11d0959
                       @endif

                       
            

                </div>
                 </div>
            </div>
                            @endif

                            </div>

                            <!-- question mark new side nav -->

                            <div id="newheader" class="NewsideHeader">

                                <!-- <div class="row" style="margin: 2%;">
                                    <div class="closeheader">
                                        <a href="javascript:void(0)" onclick="closeheader()">&times;</a>
                                        
                                    </div>
                                    
                                </div> -->
                            
                            <div style="margin-top: 0%;margin-left: 10px;">
                           <!-- STart SIde bar Notification -->
                           <!-- <div class="row" style="margin: 2%;"> -->
                                    <!-- <div class="closeheader">
                                        <a href="javascript:void(0)" onclick="closeheader()">&times;</a>
                                        
                                    </div> -->
                                    
                                <!-- </div> -->
                           @if(auth()->check())
                            <div class="noti-body">    
                                    <!-- free zoom class notification -->
                                        <div class="zoom-noti">

                                       
                                         <!-- title -->
                                        <div class="row zoom-noti-title">
                                            <p> Notificaciones</p>
                                            <!-- <a href="#"><i class="fas fa-times"></i></a> -->
                                            <!-- <div class="closeheader"> -->
                                        <a href="javascript:void(0)" onclick="closeheader()"><i class="fas fa-times"></i></a>
                                        
                                    <!-- </div> -->
                                        </div>

                                        <div class="zoom-img">
                                            <p>free zoom clases</p>
                                            <p>every tuesday 8:00</p>
                                            <a href="#"><button class="zoom-btn">Join Now</button></a>
                                        </div>

                                        <!-- pending section -->
                                        <div class="row pending">
                                            <i class="far fa-calendar-alt"></i>
                                            <p>Tareas pendientes</p>
                                        </div>
                                        @if(auth()->user())
                                        @isset($ExtraAssignment)
                                        @foreach($ExtraAssignment as $key => $Extra)
                                        @foreach($Extra->users as $user)
                                        
                                        @if(auth()->user()->id === $user->id)
                                       
                                            <!-- tasks -->
                                            <div class="task">
                                                
                                                 <p>{{$key+1}}. {{$Extra->title}}</p>
                                               
                                                <a href="#"><i class="fas fa-times"></i></a>
                                                
                                            </div>
                                            <div class="task-bar">
                <div class="row justify-content-between p-0 mb-2">
                    <span>Progress</span>
                    <span class="pull-right">36%</span>
                </div>
                <div class="progress progress-striped active">
                    <div class="progress-bar" role="progressbar" style="width: 36%;"></div>
                </div>
            </div>
                                            <!-- <div class="span4 ml-4 mr-4">
                                                progress <span class="pull-right">75%</span>
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar" role="progressbar" style="width: 75%;"></div>
                                                </div>
                                            </div> -->
                                            <div class="col-lg-12 pull-right">
                                                <button class="course-btn pull-right"><a href="{{url('submit_assignment')}}/{{$Extra->id}}/{{$noti_id[$key]}}/{{auth()->user()->id}}">Continue</a></button>
                                            </div>
                                            @endif    
                                        @endforeach
                                        @endforeach
                                        @endisset
                                        @endif
                                        <!-- <div class="task">
                                              
                                                 <p>2. Task Details</p>
                                               
                                                <a href="#"><i class="fas fa-times"></i></a>
                                                
                                            </div>
                                            <div class="span4 ml-4 mr-4">
                                                progress <span class="pull-right">75%</span>
                                                <div class="progress progress-striped active">
                                                    <div class="progress-bar" role="progressbar" style="width: 75%;"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 pull-right">
                                                <button class="course-btn pull-right"><a href="#">Continue</a></button>
                                            </div> -->
                                    <!-- --------------------------------progressbar2 here--------------------------------------- -->

                                    <!-- this is courses -->
                                    <div class="row pending">
                                        <i class="fas fa-book-open"></i>
                                        <p>Cursos</p>
                                    </div>
                                    @if($courses && $courses->count() > 0)
                                        @foreach($courses as $key => $ls)
                                        @isset($ls->students)                    
                                        @foreach($ls->students as $user)
                                        
                                        @if(auth()->user()->id === $user->id)
                                            <div class="task">
                                                <p class="w-50">{{$key+1}}. {{$ls->title}}</p>
                                                <div class="progress w-25">
                                                 <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">80%</div>
                                                </div>
                                                <button class="course-btn h-25"><a href="{{url('/course')}}/{{$purchased_cours->slug ?? ''}}">Continue</a></button>
                                            </div>
                                            @endif
                                        @endforeach 
                                        @endisset
                                        @endforeach
                                        @endif
                                     <!-- this is courses -->
            
                                        
                                            <!-- this is course 1 -->
                                            <!-- <div class="task row align-items-center">
                                                <p>1. Learn English</p>
                                                <div class="progress w-25 mt-3">
                                                    <div class="progress-bar" role="progressbar" style="width: 29%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">29%</div>
                                                </div>
                                                <button class="course-btn"><a href="#">Continue</a></button>
                                            </div>
                                         -->
                                            <!-- this is course 2 -->
                                            <!-- <div class="task row align-items-center">
                                                <p>2. Course Name</p>
                                                <div class="progress w-25 mt-3">
                                                    <div class="progress-bar" role="progressbar" style="width: 29%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">29%</div>
                                                </div>
                                                <button class="course-btn"><a href="#">Continue</a></button>
                                            </div> -->

                                    </div>

                                </div>
                            
                            @endif
                           
                        <!-- Ends Side bar Notification -->
                            </div>
                                    </div>
                        <!-- till here -->

                            <div class="stm_lms_settings_button" style="margin: 0px;">
                                @if(auth()->check())
                               
                                @if(Auth()->user()->hasRole('student'))
                                <a href="{{url('user/student_account')}}">
                                    <i class="lnr lnr-cog" style="color:blue; font-size:28px"></i>
                                </a>
                                @else 
                                 <a href="{{url('user/account')}}">
                                    <i class="lnr lnr-cog" style="color:blue; font-size:28px"></i>
                                </a>

                                @endif

                                @endif
                               
                            </div>
          
                                </div>

                                <div class="stm_header_top_search sbc" >
                                    <i class="lnr lnr-magnifier" style=""></i>
                                </div>

                                <div class="stm_header_top_toggler mbc">
                                    <i class="lnr lnr-user"></i>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>




                <div class="stm_lms_account_popup">
                    <div class="stm_lms_account_popup__close">
                        <i class="lnr lnr-cross"></i>
                    </div>
                    <div class="inner">
               

                        <div class="stm_lms_account_popup__list heading_font">

                            <a class="stm_lms_account_popup__list_single" href="{{url('/courses')}}">
                                Cursos </a>


                            <a class="stm_lms_account_popup__list_single has_number" href="wishlist/index.html">
                                Favoritos <span>0</span>
                            </a>

                            @if(auth()->check())
                                            @if(Auth()->user()->hasRole('student'))
                                                <div class="dropdown">
                                                    <button style="background-color: white;
    border-radius: 0px;
    width: 100% !important;
    text-align: inherit;
    font-size: 22px;
    font-weight: 600;" class="dropbtn" onclick="show()" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="lnr lnr-user" style="color: #385bce;"></i>
                                                        <span class="login_name">Hola, {{auth()->user()->first_name}}...</span>
                                                        <span class="caret"></span>
                                                    </button>
                                                        <div class="dropdown-content">
                                                          <a class="a" href="{{url('/user/student_dashboard')}}">Account</a>
                                                          {{-- <a href="#">Link 2</a> --}}
                                                          <a class="b" href="{{ route('frontend.auth.logout') }}">Logout</a>
                                                          </div>
                                                    
                                                </div>

                                            @else
                                            
                                                {{-- <a href="{{ route('admin.dashboard') }}">@lang('navs.frontend.dashboard')</a>


                                                <a href="{{ route('frontend.auth.logout') }}"><i class="fas fa-sign-out-alt"></i></a> --}}
                                                <div class="dropdown">
                                                    <button style="    background-color: white;
    border-radius: 0px;
    width: 100% !important;
    text-align: inherit;
    font-size: 22px;
    font-weight: 600;" class="dropbtn" onclick="show()" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="lnr lnr-user" style="color: #385bce;"></i>
                                                        <span class="login_name">Hola, {{auth()->user()->first_name}}...</span>
                                                        <span class="caret"></span>
                                                    </button>
                                                        <div class="dropdown-content">
                                                          <a class="a" href="{{url('user/dashboard')}}">Account</a>
                                                          {{-- <a href="#">Link 2</a> --}}
                                                          <a class="b" href="{{ route('frontend.auth.logout') }}">Logout</a>
                                                          </div>
                                                    
                                                </div>
                                            
                                            @endif
                                            @else
                                                    <div style="display: flex;    margin-top: -4%;
    font-size: 16px;">
                                                <div class="log-in mt-0" style="margin-right: -2%;
    margin-top: 10% !important;
    font-size: 23px;
    font-weight: bold;
    margin-left: 9%;">
                                                    <i class="fas fa-user-circle" style="color: blue; font-size: 30px;"></i>
                                                <a id="openLoginModal" data-target="#myModal" href="#" style="font-size: 19px;
    color: black; margin-left: -8%;">Entrar/ </a>
                                          

                                                </div>
                                                <div style="margin-top: 11%;
    font-weight: 700;
    font-size: 21px;">
                                    <a href="{{url('/signup')}}" data-text="Sign in">
                                        <span>Crear cuenta</span>
                                    </a>
                                    </div>
                                    </div>
                                        @endif






                        </div>
                    </div>
                </div>
                <div class="stm_lms_search_popup">
                    <div class="stm_lms_search_popup__close">
                        <i class="lnr lnr-cross"></i>
                    </div>
                    <div class="inner">
                        <h2>Buscar</h2>
                        <div class="header_top">
                            <div class="stm_courses_search">
                                <div class="stm_lms_categories">
                                    <i class="stmlms-hamburger"></i>
                                    <span class="heading_font"> Categorías </span>

                                    <div class="stm_lms_categories_dropdown">

                                        <div class="stm_lms_categories_dropdown__parents">
                                            <div class="stm_lms_categories_dropdown__parent">
                                                <a href="course/categorias/index.html" class="sbc_h">
                                                    Categorías </a>
                                                <div class="stm_lms_categories_dropdown__childs">
                                                    <div class="stm_lms_categories_dropdown__child">
                                                        <a href="course/inicial/index.html">
                                                            1º Nivel (Inicial) </a>
                                                    </div>
                                                    <div class="stm_lms_categories_dropdown__child">
                                                        <a href="course/intermedio/index.html">
                                                            2º Nivel (Intermedio) </a>
                                                    </div>
                                                    <div class="stm_lms_categories_dropdown__child">
                                                        <a href="course/avanzado/index.html">
                                                            3º Nivel (Avanzado) </a>
                                                    </div>
                                                    <div class="stm_lms_categories_dropdown__child">
                                                        <a href="course/cursos-gratuitos/index.html">
                                                            Cursos gratuitos </a>
                                                    </div>
                                                    <div class="stm_lms_categories_dropdown__child">
                                                        <a href="course/marketing/index.html">
                                                            Marketing </a>
                                                    </div>
                                                    <div class="stm_lms_categories_dropdown__child">
                                                        <a href="course/publicar-en-amazon/index.html">
                                                            Publicar en Amazon </a>
                                                    </div>
                                                    <div class="stm_lms_categories_dropdown__child">
                                                        <a href="course/tecnica-narrativa/index.html">
                                                            Técnica Narrativa </a>
                                                    </div>
                                                    <div class="stm_lms_categories_dropdown__child">
                                                        <a href="course/test-de-escritura/index.html">
                                                            Test de escritura </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="stm_lms_categories_dropdown__parent">
                                                <a href="course/escribe-una-novela/index.html" class="sbc_h">
                                                    Escribe una Novela </a>
                                                <div class="stm_lms_categories_dropdown__childs">
                                                    <div class="stm_lms_categories_dropdown__child">
                                                        <a href="{{route('courses.show',['slug'=> 'como-escribir-una-novela-en-6-meses'])}}">
                                                            Cómo escribir una novela en 6 meses </a>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="stm_lms_categories_dropdown__parent">
                                                <a href="course/general-todos/index.html" class="sbc_h">
                                                    General (todos) </a>
                                            </div> --}}
                                            <div class="stm_lms_categories_dropdown__parent">
                                                <a href="course/master/index.html" class="sbc_h">
                                                    Máster </a>
                                                <div class="stm_lms_categories_dropdown__childs">
                                                    <div class="stm_lms_categories_dropdown__child">
                                                        <a
                                                            href="course/1osemestre-master-desarrolla-y-potencia-tu-talento/index.html">
                                                            1ºsemestre master Desarrolla y potencia tu talento </a>
                                                    </div>
                                                    <div class="stm_lms_categories_dropdown__child">
                                                        <a
                                                            href="course/2o-semestre-master-crea-y-consolida-un-estilo-unico/index.html">
                                                            2º Semestre máster Crea y consolida un estilo único </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="stm_lms_categories_dropdown__parent">
                                                 @if($pildora_categories)
                                                <a href="{{route('courses.category',['category'=>$pildora_categories->slug])}}" class="sbc_h">
                                                    Píldoras </a>
                                                     @endif
                                                <div class="stm_lms_categories_dropdown__childs">

                                                   @if($pildora_categories)

                                                    @foreach($pildora_categories->courses as $pildora)
                                                    <div class="stm_lms_categories_dropdown__child">
                                                        <a href="{{route('courses.show',['slug'=>$pildora->slug])}}">

                                                            {{$pildora->title}} </a>
                                                    </div>
                                                    @endforeach

                                                   @endif
                                                    
                                                </div>

                                            </div>
                                            <div class="stm_lms_categories_dropdown__parent">
                                                <a href="course/taller-literario-online/index.html" class="sbc_h">
                                                    Taller literario online </a>
                                            </div>
                                        </div>

                                    </div>

                                </div>


                                <script>
                                    var stm_lms_search_value = '';
                                </script>

                                <div class="stm_lms_courses_search vue_is_disabled" id="stm_lms_courses_search"
                                    v-bind:class="{'is_vue_loaded' : vue_loaded}">

                                    <a v-bind:href="'https://escuela-ray-bolivar-sosa.com/courses/?search=' + url"
                                        class="stm_lms_courses_search__button sbc">
                                        <i class="lnr lnr-magnifier"></i>
                                    </a>
                                    <autocomplete name="search" placeholder="Buscar curso"
                                        url="wp-json/stm-lms/v1/courses.json" param="search" anchor="value"
                                        label="label" :on-select="searchCourse" :on-input="searching"
                                        :on-ajax-loaded="loaded" :debounce="1000" model="search">
                                    </autocomplete>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="stm_lms_menu_popup">
                    <div class="stm_lms_menu_popup__close">
                        <i class="lnr lnr-cross"></i>
                    </div>
                    <div class="inner">
                        <h2>Menu</h2>

                        <div class="stm_menu_toggler" data-text="Menu"></div>
                        <div class="header_main_menu_wrapper clearfix" style="margin-top:5px;">

                            <div class="pull-right hidden-xs right_buttons">


                                <div class="stm_lms_wishlist_button not-logged-in">
                                    <a href="wishlist/index.html" data-text="Favorites">
                                        <i class="far fa-bookmark mtc_h"></i>
                                    </a>
                                </div>
                                <div class="search-toggler-unit">
                                    <div class="search-toggler" data-toggle="modal" data-target="#searchModal"><i
                                            class="fa fa-search"></i>
                                    </div>
                                </div>

                                <div class="pull-right">
                                    <div class="header_top_bar_socs">
                                        <ul class="clearfix">
                                            <li><a href='javascript:void(0)'><i class='fab fa-facebook'></i></a>
                                            </li>
                                            <li><a href='javascript:void(0)'><i class='fab fa-twitter'></i></a>
                                            </li>
                                            <li><a href='javascript:void(0)'><i class='fab fa-instagram'></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="collapse navbar-collapse pull-right">
                                <ul class="header-menu clearfix">
                                    <li
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-53357">
                                        <a href="#">Eventos</a>
                                        <ul class="sub-menu">
                                            <li
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52774">
                                                <a href="#">
                                                    Página de Ayuda</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-958">
                                        <a href="{{url('/courses')}}">Cursos</a>
                                        <ul class="sub-menu">
                                            <li
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-52777">
                                                <a href="{{ route('courses.show', ['slug' => 'test-de-competencia-comunicativa-para-escritores']) }}">Test (empieza por
                                                    aquí)</a>
                                            </li>
                                            <li
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52782">
                                                <a href="{{ route('Taller_gratuito') }}" target="_blank">Taller gratuito
                                                    de escritura</a>
                                            </li>
                                            <li
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-52546">
                                                <a href="{{ url('/teacher-profile') }}">Profesor</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-52184">
                                        <a href="{{url('subscription/price_plans')}}">Planes y
                                            Precios</a>
                                        <ul class="sub-menu">
                                            <li
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-52432">
                                                <a href="#">Servicios</a>
                                                <ul class="sub-menu">
                                                    <li
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52430">
                                                        <a href="#">Publicar libro en
                                                            Amazon</a>
                                                    </li>
                                                    <li
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52429">
                                                        <a href="#">Corrección
                                                            de libros</a>
                                                    </li>
                                                    <li
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52431">
                                                        <a href="#">Asesoría
                                                            Literaria</a>
                                                    </li>
                                                    <li
                                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52428">
                                                        <a
                                                            href="#">Diseño
                                                            de páginas web para autores y escritores</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li
                                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-52433">
                                                <a href="{{ route('subscription.price_plans') }}">Accede
                                                    a todos los cursos por 39.99€/mes</a>
                                            </li>
                                            <li
                                                class="menu-item menu-item-type-custom menu-item-object-custom menu-item-53355">
                                                <a href="calendario/index.html">Asesoría (Programar)</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-960">
                                        <a href="{{url('/contacto')}}">Contacto</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
        $(document).ready(function(){
          $(".dropbtn").click(function(){
           
            $(".dropdown-content").toggle();
            $(".dropbtn").css({"border-radius": "2px"});
           
          });
        });
        </script>

             <script>
function openheader() {
  document.getElementById("newheader").style.width = "460px";
}

function closeheader() {
  document.getElementById("newheader").style.width = "0";
}
</script>