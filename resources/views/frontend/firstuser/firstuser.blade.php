<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Example of Auto Loading Bootstrap Modal on Page Load</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
</head>
<body>


<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
             <div class="card">
                                    <div class="card-header">
                                     Por favor elige una opción: 
                                  </div>
                   {!! Form::open(['method' => 'POST', 'route' => ['firstRegister.store'], 'enctype' => 'multipart/form-data']) !!}

                   <input type="hidden" name="user_id" value="{{auth()->user()->id ?? ''}}">
                                    <div class="card-body">
                                    <h4 class="card-title"> 
                                    ¿Cuál es tu objetivo? Una vez que elija una opción, será redirigido al test de escritura para conocer su nivel </h4>

                                    <p class="card-text">

                            {!! Form::checkbox('firstregister', 'Escribir una novela') !!} &nbsp; Escribir una novela <br>
                            {!! Form::checkbox('firstregister', 'Publicar un libro en Amazon') !!} &nbsp; Publicar un libro en Amazon <br>
                             {!! Form::checkbox('firstregister', 'Aprender técnica narrativa') !!} &nbsp; Aprender técnica narrativa <br>
                             {!! Form::checkbox('firstregister', 'Todas las anteriores') !!} &nbsp; Todas las anteriores <br>
                                  
                             
                                    </p>
                                     
  
                                    <div class="modal-footer d-flex justify-content-center">
                         {!! Form::submit(trans('Enviar'), ['class' => 'btn btn-success']) !!}
                                  
                                      </div>
                                </div>
                                </div>
        </div>
    </div>
</div>



</body>
</html>