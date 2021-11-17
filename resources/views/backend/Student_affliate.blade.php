@extends('backend.layouts.student_app')

@section('title', __('strings.backend.dashboard.title').' | '.app_name())

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<script src="https://cdn.jsdelivr.net/sharer.js/latest/sharer.min.js"></script>
  

@push('after-styles')

<style type="text/css">
  .popup-overlay {

  /*Hides pop-up when there is no "active" class*/
  visibility: hidden;
  position: absolute;
  background: #FEFEFE;
  border: 3px solid #666666;
  left: 40%;
  top: 25%;
  padding: 13px;

}

.popup-overlay.active {
  /*displays pop-up when "active" class is present*/
  visibility: visible;
  text-align: center;
  z-index: 1;
}

.popup-content {
  /*Hides pop-up content when there is no "active" class */
  visibility: hidden;
}

.popup-content.active {
  /*Shows pop-up content when "active" class is present */
  visibility: visible;
  margin-top: 20px;
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
  .firstRow {

    border-radius: 19px;
    margin-bottom: 3%;
    background-color: #5397f0;
  }

  .row2nd {

    margin-left: -1% !important;
  }




  .one {

    background-image: url("{{ asset('new_img/images/one.jpg') }}");

  }


  @media screen and (max-width: 425px) {
    .one {

      width: 17rem !important;

    }
  }


  @media screen and (max-width: 425px) {
    .two {

      width: 17rem !important;

    }
  }


  @media screen and (max-width: 425px) {
    .three {

      width: 17rem !important;

    }
  }




  .two {

    background-image: url("{{ asset('new_img/images/two.jpg') }}");

  }




  @media screen and (max-width: 425px) {
    .firstCard {

      height: 128rem !important;

    }
  }




  @media screen

  /*laptop*/
  and (min-device-width: 1200px) and (max-device-width: 1600px) and (-webkit-min-device-pixel-ratio: 1) {

    .col-md-3 {
      max-width: 37% !important;
    }

    .firstCard {}

    .firstRow {
      height: 17rem;
    }
  }


  .container {

    display: flex;
  }

  /* The point of this tutorial is here */
  .form {
    display: flex;
    flex-direction: row;
  }

  .search-field {
    width: 100%;
    padding: 10px 35px 10px 15px;
    border-radius: 12px;
    outline: none;
    border: none;
    background-color: #F6F6F6;
  }

  .search-button {
    background: transparent;
    border: none;
    outline: none;
    margin-left: -33px;
  }

  .search-button img {
    width: 20px;
    height: 20px;
    object-fit: cover;
  }

  .topFull {

    text-align: end;
    margin-left: 50%;
  }



  @media screen and (max-width: 425px) {
    .topFull {

      display: none;

    }

    .mobileHeader {

      text-align: end;

    }


  }

  @media screen and (min-width: 426px) {
    .mobileHeader {

      display: none;

    }


  }
</style>

<style>
  .copyLink {
    position: relative;
    display: inline-block;
  }
  
  .copyLink .copyLinktext {
    visibility: hidden;
    width: 140px;
    background-color: #555;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px;
    position: absolute;
    z-index: 1;
    bottom: 150%;
    left: 50%;
    margin-left: -75px;
    opacity: 0;
    transition: opacity 0.3s;
  }
  
  .copyLink .copyLinktext::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #555 transparent transparent transparent;
  }
  
  .copyLink:hover .copyLinktext {
    visibility: visible;
    opacity: 1;
  }
  </style>

@endpush

@section('content')

