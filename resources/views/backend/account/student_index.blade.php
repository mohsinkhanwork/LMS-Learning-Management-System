@extends('backend.layouts.student_app')



<style type="text/css">
    
    .newHead {
    background-color: mediumslateblue;
    color: white;
    font-family: 'Font Awesome 5 Free';
}

.newbody {
    background-color: aliceblue;
    font-size: 19px;
    font-family: 'Font Awesome 5 Free';
}
    
</style>
@section('content')
    <div class="row justify-content-center align-items-center mb-3">
        <div class="col col-sm-12 align-self-center">
            <div class="card">
                <div class="card-header newHead" style="background-color: mediumslateblue;">
                    <h3 class="mb-0" style="color:white;">@lang('navs.frontend.user.edit_account')</h3>
                </div>

                <div class="card-body newbody">
                    <div role="tabpanel">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a href="#profile" class="nav-link active" aria-controls="profile" role="tab" data-toggle="tab">@lang('navs.frontend.user.profile')</a>
                            </li>

                            <li class="nav-item">
                                <a href="#edit" class="nav-link" aria-controls="edit" role="tab" data-toggle="tab">@lang('labels.frontend.user.profile.update_information')</a>
                            </li>

                            @if($user->canChangePassword())
                                <li class="nav-item">
                                    <a href="#password" class="nav-link" aria-controls="password" role="tab" data-toggle="tab">@lang('navs.frontend.user.change_password')</a>
                                </li>
                            @endif
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active pt-3" id="profile" aria-labelledby="profile-tab">
                                @include('backend.account.tabs.profile')
                            </div><!--tab panel profile-->

                            <div role="tabpanel" class="tab-pane fade show pt-3" id="edit" aria-labelledby="edit-tab">
                                @include('backend.account.tabs.edit')
                            </div><!--tab panel profile-->

                            @if($user->canChangePassword())
                                <div role="tabpanel" class="tab-pane fade show pt-3" id="password" aria-labelledby="password-tab">
                                    @include('backend.account.tabs.change-password')
                                </div><!--tab panel change password-->
                            @endif
                        </div><!--tab content-->
                    </div><!--tab panel-->
                </div><!--card body-->
            </div><!-- card -->
        </div><!-- col-xs-12 -->
    </div><!-- row -->
@endsection
