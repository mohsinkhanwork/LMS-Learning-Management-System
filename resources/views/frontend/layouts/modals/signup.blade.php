@extends('newtheme.layout')

@section('content')

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style type="text/css">
  	#login {
  		padding: 57px;
  		


  	}
    #register{
        padding: 15px;
    }
    .log {
        margin-top: 70px;
    }
    .reg{
        margin-top: 70px;
        
    }
  	label {
  		color: white;
  	}
    .loginmod:hover{
        background-color: #17d292!important;
        border: 2px solid green;
    }
  	
  </style>

<style type="text/css">
    
</style>

<div class="container">

    <div class="row" style="text-align: center;">

         @if( Session::has('success'))
                            <div class="alert alert-success" style="width: 100%;">
                                <p>{{ Session::get('success') }}</p>
                            </div>
                            @endif
        
    </div>

    <div class="row" style="margin-bottom: 30px;">
        
        <div class="col-md-1 log">
            
        </div>

    	<div class="col-md-10 reg">
    	               <div>

    			          <h3 class="" style="text-align: center;">Crear cuenta</h3>
    			          
    			        </div>
    	   <div class="tab-pane loginForm container active" id="register" style="background-color: #eef1f7;">

                <form id="registerForm" autocomplete="off" class="contact_form"
                                      action="#"
                                      method="post">
                                    {!! csrf_field() !!}
                                    {{-- <a href="#"
                                       class="go-login float-right text-info pr-0">@lang('labels.frontend.modal.already_user_note')</a> --}}
                                    <div class="row">   
                                    <div class="col-md-6 contact-info mb-2">

                                        <label for="usr" style="color:black">Nombre</label>
                                        {{-- {{ html()->text('first_name')
                                            ->class('form-control mb-0')
                                            ->placeholder(__('validation.attributes.frontend.first_name'))
                                            ->attribute('maxlength', 191) }} --}}
                                        <input type="text" name="first_name" id="first_name" class="form-control" required="required" placeholder="Nombre" style="background-color: #ffffff;">

                                        <span id="first-name-error" class="text-danger"></span>
                                    </div>
                                    <div class="col-md-6 contact-info mb-2">
                                        <label for="usr" style="color:black">Apellido:</label>
                                        {{-- {{ html()->text('last_name')
                                          ->class('form-control mb-0')
                                          ->placeholder(__('validation.attributes.frontend.last_name'))
                                          ->attribute('maxlength', 191) }} --}}
                                        <input type="text" required="required" name="last_name" id="last_name" class="form-control" placeholder="Apellido" style="background-color: #ffffff;">
                                        <span id="last-name-error" class="text-danger"></span>

                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6 contact-info mb-2">
                                        <label for="usr" style="color:black">Email:</label>
                                        {{-- {{ html()->email('email')
                                           ->class('form-control mb-0')
                                           ->placeholder(__('validation.attributes.frontend.email'))
                                           ->attribute('maxlength', 191)
                                           }} --}}
                                        <input type="email" name="email" required="required" id="email" class="form-control" placeholder="Email" style="background-color: #ffffff;">

                                        <span id="email-error" class="text-danger email-error"></span>

                                    </div>
                                    <div class="col-md-6 contact-info mb-2">
                                        <label for="usr" style="color:black">Contrasena:</label>
                                        {{-- {{ html()->password('password')
                                            ->class('form-control mb-0')
                                            ->placeholder(__('validation.attributes.frontend.password'))
                                             }} --}}
                                         <input type="password" name="password" id="password" class="form-control" required="required" placeholder="Contrasena" style="background-color: #ffffff;">
                                        <span id="password-error" class="text-danger password-error"></span>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-6 contact-info mb-2">
                                        <label for="usr" style="color:black">Repite la contrasena :</label>
                {{-- {{ html()->password('password_confirmation')
                                            ->class('form-control mb-0')
                                            ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                                             }} --}}

            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Repite la contrasena " style="background-color: #ffffff;" required="required">
                                    </div>


                                    <div class="col-md-6">
<div style="margin-top: 36px;">

<input type="checkbox" required=required checked> He leído y acepto los <a href="{{url('term-condition')}}" style="color: darkblue;">
 términos y condiciones </a>.

    
