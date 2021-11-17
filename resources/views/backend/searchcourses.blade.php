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

       /* .progress {
            background-color: #b6b9bb;
            height: 2em;
            font-weight: bold;
            font-size: 0.8rem;
            text-align: center;
        }*/

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


    
.firstmid {

 background-color: #A763F9;
 margin: 1%;
 border-radius: 20px;

}




.mid2nd {

background-image: url("{{ asset('new_img/images/mid2nd.jpg') }}");
background-size: cover;
    border-radius: 20px;
    margin: 1px;
    margin-top: 3%;
    box-shadow: 3px 0px 13px 2px darkgrey;
    padding: 2%;

}

@media screen and (max-width: 428px) {
.mid2nd {

    width: 188%;
    margin-left: -19% !important;
    
    } 
}
@media screen and (max-width: 428px) {
.cards {

    width: 232%;
    margin-left: -25% !important;
    
    } 
}




.rightnewCourses {

background-image: url("{{ asset('new_img/images/newCourses.jpg') }}");
    border-radius: 22px;
    background-size: cover;
    margin-bottom: 2%;

}



.rightside1 {

background-image: url("{{ asset('new_img/images/rightSide.jpg') }}");
font-size: 25px;
    font-weight: 700;
    font-family: 'Font Awesome 5 Free';
    padding: 23%;
    border-radius: 22px;
    background-size: cover;
}

