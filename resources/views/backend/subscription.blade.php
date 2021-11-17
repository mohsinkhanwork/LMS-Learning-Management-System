@extends('backend.layouts.student_app')

@section('title', __('labels.backend.subscription.title').' | '.app_name())

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script type='text/javascript' src='https://js.stripe.com/v3/?ver=5.7.2' id='stripe.js-js'></script>
    {{-- <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
     --}}

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
jQuery(document).ready(function( $ ){
    // Replacing the Critical Words
    var str = $('.login_name').text();
    var res = str.replace(/Hey/g, "Hola");
    $('.login_name').text(res);res
    
    
    function replaceText(selector, text, newText, flags) {
      var matcher = new RegExp(text, flags);
      $(selector).each(function () {
        var $this = $(this);
        if (!$this.children().length)
           $this.text($this.text().replace(matcher, newText));
      });
    }
    
    function replaceAllText() {
        replaceText('*', 'My Orders', 'Mis órdenes', 'g');
    }
    
  //Calling the Function
    replaceAllText();
    
});





</script>
 
<style type="text/css">
    


.newBody {

   
    font-size: 23px;
    font-family: 'Font Awesome 5 Free';
}


.subscribedButton {

text-align: center;
    border: 1px solid #679CF7;
    font-size: 17px;
    padding: 3%;
    width: 100%;
    display: inline-block;
    color: #7490F6 ;
    border-radius: 9px;

}

i.fas.fa-check {
    font-size: 13px;
    color: blue;
}

.newR {
    border: 1px solid darkgray;
    margin-bottom: 1%;
}

.card {
    border: none;
}

.jobs .card {
   border: 1px solid transparent;
}
.jobs .card:hover {
   background: #F4F7F9;
   border: 2px solid #679CF7;
}

.jobs .subscribedButton:hover {
   background: #4384F5;
   color: white !important;
   text-decoration: none;
       border-radius: 9px;

}




</style>
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
                                        <label for="name" data-tid="name_label">Nombre</label>
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
                                        <label for="card" data-tid="card_label" style="margin-left: 14px;">Tarjeta</label>
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
                                        font-weight: 500;" onclick="coupon()">Aplicar descuento</a>
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
                                        data-secret="{{ auth()->user()->createSetupIntent()->client_secret }}">Pagar

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
@if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
@endif

    <div class="row">
        <div class="col">
           
                <div class="card-body newBody">
   

<div class="row newR" >

    
    <div class="col jobs">
        <div class="card" style="width: 20rem;">
  <div class="card-body">
    <div style="display: flex;">
    <div> <h3 class="card-title" style=" font-weight: 600;">€ 39.99 / mes</h3>  </div>

   <div style="width: 42%; text-align: right;"> 
 @if(auth()->user()->subscription('default'))
    @if(!auth()->user()->subscription('default')->cancelled())
    @if($activePlan->name == 'Bronce')
     
     <div style="font-size: 13px;
    background-color: #4384F5;
    color: white;
    font-family: sans-serif;
    padding: 2%;
    width: 87%;
    margin-left: 10%;
    border-radius: 8px;
    text-align: center;">PLAN ACTUAL</div>

     @endif
       @endif
    @endif

    </div>

     </div>
    <p class="card-text" style="font-size: 17px;">Ideal para escritores principiantes. Guía personalizada y técnicas narrativas</p>
    <p class="card-text"> <span style="color: #679CF7;font-weight: 700;">€ 39.99 /</span> <span style="font-size: 17px;"> 
    Mes durante 24 meses</span> </p>
 @if(auth()->user()->subscription('default'))
 @if(!auth()->user()->subscription('default')->cancelled())
    @if($activePlan->name == 'Bronce')
 @if(auth()->user()->subscription()->cancelled())
                                   
                                <div style="text-align: center;">
                                <a href="#" onclick="priceplan()" class="subscribedButton">
                                    Seleccionar plan
                                </a>
                                </div>
                                    @else
                            <div style="text-align: center;">
                                    <a href="{{ route('admin.subscriptions.delete') }}" class="subscribedButton">
                                        <div style="color: red;">Cancelar Plan</div>
                                    </a>
                             </div>
   

    @endif
     @else
                            <div style="text-align: center;">
                            <a href="#" onclick="priceplan()" class="subscribedButton">
                            Seleccionar plan
                            </a>
                            </div>
    @endif
    @endif
    @endif
