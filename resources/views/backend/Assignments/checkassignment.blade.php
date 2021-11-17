@inject('request', 'Illuminate\Http\Request')
@extends('backend.layouts.app')
@section('title', __('labels.backend.tests.title').' | '.app_name())

@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="page-title d-inline">Student Assignments</h3>
            
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
                    <th>User</th>
                    <th>Lesson</th>
                    
                    
                    <th>Status</th>
                    @if( request('show_deleted') == 1 )
                        <th>@lang('labels.general.actions')</th>

                    @else
                        <th>@lang('labels.general.actions')</th>
                    @endif
                    <th>Attempt</th>
                </tr>
                </thead>
                @php $i = 1; @endphp
                @if($Assignments != '')
                
                @foreach($Assignments as $assignment)
                <tbody>

                    <td>{{$i}}</td>
                    
                    <td>{{$assignment->user->first_name}} {{$assignment->user->last_name}}</td>
                    
                    <td>{{$assignment->lesson->title}}</td>
                    <td>@if($assignment->approved == 1 && $assignment->marks > 4)
                        <a type="" class="btn btn-primary" style="color: white;">Approved</a> 
                        @else
                        <a type="" class="btn btn-danger" style="color: white;">Not Approved</a> 
                        @endif
                    </td>  
                    <td>@if($assignment->attempt == 0)
                        First Attempt
                        @else
                        <b>Last Attempt</b>
                        @endif
                    </td>           
                    <td>
                        <a href="{{url('/showassign')}}/{{$assignment->id}}" class="btn btn-primary"> <i class="fas fa-eye"></i> </a>
                        
                           
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