.rightside2 {

background-image: url("{{ asset('new_img/images/rightside2.jpg') }}");

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






@media screen and (max-width: 425px) {
.right3rdText {

margin-left: 47% !important;

    
    } 
}

@media screen and (max-width: 425px) {
.midright {

margin-left: 36% !important;

    
    } 
}



@media screen                               /*laptop*/
  and (min-device-width: 1200px) 
  and (max-device-width: 1600px) 
  and (-webkit-min-device-pixel-ratio: 1) { 

.lastcard {
    width: 17rem;
    height: 23rem;
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

@media screen and (min-width: 426px) {
.mobileHeader {

display: none;
    
    }


}

.schedulenow {

    border-radius: 20px;
    background-color: #7FB6FF;
    padding: 1%;
    font-size: 18px;
    font-family: 'Circular-Loom';
    display: inline-block;
    width: 233px;
    height: 57px;
    text-align: center;
    color: white !important;

}



@media screen and (max-width: 425px) {


.imagediv {
width: 20px;

}

.schedulenow {

width: 133px;

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


.upgradebutton {

    border-radius: 20px;
    background-color: #7FB6FF;
    font-size: 18px;
    font-family: 'Circular-Loom';
    display: inline-block;
    width: 185px;
    height: 39px;
    text-align: center;
    color: white;
    text-decoration: none;

}

progress::-webkit-progress-bar {background-color: #F2DEFE; width: 100%;}
progress {background-color: #F2DEFE;}

/* value: */
progress::-webkit-progress-value {background-color: #C561FF !important;}
progress::-moz-progress-bar {background-color: #C561FF !important;}
progress {color: #C561FF;}

</style>

@endpush

@section('content')
<script type='text/javascript' src='https://js.stripe.com/v3/?ver=5.7.2' id='stripe.js-js'></script>
    {{-- <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
     --}}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


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

        <div style="width: 62%;margin-right: 5%;">
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
                 
                <div class="unreadMessages">
                   <p class="mb-0 text-center py-2" style="padding:10px; color: black;">
                       {{-- @foreach($user->unreadNotifications as $notification)
                        <a style="color: black;text-decoration: none;font-weight: 600;font-family: system-ui;font-size: 15px;" href="{{url('user/markread')}}/{{$notification->id}}/{{$user->id}}">{{$notification->data['skill']}}</a><br>
                    @endforeach --}}
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



                                <div style="background-color: whitesmoke; padding: 2%; margin-bottom: 3%; font-size: 17px;">
                                    
                                   
                                    
                                    @if(auth()->user())

                                    Estás conectado como {{auth()->user()->email}}. Si desea utilizar una cuenta diferente para esta membresía, cierre la sesión ahora.
                                    
                                    @endif  

                                    
                                </div>
                    
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
                                        <label for="card" data-tid="card_label" style="margin-left: 14px;">Discount Code</label><br>
                                        <input type="text" id="coupon" class="input" name="coupon" style="margin-left: 14px;"> <br>
                                        <a class="btn btn-success" 
                                        style="
                                        margin-left: 14px;
                                        margin-top: 2%;
                                        width: 17%;
                                        font-size: 17px;" onclick="coupon()"> Apply</a>
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
                                        data-tid="pay_button" style="border-radius: 38px;
                                    font-size: 18px;
                                    padding: 3%;
                                    background-color: blue;
                                    " id="card-button"
                                        data-secret="{{ auth()->user()->createSetupIntent()->client_secret }}">@lang('labels.frontend.cart.pay_now')

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
             {{-- <div class="modal-body" style=";">

               
                           

            </div>
             <div class="modal-body" style=" margin-bottom: 9px;">

                
                            
            </div> --}}
            

                            
                            <div class="modal-footer">

                              {{-- <button type="button" class="btn btn-primary" data-dismiss="modal" style="border-radius: 22px;
    font-size: 19px;
    padding: 2%;
    margin-right: 41%;">Submit & Checkout</button> --}}

                            </div>
                          </div>
                          
                        </div>
    </div>


     
            
                      <div class="row">
                        <div class="col-md-8">

                         

                            


        <div class="row" style=" padding: 4%;font-size: 30px;font-weight: bold;font-family: auto;">
        <div style="width: 50%;text-align: left;">Buscar curso </div>          
        </div>

                                    <div class="row">

                                
                                    @if(count($purchased_courses) > 0)
                                @foreach($purchased_courses as $item)    
                                    <div class="col-md-6">

                                       <div class="card">
                                          <img class="card-img-top" style="height: 260px;" src="{{asset('storage/uploads/'.$item->course_image)}}" alt="Card image cap">
                                          <div class="card-body">
                                            <a href="{{ route('courses.show', [$item->slug]) }}"><h5 class="card-title">{{$item->title}}</h5></a>
                                            <a href="{{route('courses.category',['category'=>$item->category->slug])}}" class="card-text btn btn-success" style="color:white; background-color: rgba(127,182,255,1)!important;">{{$item->category->name}}</a><br><br>
                                            Completed <br>
                                            <progress id="file" value="{{ $item->progress()  }}" max="100"></progress><div>{{ $item->progress()  }}%</div>
                                          </div>
                                        </div>

                                    </div> 
                                
                                @endforeach
                                @else
                                <div class="alert alert-danger" style="margin-left:25px">
                                  su búsqueda no encontró ningún curso! por favor vaya a la pestaña de cursos.
                                </div>
                            @endif
                                 


                                    </div>
                                    








                            </div>

   

                 <div class="col-md-4">


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
                 
                <div class="unreadMessages">
                   <p class="mb-0 text-center py-2" style="padding:10px; color: black;">
                       {{-- @foreach($user->unreadNotifications as $notification)
                        <a style="color: black;text-decoration: none;font-weight: 600;font-family: system-ui;font-size: 15px;" href="{{url('user/markread')}}/{{$notification->id}}/{{$user->id}}">{{$notification->data['skill']}}</a><br> 
                    @endforeach --}}
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


<div class="rightnewCourses">
    
<div style="padding: 1%;"> 
    <div style="
    color: white;
    font-size: 20px;
    font-family: 'Circular-Loom';
    margin-left: 2%;

    ">Aprende más rápido. Hazte <br> premium por 39.99€/mes</div>

    <div style="
    color: rgb(205,203,246);
    font-size: 15px;
    font-family: 'Circular-Loom';
       margin-left: 2%;
    margin-top: 2%;

    ">Consigue un tutor especializado <br> y funda un estilo único </div>


    <div style="margin-left: 2%;
    margin-top: 3%;
    margin-bottom: 2%;
    padding: 1%;">
        <a class="upgradebutton" href="#" onclick="priceplan()" >
            <div style="margin-top: 6px;"> Comprar </div>
        </a>
    </div>
</div>

</div>

 <div class="rightside1">
 

</div>


 <div class="rightside2">
<!--  
    <div style="font-size: 25px;
    margin-bottom: 6%;
    font-weight: 700;
    font-family: 'Font Awesome 5 Free';">Create Zoom class <br>
to Help other </div>
    
    <div style="font-size: 17px;margin-bottom: 29%;"> Lorem ipsum dolor sit amet, <br> consetetur sadipscing elitr, sed <br> diam nonumy eirmod tempor <br> invidunt ut labore et. <br> </div>

 <div class="row imageR" style="margin-bottom: -8%;">

<div class="imagediv" style="display: flex;">

<div style="margin: 2%"><img src="{{asset('/new_img/images/profile1.png')}}" width="35px" height="35px" ></div>
<div style="margin: 2%"><img src="{{asset('/new_img/images/profile2.png')}}" width="35px" height="35px" style="border-radius: 25px;"></div>
<div style="margin: 2%"><img src="{{asset('/new_img/images/profile3.png')}}" width="35px" height="35px" style="border-radius: 25px;"></div>
<div style="margin: 2%"><img src="{{asset('/new_img/images/profile4.png')}}" width="35px" height="35px" ></div>
    
    
    
    
    
</div>
    <div style="margin-left: 10%;" > 
   <a class="schedulenow">
        <div style="margin-top: 6px;">Schedule Now</div>
        </a>

    </div>

    </div>
 -->


</div>
 <div class="right3rd">

 <div class="right3rdText" style="font-size: 22px;
    font-weight: 700;
    color: #F7884F;
    width: 50%;
    text-align: center;margin-left: 27%;">Invite your friends <br> to earn money </div>
 <div style="width: 50%;
    text-align: end;"><i class="fas fa-arrow-right"></i></div>
    
    </div>
                    </div>

 </div>




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
                $('.planname').html('Membership Level <b> €39.99 per Month</b>');
                $('.discription').html('<div style="padding-left: 14px;"><h2 style="font-weight: 700;">€39.99/mes</h2><br><b style="font-weight: 200">price</b> <b>€39.99 per month</b><br><br><b style="font-weight:200">Discription</b></div><ol style="padding-top: 14px;"><li>Incluye acceso a todos los cursos</li><li>Incluye acceso al curso de novela y al máster</li><li>Incluye acceso a todas las píldoras</li><li>Tutorías y correcciones personalizadas por email</li><li>Acceso al taller (videoconferencia)</li></ol> ');
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
