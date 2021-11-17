@inject('request', 'Illuminate\Http\Request')
@extends('backend.layouts.student_app')
@push('after-styles')
    @if(session()->get('display_type') && session()->get('display_type') == "rtl")
        <style>
            .message-box .msg_send_btn{
                right: unset !important;
                left: 0 !important;
            }
        </style>
    @endif
    <style>
        textarea {
            resize: none;
        }

.messageBox {


}

.newsearch {
    background-color: #7FB6FF;
    border-radius: ;
    text-align: center;
}

.newHeader {
    border-radius: px;
    background-color: #7D81Ef;
    color: white;
    font-family: 'Font Awesome 5 Free';
}

::placeholder {
  color: black;
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
.firstBox {



    
    } 
}






    </style>
@endpush
@section('content')

    <div class="card message-box messageBox">
        <div class="card-header newHeader">
            <h3 class="page-title mb-0">@lang('labels.backend.messages.title')

                <a href="{{route('admin.student_messages').'?threads'}}"
                   class="d-lg-none text-decoration-none threads d-md-none float-right">
                    <i class="icon-speech font-weight-bold"></i>
                </a>
            </h3>
        </div>
        <div class="card-body">
            <div class="messaging">
                <div class="inbox_msg">
                    <div class="inbox_people d-md-block d-lg-block ">
                        <div class="headind_srch newsearch">
                            @if(request()->has('thread'))
                            <div class="recent_heading btn-sm btn btn-primary" style="margin-top: 2%;">
                                <a class="text-decoration-none" href="{{route('admin.student_messages')}}">
                                    <h5 class="text-white mb-0"><i class="icon-plus"></i>&nbsp;&nbsp; @lang('labels.backend.messages.compose')</h5>
                                </a>
                            </div>
                            @endif
                            <div style="height: 125% !important;" class="srch_bar @if(!request()->has('thread')) text-left @endif">
                                <div class="stylish-input-group" style="height: 103% !important;">
                                    <input style="margin: 2%;background: white !important;
    width: 97%;
    height: 78%;" type="text" class="search-bar" id="myInput" placeholder="@lang('labels.backend.messages.search_user')">
                                    <span class="input-group-addon">
                                        <button type="button">
                                            <i class="fa fa-search" aria-hidden="true"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="inbox_chat" style="background-color: aliceblue;
    border-radius: px;
    margin: 1%;
    color: black;">
                            @if($threads->count() > 0)
                                @foreach($threads as $item)
                                    @if($item->latestMessage)
                                        <a class="@if($item->userUnreadMessagesCount(auth()->user()->id)) unread
                                            @endif" href="{{route('admin.student_messages').'?thread='.$item->id}}" style="background-color: #7FB6FF;">
                                            <div data-thread="{{$item->id}}"
                                                 class="chat_list @if(($thread != "") && ($thread->id == $item->id))  active_chat @endif" >
                                                <div class="chat_people">

                                                    <div class="chat_ib">
                                                        <h5>{{ $item->participants()->with('user')->where('user_id','<>', auth()->user()->id)->first()->user->name }}
                                                            @if($item->participants()->count() > 2)
                                                            + {{ ($item->participants()->count()-2) }} @lang('labels.general.more')
                                                            @endif
                                                            <span
                                                                class="chat_date">{{ $item->messages()->orderBy('id', 'desc')->first()->created_at->diffForHumans() }}</span>
                                                            @if($item->userUnreadMessagesCount(auth()->user()->id) > 0)
                                                                <span class="badge badge-primary mr-5">{{$item->userUnreadMessagesCount(auth()->user()->id)}}</span>
                                                            @endif
                                                        </h5>
                                                        <p style="color: black;">{{ str_limit($item->messages()->orderBy('id', 'desc')->first()->body , 35) }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                    @if(request()->has('thread'))
                        <form method="post" action="{{route('admin.student_messages.reply')}}">
                            @csrf

                            <input type="hidden" name="thread_id" value="{{isset($thread->id) ? $thread->id : 0}}">
                            <div class="headind_srch ">
                                <div class="chat_people box-header">
                                    <div class="chat_img float-left">
                                        <img src="https://ptetutorials.com/images/user-profile.png"
                                             alt="" height="35px"></div>
                                    <div class="chat_ib float-left">

                                        <h5 class="mb-0 d-inline float-left">
                                            {{ $thread->participants()->with('user')->where('user_id','<>', auth()->user()->id)->first()->user->name }}
                                            @if($thread->participants()->count() > 2)
                                                + {{ ($thread->participants()->count()-2) }} @lang('labels.general.more')
                                            @endif
                                        </h5>
                                        <p class="float-right d-inline mb-0">
                                            <a class="" href="{{route('admin.student_messages',['thread'=>$thread->id])}}">
                                                <i class="icon-refresh font-weight-bold"></i>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mesgs">
                                <div class="msg_history" style="height:485px;">
                                    @if(count($thread->messages) > 0 )
                                        @foreach($thread->messages as $message)
                                            @if($message->user_id == auth()->user()->id)
                                                <div class="outgoing_msg">
                                                    <div class="sent_msg">
                                                        <p>{{$message->body}}</p>
                                                        <span class="time_date text-right"> {{\Carbon\Carbon::parse($message->created_at)->format('M d Y')}}
                                                    </span></div>
                                                </div>
                                            @else
                                                <div class="incoming_msg">
                                                    <div class="incoming_msg_img"><img
                                                                src="https://ptetutorials.com/images/user-profile.png"
                                                                alt=""></div>
                                                    <div class="received_msg">
                                                        <div class="received_withd_msg">
                                                            <p>{{$message->body}}</p>
                                                            <span class="time_date">{{\Carbon\Carbon::parse($message->created_at)->format(' M d Y')}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                                <div class="type_msg">
                                    <div class="input_msg_write">
                                        <textarea style="color: black !important;" type="text" name="message" class="write_msg"
                                                  placeholder="Type a message"></textarea>
                                        <button class="msg_send_btn" type="submit">
                                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @else
                        <form method="post" action="{{route('admin.student_messages.send')}}">
                            @csrf

                            <div class="headind_srch bg-dark" style="background-color: #7FB6FF !important;
    font-size: 25px;
    font-family: 'Font Awesome 5 Free';
    border-radius: px;">
                                <div class="chat_people header row">
                                    <div class="col-12 col-lg-3">
                                        <p class="font-weight-bold text-white mb-0" style="line-height: 21px">{{trans('labels.backend.messages.select_recipients')}}:</p>
                                    </div>
                                    <div class="col-lg-9 col-12 text-dark">
                                        {!! Form::select('recipients[]', $teachers, (request('teacher_id') ? request('teacher_id') : old('recipients')), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="mesgs" style="background-color: #E8F1FF;border-radius: px;">
                                <div class="msg_history" style="height: 485px;">
                                    <p class="text-center">{{trans('labels.backend.messages.start_conversation')}}</p>
                                </div>
                                <div class="type_msg">
                                    <div class="input_msg_write">
                                        {{--<input type="text" class="write_msg" placeholder="Type a message"/>--}}
                                        <textarea type="text" name="message" class="write_msg"
                                                  placeholder="{{trans('labels.backend.messages.type_a_message')}}"></textarea>
                                        <button class="msg_send_btn" type="submit">
                                            <i class="fas fa-paper-plane"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
@push('after-scripts')
    <script>

        $(document).ready(function () {
            //Get to the last message in conversation
            $('.msg_history').animate({
                scrollTop: $('.msg_history')[0].scrollHeight
            }, 1000);

            //Read message
            setTimeout(function () {
                var thread = '{{request('thread')}}';
               var message =  $(".inbox_chat").find("[data-thread='" + thread + "']");
                message.parent('a').removeClass('unread');
                message.find('span.badge').remove();
            }, 500 );

            //Filter in conversation
            $("#myInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $(".chat_list").parent('a').filter(function () {
                    $(this).toggle($(this).find('h5,p').text().toLowerCase().trim().indexOf(value) > -1)
                });
            });

        });

    </script>
@endpush
