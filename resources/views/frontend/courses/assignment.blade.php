  @extends('newtheme.lessonlayout')

@section('content')

	  <script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script>

	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


<style type="text/css">
	

.body1 {

	background-color: whitesmoke;
}

.assignBack {


	text-align: left;
	 justify-content: center;
    width: 50%;
    margin: 0 auto;
    padding: 1%;
    margin-top: -1%;
}


@media screen and (max-width: 425px) {
.assignBack {

width: 0% !important;
    
    } 
}



</style>

<style type="text/css">

.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
	
</style>


</head>


<div class="body1">

	

<div class="assignBack">

<h2>Producción textual</h2> <br>
<h1>Producción textual</h1><br>

 <p><a data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
 	All Requirements <i class="fas fa-chevron-up"></i> </a></p><br>

	 
<div class="collapse" id="collapseExample1">

    	
<p style="font-weight: bold;"> 1. PREGUNTA</p> <br>

<p> Escriba una escena. Recuerde que uno de los elementos más importantes para la creación de escenas memorables es la creación de un conflicto poderoso.<br>

<p style="font-weight: bold;">Orientaciones </p> <br>

 <p>Tema: libre.</p><br>

<p>Extensión máxima: 2 folios.</p><br>

<p> *No olvide prestar especial atención al conflicto, el contexto y los diálogos. </p><br>
  
</div>


<textarea cols="80" id="editor1" name="editor1" rows="10" data-sample-short>


 This is dummy text

</textarea>

  <script>
    // We need to turn off the automatic editor creation first.
    CKEDITOR.disableAutoInline = true;

    CKEDITOR.replace('editor1');
  </script>


<div style=" text-align: center; margin: 3%;">
			<button type="button" class="btn btn-primary" style="padding: 2%; border-radius: 36px;"> SEND ASSIGNMENT </button>
</div>


	<label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>

</div>

<button type="button" class="btn btn-primary"> <i class="fas fa-eye"></i> </button>


<a href="javascript:history.back()">Go Back</a>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</div>
	
@endsection