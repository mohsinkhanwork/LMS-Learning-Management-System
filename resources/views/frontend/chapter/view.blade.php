@extends('newtheme.assignmentlayout')

@section('content')

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


<div>
    
	
	<div class="card-body">
    
    <h4 class="card-title"> Title </h4>
    <p class="card-text">

    <input type="text" class="form-control" required="required" value="{{$Chapter->title}}" readonly="">

    </p>   

    <h4 class="card-title"> Description </h4>

    <p class="card-text">

        <div style="
    border: 1px solid darkgray;
    padding: 1%;
    ">

     <span>   {!! $Chapter->description !!}   </span>
     </div>



  
</p>

</div>


</div>




<div class="col-md-3 col-12 ">
	

</div>

@endsection