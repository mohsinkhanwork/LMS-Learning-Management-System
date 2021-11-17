@extends('backend.layouts.student_app')

@section('title', __('strings.backend.dashboard.title').' | '.app_name())

@push('after-styles')
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
    

.firstBox {

background-image: url("{{ asset('new_img/images/1stBoxx.jpg') }}");
color: white;
border-radius: 20px;
padding: 4%;
font-family: auto;
font-size: 30px;
background-size: cover;
}

.upgradebutton {

    border-radius: 20px;
    background-color: #7FB6FF;
    padding: 1%;
    font-size: 18px;
    font-family: 'Circular-Loom';
    display: inline-block;
    width: 233px;
    height: 57px;
    text-align: center;
    margin-bottom: 4%;
    color: white;
    text-decoration: none;

}


.schedulenow {

    border-radius: 20px;
    background-color: #7FB6FF;
    padding: 3%;
    font-size: 18px;
    font-family: 'Circular-Loom';
    display: inline-block;
    width: 233px;
    height: 57px;
    text-align: center;
    color: white !important;

}


@media screen and (max-width: 425px) {
.firstColumnbook {

width: 168%;
    margin-left: 9% !important;;

    
    }

.firstBox {

width: 187%;

    
    }

}


.rightside1 {

background-image: url("{{ asset('new_img/images/courseRight.jpg') }}");
font-size: 25px;
    font-weight: 700;
    font-family: 'Font Awesome 5 Free';
    border-radius: 22px;
    background-size: cover;
    padding: 4%;
}

.rightside2 {

background-image: url("{{ asset('new_img/images/rightNewLang.jpg') }}");

text-align: right;
    padding: 36%;
    background-size: cover;
    border-radius: 19px;
    margin-top: 2%;
    margin-bottom: 3%;
}
.right3rd {

background-image: url("{{ asset('new_img/images/right3rd.jpg') }}");
display: flex;
    text-align: center;
padding: 6%;
    border-radius: 21px;
        background-size: cover;
}


@media screen                                           
  and (min-device-width: 1200px) 
  and (max-device-width: 1600px) 
  and (-webkit-min-device-pixel-ratio: 1) { 

.upgradebutton {
    width: 46% !important;

}

}

@media screen                                           
  and (min-device-width: 1200px) 
  and (max-device-width: 1495px) 
  and (-webkit-min-device-pixel-ratio: 1) { 

.schedulenow {

    width: 150px;
    height: 48px;
    padding: 3%;
  

}

}



