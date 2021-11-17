@inject('request', 'Illuminate\Http\Request')
@extends('backend.layouts.app')
@section('title', __('labels.backend.tests.title').' | '.app_name())

@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="page-title d-inline">Skills</h3>
            @can('blog_create')
                <div class="float-right">
                    <a href="{{ route('skills.create') }}" class="btn btn-success">@lang('strings.backend.general.app_add_new')</a>
                </div>
            @endcan
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
                    <th>Course</th>
                    @if( request('show_deleted') == 1 )
                        <th>@lang('labels.general.actions')</th>

                    @else
                        <th>@lang('labels.general.actions')</th>
                    @endif
                    
                </tr>
                </thead>
                @php $i = 1; @endphp
                @if($skills != '')
                
                @foreach($skills as $skill)
                <tbody>

                    <td>{{$i}}</td>
                    
                    <td>{{$skill->title}}</td>
                    <td>@foreach($skill->courses as $course)
                        <i class="btn btn-info" style="margin-top:5px"> {{$course->title}}</i>
                        @endforeach
                        
                    </td>
                    
                          
                    <td>
                        <a  href="{{url('/skills')}}/{{$skill->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                        
                           
                    </td>
                </tbody>
                @php $i++ @endphp


                
                @endforeach


                @endif
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