<div class="popup-overlay">
  <!--Creates the popup content-->
  <div class="popup-content">
    <h5> Comparte este enlace </h5>

    <hr>
    
    <div class="row" style="width: 100%;margin: 0;margin-top: 25px;">
      <span style="font-weight: bold;"> Redes Sociales</span>
    </div> <br>

    <div class="row" style="width: 100%;display: flex;margin: 0;">

      <div style="width: 50%; font-size: 21px;text-align: left;">
        
  <a href="#" id="share-fb" class="sharer button"><i class="fa fa-2x fa-facebook-square"></i> &nbsp;
    <span style="text-decoration: none;
    color: black !important;
    font-weight: 500;"> Facebook </span>
  </a>

      </div>
     
      <div style="width: 50%; font-size: 21px;text-align: left;">
        
  <a href="https://twitter.com/share?text={{route('signup', ['refferal_code'=>auth()->user()->refferal_code])}}" target="_blank" class="sharer button"><i class="fab fa-2x fa-twitter"></i>  &nbsp; 

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

        <a href="http://www.facebook.com/dialog/send?app_id=[app-id]" target="_blank"> <i class="fab fa-2x fa-facebook-messenger"></i>
          &nbsp; 
           <span style="text-decoration: none;
    color: black !important;
    font-weight: 500;"> Messenger </span>
        </a>



      </div>


       <div style="width: 50%; font-size: 21px;text-align: left;">

        <a href="https://api.whatsapp.com/send?text={{route('signup', ['refferal_code'=>auth()->user()->refferal_code])}}" target="_blank">

         <img src="{{ asset('fonts/whatsapp.png') }}" alt="share" width="40px" height="40px" style="border-radius: 13px;">

         &nbsp; 
           <span style="text-decoration: none;
    color: black !important;
    font-weight: 500;display: inline-block;
    margin-top: 8px;"> WhatsApp </span>

      </a>

      </div>

     
      
    </div>

    <div class="row" style="width: 100%;margin: 0;margin-top: 25px;margin-bottom: 5px;">
      <span style="font-weight: bold;"> Copia el enlace</span>

    </div> <br>

      <div class="row" style="width: 100%;margin: 0;">
      
      <p id="p2" style="border: 1px solid lightgrey;margin: 0;"> 

       <span style="margin-top: 3px;display: inline-block;"> {{route('signup', ['refferal_code'=>auth()->user()->refferal_code])}}</span>
      
      </p>
    &nbsp;
    &nbsp;
      <button style="font-size: 15px;border: 1px solid;" onclick="copysharelink('#p2')"  class="btn btn-default">Copiar</button>
      
      </div>

  

      
    
   

    <!--popup's close button-->
    <div class="row" style="justify-content: center;margin-top: 40%;margin-bottom: 2%;">

      <a href="#" class="close" style="font-size: 30px;"> Cerrar </a>
    
      
    </div>

  </div>
</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

