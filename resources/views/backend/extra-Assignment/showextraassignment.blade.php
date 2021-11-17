  @extends('newtheme.assignmentlayout')

  @section('content')





  <style type="text/css">
    

  .body1 {

    background-color: whitesmoke;
  }

  .assignBack {


    text-align: left;
     justify-content: center;
      width: 80%;
      margin: 0 auto;
      padding: 1%;
  }


  @media screen and (max-width: 425px) {
  .assignBack {

  width: 100% !important;
      
      } 
  }


  #respond {
    margin-top: 40px;
  }
  .commentBox {
    transition: box-shadow .3s;
    border: 2px solid #ccc;
    padding: 10px;
    box-shadow: 5px 10px #888888;
  }
  .commentBox:hover {
    box-shadow: 0 0 11px rgba(33,33,33,.2);
  }

  </style>


  </head>


  <div class="body1">



  <div class="assignBack">


  @if( Session::has('success'))
    <div class="alert alert-success">
      <p>{{ Session::get('success') }}</p>
    </div>
    @endif

<!-- @if (session()->has('success'))
<div class="alert alert-success">
      <p>{{ Session::get('success') }}</p>
  </div>
    <script>
       setTimeout(function() {
           window.location.href = "{{url('/')}}"
       }, 1000); // 1 second
    </script>
@endif -->



    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    
    @endif

  {{-- <h2 style="">Assignment</h2> <br> --}}
  <h1>{{$ExtraAssignment->title}}</h1><br>

  {{-- @if($assignment->completeassignment != '')
        @if($assignment->completeassignment->marks > 4)
        <div class="alert alert-success">
          <strong>Congrats!</strong> Your Assignment has been approved.
        </div>
        @endif
  @endif --}}

   <p><a data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
    All Requirements <i class="fas fa-chevron-up"></i> </a></p><br>

     
  <div class="collapse" id="collapseExample1">

        
  <p style="font-weight: bold;"> {!! $ExtraAssignment->description !!}</p> <br>

  <p><br>

  {{-- <p style="font-weight: bold;">Orientaciones </p> <br>

   <p>Tema: libre.</p><br>

  <p>Extensión máxima: 2 folios.</p><br>

  <p> *No olvide prestar especial atención al conflicto, el contexto y los diálogos. </p><br>
     --}}
  </div>

  <form method="post" action="{{url('/student/extra_assignment')}}">
    @csrf

  <textarea name="assignment"  cols="80" id="editor11" rows="10" data-sample-short required>


   

  </textarea>
  <input type="hidden" name="user_id" value="{{$user_id}}">
  <input type="hidden" name="extraassignment_id" value="{{$ExtraAssignment->id}}">
  {{-- <?php $check =  App\Models\CompleteAssignment::checkAproval(auth()->user()->id,$assignment->lesson_id) ?> --}}
  {{-- @if($check != '')
  <input type="hidden" name="attempt" value="1">
  @else
  <input type="hidden" name="attempt" value="0">
  @endif --}}
    <script>
      // We need to turn off the automatic editor creation first.
      CKEDITOR.disableAutoInline = true;

      CKEDITOR.replace('editor11');
    </script>


  {{-- <div style=" text-align: center; margin: 3%;">
        @if($assignment->completeassignment != '')
        @if($assignment->completeassignment->marks < 4 && $assignment->completeassignment->approved == 1)
        <button type="submit" class="btn btn-primary" style="padding: 2%; border-radius: 36px;"> SEND ASSIGNMENT </button>
        @elseif($assignment->completeassignment->marks > 4)
        <button type="button" class="btn btn-primary" style="padding: 2%; border-radius: 36px;">ASSIGNMENT APPROVED </button>
        @else
        <button type="button" class="btn btn-primary" style="padding: 2%; border-radius: 36px;">ASSIGNMENT SUBMITTED </button>
        @endif
        @else
        <button type="submit" class="btn btn-primary" style="padding: 2%; border-radius: 36px;"> SEND ASSIGNMENT </button>
        @endif

  </div> --}}
  <div style=" text-align: center; margin: 3%;">

      @if($ExtraAssignment->CompleteExtraAssignment != '')
      <input type="hidden" name="id" value="{{$ExtraAssignment->CompleteExtraAssignment->id}}">
      @if($ExtraAssignment->CompleteExtraAssignment->marks > 4)
      <button type="button" class="btn btn-primary" style="padding: 2%; border-radius: 36px;"> ASSIGNMENT APPROVED </button>
      @elseif( $ExtraAssignment->CompleteExtraAssignment->approved == 0)
      <button type="button" class="btn btn-primary" style="padding: 2%; border-radius: 36px;"> ASSIGNMENT SUBMITTED </button>
      @elseif($ExtraAssignment->CompleteExtraAssignment->approved == 1 && $ExtraAssignment->CompleteExtraAssignment->marks < 4)
      <button type="submit" class="btn btn-primary" style="padding: 2%; border-radius: 36px;"> RESUBMIT ASSIGNMENT</button>
      @else
      <button type="submit" class="btn btn-primary" style="padding: 2%; border-radius: 36px;"> SEND ASSIGNMENT </button>
      
       
      
      @endif
      @else
      <button type="submit" class="btn btn-primary" style="padding: 2%; border-radius: 36px;"> SEND ASSIGNMENT </button>
      @endif
      
      
      
  </div>
      

  </form>


  @if($ExtraAssignment->CompleteExtraAssignment != '')
        @if($ExtraAssignment->CompleteExtraAssignment->approved == 1)
  <div id="respond">
    <h3 class="commentBox">Your Teacher Comment:- </h3>
  </div>
  <table class="table">
    
    <tbody>
      <tr>
        <td>{!! $ExtraAssignment->CompleteExtraAssignment->comment !!}</td>
        
      </tr>
    </tbody>
  </table>
        @endif
  @endif
  </div>






  </div>
    
  @endsection




