@extends("base")
@section("content")
<!-- Start Profile Authentication Area -->
<div class="profile-authentication-area ptb-50">
    <div class="container">
        <div class="page-banner-content">
            <h2>Register</h2>
            <h4>"Unlock Your Dream Property! Register Now to Access Exclusive Listings and Personalized Property Alerts."</h4>
        </div>
        <div class="profile-authentication-inner mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="profile-authentication-box">
                        <div class="content">
                            <h3>Register</h3>
                            <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
                        </div>
                        {{ html()->form('POST', route('register'))->class('authentication-form')->open() }}
                        <div class="google-btn">
                            <button type="button"><img src="{{ asset('assets/images/google.svg') }}" alt="google">Sign in with Google</button>
                        </div>
                        <div class="or">
                            <span>OR</span>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="req">Your Name</label>
                                @error('name')
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                                @enderror
                                {{ html()->text('name', old('name'))->class('form-control')->placeholder('Enter Name') }}
                                <div class="icon">
                                    <i class="ri-user-3-line"></i>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="req">Email Address</label>
                                @error('email')
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                                @enderror
                                {{ html()->email('email', old('email'))->class('form-control')->placeholder('Enter Email') }}
                                <div class="icon">
                                    <i class="ri-mail-line"></i>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="req">Registering As</label>
                                @error('role')
                                <small class="text-danger">{{ $errors->first('role') }}</small>
                                @enderror
                                {{ html()->select('role', array('Agent' => 'Agent', 'Public' => 'Public'), old('role'))->class("form-control")->placeholder("Select") }}
                                <div class="icon">
                                    <i class="ri-user-line"></i>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="req">Your Password</label>
                                @error('password_confirmation')
                                <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
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
                        <div class="row">
                            <div class="form-group col-md-4">
                                @error('captcha')
                                <small class="text-danger">Incorrect Captcha!</small>
                                @enderror
                                <label class="req">Captcha</label>
                                {{ html()->text('captcha', old('captcha'))->class('form-control')->maxlength(4)->placeholder('Captcha') }}
                                <div class="icon">
                                    <i class="ri-lock-line"></i>
                                </div>
                            </div>
                            <div class="form-group col-md-2 captcha">
                                <label class="req">Captcha</label>
                                <span>{!! captcha_img('flat') !!}</span>
                            </div>
                            <div class="form-group col-md-2">
                                <label class="">Refresh</label>
                                <button type="button" class="btn btn-success btn-refresh"><i class="ri-refresh-line"></i></button>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <div class="form-check">
                                {{ html()->checkbox('terms', old('terms'))->class('form-check-input')->attribute('id', 'checkbox1')->attribute('value', '1') }}
                                <label class="form-check-label req" for="checkbox1">
                                    I accept the <a href="{{ route('terms') }}">Terms and Conditions</a>
                                </label>
                                @error('terms')
                                <small class="text-danger">{{ $errors->first('terms') }}</small>
                                @enderror
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