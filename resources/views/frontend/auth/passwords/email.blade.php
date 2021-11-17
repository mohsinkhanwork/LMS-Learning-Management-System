@extends('frontend'.(session()->get('display_type') == "rtl"?"-rtl":"").'.layouts.app'.config('theme_layout'))

@section('title', app_name() . ' | ' . __('labels.frontend.passwords.reset_password_box_title'))

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
            <div class="col col-md-4 align-self-center">
                <div class="card border-0">

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="list-inline list-style-none mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ html()->form('POST', route('frontend.auth.password.email.post'))->open() }}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {{ html()->email('email')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.email'))
                                        ->attribute('maxlength', 191)
                                        ->required()
                                        ->autofocus() }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group mb-0 clearfix">
                                    <div class="text-center  text-capitalize">
                                        <button type="submit" class="nws-button btn-primary btn "
                                                value="Submit" style="background-color: #195ec8 !important;
    color: white;" type="submit">enviar enlace de restablecimiento</button>
                                    </div>
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
