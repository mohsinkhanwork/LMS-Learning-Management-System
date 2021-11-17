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
        <div class="card-header">
            <h3 class="page-title d-inline">Chapters</h3>
           
           <div class="float-right">
                <a href="{{ url('guidebook') }}"
                   class="btn btn-success">Back to list</a>
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
                @isset($chapters)
                @foreach($chapters as $chapter)
                <tbody>

                    <td>{{$i}}</td>
                    <td> {{$history->user->name}} </td>
                    <td>{{$chapter->title}}</td>
                    <td>
                        <div class="text">
                       {!! strip_tags($chapter->description) !!} 
                       </div>
                    </td>
                    <!--  <td>
                        <a  href="{{url('chapter_fileDownload/'. $chapter->id)}}" class="btn btn-success"> Show File </a>

                    </td> -->
                    
                    {{-- <td>
                        @if($chapter->comment != '')
                        <b>Yes</b>
                        @else
                        <b>No</b>
                        @endif
                    </td>   --}}
                     <td>
                        {{$chapter->updated_at->format('d-m-Y')}}
                    </td>
                        
                    <td>
                        
                       <a  href="{{url('/showchapter')}}/{{$chapter->id}}" class="btn btn-primary">Add comment</a>
                       
                         
                           
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