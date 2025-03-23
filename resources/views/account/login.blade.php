@extends("base")
@section("content")
<!-- Start Profile Authentication Area -->
<div class="profile-authentication-area ptb-120">
    <div class="container">
        <div class="profile-authentication-inner">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-12">
                    <div class="profile-authentication-box">
                        <div class="content">
                            <h3>Sign In</h3>
                            <p>Don't have an account yet? <a href="my-account.html">Sign up here</a></p>
                        </div>
                        <form class="authentication-form">
                            <div class="google-btn">
                                <button type="submit"><img src="assets/images/google.svg" alt="google">Sign in with Google</button>
                            </div>
                            <div class="or">
                                <span>OR</span>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-control" placeholder="Enter email address">
                                <div class="icon">
                                    <i class="ri-mail-line"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Your Password</label>
                                <input type="password" class="form-control" placeholder="Your password">
                                <div class="icon">
                                    <i class="ri-lock-line"></i>
                                </div>
                            </div>
                            <div class="form-bottom d-flex justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me">
                                    <label class="form-check-label" for="remember-me">
                                        Remember me
                                    </label>
                                </div>
                                <a href="forgot-password.html" class="forgot-password">
                                    Forgot your password?
                                </a>
                            </div>
                            <button type="submit" class="default-btn">Sign In</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="profile-authentication-box with-gap">
                        <div class="content">
                            <h3>Create Your Account</h3>
                            <p>Already have an account? <a href="my-account.html">Sign in here</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Profile Authentication Area -->
@endsection