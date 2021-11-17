@extends('backend.layouts.student_app')
@push('after-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/amigo-sorter/css/theme-default.css')}}">
    <style>
        ul.sorter > span {
            display: inline-block;
            width: 100%;
            height: 100%;
            background: #f5f5f5;
            color: #333333;
            border: 1px solid #cccccc;
            border-radius: 6px;
            padding: 0px;
        }

        ul.sorter li > span .title {
            padding-left: 15px;
        }

        ul.sorter li > span .btn {
            width: 20%;
        }



.newCard {
    border-radius: 27px;
    font-family: 'Font Awesome 5 Free';
    font-size: 18px;
}

.newbody {
       background-color: #E8F1FF;

    border-radius: 25px;
}

.downbutton {

    background-color: #7FB6FF;
    color: white;
    padding: 2%;
    border-radius: 9px;
    font-family: 'Font Awesome 5 Free';
    font-size: 18px;

}

.dangerButton {

    background-color: hotpink;
    color: white;
    padding: 2%;
    margin: 2%;
    font-family: 'Font Awesome 5 Free';
    font-size: 17px;
    border-radius: 11px;
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
@endpush

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

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

    <div class="card newCard">
        <div class="card-header" style="background-color: #7D81EF;
    color: white;
    font-family: 'Font Awesome 5 Free';">
            <h3 class="page-title d-inline">@lang('labels.backend.invoices.title')</h3>

        </div>
        <div class="card-body newbody">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="myTable"
                               class="table table-bordered table-striped ">
                            <thead>
                            <tr>
                                <th>@lang('labels.general.sr_no')</th>
                                <th>@lang('labels.backend.invoices.fields.order_date')</th>
                                <th>@lang('labels.backend.invoices.fields.amount')</th>
                                @if( request('show_deleted') == 1 )
                                    <th>&nbsp; @lang('strings.backend.general.actions')</th>
                                @else
                                    <th>&nbsp; @lang('strings.backend.general.actions')</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $key=>$item)
                                @php $key++ @endphp
                                <tr>
                                    <td>
                                        {{ $key }}
                                    </td>
                                    <td>
                                        {{$item->order->updated_at->format('d M, Y | h:i A')}}
                                    </td>
                                    <td>
                                        {{$appCurrency['symbol'].' '.$item->order->amount}}
                                    </td>

                                    <td>
                                        @php
                                            $hashids = new \Hashids\Hashids('',5);
                                                 $order_id = $hashids->encode($item->order_id);
                                                @endphp

                                        <a target="_blank" href="{{route('admin.invoices.view', ['code' => $order_id])}}"
                                           class="dangerButton">
                                            @lang('labels.backend.invoices.fields.view')
                                        </a>

                                        <a href="{{route('admin.invoice.download',['order'=>$order_id])}}"
                                           class="downbutton">
                                            @lang('labels.backend.invoices.fields.download')
                                        </a>

                                        {{--<a target="_blank" href="{{asset('storage/invoices/'.$item->url)}}"--}}
                                           {{--class="btn mb-1 btn-danger">--}}
                                            {{--@lang('labels.backend.invoices.fields.view')--}}
                                        {{--</a>--}}

                                        {{--<a href="{{route('admin.invoice.download',['order'=>$item->order_id])}}"--}}
                                           {{--class="btn mb-1 btn-success">--}}
                                            {{--@lang('labels.backend.invoices.fields.download')--}}
                                        {{--</a>--}}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('after-scripts')
    <script src="{{asset('plugins/amigo-sorter/js/amigo-sorter.min.js')}}"></script>

    <script>


        $(document).ready(function () {

            $('#myTable').DataTable({
                processing: true,
                serverSide: false,
                iDisplayLength: 10,
                retrieve: true,


                columnDefs: [
                    {"width": "10%", "targets": 0},
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

        $('ul.sorter').amigoSorter({
            li_helper: "li_helper",
            li_empty: "empty",
        });
    </script>
@endpush

