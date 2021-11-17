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



</style>




<div class="col-md-8 col-12 ">

		<div class="card">
      @if( Session::has('success'))
  <div class="alert alert-success">
    <p>{{ Session::get('success') }}</p>
  </div>
@endif
  <div class="card-header">
    Detalles de la historia
  </div>

  <div class="card-body">

{!! Form::open(['method' => 'POST', 'route' => ['history.store'], 'enctype' => 'multipart/form-data']) !!}

<input type="hidden" name="user_id" value="{{auth()->user()->id}}">


    
    <h4 class="card-title">  Título </h4>
    <p class="card-text">

    <input type="text" class="form-control"  name="title" required="required" value="{{old('title')}}">

	</p>   

    <div style="display: flex;margin-bottom: 1%;">
  <div style="text-align: left;width: 50%;"><h4 class="card-title"> Agrega un resumen de la historia </h4></div>
  
</div>

<div class="popup-overlay">
<div class="popup-content">
  
<span style="color: red">Description is Required</span> 
</div>
</div>

    <p class="card-text">

   	
<textarea cols="60" id="editor1" name="description" rows="28" required></textarea>

  <script>
    // We need to turn off the automatic editor creation first.
    CKEDITOR.disableAutoInline = true;

    var editor = CKEDITOR.replace('editor1');

    editor.on( 'required', function( evt ) {
        // alert( 'Description field is Required', 'warning' );
        $(".popup-overlay, .popup-content").addClass("active");
        evt.cancel();
    } );


  </script>


	{{$errors->first('description')}}

	</p>
   


    <div style="text-align: center;"> 


<div style="display: flex;justify-content: center;">

@isset ($AllsubmittedAnsZero)
@if(count($AllsubmittedAnsZero) == 6)

<div>

{!! Form::submit(trans('Crear historia'), ['class' => 'btn btn-success']) !!}

</div>
@endif
@endisset


&nbsp;
  <div>
      <a href="{{url('/history')}}" class="btn btn-primary" style="background-color: #F7F7F7;color: black;"> Cancel </a>
    
  </div>

    </div>


    </div>


{!! Form::close() !!}
  </div>
</div>
</div>

@isset ($AllsubmittedAnsZero)
@if(count($AllsubmittedAnsZero) != 6)

<div style="text-align: center;">

<a href="#" class="btn btn-success" style="color: white;"> Antes de crear la historia responde las preguntas </a>

</div>

@endif
@endisset
<br>
<div class="col-md-4 col-12 ">



    @isset ($questions)
          @php $i = 1;  @endphp
          @foreach($questions as $question)

          <div style="width: 100%; display: flex;">
          
          <div style="width: 70%; margin-bottom: 3%;">
          {{$i}} {{$question->questions}}
              
          </div>

          <div style="width: 30%;">
              
              <div>



@if($question->guidebookanswer != '')

      <a href="#" class="btn btn-success">submitted</a>

@elseif($question->guidebookanswer == '')

<a href="#my_modal" class="btn btn-primary" style="color: white;" data-toggle="modal" data-book-id="{{$question->id}}">
Añadir una respuesta
</a>

@endif
  
              </div>

          </div>

          </div>

          @php $i++;  @endphp
        @endforeach
          @endisset






</div>

@endsection