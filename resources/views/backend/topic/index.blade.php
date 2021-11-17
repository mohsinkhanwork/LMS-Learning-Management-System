@inject('request', 'Illuminate\Http\Request')
@extends('backend.layouts.app')
@section('title', __('labels.backend.tests.title').' | '.app_name())

@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="page-title d-inline">Topics</h3>
            @can('test_create')
                <div class="float-right">
                    <a href="{{ route('topic.create') }}"
                       class="btn btn-success">@lang('strings.backend.general.app_add_new')</a>

                </div>
            @endcan
        </div>
        <div class="card-body table-responsive">
            <div class="row">
                <div class="col-12 col-lg-6 form-group">
                    {!! Form::label('courses_id', 'Course', ['class' => 'control-label']) !!}
                    {!! Form::select('courses_id', $courses,  (request('courses_id')) ? request('courses_id') : old('courses_id'), ['class' => 'form-control js-example-placeholder-single select2 ', 'id' => 'courses_id']) !!}
                </div>
            </div>
            <div class="d-block">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="{{ route('topic.index',['course_id'=>request('course_id')]) }}"
                           style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">{{trans('labels.general.all')}}</a>
                    </li>
                    |
                    {{-- <li class="list-inline-item">
                        <a href="{{trashUrl(request()) }}"
                           style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">{{trans('labels.general.trash')}}</a>
                    </li> --}}
                </ul>
            </div>

            @if(request('courses_id') != "" || request('show_deleted') == 1)


            <table id="myTable"
                   class="table table-bordered table-striped @can('test_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                <tr>
                    
                    <th>@lang('labels.general.sr_no')</th>
                    <th>Name</th>
                    <th>Published</th>
                    <th>Action</th>
                    
                </tr>
                </thead>
                @php $i = 1; @endphp
                @if($topics != '')
                
                @foreach($topics as $topic)
                <tbody>

                    <td>{{$i}}</td>
                     <td>{{$topic->title}}</td>
                     <td>@if($topic->published == 1)
                        Yes
                        @else
                        No
                        @endif
                    </td>   

                    <td>
                        <a href="{{url('/topic')}}/{{$topic->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    </td>  
                                                   
{{--                     <td>
                        <a href="{{url('/assignment')}}/{{$assignment->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                        
                        {{ Form::open(array('url' => 'assignment/' . $assignment->id, 'class' => 'pull-right')) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            <button  class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        {{ Form::close() }}
                    </td> --}}
                </tbody>
                @php $i++ @endphp
                @endforeach
                @endif
            </table>
            @endif
        </div>
    </div>
@stop

@push('after-scripts')
    <script>

        $(document).ready(function () {
            

           



            $(document).on('change', '#courses_id', function (e) {
                var course_id = $(this).val();
                window.location.href = "{{route('topic.index')}}" + "?courses_id=" + course_id
            });
            

            $(".js-example-placeholder-single").select2({
                placeholder: "Select lesson",
            });

        });

    </script>

@endpush