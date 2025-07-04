@extends("base")
@section("content")
<!-- Start Profile Authentication Area -->
<div class="profile-authentication-area ptb-50">
    <div class="container">
        <div class="page-banner-content">
            <h2>Update Password</h2>
            <h4>Unlock Your Dream Property! Register Now to Access Exclusive Listings and Personalized Property Alerts</h4>
        </div>
        <div class="profile-authentication-inner mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="profile-authentication-box">
                        <div class="content">
                            <h3>Update Password</h3>
                        </div>
                        {{ html()->form('POST', route('password.store'))->class('authentication-form')->open() }}
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="req">Email Address</label>
                                @error('email')
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                                @enderror
                                {{ html()->email('email', old('email', $request->email))->class('form-control')->placeholder('Enter Email') }}
                                <div class="icon">
                                    <i class="ri-mail-line"></i>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="req">Your Password</label>
                                @error('password')
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                                @enderror
                                {{ html()->password('password', old('password'))->class('form-control')->placeholder('******') }}
                                <div class="icon">
                                    <i class="ri-lock-line"></i>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="req">Confirm Password</label>
                                {{ html()->password('password_confirmation', old('password_confirmation'))->class('form-control')->placeholder('******') }}
                                <div class="icon">
                                    <i class="ri-lock-line"></i>
                                </div>
                            </div>
                        </div>
                        {{ html()->submit("Register")->class("default-btn btn-submit") }}
                        {{ html()->form()->close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Profile Authentication Area -->
@endsection