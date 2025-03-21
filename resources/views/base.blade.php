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

    <title>{{ $title ?? 'Prime Elite Property' }}</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
</head>

<body>

    <!-- Start Preloader Area -->
    <div class="preloader-area text-center position-fixed top-0 bottom-0 start-0 end-0" id="preloader">
        <div class="loader position-absolute start-0 end-0">
            <img src="{{ asset('assets/images/favicon.png') }}" alt="favicon">
            <div class="waviy position-relative">
                <span class="d-inline-block">P</span>
                <span class="d-inline-block">R</span>
                <span class="d-inline-block">I</span>
                <span class="d-inline-block">M</span>
                <span class="d-inline-block">E</span>
                <span class="d-inline-block">E</span>
                <span class="d-inline-block">L</span>
                <span class="d-inline-block">I</span>
                <span class="d-inline-block">T</span>
                <span class="d-inline-block">E</span>
            </div>
        </div>
    </div>
    <!-- End Preloader Area -->

    @include("nav")

    @yield("content")

    <!-- Start Footer Area -->
    <footer class="footer-area pt-120">
        <div class="container">
            <div class="row justify-content-center" data-cues="slideInUp">
                <div class="col-xl-3 col-md-12">
                    <div class="single-footer-widget pe-3">
                        <div class="widget-logo">
                            <a href="index.html">
                                <img src="{{ asset('assets/images/logo2.png') }}" alt="logo2">
                            </a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, elit dollar consectetur adipiscing elit. Diam lectus purus ultricies neque.</p>
                        <div class="widget-social">
                            <a href="https://www.facebook.com/" target="_blank">
                                <i class="ri-facebook-fill"></i>
                            </a>
                            <a href="https://twitter.com/" target="_blank">
                                <i class="ri-twitter-x-line"></i>
                            </a>
                            <a href="https://www.instagram.com/" target="_blank">
                                <i class="ri-instagram-fill"></i>
                            </a>
                            <a href="https://bd.linkedin.com/" target="_blank">
                                <i class="ri-linkedin-fill"></i>
                            </a>
                            <a href="https://www.youtube.com/" target="_blank">
                                <i class="ri-youtube-line"></i>
                            </a>
                            <a href="https://www.pinterest.com/" target="_blank">
                                <i class="ri-pinterest-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-md-12">
                    <div class="row justify-content-center" data-cues="slideInUp">
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-footer-widget ps-3">
                                <h3>Company</h3>
                                <ul class="custom-links">
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="contact-us.html">Contact Us</a></li>
                                    <li><a href="customers-review.html">Our Reviews</a></li>
                                    <li><a href="terms-conditions.html">Terms & Conditions</a></li>
                                    <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-footer-widget ps-3">
                                <h3>Resources</h3>
                                <ul class="custom-links">
                                    <li><a href="property-grid.html">Apartments</a></li>
                                    <li><a href="property-grid.html">Villa</a></li>
                                    <li><a href="property-grid.html">Sell or Buy</a></li>
                                    <li><a href="property-grid.html">New Apartment</a></li>
                                    <li><a href="agents.html">Our Agents</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-footer-widget ps-3">
                                <h3>Quick Links</h3>
                                <ul class="custom-links">
                                    <li><a href="pricing.html">Pricing</a></li>
                                    <li><a href="what-we-do.html">What We Do</a></li>
                                    <li><a href="customers-review.html">Testimonial</a></li>
                                    <li><a href="blog-grid.html">Blog</a></li>
                                    <li><a href="neighborhood.html">Neighborhood</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-footer-widget">
                                <h3>Contact Info</h3>
                                <ul class="info-list">
                                    <li>
                                        <span>Address:</span>
                                        45/15 New alsala Avenew Booston town, Austria
                                    </li>
                                    <li>
                                        <span>Email:</span>
                                        <a href="mailto:support@demo.com">support@demo.com</a>
                                    </li>
                                    <li>
                                        <span>Phone:</span>
                                        <a href="tel:00201068710594">+(002) 0106-8710-594</a>
                                    </li>
                                    <li>
                                        <span>Fax:</span>
                                        <a href="tel:01068710594">+0106-8710-594</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-area">
                <p>
                    Copyright <span>Andora</span> All Rights Reserved by <a href="https://envytheme.com/" target="_blank">EnvyTheme</a>
                </p>
            </div>
        </div>
    </footer>
    <!-- End Footer Area -->

    <!-- Back to Top -->
    <button type="button" id="back-to-top" class="position-fixed text-center border-0 p-0">
        <i class="ri-arrow-up-s-line"></i>
    </button>
    <!-- End Back to Top -->

    <!-- Start Lines -->
    <div class="lines">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
    <!-- End Lines -->

    @include("widgets.modals.country_modal")

    <!-- Link of JS Files -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/scrollCue.min.js') }}"></script>
    <script src="{{ asset('assets/js/fslightbox.min.js') }}"></script>
    <script src="{{ asset('assets/js/simpleParallax.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>