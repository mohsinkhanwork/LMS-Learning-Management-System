@extends('newtheme.layout')

@section('content')
<style>
    .dropdown-course {
          display: none;
         
          background-color: #fff;
          margin-top: -20px;
            margin-left: 1px;
            text-align: center;
          min-width: 186px;
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


    <script src='https://js.stripe.com/v2/' type='text/javascript'></script>


    <div id="main">
            <div class="stm-lms-wrapper">
                <div class="container">


                    <div class="row" style="justify-content: center;">

                        <!-- Start of contact area form
        ============================================= -->
    <section id="contact-form" class="contact-form-area_3 contact-page-version" style="">
        <div class="container">
            <div class="section-title mb45 headline text-center">
                <h6>La mayoría de las veces contesto antes de las 24 horas</h6>
            </div>

            <div class="contact_third_form">
                <form class="contact_form" action="{{route('contact.send')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="contact-info">
                                <input class="name" name="name" type="text" placeholder="Tu nombre">
                                @if($errors->has('name'))
                                    <span class="help-block text-danger">Este campo es requerido</span>
                                @endif
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="contact-info">
                                <input class="email" name="email" type="email" placeholder="Tu correo electrónico">
                                @if($errors->has('email'))
                                    <span class="help-block text-danger">Este campo es requerido</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="contact-info">
                                <input class="number" name="phone" type="number" placeholder="Teléfono">
                                @if($errors->has('phone'))
                                    <span class="help-block text-danger">{{$errors->first('phone')}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <textarea name="message" placeholder="Mensaje"></textarea>

                @if($errors->has('message'))
                        <span class="help-block text-danger">Este campo es requerido</span>
                    @endif

                    @if(config('access.captcha.registration'))
                        <div class="contact-info mt-5 text-center">
                            {{ no_captcha()->display() }}
                            {{ html()->hidden('captcha_status', 'true')->id('captcha_status') }}
                            @if($errors->has('g-recaptcha-response'))
                                <p class="help-block text-danger mx0auto">{{$errors->first('g-recaptcha-response')}}</p>
                            @endif
                        </div><!--col-->
                    @endif


                    <div style="margin-top:2%; margin-left: 37%;">
                        <button class="text-uppercase btn btn-primary" type="submit" value="Submit">Enviar email <i class="fas fa-caret-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- End of contact area form
        ============================================= -->

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
                htmlData+='<thead><tr><th></th><th>Course</th><th></th><th>Course Price</th></tr></thead>';
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
   function priceplan(){
        $('#priceplan').modal('show');
        $(".memname").html('Membership Level<br> $39.99 per Month');
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
        $(".memname").html('Membership Level<br> $68 per Month');
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
