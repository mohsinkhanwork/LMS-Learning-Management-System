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



<div class="col-md-3 col-12 ">
 
<input type="hidden" name="histories_id" value="{{request()->id}}">	

</div>
                      

      <div class="col-md-6 col-12 ">


      </div>
      
       
{!! Form::open(['method' => 'POST', 'route' => ['chapter.store'], 'enctype' => 'multipart/form-data']) !!}
   
	
	<div class="card-body">
    
    <h4 class="card-title"> Title </h4>
    <p class="card-text">

    <input type="text" class="form-control"  name="title" required="required" value="{{old('title')}}">

    </p>   

      <div style="display: flex; margin-bottom: 1%;">
  <div style="text-align: left;width: 50%;"><h4 class="card-title"> Description </h4></div>

  
</div>

    <p class="card-text">

<textarea class="textareaSize" cols="60" id="editor1" name="description" rows="28" required data-sample-short></textarea>

  <script>
    // We need to turn off the automatic editor creation first.
    CKEDITOR.disableAutoInline = true;

    CKEDITOR.replace('editor1');
  </script>


<div style="width: 50%;">
    Browse...<input type="file" name="file" class="form-control"> <br>
    </div>


<div>
  <div style="text-align: center;"> 
      <button type="submit" class="btn btn-primary" style="background-color: #F7F7F7;color: black;"> Save </button>
      </div>

<!-- <div style="text-align: right; width: 50%;"> {!! Form::submit(trans('Submit to Teacher'), ['class' => 'btn btn-primary']) !!}</div> -->



</div>


</div>
{!! Form::close() !!}




<div class="col-md-3 col-12 ">
	

</div>

@endsection