@inject('request', 'Illuminate\Http\Request')
@extends('backend.layouts.app')
@section('title', __('labels.backend.tests.title').' | '.app_name())

@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="page-title d-inline">Extra Assignment</h3>
            @can('blog_create')
                <div class="float-right">
                    <a href="{{ route('extra-assignment.create') }}" class="btn btn-success">@lang('strings.backend.general.app_add_new')</a>
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
                    <th>Title</th>
                    <th>Student</th>
                    
                    @if( request('show_deleted') == 1 )
                        <th>@lang('labels.general.actions')</th>

                    @else
                        <th>@lang('labels.general.actions')</th>
                    @endif
                    
                </tr>
                </thead>
                @php $i = 1; @endphp
                @if($ExtraAssignments != '')
                
                @foreach($ExtraAssignments as $ExtraAssignment)
                <tbody>

                    <td>{{$i}}</td>
                    
                    <td>{{$ExtraAssignment->title}}</td>
                    <td>@foreach($ExtraAssignment->users as $user)
                        <i class="btn btn-info" style="margin-top:5px"> {{$user->full_name}}</i>
                        @endforeach
                        
                    </td>
                    
                          
                    <td>
                        <div class="row" style="display: flex;">

                &nbsp;&nbsp; <a  href="{{url('/extra-assignment')}}/{{$ExtraAssignment->id}}/edit" class="btn btn-success"><i class="fas fa-edit"></i></a> &nbsp;
                        {{ Form::open(array('url' => 'extra-assignment/' . $ExtraAssignment->id)) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                                <button class = "btn btn-danger" type="submit" >

                                  <i class="fas fa-trash-alt"></i>

                                </button>
                        {{ Form::close() }}
                        
                           </div>
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