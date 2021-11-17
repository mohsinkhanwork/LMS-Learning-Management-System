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

<div class="row" style="display: flex;">

<div class="col-md-12 col-12">
    <div class="card">
        <div class="card-header">
           <div class="float-right">
                <a href="{{ url('guidebook') }}"
                   class="btn btn-success">Back to list</a>
            </div>
        </div>
        <div class="card-body">
           <!-- Nav tabs -->
            
          {!! Form::open(['method' => 'POST', 'route' => ['guidebookquestions.store']]) !!}

            @csrf

        <table class="table table-bordered table-striped">
         <th width="20%">Add a Question</th>
             <td>
                 {{-- <textarea name="questions" id="editor2" rows="5" cols="80" required></textarea> --}}

                 <input type="text" name="questions" class="form-control" placeholder="place a question">

             </td> 

          {{--    <script>
    // We need to turn off the automatic editor creation first.
    CKEDITOR.disableAutoInline = true;

    CKEDITOR.replace('editor2');
  </script> --}}

            </table>
            
            {{-- <input type="hidden" name="user_id" value="{{auth()->user()->id}}"> --}}

            

        <div style="text-align: center;">
            
            <button type="submit"  style="margin-top: 10px;"  class="btn btn-primary border">Add Question</button>
        </div>


            </form> 



            
        </div>
    </div>
</div>



</div>
</div>


<div class="row" style="display: flex;">

<div class="col-md-12 col-12">
    <div class="card">
        <div class="card-header" style="display: flex;">
          
          <div>
          <h3>Questions</h3> 
              
          </div>

          <div style="margin-right: 0; margin-left: auto;">
              <a href="{{ route('guidebookquestions.index') }}" class="btn btn-success"> Show Answers </a>
          </div>

        </div>
        <div class="card-body">
          
          @isset ($questions)
          @php $i = 1;  @endphp
          @foreach($questions as $question)

          <table class="table table-bordered table-striped">

         <th width="70%"> {{$i}} {{$question->questions}}</th>



         <td width="30%">
                

                   {{ Form::open(array('url' => 'guidebookquestions/' . $question->id)) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                                <button class = "btn btn-danger" type="submit" >

                                  <i class="fas fa-trash-alt"></i>

                                </button>
                        {{ Form::close() }}
        </td> 
            

            </table>
        
        @php $i++;  @endphp
        @endforeach
          @endisset
           

            
        </div>
    </div>
</div>



</div>




@stop