@media screen                                           
  and (min-device-width: 768px) 
  and (max-device-width: 1200px) 
  and (-webkit-min-device-pixel-ratio: 1) { 

.upgradebutton {
  
      width: 59% !important;

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
}



@media screen and (max-width: 425px) {
.topFull {

display: none;
    
    }

.mobileHeader {

text-align: end;
    
}


}

@media screen and (max-width: 425px) {


.imagediv {
width: 20px;

}

.schedulenow {

width: 133px;

}

}





@media screen and (min-width: 426px) {
.mobileHeader {

display: none;
    
    }


}




</style>

@endpush

@section('content')
<script type='text/javascript' src='https://js.stripe.com/v3/?ver=5.7.2' id='stripe.js-js'></script>
    {{-- <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
     --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


<div class="mobileHeader">
    
 <div class="container">
    <div style="width: 60%;">

      <form action="{{route('admin.search-course')}}" method="post">@csrf

        <input type="search" placeholder="¿Qué estás buscando? " name="q" required="true" class="search-field" />
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
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color: black;">
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
    <a style="color: black;text-decoration: none;font-weight: 600;font-family: system-ui;font-size: 15px;" href="{{url('user/markread')}}/{{$notification->id}}/{{$user->id}}">{{$notification->data['skill']}}</a>
                        <br>
                       @elseif($notification->type == 'App\Notifications\Commenthistory')
                       <a style="color: black;text-decoration: none;font-weight: 600;font-family: system-ui;font-size: 15px;" href="{{url('markread')}}/{{$notification->id}}/{{$user->id}}/{{$notification->data['history_id'] ?? 0}}/{{$notification->data['chapter_id'] ?? 0}}">{{$notification->data['comment']}}</a>
                        <br>
                       @elseif($notification->type == 'App\Notifications\CommentChapter')
                       <a style="color: black;text-decoration: none;font-weight: 600;font-family: system-ui;font-size: 15px;" href="{{url('markread')}}/{{$notification->id}}/{{$user->id}}/{{$notification->data['history_id'] ?? 0}}/{{$notification->data['chapter_id'] ?? 0}}">{{$notification->data['comment']}}</a>
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
          <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color: black;">
           
              <span style="right: 0;left: inherit" class="badge d-md-none d-lg-none d-none mob-notification badge-success">!</span>
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

<div class="modal fade" id="SubModal" role="dialog">
                        <div class="modal-dialog modal-lg">
                        
                         
                          <div class="modal-content" style="
                    
                        margin: auto;
                       
                        border: 1px solid #000;
                        padding: 5px;
                      ">
            <div class="modal-body" style="margin: 5px; margin-bottom: 9px;">

                <button type="button" class="close" data-dismiss="modal">&times;</button>



                    
                            <div class="row">


                                <div class="col-md-6 planname"  style="background-color: blue; padding: 26px; font-size: 17px; color: white;">
                                    
                                </div>

                                <div class="col-md-6"  style="background-color: blue; padding: 20px; font-size: 17px; color: white;">
                                    Payment Information
        
            <img src="{{asset('assets/img/banner/p-1.jpg')}}"
                 alt="">
                                </div>  
                                </div>  
                              

            </div>
             <div class="modal-body" style="margin: 5px; margin-bottom: 9px;">

                <div style="">
                @if(auth()->user())
                <form
                                {{-- @if(auth()->user()->subscribed('default'))
                                action=""
                                @else
                                action=""
                                @endif --}}
                                action=""
                                method="post" id="subscribe-form">
                                @csrf
                                <div class="row">
                                <div class="col-md-5 discription" style="bottom: 29px;">
                                    

                                    
                                </div>
                                <div class="col-md-7">   
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name" data-tid="name_label">@lang('labels.subscription.form.name')</label>
                                        <input id="name" data-tid="name_placeholder" class="input form-control required" type="text"
                                               value="{{ auth()->user()->name }}" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email" data-tid="email_label">@lang('labels.subscription.form.email')</label>
                                        <input id="email" data-tid="email_placeholder" class="input form-control required" type="text"
                                               placeholder="@lang('labels.subscription.form.email')"
                                               value="{{ auth()->user()->email }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group" data-locale-reversible>
                                    {{-- <label for="address" data-tid="address_label">@lang('labels.subscription.form.address')</label> --}}
                                    <input type="hidden" id="address" name="address" data-tid="address_placeholder" value="abc" 
                                           class="input form-control required" type="text" placeholder="@lang('labels.subscription.form.address')" required=""
                                           autocomplete="address-line1">
                                </div>
                                <div class="form-row" data-locale-reversible>
                                    <div class="form-group col-md-3">
                                        {{-- <label for="city" data-tid="city_label">@lang('labels.subscription.form.city')</label> --}}
                                        <input type="hidden" value="city" id="city" name="city" data-tid="city_placeholder" class="input form-control required"
                                               type="text" placeholder="@lang('labels.subscription.form.city')" required=""
                                               autocomplete="address-level2">
                                    </div>
                                    <div class="form-group col-md-3">
                                        {{-- <label for="state" data-tid="state_label">@lang('labels.subscription.form.state')</label> --}}
                                        <input type="hidden" value="state" id="state" name="state" data-tid="state_placeholder"
                                               class="input form-control required" type="text" placeholder="@lang('labels.subscription.form.state')" required=""
                                               autocomplete="address-level1">
                                    </div>
                                    <div class="form-group col-md-3">
                                        {{-- <label for="country_code" data-tid="country_code_label">@lang('labels.subscription.form.country_code')</label> --}}
                                        <input type="hidden" value="US" id="country_code" name="country" data-tid="country_code_label"
                                               class="input empty form-control required text-uppercase" type="text" placeholder="@lang('labels.subscription.form.country_code')"                                                      required=""  autocomplete="country">
                                    </div>
                                    <div class="form-group col-md-3">
                                        {{-- <label for="zip" data-tid="postal_code_label">@lang('labels.subscription.form.zip')</label> --}}
                                        <input type="hidden" value="111" id="zip" name="postal_code" data-tid="postal_code_placeholder"
                                               class="input empty form-control required" type="text" placeholder="@lang('labels.subscription.form.zip')"                                                      required=""  autocomplete="postal-code">
                                    </div>

                                </div> 
                                <div class="form-group">
                                    <div class="field">
                                        <label for="card" data-tid="card_label" style="margin-left: 14px;">@lang('labels.subscription.form.card')</label>
                                        <div id="card" class="input" style="margin-left: 14px;"></div>
                                    </div>
                                    <div class="field" style="margin-top: 4%;">
                                        <div class="coupon">
                                        <label for="card" data-tid="card_label" style="margin-left: 14px;">Aplicar el cupón</label><br>
                                        <input type="text" id="coupon" class="input" name="coupon" style="margin-left: 14px;"> <br>
                                        <a class="btn btn-success" 
                                        style="
                                        margin-left: 14px;
                                        margin-top: 2%;
                                        font-size: 17px;
                                        color: white;
                                        font-weight: 500;"

                                         onclick="coupon()"> Aplicar descuento</a>
                                    </div>
                                            <div class="couponmsg" style="margin-top:13px; width:139px!important; margin-left: 10px;">
                                            
                                            </div>  
                                    </div>
                                    
                                </div>
                                </div>
                                </div>
                                {{-- <div class="row mt-3">
                                    <div class="col-12 form-group d-none" id="card-errors">
                                        <div class="alert-danger alert">
                                            @lang('labels.frontend.cart.stripe_error_message')
                                        </div>
                                    </div>
                                </div> --}}
                                <div  role="alert"></div>

                                <div style="text-align: -webkit-right;">
                                    
                                <button type="submit"
                                        class="btn btn-primary text-white genius-btn mt25 gradient-bg text-center text-uppercase  bold-font"
                                        data-tid="pay_button" style="
                                       border-radius: 38px;
                                    background-color: blue;
                                    font-size: 20px;
                                    font-weight: 500;
                                    width: 150px;
                                    " id="card-button"
                                        data-secret="{{ auth()->user()->createSetupIntent()->client_secret }}">
                                       Pagar

                                </button>
                                </div>


                            </form>

                            @else
                            <div class="container" style="padding-right: 344px;">
                                <div class="alert alert-danger">
                                    <strong>You are not login!</strong> <a href="{{url('/signup')}}">Click here to login.</a>
                                  </div>
                            </div>
                            @endif
                </div>
              
                            
            </div>

                            <div class="modal-footer">


                            </div>
                          </div>
                          
                        </div>
    </div>




            <div class="row">
                      
                        <div class="col-md-8">

    <div class="firstBox">
       
       <div class="inFirstBox">

        Aprende mucho más rápido, <br> accede a todos los cursos <br> por 39.99€/mes
       <br>

       <p style="color: rgb(205,203,246); font-size: 17px;"> Consigue un tutor especializado <br> y funda un estilo único.  </p>
           
       </div>

       <a class="upgradebutton" href="#" onclick="priceplan()" >
        <div style="margin-top: 6px;"> Comprar </div>
        </a>

    </div>

     <div class="firstColumnbook" style=" margin-left: 4%;">

    <div class="row" style="font-size: 27px;font-weight: bold;font-family: auto;margin: 2%;">
        <div style="width: 48%;text-align: left;">Próximas clases</div> 
    </div>




@foreach($live_lessons as $live_lesson )
@isset($live_lesson->lesson->title)
<div class="row" style=" border: 1px solid darkgray;border-radius: 19px; margin-bottom: 2%; display: flex; width: 100%;padding: 1%;">

<div class="col-md-2 col-12"> 

  <span style="font-size: 17px;font-family: 'Font Awesome 5 Free';font-weight: 600;">{{ $live_lesson->start_at->format('d-m-Y') }} </span>

</div>

<div class="col-md-7 col-12">

  <div class="row" style="margin-bottom: 1%;">
 <span style="font-size: 17px;font-family: 'Font Awesome 5 Free';font-weight: 600; ">TOPIC :{{$live_lesson->topic}}  </span>
  </div>

  <div class="row">
    <span style="">Discritpion :{{$live_lesson->description}}</span>
  </div>

</div>

<div class="col-md-2 col-12">
  <div style="">
  <a href="{{$live_lesson->join_url}}"  class="btn btn-success btn-block mb-1" target="_blank" style="    
  background-color: white;
    color: #08B8E4;
    border:  1px solid #08B8E4;
    border-radius: 35px;
    "> 

  Start Class </a>
</div>
</div>


 


    
</div>
 @endisset
@endforeach






</div>
    

    </div>

    <div class="col-md-4">


<div class="topFull">
 <div class="container">
    <div style="width: 60%;">
      <form action="{{route('admin.search-course')}}" method="post" class="form">
        @csrf
        <input type="search" placeholder="¿Qué estás buscando? " name="q" required="true" class="search-field" />
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
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color: black;">
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
                        <a style="color: black;text-decoration: none;font-weight: 600;font-family: system-ui;font-size: 15px;" href="{{url('user/markread')}}/{{$notification->id}}/{{$user->id}}">{{$notification->data['skill']}}</a>
                        <br>
                       @elseif($notification->type == 'App\Notifications\Commenthistory')
                       <a style="color: black;text-decoration: none;font-weight: 600;font-family: system-ui;font-size: 15px;" href="{{url('markread')}}/{{$notification->id}}/{{$user->id}}/{{$notification->data['history_id'] ?? 0}}/{{$notification->data['chapter_id'] ?? 0}}">{{$notification->data['comment']}}</a>
                        <br>
                       @elseif($notification->type == 'App\Notifications\CommentChapter')
                       <a style="color: black;text-decoration: none;font-weight: 600;font-family: system-ui;font-size: 15px;" href="{{url('markread')}}/{{$notification->id}}/{{$user->id}}/{{$notification->data['history_id'] ?? 0}}/{{$notification->data['chapter_id'] ?? 0}}">{{$notification->data['comment']}}</a>
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
          <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color: black;">
           
              <span style="right: 0;left: inherit" class="badge d-md-none d-lg-none d-none mob-notification badge-success">!</span>
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


 <div class="rightside1">

  <div style="margin-bottom: 159px;">
    Taller de escritura <br> 
    creativa Cada martes <br> 
    a las 8 p. m
  </div>


</div>




 <div class="rightside2">

</div>

@if(auth()->user()->referrer_email == NULL)
<a data-toggle="modal" data-target="#refemailModal" >
 <div class="right3rd" style="cursor: pointer;">
 <div class="right3rdText" style="font-size: 22px;
    font-weight: 700;
    color: #F7884F;
    width: 50%;
    text-align: center;margin-left: 27%; text-decoration: none;"> Invita a tus <br> amigos </div>
 <div style="width: 50%;
    text-align: end;"><i class="fas fa-arrow-right"></i></div>
    </div>
    </a>
@else
<a href="{{route('admin.Student_affliate')}}" style="text-decoration:none">
 <div class="right3rd">
 <div class="right3rdText" style="font-size: 22px;
    font-weight: 700;
    color: #F7884F;
    width: 50%;
    text-align: center;margin-left: 27%;"> Invita a tus <br> amigos </div>
 <div style="width: 50%;
    text-align: end;"><i class="fas fa-arrow-right"></i></div>
    </div>
    </a>
@endif

                    </div>

</div>
            <!--card-body-->
        <!--card-->
    <!--col-->
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


    
  <script type="text/javascript">
            (function() {
            var t   = document.createElement( 'script' );
            t.type  = 'text/javascript';
            t.async = true;
            t.id    = 'gauges-tracker';
            t.setAttribute( 'data-site-id', '602d86b975255309624592ba' );
            t.src = '../../secure.gaug.es/track.js';
            var s = document.getElementsByTagName( 'script' )[0];
            s.parentNode.insertBefore( t, s );
            })();
        </script> 
<script type="text/javascript">
            function priceplan(){
                $("#SubModal").modal('show');
                $(".card-errors").hide();
                $('.planname').html('Nivel de  Membresía <b> €39.99 cada mes</b>');
                $('.discription').html('<div style="padding-left: 14px;"><h2 style="font-weight: 700;">€39.99/mes</h2><br><b style="font-weight: 200">Precio</b> <b>€39.99 cada mes</b><br><br><b style="font-weight:200">Descripción</b></div><ol style="padding-top: 14px;"><li>Incluye acceso a todos los cursos</li><li>Incluye acceso al curso de novela y al máster</li><li>Incluye acceso a todas las píldoras</li><li>Tutorías y correcciones personalizadas por email</li><li>Acceso al taller (videoconferencia)</li></ol> ');
                @if(auth()->user())
                @if(auth()->user()->subscribed('default'))
                ($('#subscribe-form').attr('action','{{ route('subscription.update',['plan' => 2]) }}'));
                @else
                ($('#subscribe-form').attr('action','{{ route('subscription.subscribe',['plan' => 2]) }}'));
                @endif
                @endif
            }
        </script>
 <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

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
            if(city.value == '' || state.value == '' || address.value == '' || country_code.value == ''){
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


@endsection
