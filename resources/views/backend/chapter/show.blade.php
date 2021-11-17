@extends('backend.layouts.app')
@section('title', __('labels.backend.coupons.title').' | '.app_name())

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script>
<style type="text/css">
.popup-tag{
position:absolute;
display:none;
background-color:darkgray;
padding:10px;
font-size:17px;
font-weight:bold;
cursor:pointer;
-webkit-filter: drop-shadow(0 1px 10px rgba(113,158,206,0.8));
}

.CommentHeader {

  background-color: gray;
    text-align: center;
    padding: 1%;
    color: white;
    font-family: 'Linearicons-Free';
    font-size: 24px;
}

</style>
    
        @if( Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
    @endif
<div class="row" style="display: flex;">
    <div class="col-md-9 col-12">
    <div class="card">
        <div class="card-header">
           
           <div class="float-right">
                <a href="{{ url('guidebook') }}"
                   class="btn btn-success">Back to list</a>
            </div>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered table-striped">
                       <tr>
                           <th width="20%">User</th>
                           <td>
                             {{$chapter->history->user['name']}}
                           </td>
                       </tr>
                       
                       <tr>
                           <th width="20%">Title</th>
                           <td>
                             {{$chapter->title}}
                           </td>
                       </tr>

                       <tr>
                           <th width="20%">Description</th>
                           <td id="my-textarea" >
                                {!! $chapter->description !!}
                             
                           </td>
                       </tr>
                        
                        
                    </table>
                </div>
            </div><!-- Nav tabs -->
            
           <!--  {!! Form::open(['method' => 'PUT', 'route' => ['updatechapter', $chapter->id]]) !!}

            @csrf

        <table class="table table-bordered table-striped">
         <th width="20%">Add Comments</th>
             <td>
                 <textarea name="comment" id="editor2" rows="5" cols="80" required>{{$chapter->comment}}

                </textarea>


             </td> 

             <script>
    // We need to turn off the automatic editor creation first.
    CKEDITOR.disableAutoInline = true;

    CKEDITOR.replace('editor2');
  </script>

            </table>
            
            {{-- <input type="hidden" name="assignment_id" value="{{$Assignment->Assignment->id}}">
             --}}
            {{-- <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
 --}}
            

            
            <button type="submit"  style="margin-top: 10px;"  class="btn btn-primary border">Click to Comment</button>
            </form> -->
            
            
            
            
        </div>
    </div>
</div>


<div class="col-md-3 col-12 ">
<div style="border: 1px solid darkgray;padding: 2%;">

    <div>
        <h3 class="CommentHeader"> Teacher Comments </h3>
          @if($chapter->chaptercomments->count() > 0)
          @foreach($chapter->chaptercomments as $comment)
          <div class="row mainwrapper">
            <div class="col-sm-2 col-12" style="text-align: center;">
            <div style="background-color: red;color: white;border-radius: 52px;width: 30px;margin-left: 10px;">RB</div>
             </div>
            <div class="col-sm-9 col-12 reply">
              <div style="font-weight: bold;">Ray Bolivar</div>
              <div class="alert alert-info" style="font-size: 15px;">{{$comment->select_text}}</div>
              {{-- <div style="font-family: 'Linearicons-Free'; margin-top: -15px;">{!! $comment->comment !!}</div> --}}
              <div style="display: flex; width: 100%;margin-bottom: 7px;">
              <div style="font-family: 'Linearicons-Free'; margin-top: -9px; margin-bottom: 13px; width: 70%; font-size: 16px;">
                <i class='fas fa-user-alt'></i> {!! $comment->comment !!}
            </div>
              <div style="width: 30%; text-align: right;">
              <input type="button" class="btn2" id="btn-2" class="btn btn-secondary"  value="Reply"/>
              </div>
              </div>
              <form action="{{route('chapter_comment_reply')}}" method="POST">
                @csrf
                <input type="hidden" name="chapter_comments_id" value="{{$comment->id}}">
              <div class="add" id="textInput"  style="margin-bottom: 7px;" >
              </div>
              </form>
            </div>
          </div>
          @foreach($comment->ChapterCommentReplys as $reply)
          <div class="row" style="margin-bottom: 5%;">
             <div class="col-sm-2 col-12" >
            {{-- <div style="background-color: grey;color: white;text-align: center;border-radius: 20px;">
            ST
          </div> --}}
             </div>
             <div class="col-sm-9 col-12 reply" style="font-family: 'Linearicons-Free';font-size: 16px;">
                <i class='fas fa-user-alt'></i> {{$reply->comment}} ({{$reply->created_at->format('H:i:s')}})
             </div>
          </div>
          @endforeach
          @endforeach
          @endif
      </div>




  </div>

</div>
</div>


<span class="popup-tag">
                                
                            <div class="row" style="margin: 0">Add Comments</div>
                            <div class="row" style="margin: 0">
                                
                                <form action="{{url('chapter_comment')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{$chapter->history->user_id}}">
                                    <input type="hidden" name="chapters_id" value="{{$chapter->id}}">
                                    <input type="hidden" name="select_text" value="">
                                    <textarea cols="40" rows="12" name="comment" required="true"></textarea><br>

                                    <div style="text-align: center;">

                                    <button type="submit" class="btn btn-success">SEND</button>
                                        
                                    </div>

                                </form>


                            </div>

</span>

<script type="text/javascript">
    function getSelected() {
    if(window.getSelection) { return window.getSelection(); }
    else if(document.getSelection) { return document.getSelection(); }
    else {
        var selection = document.selection && document.selection.createRange();
if(selection.text) { 

    return selection.text; 

        }
        return false;
    }
    return false;
}
/* create sniffer */
$(document).ready(function() {
    $('#my-textarea').mouseup(function(event) {
        var selection = getSelected();
        selection = $.trim(selection);
        if(selection != ''){

        $("span.popup-tag").css("display","block");
        $("span.popup-tag").css("top",event.clientY);
        $("span.popup-tag").css("left",event.clientX);

        $("input[name~='select_text']").val(selection);

        // $("span.popup-tag").text(selection);

        }else{
        $("span.popup-tag").css("display","none");
        }
    });
});
</script>



<script>
    $('.mainwrapper').on("click",".btn2",function(e){
          e.preventDefault();
          $(this).parents('.reply').find(".add").html('<input type="text" required name="comment" value="" placeholder="reply to student" style="width: 100%; margin-bottom: 7px;"><input type="submit"  value="SEND" class="btn btn-success" >');
          //$(this).parents('.reply').find(".add").hide();
      })
  </script>


@stop