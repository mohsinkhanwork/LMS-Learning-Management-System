@inject('request', 'Illuminate\Http\Request')

<!-- <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->


<style type="text/css">
    
.sidebar {


font-family: 'Open Sans';
font-weight: 600;
background-color: mediumslateblue;

}

.roundside {

background-image: url("{{ asset('new_img/images/roundside.jpg') }}");

}



.newNav {

margin-top: 6%;
    font-family: 'Open Sans';
    font-size: 19px;

}

.sidebar .nav-link.active {
  color: #fff;
   background: #6266EC;
  border-radius: 25px;
      width: 100%;
}

.sidebar .nav-link.active .nav-icon {
  color: #20a8d8;
}

.sidebar .nav-link:hover {
  color: #fff;
  background: mediumslateblue;
  border-radius: 20px;
}



</style>


<div class="sidebar">
    <a href="{{ url('/') }}">
    <div>
         <img src="{{ asset('new_img/images/raylogo.jpg') }}" width="100%">
    </div>
</a>
           

    <nav class="sidebar-nav">
        <ul class="nav newNav">

            <li class="nav-item">
                <a class="nav-link {{ active_class(Active::checkUriPattern('admin/student_dashboard')) }}"
                   href="{{ route('admin.student_dashboard') }}">
                   <img src="{{ asset('new_img/images/home_icon.png') }}"> General
                </a>
            </li>


            <!--=======================Custom menus===============================-->
            @can('order_access')
                <li class="nav-item ">
                    <a class="nav-link {{ $request->segment(1) == 'orders' ? 'active' : '' }}"
                       href="{{ route('admin.orders.index') }}">
                        <i class="nav-icon icon-bag"></i>
                        <span class="title">@lang('menus.backend.sidebar.orders.title')</span>
                    </a>
                </li>
            @endcan
            

            @can('category_access')
                <li class="nav-item ">
                    <a class="nav-link {{ $request->segment(2) == 'categories' ? 'active' : '' }}"
                       href="{{ route('admin.categories.index') }}">
                        <i class="nav-icon icon-folder-alt"></i>
                        <span class="title">@lang('menus.backend.sidebar.categories.title')</span>
                    </a>
                </li>
            @endcan
            
             @if((!$logged_in_user->hasRole('student')) && ($logged_in_user->hasRole('teacher') || $logged_in_user->isAdmin() || $logged_in_user->hasAnyPermission(['course_access','lesson_access','test_access','question_access','bundle_access'])))
                {{--@if($logged_in_user->hasRole('teacher') || $logged_in_user->isAdmin() || $logged_in_user->hasAnyPermission(['course_access','lesson_access','test_access','question_access','bundle_access']))--}}

                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern(['user/courses*','user/lessons*','user/tests*','user/questions*','user/live-lessons*','user/live-lesson-slots*']), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/*')) }}"
                       href="#">
                        <i class="nav-icon icon-puzzle"></i> @lang('menus.backend.sidebar.courses.management')


                    </a>

                    <ul class="nav-dropdown-items">

                        @can('course_access')
                            <li class="nav-item ">
                                <a class="nav-link {{ $request->segment(2) == 'courses' ? 'active' : '' }}"
                                   href="{{ route('admin.courses.index') }}">
                                    <span class="title">@lang('menus.backend.sidebar.courses.title')</span>
                                </a>
                            </li>
                        @endcan

                        @can('lesson_access')
                            <li class="nav-item ">
                                <a class="nav-link {{ $request->segment(2) == 'lessons' ? 'active' : '' }}"
                                   href="{{ route('admin.lessons.index') }}">
                                    <span class="title">@lang('menus.backend.sidebar.lessons.title')</span>
                                </a>
                            </li>
                        @endcan

                        @can('test_access')
                            <li class="nav-item ">
                                <a class="nav-link {{ $request->segment(2) == 'tests' ? 'active' : '' }}"
                                   href="{{ route('admin.tests.index') }}">
                                    <span class="title">@lang('menus.backend.sidebar.tests.title')</span>
                                </a>
                            </li>
                        @endcan


                        @can('question_access')
                            <li class="nav-item">
                                <a class="nav-link {{ $request->segment(2) == 'questions' ? 'active' : '' }}"
                                   href="{{ route('admin.questions.index') }}">
                                    <span class="title">@lang('menus.backend.sidebar.questions.title')</span>
                                </a>
                            </li>
                        @endcan

                        {{-- @can('question_access')
                            <li class="nav-item">
                                <a class="nav-link {{ $request->segment(2) == 'assignment' ? 'active' : '' }}"
                                   href="{{route('assignment.index')}}">
                                    <span class="title">Add Assignment</span>
                                </a>
                            </li>
                        @endcan

                        @can('question_access')
                            <li class="nav-item">
                                <a class="nav-link {{ $request->segment(2) == 'get-assignment-data' ? 'active' : '' }}"
                                   href="{{route('assignment.get_data')}}">
                                    <span class="title">Check Assignment</span>
                                </a>
                            </li>
                        @endcan --}}

                        @can('live_lesson_access')
                            <li class="nav-item ">
                                <a class="nav-link {{ $request->segment(2) == 'live-lessons' ? 'active' : '' }}"
                                   href="{{ route('admin.live-lessons.index') }}">
                                    <span class="title">@lang('menus.backend.sidebar.live_lessons.title')</span>
                                </a>
                            </li>
                        @endcan

                        @can('live_lesson_slot_access')
                            <li class="nav-item ">
                                <a class="nav-link {{ $request->segment(2) == 'live-lesson-slots' ? 'active' : '' }}"
                                   href="{{ route('admin.live-lesson-slots.index') }}">
                                    <span class="title">@lang('menus.backend.sidebar.live_lesson_slots.title')</span>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>

                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern(['user/courses*','user/lessons*','user/tests*','user/questions*','user/live-lessons*','user/live-lesson-slots*']), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/*')) }}"
                       href="#">
                        <i class="nav-icon icon-puzzle"></i> Assignment Management


                    </a>

                    <ul class="nav-dropdown-items">

                        


                        

                        @can('question_access')
                            <li class="nav-item">
                                <a class="nav-link {{ $request->segment(2) == 'assignment' ? 'active' : '' }}"
                                   href="{{route('assignment.index')}}">
                                    <span class="title">Add Assignment</span>
                                </a>
                            </li>
                        @endcan

                        @can('question_access')
                            <li class="nav-item">
                                <a class="nav-link {{ $request->segment(2) == 'get-assignment-data' ? 'active' : '' }}"
                                   href="{{route('assignment.get_data')}}">
                                    <span class="title">UnApprove Assignment</span>
                                </a>
                            </li>
                        @endcan
                        @can('question_access')
                            <li class="nav-item">
                                <a class="nav-link {{ $request->segment(2) == 'get-assignment' ? 'active' : '' }}"
                                   href="{{url('get-assignment')}}">
                                    <span class="title">Approve Assignment</span>
                                </a>
                            </li>
                        @endcan

                        

                    </ul>
                </li>

                @can('bundle_access')
                    <li class="nav-item ">
                        <a class="nav-link {{ $request->segment(2) == 'bundles' ? 'active' : '' }}"
                           href="{{ route('admin.bundles.index') }}">
                            <i class="nav-icon icon-layers"></i>
                            <span class="title">@lang('menus.backend.sidebar.bundles.title')</span>
                        </a>
                    </li>
                @endcan
                @if($logged_in_user->hasRole('teacher') || $logged_in_user->isAdmin())
                    <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern(['user/reports*']), 'open') }}">
                        <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/*')) }}"
                           href="#">
                            <i class="nav-icon icon-pie-chart"></i>@lang('menus.backend.sidebar.reports.title')

                        </a>
                        <ul class="nav-dropdown-items">
                            <li class="nav-item ">
                                <a class="nav-link {{ $request->segment(1) == 'sales' ? 'active' : '' }}"
                                   href="{{ route('admin.reports.sales') }}">
                                    @lang('menus.backend.sidebar.reports.sales')
                                </a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link {{ $request->segment(1) == 'students' ? 'active' : '' }}"
                                   href="{{ route('admin.reports.students') }}">@lang('menus.backend.sidebar.reports.students')
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            @endif



            @if ($logged_in_user->isAdmin() || $logged_in_user->hasAnyPermission(['blog_access','page_access','reason_access']))
                <li class="nav-item nav-dropdown {{ active_class(Active::checkUriPattern(['user/contact','user/sponsors*','user/testimonials*','user/faqs*','user/footer*','user/blogs','user/sitemap*']), 'open') }}">
                    <a class="nav-link nav-dropdown-toggle {{ active_class(Active::checkUriPattern('admin/*')) }}"
                       href="#">
                        <i class="nav-icon icon-note"></i> @lang('menus.backend.sidebar.site-management.title')
                    </a>

                    <ul class="nav-dropdown-items">
                        @can('page_access')
                            <li class="nav-item ">
                                <a class="nav-link {{ $request->segment(2) == 'pages' ? 'active' : '' }}"
                                   href="{{ route('admin.pages.index') }}">
                                    <span class="title">@lang('menus.backend.sidebar.pages.title')</span>
                                </a>
                            </li>
                        @endcan
                        @can('blog_access')
                            <li class="nav-item ">
                                <a class="nav-link {{ $request->segment(2) == 'blogs' ? 'active' : '' }}"
                                   href="{{ route('admin.blogs.index') }}">
                                    <span class="title">@lang('menus.backend.sidebar.blogs.title')</span>
                                </a>
                            </li>
                        @endcan
                        @can('reason_access')
                            <li class="nav-item">
                                <a class="nav-link {{ $request->segment(2) == 'reasons' ? 'active' : '' }}"
                                   href="{{ route('admin.reasons.index') }}">
                                    <span class="title">@lang('menus.backend.sidebar.reasons.title')</span>
                                </a>
                            </li>
                        @endcan
                        

                    </ul>


                </li>
            @else
                @can('blog_access')
                    <li class="nav-item ">
                        <a class="nav-link {{ $request->segment(2) == 'blogs' ? 'active' : '' }}"
                           href="{{ route('admin.blogs.index') }}">
                            <i class="nav-icon icon-note"></i>
                            <span class="title">@lang('menus.backend.sidebar.blogs.title')</span>
                        </a>
                    </li>
                @endcan
                @can('reason_access')
                    <li class="nav-item">
                        <a class="nav-link {{ $request->segment(2) == 'reasons' ? 'active' : '' }}"
                           href="{{ route('admin.reasons.index') }}">
                            <i class="nav-icon icon-layers"></i>
                            <span class="title">@lang('menus.backend.sidebar.reasons.title')</span>
                        </a>
                    </li>
                @endcan
            @endif

            <li class="nav-item ">
                <a class="nav-link {{ $request->segment(1) == 'messages' ? 'active' : '' }}"
                   href="{{ route('admin.student_messages') }}">
                    <img src="{{ asset('new_img/images/message_icon.png') }}"> <span
                            class="title">Mensajes</span>
                </a>
            </li>
            @if ($logged_in_user->hasRole('student'))
                <li class="nav-item ">
                    <a class="nav-link {{ $request->segment(1) == 'invoices' ? 'active' : '' }}"
                       href="{{ route('admin.Student_courses') }}">
                        <img src="{{ asset('new_img/images/course_icon.png') }}"> <span
                                class="title">Cursos</span>
                    </a>
                </li>  

                {{-- <li class="nav-item ">
                    <a class="nav-link {{ $request->segment(1) == 'invoices' ? 'active' : '' }}"
                       href="{{ route('admin.Student_affliate') }}">
                        <img src="{{ asset('new_img/images/affliate_icon.png') }}"> <span
                                class="title">Afiliacion </span>
                    </a>
                </li>    --}}

                @if(auth()->user()->referrer_email == NULL)
                <li class="nav-item ">
                    <a style="cursor:pointer;" class="nav-link {{ $request->segment(1) == 'invoices' ? 'active' : '' }}"
                       data-toggle="modal" data-target="#refemailModal">
                        <img src="{{ asset('new_img/images/affliate_icon.png') }}"> <span
                                class="title">Afiliacion</span>
                    </a>
                </li>
                @else
                <li class="nav-item ">
                    <a class="nav-link {{ $request->segment(1) == 'invoices' ? 'active' : '' }}"
                       href="{{ route('admin.Student_affliate') }}">
                        <img src="{{ asset('new_img/images/affliate_icon.png') }}"> <span
                                class="title">Afiliacion</span>
                    </a>
                </li>
                @endif

                <li class="nav-item ">
                    <a class="nav-link {{ $request->segment(1) == 'invoices' ? 'active' : '' }}"
                       href="{{ route('admin.invoices.index') }}">
                        <img src="{{ asset('new_img/images/invoice_icon.png') }}"> </i><span
                                class="title">Facturas</span>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ $request->segment(1) == 'certificates' ? 'active' : '' }}"
                       href="{{ route('admin.certificates.index') }}">
                        <img src="{{ asset('new_img/images/certificate_icon.png') }}"> <span
                                class="title">Certificados</span>
                    </a>
                </li>
            @endif
       

           
            <li class="nav-item ">
                <a class="nav-link {{ $request->segment(1) == 'account' ? 'active' : '' }}"
                   href="{{ route('admin.student_account') }}">
                    <i class="fas fa-key"></i> <span class="title">Cuenta</span>
                </a>
            </li>

            @if ($logged_in_user->hasRole('student'))
           
            <div class="roundside" style="box-shadow: 0 0 37px 7px mediumslateblue inset;">
            <li class="nav-item ">
                <a class="nav-link {{ $request->segment(1) == 'subscriptions' ? 'active' : '' }}"
                   href="{{ route('admin.subscriptions') }}">
                    <img src="{{ asset('new_img/images/subs_icon.png') }}">
                    <span class="title">Suscripcion</span>
                </a>
            </li>
            <li class="nav-item " style="height: 200px;">
                <a class="nav-link {{ $request->segment(1) == 'wishlist' ? 'active' : '' }}"
                   href="{{ route('admin.wishlist.index') }}">
                    <img src="{{ asset('new_img/images/wish_icon.png') }}">
                    <span class="title">Lista de deseos</span>
                </a>
            </li>

            </div>
            @endif
           

        </ul>
    </nav>

    {{-- <button class="sidebar-minimizer brand-minimizer" type="button"></button> --}}

    <!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script> -->
</div><!--sidebar-->
