@extends('frontend.layouts.app'.config('theme_layout'))

@section('title', app_name() . ' | ' . __('labels.frontend.passwords.expired_password_box_title'))

@section('content')
    <section id="breadcrumb" class="breadcrumb-section relative-position backgroud-style" style="padding: 40px;  margin-right: 29px;">
        <div class="blakish-overlay" style="background-color: #195ec8;"></div>
        <div class="container">
            <div class="page-breadcrumb-content text-center">
                <div class="page-breadcrumb-title">
                    <h2 class="breadcrumb-head black bold">restablecer la contraseña</h2>
                </div>
            </div>
        </div>
    </section>
    <section id="about-page" class="about-page-section pb-0">

    <div class="row justify-content-center align-items-center">
        <div class="col col-sm-6 align-self-center">
            <div class="card border-0">
                <div class="card-body">
                    {{ html()->form('PATCH', route('frontend.auth.password.expired.update'))->class('form-horizontal')->open() }}

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.old_password'))->for('old_password') }}

                                    {{ html()->password('old_password')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.old_password'))
                                        ->required() }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}

                                    {{ html()->password('Contrasena')
                                        ->class('form-control')
                                        ->placeholder('Contrasena:')
                                        ->required() }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.password_confirmation'))->for('password_confirmation') }}

                                    {{ html()->password('Repite la contrasena')
                                        ->class('form-control')
                                        ->placeholder('Repite la contrasena')
                                        ->required() }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-0 clearfix">
                                   <button class="btn btn-primary" style="background-color: #195ec8 !important;
    color: white;" type="submit">Actualiza contraseña</button>
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                    {{ html()->form()->close() }}
                </div><!-- card-body -->
            </div><!-- card -->
        </div><!-- col-6 -->
    </div><!-- row -->
    </section>
@endsection
