@extends("base")
@section("content")
<!-- Start Profile Authentication Area -->
<div class="profile-authentication-area ptb-50">
    <div class="container">
        <div class="page-banner-content">
            <h2 class="text-primary">Verify Email</h2>
            <h4>"Unlock Your Dream Property! Register Now to Access Exclusive Listings and Personalized Property Alerts."</h4>
        </div>
        <div class="profile-authentication-inner mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="profile-authentication-box">
                        {{ html()->form('POST', route('verification.send'))->class('authentication-form')->open() }}
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="">Your registration was successful! Please verify your email id to continue.</p>
                                <div class="text-center">
                                    <x-primary-button>
                                        <p class="text-primary">{{ __('Resend Verification Email') }}</p>
                                    </x-primary-button>
                                </div>
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