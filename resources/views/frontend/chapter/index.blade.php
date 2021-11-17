@extends('newtheme.assignmentlayout')

@section('content')

    <script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script>


<style type="text/css">
  
.table-sm {

}

.ContinueButtont {

background-color: #FF4F08;
color: white !important;
padding: 3%;
    display: inline-block;
    border-radius: 10px;

}

.HistoryBox {



}

.historyButton {

  background-color: gray;
    text-align: center;
    padding: 2%;
    color: white;
    font-family: 'Linearicons-Free';
    font-size: 20px;
}

.chapterButton {

  background-color: gray;
    text-align: center;
    padding: 2%;
    color: white;
    font-family: 'Linearicons-Free';
    font-size: 20px;
}



.CreateChapter {

   background-color: #eec0c6;
background-image: linear-gradient(315deg, #eec0c6 0%, #e58c8a 74%);
color: white !important;

}


.continueSubmit {
  font-size: 14px;
  border: 2px solid darkgray;
  padding: 6px;
  border-radius: 12px;
  background-color: #eeeeee;
  background-image: linear-gradient(315deg, #eeeeee 0%, #ec4534 74%);
  color: white !important;
}

</style>



<div class="col-md-1 col-12 ">
  

</div>


<div class="col-md-10 col-12 ">

@if( Session::has('success'))
  <div class="alert alert-success">
    <p>{{ Session::get('success') }}</p>
  </div>
@endif



<div class="row" style="display: flex;">
<div class="col-md-6 HistoryBox" >
  
  <div>
    
    <h3 class="historyButton">Historia detalles</h3>

  </div>

  <div>

    <h4 class="card-title" style="   
    margin-bottom: 3%;
    font-size: 25px;
    font-family: 'Linearicons-Free';"> Título </h4>

    <input type="text" value="{{$history->title}}" style="
    width: 100%;
    background: none;
    font-size: 17px;
    font-family: 'Linearicons-Free';


    " >
  </div>
  
 <div style="margin-top: 3%;">

    <h4 class="card-title" style="font-size: 23px;font-family: 'Linearicons-Free';margin-bottom: 4%;" > Descripcion </h4>
    
    <div style="border: 1px solid darkgray;padding: 1%;margin-bottom: 4%;">
    
    <span>{!! $history->description !!}</span>
    
    </div>


  </div> 



  <div style="margin-top: 3%;margin-bottom: 6%">

    <h4 class="card-title" style="font-size: 23px;font-family: 'Linearicons-Free';margin-bottom: 3%;" > Respuestas enviadas </h4>
    


@isset($six_answers)
@php $i = 1;  @endphp
@foreach($six_answers as $six_answers)

    <div style="display: flex;">
      
      <div> {{$i}}. </div> &nbsp;
      <div> {!! $six_answers->answers !!} </div>

    </div>
      
   
    
@php $i++;  @endphp
@endforeach
@endisset




  </div>


</div>
<div class="col-md-6 ChapterBox" >

    <div>
    
    <h3 class="chapterButton"> Tabla de contenido</h3>

  </div>


  <div>

    <h4 class="card-title">

      <div >

        <a href="#" data-toggle="modal"  style="background-color: #FF4F08;border-radius: 8px;margin-top: 3%;" class="btn btn-defaulta CreateChapter" data-target="#createchapter">Crear capítulo</a>

      </div>

    </h4>
    <hr>
    @php $i=1; @endphp
 @isset($chapters)
    @foreach($chapters as $chapter)
    <div class="row">
      
      <div class="col-md-2 col-12">
      <div style="text-align: center;font-size: 26px;">
      <!-- <i class="fas fa-bars"></i> -->
      <span style="font-weight: bold"># {{$i}}</span>
      </div>
      </div>

      <div class="col-md-5 col-12">
        <div style="font-size: 17px;">
      <div class="row" style="font-weight: bold;"> {{$chapter->title}} </div>
      <div class="row" style="color: darkgray;"> {{$chapter->created_at->format('m/d/Y')}} : </div>
      </div>

       </div>

      <div class="col-md-5 col-12">

        <div  style="text-align: center;font-size: 22px; color: darkgray;">

          <div class="row">
            
            <div>

    <a class="continueSubmit" href="{{url('chapter/'. $chapter->id . '/history/'. $history->id)}}">
                        Continue & Submit <i class="fas fa-pencil-alt"></i>
       </a>
          </div> &nbsp;

          <div>  

         {{--  <a style="font-size: 15px;border: 2px solid darkgray;padding: 6px;border-radius: 12px; margin: 10px" 

          href="{{url('chapter_id')}}/{{$chapter->id}}">

        <i class="fas fa-eye"></i>
             </a> --}}
         </div>

            <div>
              {{ Form::open(array('url' => 'chapter/' . $chapter->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                    <button style="font-size: 17px; border: 2px solid darkgray;border-radius: 12px;" type="submit" >

                      <i style="color: red;" class="fas fa-trash-alt"></i>

                    </button>
            {{ Form::close() }}
          </div>

          </div>
        </div>
      </div>

    </div>
    @php $i++; @endphp
    @endforeach
    @endisset()


 
  </div>

</div>
</div>

</div>




<div class="col-md-1 col-12 ">
  

</div>


@endsection