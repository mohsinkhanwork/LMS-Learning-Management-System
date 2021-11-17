<style>
    .modal-dialog {
        margin: 1.75em auto;
        min-height: calc(100vh - 60px);
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-top: 210px;
    }
    .myClass{
        position:relative;
        background:white;
        height:60px;
        }
        .myClass:before{
        content: '';
        display:inline-block;
        position:absolute;
        width:100%;
        top:0px;
        left:0px;
        height:30px;
        background:gray;
    }
    #myModal .close {
        position: absolute;
        right: 0.3rem;
    }
    .modal-body {
        padding: 0px;
    }
    .g-recaptcha div {
        margin: auto;
    }
    h4:active {
      background-color: #f0f4fa;
    }

    .pointer {cursor: pointer;}
    .loginForm {
        padding: 0px 0px;
        background-color: ;


    }
    .loginmod:hover{
        background-color: #17d292!important;
        border: 2px solid green;
    }
    /*.modal-body .contact_form input{
        color: #ffffff;
    }*/
    .regform{
        background-color: ;
    }
    label {
        color: white;
    }

     }
    }

</style>
<?php
//$fields = json_decode(config('registration_fields'));
//$inputs = ['text','number','date','gender'];
//dd($fields);
?>
@if(!auth()->check())

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">


                <!-- Modal Header -->
                <div class="modal-header">
                    <div class="container">
                  <div class="row">
                    <h4 class="col-md-12  modal-title go-login float-right text-info pr-0 pointer" style="text-align: center; padding: 10px;">Entrar</h4>
                    
                    {{-- <h4 class="col-md-6 border  modal-title go-register float-left text-info pl-0 pointer" style="text-align: center; padding: 10px; background-color: #f0f4fa; border-top:;">Crea una cuenta</h4> --}}
                    
                  </div>
                  
                  
                </div>
                  

                  <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="background-color: #385bce;">
                    <div class="tab-content">

                        <div class="tab-pane loginForm container active" id="login" style="padding:34px;">

                            <span class="error-response text-danger" style="color: #35dcae!important;
    margin-left: 14px;"></span>


                            <span class="success-response text-success" style="color: #39a954!important;">{{(session()->get('flash_success'))}}</span>
                            <div class="container">
                            <form class="contact_form" id="loginForm" action="{{route('frontend.auth.login.post')}}"
                                  method="POST" enctype="multipart/form-data">
                                {{-- <a href="#" class="go-register float-left text-info pl-0">
                                    @lang('labels.frontend.modal.new_user_note')
                                </a> --}}
                                <div class="form-group">
                                <div class="contact-info mb-2">
                                    <label for="usr">Email:</label>
                                    {{-- {{ html()->email('email')
                                        ->class('form-control mb-0')
                                        ->placeholder(__('validation.attributes.frontend.email'))
                                        ->attribute('maxlength', 191)
                                        }} --}}
                                    <input type="text" name="email" id="email" class="form-control" placeholder="email" style="background-color: #ffffff; text-decoration-color: black;">
                                    <span id="login-email-error" class="text-danger" style="color: #35dcae!important;"></span>
                                </div>
                                </div>
                                <div class="form-group">
                                <div class="contact-info mb-2">
                                    <label for="usr">Password:</label>
                                    {{-- {{ html()->password('password')
                                                     ->class('form-control mb-0')
                                                     ->placeholder(__('validation.attributes.frontend.password'))
                                                    }} --}}
                                    <input type="password" name="password" id="password" class="form-control" placeholder="password" style="background-color: #ffffff;">
                                    <span id="login-password-error" class="text-danger" style="color: #35dcae!important;"></span>

                                  {{--   <a class="text-info p-0 d-block text-right my-2"
                                       href="{{ route('frontend.auth.password.reset') }}">@lang('labels.frontend.passwords.forgot_password')</a> --}}
                                   </div>
                                </div>
                                <div class="row">
                                <div class="col-md-8" style="padding: 0;">    
                                <div class="checkbox">
                                  {{-- <label><input type="checkbox" style="padding: 10px;" value=""><a style="padding: 5px;">Remember me</a></label> --}}
    <a href="{{ route('frontend.auth.password.reset') }}" style="color: white; padding: 5px;">Recordar contraseña</a>
                                </div>
                                </div>
                                <div class="col-md-4">
                                  <button type="submit" value="Submit" class="btn btn-success loginmod" style="padding: 20px; margin: 1px; background-color: #84c794; line-height: 0.5;">Acceder</button>
                                </div>
                                </div>
                                @if(config('access.captcha.registration'))
                                    <div class="contact-info mb-2 text-center">
                                        {{ no_captcha()->display() }}
                                        {{ html()->hidden('captcha_status', 'true') }}
                                        <span id="login-captcha-error" class="text-danger"></span>

                                    </div><!--col-->
                                @endif

                                

                            </form>
                            </div>

                            <div id="socialLinks" class="text-center">
                            </div>

                        </div>
                    </div>
                </div>
                        <div class="modal-body" style="background-color: #f0f4fa; padding: 22px;">
                        <div class="tab-content">
                        <div class="tab-pane regform container fade" id="register">

                            <form id="registerForm" class="contact_form"
                                  action="#"
                                  method="post">
                                {!! csrf_field() !!}
                                {{-- <a href="#"
                                   class="go-login float-right text-info pr-0">@lang('labels.frontend.modal.already_user_note')</a> --}}
                                <div class="row">   
                                <div class="col-md-6 contact-info mb-2">

                                    <label for="usr" style="color:black">Nombre:</label>
                                    {{-- {{ html()->text('first_name')
                                        ->class('form-control mb-0')
                                        ->placeholder(__('validation.attributes.frontend.first_name'))
                                        ->attribute('maxlength', 191) }} --}}
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Nombre" style="background-color: #ffffff;">
                                    <span id="first-name-error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 contact-info mb-2">
                                    <label for="usr" style="color:black">Apellido:</label>
                                    {{-- {{ html()->text('last_name')
                                      ->class('form-control mb-0')
                                      ->placeholder(__('validation.attributes.frontend.last_name'))
                                      ->attribute('maxlength', 191) }} --}}
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Apellido" style="background-color: #ffffff;">
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
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" style="background-color: #ffffff;">
                                    <span id="email-error" class="text-danger"></span>

                                </div>
                                <div class="col-md-6 contact-info mb-2">
                                    <label for="usr" style="color:black">Contraseña:</label>
                                    {{-- {{ html()->password('password')
                                        ->class('form-control mb-0')
                                        ->placeholder(__('validation.attributes.frontend.password'))
                                         }} --}}
                                     <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" style="background-color: #ffffff;">
                                    <span id="password-error" class="text-danger"></span>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6 contact-info mb-2">
                                    <label for="usr" style="color:black">Repite la contraseña :</label>
                                    {{-- {{ html()->password('password_confirmation')
                                        ->class('form-control mb-0')
                                        ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                                         }} --}}
                                     <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Repite la contraseña " style="background-color: #ffffff;">
                                </div>
                                <div class="col-md-6">
                                    <button id="registerButton" type="submit" value="Submit" class="btn btn-success loginmod" style="padding: 20px; margin: 20px; background-color: #84c794; line-height: 0.5;">Crear cuenta</button>
                                </div>
                                </div>
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


                                <div class="contact-info mb-2 mx-auto w-50 py-4">
                                    <div class="nws-button text-center white text-capitalize">
                                        {{-- <button id="registerButton" type="submit"
                                                value="Submit">@lang('labels.frontend.modal.register_now')</button> --}}

                                    </div>
                                </div>


                                <a href="{{ route('frontend.auth.teacher.register') }}"
                                   class="fgo-register float-left text-info mt-2">
                                    Regístrate como profesor, clic aquí 
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
                </div>
                <div class="modal-footer">
                                <div><br></div>
                              <!--<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
                            </div>
            </div>
        </div>
    </div>
@endif

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
                    $('.success-response').empty();
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
            });

        });
    </script>
@endpush