</div>

                                    </div>
                                       </div>
                             <div class="row" style="justify-content: right;">           
                    <div class="col-md-6">
                        
    <button id="registerButton" type="submit" value="Submit" class="btn btn-success loginmod" style="padding: 20px; margin: 36px; background-color: #84c794; line-height: 0.5;">Crea una cuenta</button>
                                    </div>
                 
                                </div>

                <input type="hidden" name="refferal_code_affilate" value="{{request()->refferal_code ?? ''}}">
                                    
                                   
                                    
                                    @if(config('registration_fields') != NULL)
                                        @php
                                            $fields = json_decode(config('registration_fields'));
                                            $inputs = ['text','number','date'];
                                        @endphp
                                        @foreach($fields as $item)
                                            @if(in_array($item->type,$inputs))
                                                <div class="contact-info mb-2">
                                                    <input type="{{$item->type}}" class="form-control mb-0" value="{{old($item->name)}}" name="{{$item->name}}"
                                                           placeholder="{{__('labels.backend.general_settings.user_registration_settings.fields.'.$item->name)}}">
                                                </div>
                                            @elseif($item->type == 'radio')
                                                <div class="contact-info mb-2">
                                                    <label class="radio-inline mr-3 mb-0">
                                                        <input type="radio" name="{{$item->name}}" value="male"> {{__('validation.attributes.frontend.male')}}
                                                    </label>
                                                    <label class="radio-inline mr-3 mb-0">
                                                        <input type="radio" name="{{$item->name}}" value="female"> {{__('validation.attributes.frontend.female')}}
                                                    </label>
                                                    <label class="radio-inline mr-3 mb-0">
                                                        <input type="radio" name="{{$item->name}}" value="other"> {{__('validation.attributes.frontend.other')}}
                                                    </label>
                                                </div>
                                            @elseif($item->type == 'textarea')
                                                <div class="contact-info mb-2">

                                                <textarea name="{{$item->name}}" placeholder="{{__('labels.backend.general_settings.user_registration_settings.fields.'.$item->name)}}" class="form-control mb-0">{{old($item->name)}}</textarea>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif

                                    @if(config('access.captcha.registration'))
                                        <div class="contact-info mt-3 text-center">
                                            {{ no_captcha()->display() }}
                                            {{ html()->hidden('captcha_status', 'true')->id('captcha_status') }}
                                            <span id="captcha-error" class="text-danger"></span>

                                        </div><!--col-->
                                    @endif


                                    {{-- <div class="contact-info mb-2 mx-auto w-50 py-4">
                                        <div class="nws-button text-center white text-capitalize">
                                            <button id="registerButton" type="submit"
                                                    value="Submit">@lang('labels.frontend.modal.register_now')</button>
                                        </div>
                                    </div> --}}

                                    {{-- {{ route('frontend.auth.teacher.register') }} --}}

                                    <a href="#"
                                       class="fgo-register float-left text-info mt-2">
                                        ¿Eres profesor? Regístrate aquí
                                    </a>
                                </form>
                            </div>
        </div>

        <div class="col-md-1 log">
            
        </div>


    </div>
</div>

@push('after-scripts')
    @if (session('openModel'))
        <script>
            $('#myModal').modal('show');
        </script>
    @endif


    @if(config('access.captcha.registration'))
        {{ no_captcha()->script() }}

    @endif

    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).ready(function () {
                $(document).on('click', '.go-login', function () {
                    $('#register').removeClass('active').addClass('fade')
                    $('#login').addClass('active').removeClass('fade')

                });
                $(document).on('click', '.go-register', function () {
                    $('#login').removeClass('active').addClass('fade')
                    $('#register').addClass('active').removeClass('fade')
                });

                $(document).on('click', '#openLoginModal', function (e) {
                    $.ajax({
                        type: "GET",
                        url: "{{route('frontend.auth.login')}}",
                        success: function (response) {
                            $('#socialLinks').html(response.socialLinks)
                            $('#myModal').modal('show');
                        },
                    });
                });

                $('#loginForm').on('submit', function (e) {
                    e.preventDefault();

                    var $this = $(this);
                    // $('#success-response').empty();
                    $('.error-response').empty();

                    $.ajax({
                        type: $this.attr('method'),
                        url: $this.attr('action'),
                        data: $this.serializeArray(),
                        dataType: $this.data('type'),
                        success: function (response) {
                            $('#login-email-error').empty();
                            $('#login-password-error').empty();
                            $('#login-captcha-error').empty();

                            if (response.errors) {
                                if (response.errors.email) {
                                    $('#login-email-error').html(response.errors.email[0]);
                                }
                                if (response.errors.password) {
                                    $('#login-password-error').html(response.errors.password[0]);
                                }

                                var captcha = "g-recaptcha-response";
                                if (response.errors[captcha]) {
                                    $('#login-captcha-error').html(response.errors[captcha][0]);
                                }
                            }
                            if (response.success) {
                                $('#loginForm')[0].reset();
                                if (response.redirect == 'back') {
                                    location.reload();
                                } else {
                                    window.location.href = "{{route('admin.dashboard')}}"
                                }
                            }
                        },
                        error: function (jqXHR) {
                            var response = $.parseJSON(jqXHR.responseText);
                            console.log(jqXHR)
                            if (response.message) {
                                $('#login').find('span.error-response').html(response.message)
                            }
                        }
                    });
                });

                $(document).on('submit','#registerForm', function (e) {
                    e.preventDefault();
                    console.log('he')
                    var $this = $(this);

                    $.ajax({
                        type: $this.attr('method'),
                        url: "{{  route('frontend.auth.register.post')}}",
                        data: $this.serializeArray(),
                        dataType: $this.data('type'),
                        success: function (data) {
                            $('#first-name-error').empty()
                            $('#last-name-error').empty()
                            $('#email-error').empty()
                            $('#password-error').empty()
                            $('#captcha-error').empty()
                            if (data.errors) {
                                if (data.errors.first_name) {
                                    $('#first-name-error').html(data.errors.first_name[0]);
                                }
                                if (data.errors.last_name) {
                                    $('#last-name-error').html(data.errors.last_name[0]);
                                }
                                if (data.errors.email) {
                                    $('.email-error').html('Este email ya existe');
                                }
                                if (data.errors.password) {
                        $('.password-error').html('Su contraseña debe tener más de 8 caracteres, debe contener al menos 1 mayúscula, 1 minúscula y 1 número');
                                }

                                var captcha = "g-recaptcha-response";
                                if (data.errors[captcha]) {
                                    $('#captcha-error').html(data.errors[captcha][0]);
                                }
                            }
                            if (data.success) {
                                window.location.href = "{{route('firstuser')}}";
                                // $('#registerForm')[0].reset();
                                // $('#register').removeClass('active').addClass('fade')
                                // $('.error-response').empty();
                                // $('#login').addClass('active').removeClass('fade')
                                {{-- $('.success-response').empty().html("@lang('labels.frontend.modal.registration_message')");  --}}
                            }
                        }
                    });
                });
            });

        });
    </script>
@endpush

<script type="text/javascript">
    $( document ).ready(function() {
    $('input').attr('autocomplete','off');
});
</script>

@endsection