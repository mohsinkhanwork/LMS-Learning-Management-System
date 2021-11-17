@inject('request', 'Illuminate\Http\Request')
@extends('backend.layouts.app')
@section('title', __('labels.backend.tests.title').' | '.app_name())

<style type="text/css">
    .text {
   overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 1; /* number of lines to show */
   -webkit-box-orient: vertical;
}
</style>
@section('content')


    <div class="card">
        <div class="card-header" style="display: flex">
            <div>
                <h3 class="page-title d-inline">History</h3>
            </div>
            <div style="margin-left: 2%;">
                <a href="{{url('moveanswer')}}" class="btn btn-default" style="background-color: #857f7f; color: white; width: 122px">Answered</a>
            </div>
            &nbsp;
            <div>
             <a href="{{url('moveancient')}}" class="btn btn-default" style="background-color: #a1a1a1; color: white;width: 128px">Ancient Texts</a>
            </div>
             &nbsp;
            <div>
            <a href="{{url('guidebookquestions/create')}}" class="btn btn-default" style="background-color: blue; color: white;width: 128px"> Questions </a>
            </div>
         
        </div>
        @if( Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
    @endif
        <div class="card-body table-responsive">
            

            

            <table id="myTable"
                   class="table table-bordered table-striped @can('test_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                <tr>
                    
                    <th>@lang('labels.general.sr_no')</th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Discription</th>
                    <!-- <th>File Upload by Student</th> -->
                    {{-- <th>Comment</th> --}}
                    <th>Submitted Date</th>
                    @if( request('show_deleted') == 1 )
                        <th>@lang('labels.general.actions')</th>

                    @else
                        <th>@lang('labels.general.actions')</th>
                    @endif
                    
                </tr>
                </thead>
                @php $i = 1; @endphp
                @isset($historys)
                @foreach($historys as $history)
                <tbody>

                    <td>{{$i}}</td>
                    <td>{{$history->user->name}}</td>
                    <td>{{$history->title}}</td>
                    <td>
                        <div class="text">
                       {!! strip_tags($history->description) !!} 
                       </div>
                    </td>

                    <!-- <td>
                        <a  href="{{url('fileDownload/'. $history->id)}}" class="btn btn-success"> Show File </a>

                    </td> -->
                    
                    {{-- <td>
                        @if($history->comment != '')
                        <b>Yes</b>
                        @else
                        <b>No</b>
                        @endif
                    </td>   --}}
                    <td>
                        {{$history->updated_at->format('d-m-Y')}}
                    </td>

                    <td style="width: 17%;">
                        <div style="display: flex;height: 40px;">

                       <div>
                       <a  href="{{route('guidebook.show',[$history->id])}}" class="btn btn-primary" style="width: 122px;">Add comment</a>
                           &nbsp;
                       </div>
                       <div>
                       <a  href="{{url('history_chapter')}}{{'/history_id'}}/{{$history->id}}" class="btn btn-success" style="width: 122px;">Show Chapters</a>
                       &nbsp;
                       </div> 
                    </div>  
                    <div style="display: flex;">
                       <div>
                           <a href="{{route('answer',[$history->id])}}" class="btn btn-default" style="background-color: #a02110; color: white; width: 122px">Answered</a>
                       </div>
                       &nbsp;
                       <div>
                        <a href="{{url('move')}}{{'/history_id'}}/{{$history->id}}" class="btn btn-default" style="background-color: #a02110; color: white;width: 132px">Move to Ancient </a>
                         </div>
                    </div>
                            
                                             
                    </td>
                </tbody>
                @php $i++ @endphp
                @endforeach
                @endisset
                
            </table>
            
        </div>  
    </div>
@stop

@push('after-scripts')
    <script>

        $(document).ready(function () {
            

           



            $(document).on('change', '#lesson_id', function (e) {
                var course_id = $(this).val();
                window.location.href = "{{route('assignment.get_data')}}" + "?lesson_id=" + course_id
            });
            

            $(".js-example-placeholder-single").select2({
                placeholder: "Select lesson",
            });

        });

    </script>

@endpush