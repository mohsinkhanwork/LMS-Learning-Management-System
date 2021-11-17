@inject('request', 'Illuminate\Http\Request')
@extends('backend.layouts.app')
@section('title', __('labels.backend.tests.title').' | '.app_name())

@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="page-title d-inline">Assignments</h3>
            @can('test_create')
                <div class="float-right">
                    <a href="{{ route('assignment.create') }}"
                       class="btn btn-success">@lang('strings.backend.general.app_add_new')</a>

                </div>
            @endcan
        </div>
        <div class="card-body table-responsive">
            <div class="row">
                <div class="col-12 col-lg-6 form-group">
                    {!! Form::label('lesson_id', 'Lesson', ['class' => 'control-label']) !!}
                    {!! Form::select('lesson_id', $lessons,  (request('lesson_id')) ? request('lesson_id') : old('lesson_id'), ['class' => 'form-control js-example-placeholder-single select2 ', 'id' => 'lesson_id']) !!}
                </div>
            </div>
            <div class="d-block">
                <ul class="list-inline">
                    <li class="list-inline-item">
                        <a href="{{ route('assignment.index',['course_id'=>request('course_id')]) }}"
                           style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">{{trans('labels.general.all')}}</a>
                    </li>
                    |
                    {{-- <li class="list-inline-item">
                        <a href="{{trashUrl(request()) }}"
                           style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">{{trans('labels.general.trash')}}</a>
                    </li> --}}
                </ul>
            </div>

            @if(request('lesson_id') != "" || request('show_deleted') == 1)


            <table id="myTable"
                   class="table table-bordered table-striped @can('test_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                <tr>
                    
                    <th>@lang('labels.general.sr_no')</th>
                    <th>Lesson</th>
                    <th>@lang('labels.backend.tests.fields.title')</th>
                    <th>Description</th>
                    <th>@lang('labels.backend.tests.fields.published')</th>
                    @if( request('show_deleted') == 1 )
                        <th>@lang('labels.general.actions')</th>

                    @else
                        <th>@lang('labels.general.actions')</th>
                    @endif
                </tr>
                </thead>
                @php $i = 1; @endphp
                @if($Assignments != '')
                
                @foreach($Assignments as $assignment)
                <tbody>

                    <td>{{$i}}</td>
                    <td>{{$assignment->lesson->title}}</td>
                    <td>{{$assignment->title}}</td>
                    <td>{{$assignment->description}}</td>
                    <td>@if($assignment->published == 1)
                        Yes
                        @else
                        No
                        @endif
                    </td>             
                    <td>
                        <a href="{{url('/assignment')}}/{{$assignment->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a>
                        
                        {{ Form::open(array('url' => 'assignment/' . $assignment->id, 'class' => 'pull-right')) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            <button  class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        {{ Form::close() }}
                    </td>
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
            

           



            $(document).on('change', '#lesson_id', function (e) {
                var course_id = $(this).val();
                window.location.href = "{{route('assignment.index')}}" + "?lesson_id=" + course_id
            });
            

            $(".js-example-placeholder-single").select2({
                placeholder: "Select lesson",
            });

        });

    </script>

@endpush