@if(auth()->user()->subscription('default'))
     @if(auth()->user()->subscription()->cancelled())
      <div style="text-align: center;">
                            <a href="#" onclick="priceplan()" class="subscribedButton">
                            Seleccionar plan
                            </a>
                            </div>
                                   
@endif
@endif

@if(auth()->user()->subscription() == '')

      <div style="text-align: center;">
                            <a href="#" onclick="priceplan()" class="subscribedButton">
                            Seleccionar plan
                            </a>
                            </div>

@endif

   

    <hr>
    <div>
        <p style="font-size: 19px;font-weight: bold;">Beneficios: </p>
            <p style="font-size: 20px;"><i class="fas fa-check"></i> Incluye acceso a todos los cursos</p> 
            <p style="font-size: 20px;"><i class="fas fa-check"></i> Incluye acceso al curso de novela y al máster</p> 
            <p style="font-size: 20px;"><i class="fas fa-check"></i> Incluye acceso a todas las píldoras</p> 
            <p style="font-size: 20px;"><i class="fas fa-check"></i> Tutorías y correcciones personalizadas por email</p> 
            <p style="font-size: 20px;"><i class="fas fa-check"></i> Acceso al taller (videoconferencia)</p> 
    </div>

  </div>
</div>
    </div>

     
   <div class="col jobs">
        <div class="card" style="width: 20rem;">
  <div class="card-body">
    <div style="display: flex;">
   <div > <h3 class="card-title" style=" font-weight: 600;">€ 68 / mes</h3></div>
<div style="width: 42%; text-align: right;"> 
 @if(auth()->user()->subscription('default'))
                        @if(!auth()->user()->subscription('default')->cancelled())
    @if($activePlan->name == 'Oro')
     
     <div style="font-size: 13px;
    background-color: #4384F5;
    color: white;
    font-family: sans-serif;
    padding: 2%;
    width: 87%;
    margin-left: 10%;
    border-radius: 8px;
    text-align: center;"> PLAN ACTUAL</div>

     @endif
 @endif
       @endif
    </div>

     </div>



    <p class="card-text" style="font-size: 17px;">Profundiza en tu marca personal, consigue más lectores y seguimiento premium.</p>
    <p class="card-text"> <span style="color: #679CF7;font-weight: 700;">€ 68 / </span> <span style="font-size: 17px;">
    Mes durante 24 meses</span> </p>
   
 @if(auth()->user()->subscription('default'))
 @if(!auth()->user()->subscription('default')->cancelled())
    @if($activePlan->name == 'Oro')
 @if(auth()->user()->subscription()->cancelled())
                                   
                            <div style="text-align: center;">
                            <a href="#" onclick="priceplan68()" class="subscribedButton">
                            Seleccionar plan
                            </a>
                            </div>
                                    @else
                            <div style="text-align: center;">
                                    <a href="{{ route('admin.subscriptions.delete') }}" class="subscribedButton">
                                        <div style="color: red;">Cancelar Plan</div>
                                    </a>
                             </div>
   

    @endif
     @else
                            <div style="text-align: center;">
                            <a href="#" onclick="priceplan68()" class="subscribedButton">
                            Seleccionar plan
                            </a>
                            </div>
    @endif
    @endif
    @endif

    @if(auth()->user()->subscription('default'))
     @if(auth()->user()->subscription()->cancelled())
      <div style="text-align: center;">
                            <a href="#" onclick="priceplan68()" class="subscribedButton">
                            Seleccionar plan
                            </a>
                            </div>
                                   
    @endif
    @endif


@if(auth()->user()->subscription() == '')

      <div style="text-align: center;">
                            <a href="#" onclick="priceplan68()" class="subscribedButton">
                            Seleccionar plan
                            </a>
                            </div>

@endif

   
    <hr>
    <div>
        <p style="font-size: 19px;font-weight: bold;">Beneficios: </p>
            <p style="font-size: 20px;"><i class="fas fa-check"></i> Incluye acceso a todos los cursos</p> 
            <p style="font-size: 20px;"><i class="fas fa-check"></i> Incluye acceso al curso de novela y al máster</p> 
            <p style="font-size: 20px;"><i class="fas fa-check"></i> Incluye acceso a todas las píldoras</p> 
            <p style="font-size: 20px;"><i class="fas fa-check"></i> Incluye tutorías, correcciones, (llamadas) </p> 
            <p style="font-size: 20px;"><i class="fas fa-check"></i>Acceso al taller (videoconferencia)</p> 
    </div>

  </div>
