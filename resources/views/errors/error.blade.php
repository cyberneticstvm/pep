<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Link of CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/scrollCue.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pep.css') }}">

    <title>{{ $exception->getMessage() }}</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
</head>

<body>
    <!-- Start Not Found Area -->
    <div class="not-found-area ptb-50">
        <div class="container">
            <div class="not-found-content text-center">
                <img src="{{ asset('assets/images/error.png') }}" alt="error-image">
                <h3>{{ $exception->getStatusCode() }}</h3>
                <p class="text-danger">{{ $exception->getMessage() }}</p>
                <a href="{{ route('index') }}" class="default-btn">
                    Back to Home
                </a>
            </div>
        </div>
    </div>
    <!-- End Not Found Area -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/scrollCue.min.js') }}"></script>
    <script src="{{ asset('assets/js/fslightbox.min.js') }}"></script>
    <script src="{{ asset('assets/js/simpleParallax.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/pep.js') }}"></script>
</body>