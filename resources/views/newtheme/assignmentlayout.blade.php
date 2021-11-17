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

        

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></script>

    <script src="https://cdn.plyr.io/3.6.8/plyr.js"></script>
    <script src="https://cdn.plyr.io/3.6.8/plyr.polyfilled.js"></script>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



<script src="https://kit.fontawesome.com/a71707a89a.js" crossorigin="anonymous"></script>

              


        <link href="{{asset('/vendor/unisharp/laravel-ckeditor/plugins/codesnippet/lib/highlight/styles/monokai.css') }}" rel="stylesheet">
        <script src="{{asset('/vendor/unisharp/laravel-ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js') }}"></script>
        <script>hljs.initHighlightingOnLoad();</script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<style type="text/css">


        @yield('css')
        @stack('after-styles')

        @if(config('onesignal_status') == 1)
            {!! config('onesignal_data') !!}
        @endif

        @if(config('google_analytics_id') != "")
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{config('google_analytics_id')}}"></script>
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


<style type="text/css">
    .modal-content {

  background-color:  #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 150%;

}



</style>

<style type="text/css">
  .popup-overlay {

  /*Hides pop-up when there is no "active" class*/
  visibility: hidden;


}

.popup-overlay.active {
  /*displays pop-up when "active" class is present*/
  visibility: visible;

  z-index: 9;
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

<style type="text/css">
  .popup-overlay1 {

  /*Hides pop-up when there is no "active" class*/
  visibility: hidden;


}

.popup-overlay1.active {
  /*displays pop-up when "active" class is present*/
  visibility: visible;

  z-index: 9;
}

.popup-content1 {
  /*Hides pop-up content when there is no "active" class */
  visibility: hidden;
}

.popup-content1.active {
  /*Shows pop-up content when "active" class is present */
  visibility: visible;
}


</style>



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
              
              <h3 class="" style="text-align: center; margin: 20px;">Checkout</h3>
            </div>
            <div class="modal-body cartbody">
                  
                </div>
            <div class="modal-footer">
              
            </div>
          </div>
          
        </div>
      </div>




{{-- edit chapter page questions modal --}}

<div class="modal" id="six_Question">
  <div class="modal-dialog modal-lg" style="max-width: 50%;">
    <div class="modal-content" style="padding: 4%;">

          Answers: <br>
@isset($six_answer->answers)
       <input type="text" name="modalquestion" value="{!! strip_tags($six_answer->answers) !!}"  readonly="" />
 @endisset


  </div>
</div>
</div>

{{-- end modals --}}






  
<!-- The Notes Modal -->
      {!!  Form::open(['action'=>'NotesController@store' , 'method'=>'POST'])!!}
      @csrf
       <div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="text-center">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: black !important;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">

       <textarea name="note" required="required" rows="10" cols="70" placeholder="Here You can save the Note"></textarea>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="submit" class="btn btn-default">Save</button>
      </div>
    </div>
  </div>
</div>
        {!! Form::close() !!}
        <!-- Modal -->




<!--study note-->

<!-- create chapter modal -->

<div class="modal fade" id="createchapter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
       <form>
              
   <input type="hidden" name="histories_id" value="{{$history->id ?? '' }}" id="histories_id">
     <div class="card">
    <div class="card-header">
    Chapter Details
  </div>
    <div class="card-body">
    <h4 class="card-title"> Title </h4>


<div class="popup-overlay1">
<div class="popup-content1">
  
<span style="color: red">Description is Required</span> 
</div>
</div>
    <p class="card-text">
    <input type="text" class="form-control"  name="title" id="title_id" required>
    </p>
      <div style="display: flex; margin-bottom: 1%;">
  <div style="text-align: left;width: 50%;"><h4 class="card-title"> Description </h4></div>
</div>
    <p class="card-text">
<textarea cols="60" id="editor4" name="description" rows="28" required="required"></textarea>

  <script>
    // We need to turn off the automatic editor creation first.
    CKEDITOR.disableAutoInline = true;

    var editor = CKEDITOR.replace('editor4');

    editor.on( 'required', function( evt ) {
        // alert( 'Description field is Required', 'warning' );
        $(".popup-overlay1, .popup-content1").addClass("active");
        evt.cancel();
    } );

  </script>


</p>
<div>
    <div class="modal-footer d-flex justify-content-center">
      <button type="button" onclick="chapter_create_modal()" class="btn btn-success" > Create </button>
      </div>
</div>
</div>
</div>
</form>
</div>

</div>
</div>

<!-- mdoal -->


{{-- guidebookanswermodal --}}


<div class="modal" id="my_modal">
  <div class="modal-dialog modal-lg" style="max-width: 50%;">
    <div class="modal-content">
    
{!! Form::open(['method' => 'POST', 'route' => ['guidebookanswers.store'], 'enctype' => 'multipart/form-data']) !!}
      <div class="modal-body">
        <h3>Escribe la respuesta</h3>

        <div class="popup-overlay">
<div class="popup-content">
  
<span style="color: red">Answer is Required</span> 

</div>
</div>


         <input type="hidden" name="user_id" value="{{auth()->user()->id ?? ''}}" >
          @isset ($question)
        <input type="hidden" name="guidbookquestions_id" value="{{$question->id}}" />
        <input type="hidden" name="histories_id" value="0"  />
        @endisset
        <textarea class="textareaSize" cols="60" id="editor16" name="answers" rows="28" required="required"></textarea>

  <script>
    // We need to turn off the automatic editor creation first.
    CKEDITOR.disableAutoInline = true;

    var editor = CKEDITOR.replace('editor16');

    editor.on( 'required', function( evt ) {
        $(".popup-overlay, .popup-content").addClass("active");
        evt.cancel();
    } );

  </script>

      </div>

      <div class="modal-footer d-flex justify-content-center">
    
        <button type="submit" class="btn btn-success"> Enviar</button>

        <button class="btn btn-danger" data-dismiss="modal"> Cerrar</button>
      </div>

      {!! Form::close() !!}
    </div>
  </div>
</div>

{{-- end answer modal --}}




    <div id="wrapper">

        
        @include('newtheme.includes.assignmentheader')

        @yield('content')

    </div>
    
        

        @include('newtheme.includes.script')

        @stack('before-scripts')

    <!-- For Js Library -->
    <script src="{{asset('assets/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
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

    @include('includes.partials.ga')

    @if(!empty(config('custom_js')))
        <script>
            {!! config('custom_js') !!}
        </script>
    @endif


<script type="text/javascript">
    $('#my_modal').on('show.bs.modal', function(e) {
    var guidbookquestions_id = $(e.relatedTarget).data('book-id');
    $(e.currentTarget).find('input[name="guidbookquestions_id"]').val(guidbookquestions_id);
});
</script>



<script type="text/javascript">
    $('#six_Question').on('show.bs.modal', function(e) {
    var modalquestion = $(e.relatedTarget).data('book-id');
    $(e.currentTarget).find('input[name="modalquestion"]').val(modalquestion);
});
</script>


<script type="text/javascript">
    
    function chapter_create_modal() {

         // alert($('#title_id').val());

         var histories_id = $('#histories_id').val();
         var title_id = $('#title_id').val();
         var ckValue = $.trim(CKEDITOR.instances["editor4"].getData());


         if (title_id == null || title_id == '') {

            alert('please fill the Title');

            return false;
          
         } else if ( ckValue == null || ckValue == '' ) {

            alert('please fill the Description');
            return false;
         } 

         $.ajax({

            url: '{{route('chapter.store')}}',
            type: 'POST',
            data: {'Value': ckValue, 'histories_id': histories_id, 'title_id': title_id},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success:function (data) {

                    swal({
                          title: "capítulo enviado..!",
                          text: "Quieres seguir escribiendo",
                          icon: "success",
                          buttons: true,
                          dangerMode: true,
                        })
                        .then((willDelete) => {
                          if (willDelete) {

                             window.location = "{{url('last_chapter_created/')}}";
                         
                          } else 

                          {
                             window.location.reload();
                          }
                        });
               
            }

         });


    }


</script>




</body>
</html>