@extends('newtheme.assignmentlayout')

@section('content')

  <script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script>

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


</style>




<div style="width: 100%;display: flex;background-color: #E8E8E8;justify-content: center;">
@php $i = 1;  @endphp
@foreach($six_answers as $six_answer)
  
  <div style="">

  <a href="#six_Question"  data-toggle="modal" class="btn btn-primary" data-book-id="{!! strip_tags($six_answer->answers) !!}"> Answers {{$i}} </a> &nbsp;

  </div>

  @php $i++;  @endphp
  @endforeach

  
</div>


{!! Form::open(['method' => 'PUT', 'route' => ['chapter.update', $Chapter->id], 'enctype' => 'multipart/form-data']) !!}

<div>
<div class="col-md-9 col-12" style="background-color: #E8E8E8;">

    @if( Session::has('success'))
  <div class="alert alert-success">
    <p>{{ Session::get('success') }}</p>
  </div>
  @endif

  <div style="text-align: right;margin-top: 15px;">
     @if( is_numeric($history))
<a href="{{url('/chapterIndex_with_historyID/'. $history)}}" class="btn btn-primary" style="color:  white; margin-right: 100px;"> Regresar a los capítulos </a>

@else

<a href="{{url('/chapterIndex_with_historyID/'. $history->id)}}" class="btn btn-primary" style="color: white;margin-right: 100px;"> Regresar a los capítulos </a>
@endif
    
  </div>

	<div class="card-body">
<input type="hidden" name="id" value="{{$Chapter->id ?? ''}}">
    
 
    <p class="card-text" style="box-shadow: 5px 6px lightgrey;">

    <input type="text" class="form-control topInput"  name="title"  value="{{$Chapter->title}}">

    </p>   

    <div class="card-text biginput">

       <p style="box-shadow: 9px 6px 10px lightgrey;">

     <!-- <input type="text" class="form-control secondinput" placeholder="Write Title"  name="title" required="required" > -->

     </p> 


<textarea class="textareaSize" id="editor5" name="description" >{{$Chapter->description}}</textarea>

  <script>
    // We need to turn off the automatic editor creation first.
    CKEDITOR.disableAutoInline = true;

    CKEDITOR.replace('editor5');
  </script>

  
</div>
<br>


<div style="display: flex;">

<div style="text-align: left; width: 50%;">
  <span style="color: red">* Guarda el texto antes de enviarlo al profesor</span><br>
  
 <button type="submit" class="btn btn-default saveButton" style="background-color: #F7F7F7;color: black;"> Guardar </button> 

@if( is_numeric($history))
<a href="{{url('/chapterIndex_with_historyID/'. $history)}}" class="btn btn-primary" style="background-color: #F7F7F7;color: black;"> Cancelar </a>

@else

<a href="{{url('/chapterIndex_with_historyID/'. $history->id)}}" class="btn btn-primary" style="background-color: #F7F7F7;color: black;"> Cancelar </a>
@endif



  
</div>
<div style="text-align: right; width: 50%;">

 

  <a href="{{url('studentchaptor')}}/{{$Chapter->id}}" class="btn btn-default submitTeacher">  Enviar al profesor </a>

</div>




     </div>

</div>


</div>
{!! Form::close() !!}




<div class="col-md-3 col-12 ">
    <div style="border: 1px solid darkgray;padding: 2%;">

      <div>
        <h3 class="CommentHeader"> Teacher Comments </h3>
          @if($Chapter->chaptercomments->count() > 0)
          @foreach($Chapter->chaptercomments as $comment)
          <div class="row mainwrapper">
            <div class="col-sm-2 col-12" style="text-align: center;">
            <div style="background-color: red;color: white;border-radius: 52px;width: 30px;margin-left: 10px;">RB</div>
             </div>
            <div class="col-sm-9 col-12 reply">
              <div style="font-weight: bold;">Ray Bolivar</div>
              <div class="alert alert-info" style="font-size: 15px;">{{$comment->select_text}}</div>
              <div style="display: flex; width: 100%;margin-bottom: 7px;">
                <div style="font-family: 'Linearicons-Free'; margin-top: -9px;margin-bottom: 13px; width: 70%; font-size: 18px">
                  <i class='fas fa-user-alt'></i>  {!! $comment->comment !!}
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
             <div class="col-sm-9 col-12 reply">
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

<script>
  var keyscount = 0;
  var ckValue= '';
  CKEDITOR.disableAutoInline = true;
                  CKEDITOR.replace('editor5');
  CKEDITOR.instances["editor5"].on( 'contentDom', function() {
    CKEDITOR.instances.editor5.document.on('paste',function(event){
      setTimeout(function(){
        savecontent(ckValue);
      },2000)
    })
    CKEDITOR.instances.editor5.document.on('keyup', function(event) {
      console.log(event.type);
    keyscount++;
    if (keyscount > 2) {
                  savecontent(ckValue);
                 keyscount=0;
                }
    });
} );
  function savecontent(ckValue){
    ckValue = $.trim(CKEDITOR.instances["editor5"].getData());
    var title = $("input[name~='title']").val();
    var id = $("input[name~='id']").val();
    //console.log(ckValue);
    $.ajax({
            url: '{{url('chapter-store')}}',
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
        $(this).parents('.reply').find(".add").html('<input type="text" required name="comment" value="" placeholder="reply to admin" style="width: 100%; margin-bottom: 7px;"><input type="submit"  value="SEND" class="btn btn-success" >');
        //$(this).parents('.reply').find(".add").hide();
    })
</script>





@endsection