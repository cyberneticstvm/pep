@extends("base")
@section("content")
<!-- Start Profile Authentication Area -->
<div class="profile-authentication-area ptb-50">
    <div class="container">
        <div class="page-banner-content">
            <h2>Login</h2>
            <h4>Login to Explore the Best Real Estate Deals</h4>
        </div>
        <div class="profile-authentication-inner mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="profile-authentication-box">
                        <div class="content">
                            <h3>Login</h3>
                            <p>Don't have an account yet? <a href="{{ route('register') }}">Register here</a></p>
                        </div>
                        {{ html()->form('POST', route('login'))->class('authentication-form')->open() }}
                        <!--<div class="google-btn">
                            <button type="button"><img src="{{ asset('assets/images/google.svg') }}" alt="google">Login with Google</button>
                        </div>
                        <div class="or">
                            <span>OR</span>
                        </div>-->
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="req">Email Address</label>
                                {{ html()->email('email', old('email'))->class('form-control')->placeholder('Enter Email') }}
                                <div class="icon">
                                    <i class="ri-mail-line"></i>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="req">Your Password</label>
                                {{ html()->password('password', old('password'))->class('form-control')->placeholder('******') }}
                                <div class="icon">
                                    <i class="ri-lock-line"></i>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="">&nbsp;</label>
                                {{ html()->submit("Login")->class("default-btn btn-submit") }}
                            </div>
                            <div class="form-bottom d-flex justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me" name="remember">
                                    <label class="form-check-label" for="remember-me">
                                        Remember me
                                    </label>
                                </div>
                                <a href="{{ route('password.request') }}" class="forgot-password">
                                    Forgot your password?
                                </a>
                            </div>
                            <div class="col-12">
                                @error('email')
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                                @enderror
                                @error('password')
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                                @enderror
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