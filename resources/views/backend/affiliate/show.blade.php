@inject('request', 'Illuminate\Http\Request')
@extends('backend.layouts.app')
@section('title', __('labels.backend.tests.title').' | '.app_name())

@section('content')


    <div class="card">
        <div class="card-header">
            <h3 class="page-title d-inline">Referrer Report</h3>
            @can('blog_create')
                <div class="float-right">
                    <a href="{{ route('paid-affiliate.index') }}" class="btn btn-success">back</a>
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
                    <th>Referrer Name</th>
                    <th>Referrer Email</th>
                    <th>Reffered Student</th>
                    <th>Referrer amount</th>
                    @if( request('show_deleted') == 1 )
                        <th>@lang('labels.general.actions')</th>

                    @else
                        <th>@lang('labels.general.actions')</th>
                    @endif
                    
                </tr>
                </thead>
                @php $i = 1; @endphp
                
                @if($referrer_persons != '')
                
                @foreach($referrer_persons as $referrer_person)
                <tbody>

                    <td>{{$i}}</td>
                    
                    <td><div class="alert alert-primary">{{$referrer_person->user->full_name}}</div></td>
                    <td><div class="alert alert-light">{{$referrer_person->user->referrer_email}}</div></td>
                    <td><div class="alert alert-success"> {{$referrer_person->RefUser->full_name}}</div></td>  
                    <td><div class="alert alert-info">${{$referrer_person->refferal_income}}</div></td>    
                    <td>
                        @if($referrer_person->paidstatus == 0)
                        {!! Form::open(['method' => 'PUT', 'route' => ['paid-affiliate.update',  $referrer_person->id]]) !!}

                        
                        <button  type="submit" class="btn" onclick="return confirm('are you sure?');">-->Click Me if You Paid<--</button>
                        </form>
                        @else
                        <button  type="button" class="btn btn-primary">Paid</button>
                        @endif
                        
                           
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