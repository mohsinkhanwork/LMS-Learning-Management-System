<!DOCTYPE html>
@if(config('app.display_type') == 'rtl' || (session()->has('display_type') && session('display_type') == 'rtl'))
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

    @else
        <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

        @endif
        {{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">--}}
        {{--@else--}}
        {{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
        {{--@endlangrtl--}}
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <title>Escuela de Escritura Creativa &#8211; Escuela de Escritura Creativa</title>
            {{-- <meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">
            <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
            @if(config('favicon_image') != "")
                <link rel="shortcut icon" type="image/x-icon"
                      href="{{asset('storage/logos/'.config('favicon_image'))}}"/>
            @endif --}}
            @yield('meta')
            <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
            <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.css')}}">
            <script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script>

            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css">

            <link rel="stylesheet"
                  href="//cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>
            <link rel="stylesheet"
                  href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css"/>
            <link rel="stylesheet"
                  href="//cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css"/>
            {{--<link rel="stylesheet"--}}
            {{--href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.standalone.min.css"/>--}}
            {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}




            @stack('before-styles')

        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
            <!-- Otherwise apply the normal LTR layouts -->
            {{ style(mix('css/backend.css')) }}


            @stack('after-styles')

            @if((config('app.display_type') == 'rtl') || (session('display_type') == 'rtl'))
                <style>
                    .float-left {
                        float: right !important;
                    }

                    .float-right {
                        float: left !important;
                    }
                </style>
            @endif

<style type="text/css">
    
.container-fluid {

    background-color: white;
}


</style>

        </head>

        <body class="{{ config('backend.body_classes') }}">

            {{-- history create modal --}}
            


{{-- finish history create modal --}}



        @include('backend.includes.student_header')

        <div class="app-body">
            @include('backend.includes.student_sidebar')

            <main class="main">
                @include('includes.partials.logged-in-as')
                {{--{!! Breadcrumbs::render() !!}--}}

                <div class="container-fluid" style="padding-top: 30px">
                    <div class="animated fadeIn">
                        <div class="content-header">
                            @yield('page-header')
                        </div><!--content-header-->

                        @include('includes.partials.messages')
                        @yield('content')
                    </div><!--animated-->
                </div><!--container-fluid-->
            </main><!--main-->

            {{--@include('backend.includes.aside')--}}
            <!-- The Modal -->
            {!! Form::open(['method' => 'post', 'route' => ['getemail']]) !!}
              <div class="modal" id="refemailModal" style="margin-top:11%">
                <div class="modal-dialog modal-lg" style=" background-color: #E4E5E6;">
                  <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header alert alert-primary">
                      <h4 class="modal-title" style="padding-left: 20%;">Invita a tus amigos con tu enlace de afiliado y gana dinero. Comisiones del 80% por la primera venta. Deja tu email de Paypal para inscribirte en el programa de afiliado. Conviértete en un embajador de la escuela. </h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                      {{-- {!! Form::label('email', 'E-Mail Address', ['class' => 'awesome']) !!} --}}
                      <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                      <input type="email" name="referrer_email" placeholder="ingrese correo electronico" class="form-control" required="true">
                      <br>
                      <button type="submit" class="btn btn-danger"><div>Guardar</div></button>
                    </div>
                    <!-- Modal footer -->
                    {{-- <div class="modal-footer">
                    </div> --}}
                  </div>
                </div>
              </div>
          </form>
        </div><!--app-body-->

        @include('backend.includes.footer')

        <!-- Scripts -->
        @stack('before-scripts')
        {!! script(mix('js/manifest.js')) !!}
        {!! script(mix('js/vendor.js')) !!}
        {!! script(mix('js/backend.js')) !!}
        <script>
            //Route for message notification
            var messageNotificationRoute = '{{route('admin.messages.unread')}}'
        </script>
        <script src="//cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
        <script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
        <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script src="{{asset('js/pdfmake.min.js')}}"></script>
        <script src="{{asset('js/vfs_fonts.js')}}"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


        <script src="{{asset('js/select2.full.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/main.js')}}" type="text/javascript"></script>
        <script>
            window._token = '{{ csrf_token() }}';
        </script>

        @stack('after-scripts')

        </body>
        </html>
