@extends('newtheme.assignmentlayout')

@section('content')

  <script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style type="text/css">
  
.textareaSize {
      resize: none !important;
    height: unset;
    background: none;
    color: black;
    font-family: 'Linearicons-Free';
    font-size: 18px;
}

.CommentHeader {

  background-color: gray;
    text-align: center;
    padding: 1%;
    color: white;
    font-family: 'Linearicons-Free';
    font-size: 24px;
}

.topInput {
  background: white !important;
  border: 1px solid darkgray !important;
  font-weight: bold;
}

.secondinput {
     background: white !important;
}

.biginput {

  border: 1px solid darkgray;
    padding: 1%;
    background-color: white;
    border-radius: 22px;
}

.cke_inner.cke_reset {
    border: none !important;
    box-shadow: 9px 6px 10px lightgrey;
}

.cke_chrome {
    border: none !important;
}

.saveButton {

    background-color: #feae96;
background-image: linear-gradient(315deg, #feae96 0%, #fe0944 74%);
color: white !important;
}

.submitTeacher {

 background-color: #63d471;
background-image: linear-gradient(315deg, #63d471 0%, #233329 74%);
color: white !important;
}

/*.hide{
  display:none;
}
.show{
  display:block;
}*/


</style>

{!! Form::open(['method' => 'PUT', 'route' => ['history.update',  $history->id], 'enctype' => 'multipart/form-data']) !!}

<div>
  

<div class="col-md-9 col-12 " style="background-color: #E8E8E8;">

    
  @if( Session::has('success'))
  <div class="alert alert-success">
    <p>{{ Session::get('success') }}</p>
  </div>
  @endif
  
    

  <div class="card-body">
    <input type="hidden" name="user_id" value="{{auth()->user()->id ?? ''}}">
<input type="hidden" name="id" value="{{$history->id ?? ''}}">
    
    <p class="card-text" style="box-shadow: 5px 6px lightgrey;">

     <input type="text" class="form-control topInput" name="title" value="{{$history->title}}">

     </p> 

     <br>  
    

    <p style="box-shadow: 9px 6px 10px lightgrey;">

     <!-- <input type="text" class="form-control secondinput" placeholder="Edit Title"  name="title" required="required" > -->

     </p> 


     <p>
<textarea class="textareaSize" id="editor3" name="description" >{!! $history->description !!}</textarea>

  <script>
    // We need to turn off the automatic editor creation first.
    CKEDITOR.disableAutoInline = true;

    CKEDITOR.replace('editor3');
  </script>
</p>

  {{$errors->first('description')}}

<br>

  <div style="display: flex;">
      <div style="text-align: left; width: 50%;">
        <span style="color: red">* Please Save you work before Submitting to teacher</span><br>

     <button type="submit" class="btn btn-default saveButton" style="background-color: #F7F7F7;color: black;"> save </button> 

     <a href="{{url('/history')}}" class="btn btn-primary" style="background-color: #F7F7F7;color: black;"> cancelar </a>
     </div>

    <div style="text-align: right;width: 50%;">


     <a href="{{url('studenthistory')}}/{{$history->id}}"  class="btn btn-default submitTeacher"> Submit to teacher </a>
     </div>


    
  </div>

  </div>

</div>
{!! Form::close() !!}


<div class="col-md-3 col-12 ">
<div style="border: 1px solid darkgray;padding: 2%;">

  <div>
    
    <h3 class="CommentHeader"> profesor comentarios </h3>

  @if($history->historycomments->count() > 0)
      @foreach($history->historycomments as $comment)
      <div class="row mainwrapper">
        <div class="col-sm-2 col-12" style="text-align: center;">
        <div style="background-color: red;color: white;border-radius: 52px;width: 30px;margin-left: 10px;">RB</div>
         </div>
        <div class="col-sm-9 col-12 reply">
          <div style="font-weight: bold;">Ray Bolivar</div>
          <div class="alert alert-info" style="font-size: 15px;">{{$comment->select_text}}</div>
          <div style="display: flex; width: 100%;margin-bottom: 7px;">
          <div style="font-family: 'Linearicons-Free'; margin-top: -9px; margin-bottom: 13px; width: 70%; font-size: 18px">
            <i class='fas fa-user-alt'></i> {!! $comment->comment !!}
          </div>
          <div style="width: 30%; text-align: right;">
          <input type="button" class="btn2" id="btn-2" class="btn btn-secondary"  value="Reply"/>
          </div>
          </div>
          <form action="{{route('history_comment_reply')}}" method="POST">
            @csrf
            <input type="hidden" name="history_comments_id" value="{{$comment->id}}">
          <div class="add" id="textInput"  style="margin-bottom: 7px;" >
          </div>
          </form>
        </div>
      </div>
      @foreach($comment->HistoryCommentReplys as $reply)
      <div class="row" style="margin-bottom: 5%;">
         <div class="col-sm-2 col-12" >
        {{-- <div style="background-color: grey;color: white;text-align: center;border-radius: 20px;">
        ST
      </div> --}}
         </div>
         <div class="col-sm-9 col-12 reply">
          <i class='fas fa-user-alt'></i> {{$reply->comment}} <span style="font-size: 13px;font-weight: bold; font-family: 'Circular-Loom';">  ({{$reply->created_at->format('H:i:s')}}) </span>
         </div>
      </div>
      @endforeach
      @endforeach
      @endif
      

  </div>

  </div>

</div>


</div>



<script>
  var keyscount = 0;
  var ckValue= '';
  CKEDITOR.disableAutoInline = true;
                  CKEDITOR.replace('editor3');
  CKEDITOR.instances["editor3"].on( 'contentDom', function() {
    CKEDITOR.instances.editor3.document.on('paste',function(event){
      setTimeout(function(){
        savecontent(ckValue);
      },2000)
    })
    CKEDITOR.instances.editor3.document.on('keyup', function(event) {
      console.log(event.type);
    keyscount++;
    if (keyscount > 2) {
                  savecontent(ckValue);
                 keyscount=0;
                }
    });
} );
  function savecontent(ckValue){
    ckValue = $.trim(CKEDITOR.instances["editor3"].getData());
    var title = $("input[name~='title']").val();
    var id = $("input[name~='id']").val();
    //console.log(ckValue);
    $.ajax({
            url: '{{url('history-store')}}',
            type: 'POST',
            data: {'Value':ckValue, 'id': id, 'title': title},
            success:function(save_id){
              //$("#asset-form input[name~='id']").val(save_id);
            }
                  })
  }
</script>

<script>


  $('.mainwrapper').on("click",".btn2",function(e){
        e.preventDefault();
        $(this).parents('.reply').find(".add").html('<input type="text" name="comment" required value="" placeholder="reply to admin" style="width: 100%; margin-bottom: 7px;"><input type="submit" value="SEND" class="btn btn-success" >');
        
    })


</script>

@endsection