</div>
    </div>


  <div class="col jobs ">
        <div class="card" style="width: 20rem;">
  <div class="card-body">
     <div style="display: flex;">
   <div> <h3 class="card-title" style=" font-weight: 600;">€ 14.99 /mes</h3> </div>
<div style="width: 42%; text-align: right;">
    @if(auth()->user()->subscription('default'))
                        @if(!auth()->user()->subscription('default')->cancelled())
 @if($activePlan->name == '14.99/mes')
     
     <div style="    font-size: 13px;
    background-color: #4384F5;
    color: white;
    font-family: sans-serif;
    padding: 2%;
    width: 87%;
    margin-left: 10%;
    border-radius: 8px;
    text-align: center;
    height: 50%;"> PLAN ACTUAL</div>

     @endif
     @endif
     @endif

    </div>

     </div>


    <p class="card-text" style="font-size: 17px;">Incluye el acceso al taller y a las correcciones de los ejercicios. </p>
    <p class="card-text"> <span style="color: #679CF7;font-weight: 700;">€ 14.99 /</span> <span style="font-size: 17px;">Cada mes </span> </p>
  
    
 @if(auth()->user()->subscription('default'))
 @if(!auth()->user()->subscription('default')->cancelled())
    @if($activePlan->name == '14.99/mes')
 @if(auth()->user()->subscription()->cancelled())
                                   
                                    <div style="text-align: center;">
                                    <a href="#" onclick="priceplan14()" class="subscribedButton">
                                    Seleccionar plan
                                    </a>
                                    </div>
                                    @else
                            <div style="text-align: center;">
                                    <a href="{{ route('admin.subscriptions.delete') }}" class="subscribedButton">
                                        <div style="color: red;">Cancelar Plan</div>
                                    </a>
                             </div>
   

    @endif
    @else
                            <div style="text-align: center;">
                            <a href="#" onclick="priceplan14()" class="subscribedButton">
                            Seleccionar plan
                            </a>
                            </div>

    @endif
    @endif
    @endif
    @if(auth()->user()->subscription('default'))
    @if(auth()->user()->subscription()->cancelled())
      <div style="text-align: center;">
                            <a href="#" onclick="priceplan14()" class="subscribedButton">
                            Seleccionar plan
                            </a>
                            </div>
                                   
    @endif
    @endif


@if(auth()->user()->subscription() == '')

      <div style="text-align: center;">
                            <a href="#" onclick="priceplan14()" class="subscribedButton">
                            Seleccionar plan
                            </a>
                            </div>

@endif

    <hr>
    <div>
        <p style="font-size: 19px;font-weight: bold;">Beneficios: </p>
            <p style="font-size: 20px;"><i class="fas fa-check"></i> Acceso al taller de escritura (clases por videoconferencia)</p> 
            <p style="font-size: 20px;"><i class="fas fa-check"></i> Acceso a las clases grabadas (si no puedes asistir no importa)</p> 
            <p style="font-size: 20px;"><i class="fas fa-check"></i> No incluye acceso al resto de talleres por videoconferencia</p> 
    </div>

  </div>
</div>
</div>


   <div class="col jobs">
        <div class="card" style="width: 20rem;">
  <div class="card-body">
     <div style="display: flex;">
    <div><h3 class="card-title" style=" font-weight: 600;">€ 29.99 / mes </h3> </div>
<div style="width: 42%; text-align: right;"> 
     @if(auth()->user()->subscription('default'))
                        @if(!auth()->user()->subscription('default')->cancelled())
 @if($activePlan->name == '29.99/mes')
     
     <div style=" font-size: 13px;
    background-color: #4384F5;
    color: white;
    font-family: sans-serif;
    padding: 2%;
    width: 50%;
    margin-left: -17%;
    border-radius: 8px;
    text-align: center;
    height: 50%;">PLAN ACTUAL </div>

     @endif
     @endif
     @endif

    </div>

     </div>


    <p class="card-text" style="font-size: 17px;">Todo lo del plan de 14.99€ y acceso a todas las charlas del mes</p>
    <p class="card-text"> <span style="color: #679CF7;font-weight: 700;">€ 29.99 /</span> <span style="font-size: 17px;">Cada mes</span> </p>
 @if(auth()->user()->subscription('default'))
 @if(!auth()->user()->subscription('default')->cancelled())
    @if($activePlan->name == '29.99/mes')
 @if(auth()->user()->subscription()->cancelled())
                                   
                                    <div style="text-align: center;">
                                    <a href="#" onclick="priceplan29()" class="subscribedButton">
                                    Seleccionar plan
                                    </a>
                                    </div>
                                    @else
                            <div style="text-align: center;">
                                    <a href="{{ route('admin.subscriptions.delete') }}" class="subscribedButton">
                                        <div style="color: red;">Cancelar Plan</div>
                                    </a>
                             </div>
   

    @endif
     @else
                            <div style="text-align: center;">
                            <a href="#" onclick="priceplan29()" class="subscribedButton">
                            Seleccionar plan
                            </a>
                            </div>
    @endif
    @endif
    @endif
