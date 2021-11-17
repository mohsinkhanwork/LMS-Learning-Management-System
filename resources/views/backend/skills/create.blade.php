@extends('backend.layouts.app')
@section('title', __('labels.backend.tests.title').' | '.app_name())

@push('after-styles')
    <style>
        .select2-container--default .select2-selection--single {
            height: 35px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 35px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 35px;
        }

    </style>
@endpush
@section('content')

    {!! Form::open(['method' => 'POST', 'route' => ['skills.store']]) !!}

    <div class="card">
        <div class="card-header">
            <h3 class="page-title float-left mb-0">Create Skills</h3>
            <div class="float-right">
                <a href="{{ route('assignment.index') }}"
                   class="btn btn-success">View Skills</a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                
                <div class="col-12 col-lg-12  form-group">
                    {!! Form::label('title',trans('labels.backend.tests.fields.title'), ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => trans('labels.backend.tests.fields.title')]) !!}

                </div>
                <div class="col-12 col-lg-12 form-group">
                    {!! Form::label('course_id', 'Course', ['class' => 'control-label']) !!}
                    {!! Form::select('course_id[]', $courses, old('course_id'), ['class' => 'form-control leaderMultiSelctdropdown select2' , 'multiple'=>"multiple",'id'=>'leaderMultiSelctdropdown']) !!}

                </div>
            </div>

            
            <div class="row">
                <div class="col-12 form-group">
                    {!! Form::hidden('published', 0) !!}
                    {!! Form::checkbox('published', 1, false, []) !!}
                    {!! Form::label('published', trans('labels.backend.tests.fields.published'), ['class' => 'control-label font-weight-bold']) !!}

                </div>
            </div>
        </div>
    </div>

    {!! Form::submit(trans('strings.backend.general.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}


    <script>
        $("#leaderMultiSelctdropdown").click(function(){
          alert("The paragraph was clicked.");
        });
        console.log($('.leaderMultiSelctdropdown').val());
    </script>
@stop


