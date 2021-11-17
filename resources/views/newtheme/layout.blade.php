<!DOCTYPE html>
<html lang="en-US" class="no-js">

	@include('newtheme.includes.head')
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
    
    <script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script>
        
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/video.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/lightbox.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/progess.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
        {{--<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">--}}
        <link rel="stylesheet" href="{{ asset('css/frontend.css') }}">
        <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.css')}}">


        <style>
            .abc{
                text-align: left;
            }
        </style>
        <style>
            .pointer {cursor: pointer;}fghj
            input[type=radio] {
                margin: 10px;
            }
        </style>    
        <link href="{{asset('/vendor/unisharp/laravel-ckeditor/plugins/codesnippet/lib/highlight/styles/monokai.css') }}" rel="stylesheet">
        <script src="{{asset('/vendor/unisharp/laravel-ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js') }}"></script>
        <script>hljs.initHighlightingOnLoad();</script>

        @yield('css')
        @stack('after-styles')

        @if(config('onesignal_status') == 1)
            {!! config('onesignal_data') !!}
        @endif

        @if(config('google_analytics_id') != "")
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{config('google_analytics_id')}}"></script>
        <script src='https://js.stripe.com/v2/' type='text/javascript'></script>

        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{config('google_analytics_id')}}');
        </script>
            @endif
        @if(!empty(config('custom_css')))
            <style>
                {!! config('custom_css')  !!}
            </style>
        @endif

    </head>
    <body class="{{config('layout_type')}}">

    <div id="app">
    {{--<div id="preloader"></div>--}}
    

<body data-rsssl=1
    class="bp-nouveau page-template-default page page-id-957 stm_lms_button theme-masterstudy pmpro-body-has-access woocommerce-no-js ehf-template-masterstudy ehf-stylesheet-masterstudy skin_custom_color academy stm_preloader_0 elementor-default elementor-kit-4973 elementor-page elementor-page-957 no-js"
    ontouchstart="">
    @include('frontend.layouts.modals.loginModal')
        <div class="modal fade" id="cartmodal" role="dialog">
            <div class="modal-dialog modal-lg">
            
              <!-- Modal content-->

              <div class="modal-content">
                <div class="modal-header">
                  
                  <h3 class="" style="text-align: center; margin: 20px;"> Pago seguro </h3>
                </div>
                <div class="container">
                    <div class="modal-body">
                        
                        <div class="cartbody">
                        </div>
                        <br>
                        <table class="table table" style="margin-top: 30px;">
                            <thead></thead>
                            <tbody>
                               {{--  <tr><td><input type="radio" id="paypal" name="payment" value="0">Paypal
                                    
                                </td><td></td><td></tr> --}}


                                <tr><td>{{-- <input type="radio" id="stripe" name="payment" value="1"> --}} Stripe
                                    <div>
                                        
                                            <div class="payment-method w-100 mb-0 div1" style="">
                                                <div class="payment-method-header">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="method-header-text">
                                                                <div class="radio">
                                                                    <label>
                                                                        <input data-toggle="collapse"
                                                                               href="#collapsePaymentOne"
                                                                               type="radio" name="paymentMethod"
                                                                               value="1"
                                                                               checked>
                                                                        @lang('labels.frontend.cart.payment_cards')
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="payment-img float-right">
                                                                <img src="{{asset('assets/img/banner/p-1.jpg')}}"
                                                                     alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="check-out-form collapse show" id="collapsePaymentOne"
                                                     data-parent="#accordion">