@if(auth()->user()->subscription('default'))
     @if(auth()->user()->subscription()->cancelled())
      <div style="text-align: center;">
                            <a href="#" onclick="priceplan29()" class="subscribedButton">
                            Seleccionar plan
                            </a>
                            </div>
                                   
    @endif
    @endif



@if(auth()->user()->subscription() == '')

      <div style="text-align: center;">
                            <a href="#" onclick="priceplan29()" class="subscribedButton">
                            Seleccionar plan
                            </a>
                            </div>

@endif


   
    <hr>
    <div>
        <p style="font-size: 19px;font-weight: bold;">Beneficios: </p>
            <p style="font-size: 20px;"><i class="fas fa-check"></i> Acceso al taller de escritura (clases por videoconferencia)</p> 
            <p style="font-size: 20px;"><i class="fas fa-check"></i> Acceso a las clases grabadas (si no puedes asistir no importa)</p> 
             <p style="font-size: 20px;"><i class="fas fa-check"></i> Incluye acceso al resto de talleres por videoconferencia</p> 
         
    </div>
</div>
  </div>
</div>
    
    
   

   


</div>
    
     
    </div>
    

   
   
    





                   <!--  <div class="row">

                        @if(auth()->user()->subscription('default'))
                        @if(!auth()->user()->subscription('default')->cancelled())
                        <div class="col-md-4 col-12">
                            <div class="card text-white bg-dark text-center py-3">
                                <div class="card-body">
                                    <h1 class="text-uppercase">{{ $activePlan->name }}</h1>
                                    <h3>@lang('labels.backend.subscription.active_plan')</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="card text-white bg-dark text-center py-3">
                                <div class="card-body">
                                    <h1 class="">{{ trans_choice('labels.backend.subscription.quantity', $activePlan->bundle, ['quantity' => $activePlan->bundle]) }}</h1>
                                    <h3>@lang('labels.backend.subscription.bundle')</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="card text-white bg-dark text-center py-3">
                                <div class="card-body">
                                    <h1 class="">{{ trans_choice('labels.backend.subscription.quantity', $activePlan->course, ['quantity' => $activePlan->course]) }}</h1>
                                    <h3>@lang('labels.backend.subscription.course')</h3>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endif -->
                      <!--   @if(auth()->user()->subscription('default'))
                        <div class="col-md-12">
                            <div class="d-inline-block form-group w-100">
                                <h4 class="mb-0">
                                    @if(auth()->user()->subscription('default'))
                                    @if(auth()->user()->subscription()->cancelled())
                                    @lang('labels.backend.subscription.subscribe_plan')
                                    <a href="{{ route('subscription.plans') }}"
                                       class="btn btn-primary">
                                        @lang('labels.backend.subscription.click_here')
                                    </a>
                                    @else
                                    @lang('labels.backend.subscription.cancel_title')
                                    <a href="{{ route('admin.subscriptions.delete') }}"
                                       class="btn btn-primary">
                                        @lang('labels.backend.subscription.click_here')
                                    </a>
                                    @endif
                                    @endif
                                </h4>
                            </div>

                        </div>
                        @endif -->


                        <div class="col-md-12 col-12" style="border: 1px solid darkgrey;border-radius: 11px;">
                            <div class="d-inline-block form-group w-100">
                                <h4 class="mb-0"> Facturas </h4>
                            </div>
                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                <tr>
                                    <td>Fecha</td>
                                    <td>@lang('labels.backend.subscription.sub_total')</td>
                                    <td>@lang('labels.backend.subscription.total')</td>
                                    <td>Descargar</td>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($invoices as $invoice)
                                    <tr>
                                        <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                                        <td>{{ $invoice->subtotal() }}</td>
                                        <td>{{ $invoice->total() }}</td>
                                        <td>
                                            <a href="{{ route('admin.subscriptions.download_invoice', ['invoice' => $invoice->id]) }}"
                                                class="btn btn-primary">
                                                @lang('labels.backend.subscription.download')
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="4"> <h4> No tienes ninguna suscripción activa. </h4></td></tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>


                    </div>
                    </div>
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
<script type='text/javascript' src="{{asset('149550655.v2.pressablecdn.com/wp-content/plugins/elementor/assets/js/frontend.mine5ca.js?ver=3.2.3')}}" id='elementor-frontend-js'></script>


