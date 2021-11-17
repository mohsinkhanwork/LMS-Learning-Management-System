@extends('newtheme.assignmentlayout')

@section('content')


<style type="text/css">
    
.table-sm {

}

.ContinueButtont {
    color: white !important;
    padding: 2%;
    display: inline-block;
    border-radius: 10px;
    margin: 1px;
    font-size: 13px;
    background-color: #feae96;
background-image: linear-gradient(315deg, #feae96 0%, #fe0944 74%);

}
.ContinueButtont1 {


    color: black;
    padding: 2%;
    display: inline-block;
    border-radius: 10px;
    margin: 1px;
    font-size: 13px;
    border:  1px solid darkgray;
    background-color: #7cffcb;
background-image: linear-gradient(315deg, #7cffcb 0%, #74f2ce 74%);



}



.dangerbutton {

    border-radius: 10px;
    font-size: 20px;
    margin-left: 10px;
    border-radius: 10px;
    font-size: 19px;
    margin-left: 6px;
    margin-top: 3px;
    border: none;

}

.text {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 3; /* number of lines to show */
   -webkit-box-orient: vertical;
}

.newButton {
    background-color: #eec0c6;
background-image: linear-gradient(315deg, #eec0c6 0%, #e58c8a 74%);
color: white !important;

}


</style>



<div class="col-md-1 col-12 ">

</div>


<div class="col-md-10 col-12 ">

<div style="text-align: end;margin-bottom: 2%;color: white;">


<a href="{{ route('history.create') }}"  class="btn btn-default newButton">  Crea una historia </a>
        

       
</div>
@if( Session::has('success'))
  <div class="alert alert-success">
    <p>{{ Session::get('success') }}</p>
  </div>
@endif

 <span style="color: red">{{$errors->first('answers')}}</span>
 <span style="color: red">{{$errors->first('description')}}</span> 


<table class="table table-sm">

<thead>

    {{-- <th>All History</th> --}}
        <th>Toda la historia</th>
    

</thead>
<tbody>
        @php $i = 1; @endphp
        @isset($historys)
        @foreach($historys as $history)
        <tr>
        
            <td>
                <div class="row">
            <div class="col-md-1 col-12">

                <span style="font-weight: bold;"> # {{$i}} </span>
            
            </div>
            <div class="col-md-8 col-12">
              
              <span style="font-weight: bold">  History made by {{$history->user->name}}</span> <br>

                <span style="font-weight: bold;">Title: </span>{{$history->title}}<br>
                <span style="font-weight: bold;"> Description :</span>  

                <div class="text">
                {!! strip_tags($history->description) !!} 
                </div>
      
            </div>

            <div class="col-md-3 col-12" style="text-align: center;"> 
                <div class="row" style="padding: 2%;">

    <a class="ContinueButtont" href="{{url('Edit_history')}}/{{$history->id}}"> Continuar & Enviar <i class="fas fa-pencil-alt"></i></a>



            <a class="ContinueButtont1" href="{{url('chapterIndex/'. $history->id)}}">  Empieza a crear capítulos  </a>
            
            {{ Form::open(array('url' => 'history/' . $history->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                <button type="submit" class="dangerbutton"> <i class="fas fa-trash-alt"></i> </button>
            {{ Form::close() }}
                </div>

            </div>
            </div>

            </td> 


        </tr>
        @php $i++; @endphp
        @endforeach
        @endisset
</tbody>

</table>


</div>




<div class="col-md-1 col-12 ">

</div>

@endsection