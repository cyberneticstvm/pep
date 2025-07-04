@extends("base")
@section("content")
<!-- Start Profile Authentication Area -->
<div class="profile-authentication-area ptb-50">
    <div class="container">
        <div class="page-banner-content">
            <h2 class="text-primary">Forgot Password?</h2>
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>
        <div class="profile-authentication-inner mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="profile-authentication-box">
                        {{ html()->form('POST', route('password.email'))->class('authentication-form')->open() }}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="req">Email Address</label>
                                @error('email')
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                                @enderror
                                {{ html()->email('email', old('email'))->class('form-control')->placeholder('Enter Email')->required() }}
                                <div class="icon">
                                    <i class="ri-mail-line"></i>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="">&nbsp;</label>
                                {{ html()->submit("Email Password Reset Link")->class("default-btn btn-submit") }}
                            </div>
                        </div>
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Profile Authentication Area -->
@endsection