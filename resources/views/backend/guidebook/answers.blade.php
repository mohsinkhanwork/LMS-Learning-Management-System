@extends('backend.layouts.app')
@section('title', __('labels.backend.coupons.title').' | '.app_name())

@section('content')


<style type="text/css">
.popup-tag{
position:absolute;
display:none;
background-color:darkgray;
padding:10px;
font-size:17px;
font-weight:bold;
cursor:pointer;
-webkit-filter: drop-shadow(0 1px 10px rgba(113,158,206,0.8));
}

.CommentHeader {

  background-color: gray;
    text-align: center;
    padding: 1%;
    color: white;
    font-family: 'Linearicons-Free';
    font-size: 24px;
}

</style>

      {{-- <script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script> --}}
    
        @if( Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
    @endif


</div>


<div class="row" style="display: flex;">

<div class="col-md-12 col-12">
    <div class="card">
        <div class="card-header" style="display: flex; width: 100%;" >

            <div style="width: 50%;">
                
          <h3>Answers</h3> 
            </div>

          <div class="float-right" style="width: 50%; text-align: right;">
                <a href="{{ route('guidebookquestions.create') }}"
                   class="btn btn-success">Back to Questions</a>
            </div>
   </div>
        <div class="card-body">
          
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Student</th>
      <th scope="col">Questions</th>
      <th scope="col">Answer</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
   @isset ($answers)
   @php $i = 1;  @endphp
    @foreach($answers as $answer)
              <tbody>
                <tr>
                  <th scope="row">{{$i}}</th>
                  <td>{{$answer->user->full_name}}</td>
                  <td>{{$answer->guidebookquestion->questions}}</td>
                  <td>{!! $answer->answers !!}</td>
                  <td>
                      
                       {{ Form::open(array('url' => 'guidebookanswers/' . $answer->id)) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                                <button class = "btn btn-danger" type="submit" >

                                  <i class="fas fa-trash-alt"></i>

                                </button>
                        {{ Form::close() }}


                  </td>
                </tr>

              </tbody>

   @php $i++;  @endphp
    @endforeach
    @endisset
</table>
           

            
        </div>
    </div>
</div>



</div>




@stop