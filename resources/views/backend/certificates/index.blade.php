@extends('backend.layouts.student_app')

@section('title', __('labels.backend.certificates.title').' | '.app_name())





@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<style type="text/css">

.newR {
font-family: 'Font Awesome 5 Free';
    font-size: 17px;

}

.newHead {
    background-color: mediumslateblue;
    color: white;
    font-family: 'Font Awesome 5 Free';
}

.newBody {
        background-color: aliceblue;
}
    
/*desktop*/

@media screen and (max-width: 768px) {
.newCard {

    
    } 
}

/*laptop*/

@media screen                                           
  and (min-device-width: 1200px) 
  and (max-device-width: 1600px) 
  and (-webkit-min-device-pixel-ratio: 1) { 

.newCard {

}

}

/*mobile*/


@media screen and (max-width: 425px) {
.newCard {

    
    } 
}


.container {

 display: flex;
    margin-right: -7%;
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
    width: 100%;
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


</style>
<div class="row">
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

<div class="topFull">
 <div class="container">
    <div style="width: 32%;">
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


</div>
    <div class="card newR">
        <div class="card-header newHead">
            <h3 class="page-title ">@lang('labels.backend.certificates.title')</h3>
        </div>
        <div class="card-body newBody">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">

                        <table id="myTable"
                               class="table table-bordered table-striped ">
                            <thead>
                            <tr>
                                <th>@lang('labels.general.sr_no')</th>
                                <th>@lang('labels.backend.certificates.fields.course_name')</th>
                                <th>@lang('labels.backend.certificates.fields.progress')</th>
                                <th>@lang('labels.backend.certificates.fields.action')</th>
                            </tr>
                            </thead>

                            <tbody>
                            @if(count($certificates) > 0)
                                @foreach($certificates as $key=>$certificate)
                                    @php $key++; @endphp
                                    <tr>
                                        <td>{{$key}}</td>
                                        <td>{{$certificate->course->title}}</td>
                                        <td>{{$certificate->course->progress() }}%</td>
                                        <th>
                                            @if($certificate->course->progress() == 100)
                                                <a href="{{asset('storage/certificates/'.$certificate->url)}}" class="btn btn-success">
                                                    @lang('labels.backend.certificates.view') </a>

                                                <a class="btn btn-primary" href="{{route('admin.certificates.download',['certificate_id'=>$certificate->id])}}">
                                                    @lang('labels.backend.certificates.download') </a>
                                            @endif
                                        </th>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@push('after-scripts')
    <script>

        $(document).ready(function () {

            $('#myTable').DataTable({
                dom: 'lfBrtip<"actions">',
                buttons: [
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: [0, 1, 2]

                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                    'colvis'
                ],
                language:{
                    url : "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/{{$locale_full_name}}.json",
                    buttons :{
                        colvis : '{{trans("datatable.colvis")}}',
                        pdf : '{{trans("datatable.pdf")}}',
                        csv : '{{trans("datatable.csv")}}',
                    }
                }

            });
        });

    </script>

@endpush