<form accept-charset="UTF-8"
      action="{{route('cart.stripe.payment')}}"
      class="require-validation" data-cc-on-file="false"
      data-stripe-publishable-key="pk_live_s93897A5XKpAwFfqQv2q1hIA"
      id="payment-form"
      method="POST">

                                                        <div style="margin:0;padding:0;display:inline">
                                                            <input name="utf8" type="hidden"
                                                                   value="✓"/>
                                                            @csrf
                                                        </div>


                                                        <div class="payment-info">
                                                            <label class=" control-label">Nombre en la tarjeta
                                                                :</label>
                                                            <input type="text" autocomplete='off'
                                                                   class="form-control required card-name"
                                                                   placeholder="@lang('labels.frontend.cart.name_on_card_placeholder')"
                                                                   value="">
                                                        </div>
                                                        <div class="payment-info">
                                                            <label class=" control-label">Número de tarjeta
                                                                :</label>
                                                            <input autocomplete='off' type="text"
                                                                   class="form-control required card-number"
                                                                   placeholder="@lang('labels.frontend.cart.card_number_placeholder')"
                                                                   value="">
                                                        </div>
                                                        <div class="payment-info input-2">
                                                            <label class=" control-label">@lang('labels.frontend.cart.cvv')
                                                                :</label>
                                                            <input type="text" class="form-control card-cvc required"
                                                                   placeholder="@lang('labels.frontend.cart.cvv')"
                                                                   value="">
                                                        </div>
                                                        <div class="payment-info input-2">
                                                            <label class=" control-label">Fecha de expiración
                                                                :</label>
                                                            <input autocomplete='off' type="text"
                                                                   class="form-control required card-expiry-month"
                                                                   placeholder="@lang('labels.frontend.cart.mm')"
                                                                   value="">
                                                            <input autocomplete='off' type="text"
                                                                   class="form-control required card-expiry-year"
                                                                   placeholder="@lang('labels.frontend.cart.yy')"
                                                                   value="">
                                                        </div>
                                                        {{-- <button type="submit"
                                                                class="text-white genius-btn mt25 gradient-bg text-center text-uppercase  bold-font">
                                                            @lang('labels.frontend.cart.pay_now') <i
                                                                    class="fas fa-caret-right"></i>
                                                        </button> --}}
                                                        <button type="submit" class="btn btn-default">Pagar</button>
                                                        <div class="row mt-3">
                                                            <div class="col-12 error form-group d-none">
                                                                <div class="alert-danger alert">
                                                                    @lang('labels.frontend.cart.stripe_error_message')
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        
                                    </div>
                                </td><td></td><td></td></tr>
                            </tbody>
                            
                        </table>
                        <!--  <form class="w3-container w3-display-middle w3-card-4 "
                          method="POST"
                          id="payment-form" action="{{route('cart.paypal.payment')}}">
                        {{ csrf_field() }}
                        {{-- <p> @lang('labels.frontend.cart.pay_securely_paypal')</p> --}}
                        <button type="submit" class="btn btn-default paybtn">@lang('labels.frontend.cart.pay_now')</button>
                        </form> --> 
                    </div>
                </div>
                <div class="modal-footer">
                  
                </div>
              </div>
              
            </div>
          </div>

  <!-- history create modal -->

 <div class="modal fade" id="modalSubscription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        {!! Form::open(['method' => 'POST', 'route' => ['history.store'], 'enctype' => 'multipart/form-data']) !!}
            <input type="hidden" name="user_id" value="{{auth()->user()->id ?? ''}}">
     <div class="card">
  <div class="card-header">
    History Details
  </div>
  <div class="card-body">
    
    <h4 class="card-title"> Title </h4>
    <p class="card-text">

    <input type="text" class="form-control"  name="title" required="required" value="{{old('title')}}">

    </p>   

    <div style="display: flex;margin-bottom: 1%;">
  <div style="text-align: left;width: 50%;"><h4 class="card-title"> Description </h4></div>
  
</div>

    <p class="card-text">

    
<textarea class="textareaSize" cols="60" id="editor7" name="description" rows="28" data-sample-short></textarea>

  <script>
    // We need to turn off the automatic editor creation first.
    CKEDITOR.disableAutoInline = true;

    CKEDITOR.replace('editor7');
  </script>


    {{$errors->first('description')}}

    </p>
   

    <div >
<!-- 
<div style="width: 50%;">
    Browse...<input type="file" name="file"  class="form-control"> <br>
    </div> -->


  
    </div>

  </div>
</div>
      <div class="modal-footer d-flex justify-content-center">
      {!! Form::submit(trans('Create'), ['class' => 'btn btn-success']) !!}
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>


{{-- register 1st modal --}}

        {{-- end regsiter modal --}}

<!-- Modal -->

