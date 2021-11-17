@extends('backend.layouts.app')
@section('title', __('labels.backend.coupons.title').' | '.app_name())

@section('content')

      <script src="https://cdn.ckeditor.com/4.16.2/standard-all/ckeditor.js"></script>
    
    <div class="card">
        @if( Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
    @endif
        <div class="card-header">
            <h3 class="page-title mb-0 float-left">{{$Assignment->user->first_name}} {{$Assignment->user->last_name}} Assignment</h3>
            <div class="float-right">
                <a href="{{ url('get-assignment-data') }}"
                   class="btn btn-success">Back to list</a>

            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <table class="table table-bordered table-striped">
                       <tr>
                           <th width="20%">User</th>
                           <td>
                             {{$Assignment->user->first_name}} {{$Assignment->user->last_name}}
                           </td>
                       </tr>
                       
                       <tr>
                           <th width="20%">Lesson</th>
                           <td>
                             {{$Assignment->lesson->title}}
                           </td>
                       </tr>

                       <tr>
                           <th width="20%">Assignment By Student</th>
                           <td>
                            
                             {!! $Assignment->assignment !!}
                           </td>
                       </tr>
                        
                        
                    </table>
                </div>
            </div><!-- Nav tabs -->
            @if($Assignment->approved == 1 and $Assignment->marks > 4)
            <button style="margin-top: 10px;"  class="btn btn-primary border">Approved</button>
            @else
            <form action="{{url('updateassign')}}" method="post">
            @csrf

        <table class="table table-bordered table-striped">
         <th width="20%">Add Comments</th>
             <td>
                 <textarea name="comment" id="editor2" rows="5" cols="80" required>

                </textarea>


             </td> 

             <script>
    // We need to turn off the automatic editor creation first.
    CKEDITOR.disableAutoInline = true;

    CKEDITOR.replace('editor2');
  </script>

            </table>
            
            {{-- <input type="hidden" name="assignment_id" value="{{$Assignment->Assignment->id}}">
             --}}
            {{-- <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
 --}}
            <input type="hidden" name="id" value="{{$Assignment->id}}">

            <select class="form-select" name="marks" required aria-label="Default select example">
              <option value="">Give marks</option>
              <option value="1" @if($Assignment->marks == 1) selected @endif>1</option>
              <option value="2" @if($Assignment->marks == 2) selected @endif>2</option>
              <option value="3" @if($Assignment->marks == 3) selected @endif>3</option>
              <option value="4" @if($Assignment->marks == 4) selected @endif>4</option>
              <option value="5" @if($Assignment->marks == 5) selected @endif>5</option>
              <option value="6" @if($Assignment->marks == 6) selected @endif>6</option>
              <option value="7" @if($Assignment->marks == 7) selected @endif>7</option>
              <option value="8" @if($Assignment->marks == 8) selected @endif>8</option>
              <option value="9" @if($Assignment->marks == 9) selected @endif>9</option>
              <option value="10" @if($Assignment->marks == 10) selected @endif>10</option>
            </select><br>
            <button type="submit"  style="margin-top: 10px;"  class="btn btn-primary border">Click to Approve</button>
            </form>
            
            
            @endif
            
        </div>
    </div>


@stop