<div class="row">


  <div class="mobileHeader">

    <div class="container">
      <div style="width: 60%;">
        <form action="{{route('admin.search-course')}}" method="post" class="form">
          @csrf
          <input type="search" placeholder="Search here.." name="q" required="true" class="search-field" />
          <button type="submit" class="search-button">
            <img src="{{ asset('new_img/images/search.png') }}">
          </button>
        </form>
      </div>

      <div style="display: flex;">

        <div style="    width: 62%;margin-right: 5%;">
          <span style="font-size: 15px; font-weight: 700"> {{ $logged_in_user->full_name }} </span>

          <div style="display: flex;">
            &nbsp;
            &nbsp;
            &nbsp;
            <div>
              <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false" style="color: black;">
                <i class="fa fa-bell-o"></i>
                <span class="badge badge-pill <?= $user->unreadNotifications->count() ? 'badge-success' : '' ?> ">
                  @if($user->unreadNotifications->count())
                  {{$user->unreadNotifications->count() }}
                  @endif
                </span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center" style="background: none;">

                  <div class="">

                    <p class="mb-0 text-center py-2" style="padding:10px; color: black;">
                      @foreach($user->unreadNotifications as $notification)
                      @if($notification->type == 'App\Notifications\SkillComplete')
                      <a style="color: black;text-decoration: none;font-weight: 600;font-family: system-ui;font-size: 15px;"
                        href="{{url('user/markread')}}/{{$notification->id}}/{{$user->id}}">{{$notification->data['skill']}}</a>
                      <br>
                      @elseif($notification->type == 'App\Notifications\Commenthistory')
                      <a style="color: black;text-decoration: none;font-weight: 600;font-family: system-ui;font-size: 15px;"
                        href="{{url('markread')}}/{{$notification->id}}/{{$user->id}}/{{$notification->data['history_id'] ?? 0}}/{{$notification->data['chapter_id'] ?? 0}}">{{$notification->data['comment']}}</a>
                      <br>
                      @elseif($notification->type == 'App\Notifications\CommentChapter')
                      <a style="color: black;text-decoration: none;font-weight: 600;font-family: system-ui;font-size: 15px;"
                        href="{{url('markread')}}/{{$notification->id}}/{{$user->id}}/{{$notification->data['history_id'] ?? 0}}/{{$notification->data['chapter_id'] ?? 0}}">{{$notification->data['comment']}}</a>
                      <br>
                      @else
                      {{''}}
                      @endif
                      @endforeach
                    </p>

                  </div>
                </div>
              </div>
            </div>

            <div class="nav-item dropdown" style="margin-left: -23%">
              <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false" style="color: black;">

                <span style="right: 0;left: inherit"
                  class="badge d-md-none d-lg-none d-none mob-notification badge-success">!</span>
                <span>
                  <i class="fas fa-chevron-down"></i>
                </span>
              </a>
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                  <strong>@lang('navs.general.account')</strong>
                </div>

                <a class="dropdown-item" href="{{route('admin.student_messages')}}">
                  <i class="fa fa-envelope"></i> @lang('navs.general.messages')
                  <span class="badge unreadMessageCounter d-none badge-success">5</span>
                </a>

                <a class="dropdown-item" href="{{ route('admin.student_account') }}">
                  <i class="fa fa-user"></i> @lang('navs.general.profile')
                </a>

                <div class="divider"></div>
                <a class="dropdown-item" href="{{ route('frontend.auth.logout') }}">
                  <i class="fas fa-lock"></i> @lang('navs.general.logout')
                </a>
              </div>
            </div>


          </div>



        </div>

        <div style="width: 70%;">
          <img src="{{ asset('/new_img/images/user2.png') }}" width="55px" height="55px" style="border-radius: 50%;">
        </div>


      </div>
    </div>



  </div>

  <div class="col">

    <div class="card-body firstCard">

      <div>

        <div class="topFull">
          <div class="container">
            <div style="width: 60%;">
              <form action="{{route('admin.search-course')}}" method="post" class="form">
                @csrf
                <input type="search" placeholder="Search here.." name="q" required="true" class="search-field" />
                <button type="submit" class="search-button">
                  <img src="{{ asset('new_img/images/search.png') }}">
                </button>
              </form>
            </div>

            <div style="display: flex;">

              <div style="    width: 62%;margin-right: 5%;">
                <span style="font-size: 15px; font-weight: 700"> {{ $logged_in_user->full_name }} </span>

                <div style="display: flex;">
                  &nbsp;
                  &nbsp;
                  &nbsp;

                  <div>
                    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                      aria-expanded="false" style="color: black;">
                      <i class="fa fa-bell-o"></i>
                      <span class="badge badge-pill <?= $user->unreadNotifications->count() ? 'badge-success' : '' ?> ">
                        @if($user->unreadNotifications->count())
                        {{$user->unreadNotifications->count() }}
                        @endif
                      </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <div class="dropdown-header text-center" style="background: none;">

                        <div class="">

                          <p class="mb-0 text-center py-2" style="padding:10px; color: black;">
                            @foreach($user->unreadNotifications as $notification)
                            @if($notification->type == 'App\Notifications\SkillComplete')
                            <a style="color: black;text-decoration: none;font-weight: 600;font-family: system-ui;font-size: 15px;"
                              href="{{url('user/markread')}}/{{$notification->id}}/{{$user->id}}">{{$notification->data['skill']}}</a>
                            <br>
                            @elseif($notification->type == 'App\Notifications\Commenthistory')
                            <a style="color: black;text-decoration: none;font-weight: 600;font-family: system-ui;font-size: 15px;"
                              href="{{url('markread')}}/{{$notification->id}}/{{$user->id}}/{{$notification->data['history_id'] ?? 0}}/{{$notification->data['chapter_id'] ?? 0}}">{{$notification->data['comment']}}</a>
                            <br>
                            @elseif($notification->type == 'App\Notifications\CommentChapter')
                            <a style="color: black;text-decoration: none;font-weight: 600;font-family: system-ui;font-size: 15px;"
                              href="{{url('markread')}}/{{$notification->id}}/{{$user->id}}/{{$notification->data['history_id'] ?? 0}}/{{$notification->data['chapter_id'] ?? 0}}">{{$notification->data['comment']}}</a>
                            <br>
                            @else
                            {{''}}
                            @endif
                            @endforeach
                          </p>

                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="nav-item dropdown" style="margin-left: -23%">
                    <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                      aria-expanded="false" style="color: black;">

                      <span style="right: 0;left: inherit"
                        class="badge d-md-none d-lg-none d-none mob-notification badge-success">!</span>
                      <span>
                        <i class="fas fa-chevron-down"></i>
                      </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                      <div class="dropdown-header text-center">
                        <strong>@lang('navs.general.account')</strong>
                      </div>

                      <a class="dropdown-item" href="{{route('admin.student_messages')}}">
                        <i class="fa fa-envelope"></i> @lang('navs.general.messages')
                        <span class="badge unreadMessageCounter d-none badge-success">5</span>
                      </a>

                      <a class="dropdown-item" href="{{ route('admin.student_account') }}">
                        <i class="fa fa-user"></i> @lang('navs.general.profile')
                      </a>

                      <div class="divider"></div>
                      <a class="dropdown-item" href="{{ route('frontend.auth.logout') }}">
                        <i class="fas fa-lock"></i> @lang('navs.general.logout')
                      </a>
                    </div>
                  </div>


                </div>



              </div>

              <div style="width: 70%;">
                <img src="{{ asset('/new_img/images/user2.png') }}" width="55px" height="55px"
                  style="border-radius: 50%;">
              </div>


            </div>
          </div>


        </div>

      </div>
         @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif
      <div class="row firstRow">


        <div class="col-2" style="padding: 3%;">
          <img src="{{ asset('/new_img/images/user2.png') }}" height="160px" width="160px">


        </div>

        <div class="col-10">
          <div class="row" style="color: white;
                font-size: 22px;
                font-family: 'Font Awesome 5 Free';
                margin-top: 4%;">

            <div style="width: 50%;">

              @auth
              {{ $logged_in_user->full_name }} <br><br>
              @endauth


              Afiliado desde <span> 12 oct, 2020 </span> 

            </div>

            <div style="width: 25%; text-align: end;">

              Ganado <br>

             ${{$total ? $total : 0}}

            </div>
          </div>

          <hr>
          <div class="row" style="color: white;
    font-size: 18px;
    font-family: 'Font Awesome 5 Free';">

            <div class="col">
              <span style="color: white;">Total de nuevos afiliados <br> conseguidos por el enlace </span> <br>
              {{count($total_affiliate) ?? 0}}
            </div>
            <div class="col">
              <span style="color: white;">Pagos realizadoss</span> <br>
              {{$paid_payment ?? 0}}
            </div>
            <div class="col">
              <span style="color: white;">Pendiente de pago</span> <br>
             {{$pending_payemnt ?? 0}}
            </div>

          </div>

        </div>







      </div>
   
      <div class="row row2nd justify-content-center">
      
        <div class="col-sm-3">
      
          <div class="card one" style="width: 23rem; border-radius: 29px;">
            <div class="card-body">
      
              <p id="p1" style="display: none;">{{route('signup', ['refferal_code'=>auth()->user()->refferal_code])}}</p>
      
              <p class="card-text" style="margin-top: 84%;
                    text-align: center;
                    font-size: 19px;
                    font-weight: 700;
                    font-family: -webkit-pictograph;">
      
                <span style="font-size: 18px;color: darkgray; font-family: sans-serif;">Enlace para compartir</span> <br>
                 {{route('signup', ['refferal_code'=>auth()->user()->refferal_code])}}
 </p>
      
             <div style="text-align: center; width: 100%;">
               
                  <button onclick="copyToClipboard('#p1')"  style="
         background-color: #F88B52;
          font-size: 23px;
          color: white;
          padding: 2%;
          border-radius: 12px;
          cursor: pointer;
        " data-toggle="tooltip" title="Haga clic para copiar">
                  
                  Copiar enlace
                </button>
             </div>
            
           

            </div>
          </div>
          <div>
            
            <a style="font-size: 24px; 
    font-weight: bold;
    font-family: 'Circular-Loom'; margin-left: 17%;" href="#" class="btn btn-default open"> 
    <img src="{{ asset('fonts/upload.png') }}" alt="share" width="21px" height="21px"> Compartir</a>

          </div>

        </div>

       <div class="col-sm-3">
        
          <div class="card two" style="width: 22rem; border-radius: 29px;">
            <div class="card-body" >
            <form action="{{route('admin.invitation')}}" method="post">
            @csrf
              <input type="text" name="email" class="form-control" style="
                      margin-top: 102%;
                      height: 10%;
                      ">
              <input type="submit" value="Invitar a amigos" style=" 
            background-color: #C561FF;
            font-size: 24px;
            border-radius: 17px;
            margin-left: 11%;
            color: white;
            padding: 2%;
            margin-top: 2%;
            width: 76%;
            cursor: pointer;
            ">
        </form>
            </div>
          </div>
        </div>

        <div class="col-sm-3">

          <div class="card three" style="width: 23rem; border-radius: 15px;">
            <div class="card-body" style="height: 29rem; overflow-y: scroll; ">
              <h5 class="card-title"> Comparte tu enlace de afiliado y gana dinero</b> </h5>
              <p class="card-text">
                <b>Comparte tu enlace de afiliado</b> con tus amigos y con todas las personas interesadas
                en aprender escritura creativa. Cuando los visitantes provenientes de tu enlace de
                afiliado compran un curso ganas dinero. El dinero se ingresa cada mes en tu cuenta
                de Paypal. <br><br>
                <b>¿POR DÓNDE EMPIEZO?</b> <br>
                Haz clic en únete al programa. Ten a mano tu email de Paypal porque el sistema te lo
                pedirá. Una vez que lo hayas hecho estarás listo para recibir tus pagos. <br><br>

                <b>¿CUÁNTO GANARÉ?</b> <br>
                Ganarás el 75% de lo que un nuevo alumno gaste en su primera compra. Ej. Si un
                alumno gasta 39.99€ ganarás 30€. Si gasta 68€ ganarás 51€. *Solo por el primer
                pago. <br><br>

                <b>¿CUÁNDO ME PAGARÁN?</b> <br>
                Entre el día 30 y el día 2 del mes siguiente recibirás tus ingresos en Paypal. *Recuerda
                que el primer paso es escribir tu email para que podamos hacer los pagos. <br><br>

                <b>¿CÓMO PUEDO EXPLOTAR AL MÁXIMO EL PROGRAMA?</b> <br>

                Puedes utilizar varias técnicas para tener un mejor impacto entre tus seguidores. A
                continuación, explicamos dos muy efectivas, escribe un artículo y ofrece un cupón
                descuento. <br><br>

                <b>CONSIGUE MÁS DINERO</b><br>
                Compartir tu enlace en las redes o por Whats App entre tus amigos puede funcionar,
                pero ¿qué pasa si utilizas técnicas más estratégicas? <br><br>

                <b>OPCIONES MÁS BENEFICIOSAS</b> <br>

                1. Crea un artículo en tu blog explicando las ventajas de la escuela. No olvides
                mencionar el taller de escritura. Sesiona gratis los 3 primeros martes de cada
                mes. <br>
                2. Ofrece un descuento con este cupón. Haz clic aquí para generar tu cupón. <br>

              </p>

            </div>
          </div>
        </div>


      </div>


      <script>
       function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
    

    }

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


        <script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
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

<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function(event) { 

// Uses sharer.js 
//  https://ellisonleao.github.io/sharer.js/#twitter  
   var url = window.location.href;
   var title = document.title;
   var subject = "Read this good article";
   var via = "yourTwitterUsername";
   //console.log( url );
   //console.log( title );

//facebook
$('#share-wa').attr('data-url', url).attr('data-title', title).attr('data-sharer', 'whatsapp');
//facebook
$('#share-fb').attr('data-url', url).attr('data-sharer', 'facebook');


//Prevent basic click behavior
$( ".sharer button" ).click(function() {
  event.preventDefault();
});
  
  
// only show whatsapp on mobile devices  
var isMobile = false; //initiate as false
// device detection
if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
    isMobile = true;
}

if ( isMobile == true ) {
$("#share-wa").hide();
}

  
  
  
  


});
</script>


    </div>
  </div>
</div>
@endsection