<div id="priceplan" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" style="max-width: 50%;">
                <!-- Modal content-->
                <div class="modal-content"
                style="
                     position: absolute;
                        left: 0px;
                        right: 0px;
                        margin: auto;
                        z-index: 10000;
                        border: 1px solid #000;
                        padding: 5px;
                      ">
                  <div class="modal-header1" style="margin: 5px; margin-bottom: 9px;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                {{-- <h5 class="modal-title" style="background-color: lightgray; padding: 20px; font-size: 17px;"> --}}
                    {{-- Estás conectado como kabir1gmail-com. Si desea utilizar una cuenta diferente para esta membresía, cierre la sesión ahora. --}}
                {{-- </h5> --}}
                  </div>
    <div class="modal-header1" style="margin: 5px; background-color: blue; margin-bottom: 2%;">
    <h5 class="modal-title" style="padding: 5px; font-size: 19px; color: white;">
    <div  class="memname"  style=" width: 50%; float: left;">
        Nivel de membresía $39.99 cada mes
    </div>
    <div style=" width: 50%; float: left;">
         Información de pago
            <img src="{{asset('assets/img/banner/p-1.jpg')}}"
                 alt="">
    </div>
    </h5>
                </div>
                  <!--<div class="modal-body" style="padding: 15px;">
                       <div style=" width: 50%; float: left;">
                        <p style="font-size: 25px; font-weight: 800;">Bronce 39.99$/mes</p> <br>
                        <p>Price: <span style="font-weight: 900;">$39.99 per Month. <br></span></p>
                        {{-- Description:Accede a todas las lecciones del taller mes a mes. --}}
                 </div>-->
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
                                <div class="row" style="padding: 2%;">
                                <div class="col-md-5 discription" style="color: black;">
                                    
                               

                                    
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
                                        <label for="card" data-tid="card_label">@lang('labels.subscription.form.card')</label>
                                        <div id="card" class="input"></div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12 form-group d-none" id="card-errors">
                                        <div class="alert-danger alert">
                                            @lang('labels.frontend.cart.stripe_error_message')
                                        </div>
                                    </div>
                                </div>
                                <div  role="alert"></div>
                                <div class="field" style="">
                                <div class="coupon" style="">
                                        <div style="color: black;">Código de descuento</div>
                                        <input type="text" id="coupon" class="input" name="coupon" style="background-color: white;border: 1px solid;height: 27px;">
                                        <br>
                                        <a class="btn btn-success" style="color: white;padding: 9px;border-radius: 8px;" onclick="coupon()"> Aplicar cupón</a>
                                    </div>
                                            <div class="couponmsg" style="margin-top:13px; width:171px!important; margin-left: 10px;">
                                            </div>
                                    </div>
                                    <div style="text-align: center;">
                                          <button type="submit" class="btn btn-primary" style="padding: 20px;background-color: blue;" class="text-white genius-btn mt25 gradient-bg text-center text-uppercase  bold-font"
                                        data-tid="pay_button" id="card-button"
                                        data-secret="{{ auth()->user()->createSetupIntent()->client_secret }}">
                                                    enviar y pagar
                                </button>
                                        
                                    </div>
                              

                            </div>
                            </form>
                            @endif
                </div>
                  </div>
                  <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --}}
                  </div>
                </div>
          </div>


        </div>


    <div id="wrapper">

        
        @include('newtheme.includes.header')

        @yield('content')

    </div>
    
        @include('newtheme.includes.footer')

        @include('newtheme.includes.script')

        @stack('before-scripts')

    <!-- For Js Library -->
    {{-- <script src="{{asset('assets/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script> --}}
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/jarallax.js')}}"></script>
    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('assets/js/lightbox.js')}}"></script>
    <script src="{{asset('assets/js/jquery.meanmenu.js')}}"></script>
    <script src="{{asset('assets/js/scrollreveal.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/js/gmap3.min.js')}}"></script>

    <script src="{{asset('assets/js/switch.js')}}"></script>

    <script>
        @if(request()->has('user')  && (request('user') == 'admin'))

        $('#myModal').modal('show');
        $('#loginForm').find('#email').val('admin@lms.com')
        $('#loginForm').find('#password').val('secret')

        @elseif(request()->has('user')  && (request('user') == 'student'))

        $('#myModal').modal('show');
        $('#loginForm').find('#email').val('student@lms.com')
        $('#loginForm').find('#password').val('secret')

        @elseif(request()->has('user')  && (request('user') == 'teacher'))

        $('#myModal').modal('show');
        $('#loginForm').find('#email').val('teacher@lms.com')
        $('#loginForm').find('#password').val('secret')

        @endif
    </script>


    <script src="{{asset('assets/js/script.js')}}"></script>
    <script>
        @if((session()->has('show_login')) && (session('show_login') == true))
        $('#myModal').modal('show');
                @endif
        var font_color = "{{config('font_color')}}"
        setActiveStyleSheet(font_color);
    </script>

    @yield('js')

    @stack('after-scripts')

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
    <script>
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
    @endif
    </script> --}}

    @include('includes.partials.ga')

    @if(!empty(config('custom_js')))
        <script>
            {!! config('custom_js') !!}
        </script>
    @endif
    <script>
        $(document).ready(function(){
          $("#stripe").click(function(){
            $(".paybtn").hide();
            $(".div1").fadeIn("slow");
          });
          $("#paypal").click(function(){
            $(".div1").hide();
            $(".paybtn").show();
          });
        });
    </script>
</body>
</html>