<script type='text/javascript' src="{{asset('149550655.v2.pressablecdn.com/wp-content/plugins/jetpack/vendor/automattic/jetpack-lazy-images/dist/lazy-imagesc358.js?ver=1.1.3')}}" id='jetpack-lazy-images-js'></script>
        

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
                $('.planname').html('Nivel de  Membresía <b> €39.99  cada mes</b>');
                $('.discription').html('<div style="padding-left: 14px;"><h2 style="font-weight: 700;">€39.99/mes</h2><br><b style="font-weight: 200">Precio</b> <b>€39.99  cada mes</b><br><br><b style="font-weight:200"> Descripción</b></div><ol style="padding-top: 14px;"><li>Incluye acceso a todos los cursos</li><li>Incluye acceso al curso de novela y al máster</li><li>Incluye acceso a todas las píldoras</li><li>Tutorías y correcciones personalizadas por email</li><li>Acceso al taller (videoconferencia)</li></ol> ');
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
            function priceplan68(){
                $("#SubModal").modal('show');
                $(".card-errors").hide();
                $('.planname').html('Nivel de  Membresía <b> €68  cada mes</b>');
                $('.discription').html('<div style="padding-left: 14px;"><h2 style="font-weight: 700;">€68/mes</h2><br><b style="font-weight: 200">Precio</b> <b>€68  cada mes</b><br><br><b style="font-weight:200"> Descripción</b></div><ol style="padding-top: 14px;"><li>Incluye acceso a todos los cursos</li><li>Incluye acceso al curso de novela y al máster</li><li>Incluye acceso a todas las píldoras</li><li>Incluye tutorías, correcciones, (llamadas)</li><li>Acceso al taller (videoconferencia)</li></ol> ');
                @if(auth()->user())
                @if(auth()->user()->subscribed('default'))
                ($('#subscribe-form').attr('action','{{ route('subscription.update',['plan' => 3]) }}'));
                @else
                ($('#subscribe-form').attr('action','{{ route('subscription.subscribe',['plan' => 3]) }}'));
                @endif
                @endif
            }
        </script>
        <script type="text/javascript">
            function priceplan14(){
                $("#SubModal").modal('show');
                $(".card-errors").hide();
                $('.planname').html('Nivel de  Membresía <b> €14.99  cada mes </b>');
                $('.discription').html('<div style="padding-left: 14px;"><h2 style="font-weight: 700;">€14.99/mes</h2><br><b style="font-weight: 200">Precio</b> <b>€14.99  cada mes</b><br><br><b style="font-weight:200"> Descripción</b></div><ol style="padding-top: 14px;"><li>Acceso al taller de escritura (clases por videoconferencia)</li><li>No incluye acceso al resto de talleres por videoconferencia</li></ol> ');
                @if(auth()->user())
                @if(auth()->user()->subscribed('default'))
                ($('#subscribe-form').attr('action','{{ route('subscription.update',['plan' => 4]) }}'));
                @else
                ($('#subscribe-form').attr('action','{{ route('subscription.subscribe',['plan' => 4]) }}'));
                @endif
                @endif  
            }
        </script>
        <script type="text/javascript">
            function priceplan29(){
                $("#SubModal").modal('show');
                $(".card-errors").hide();
                $('.planname').html('Nivel de  Membresía <b> €29.99  cada mes </b>');
                $('.discription').html('<div style="padding-left: 14px;"><h2 style="font-weight: 700;">€29.99/mes</h2><br><b style="font-weight: 200">Precio</b> <b>€29.99  cada mes</b><br><br><b style="font-weight:200"> Descripción</b></div><ol style="padding-top: 14px;"><li>Acceso al taller de escritura (clases por videoconferencia)</li><li>Incluye acceso al resto de talleres por videoconferencia</li></ol> ');
                @if(auth()->user())
                @if(auth()->user()->subscribed('default'))
                ($('#subscribe-form').attr('action','{{ route('subscription.update',['plan' => 5]) }}'));
                @else
                ($('#subscribe-form').attr('action','{{ route('subscription.subscribe',['plan' => 5]) }}'));
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
