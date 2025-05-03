<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Link of CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/scrollCue.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    @if(in_array(Route::current()->getName(), array('add.property', 'update.property')))
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" rel="stylesheet" />
    @endif
    <link rel="stylesheet" href="{{ asset('assets/css/pep.css') }}">

    <title>{{ $title ?? 'Prime Elite Property' }}</title>

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
</head>

<body>

    <!-- Start Preloader Area -->
    <div class="preloader-area text-center position-fixed top-0 bottom-0 start-0 end-0" id="preloader">
        <div class="loader position-absolute start-0 end-0">
            <img src="{{ asset('assets/images/favicon.png') }}" alt="favicon" width="5%">
            <div class="waviy position-relative">
                @foreach(preloaderText() as $key => $item)
                <span class="d-inline-block">{{ $item }}</span>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Preloader Area -->

    @include("nav")

    @yield("content")
    <!-- Start Subscribe Area -->
    <div class="subscribe-wrap-area">
        <div class="container" data-cues="slideInUp">
            <div class="subscribe-wrap-inner-area">
                <div class="subscribe-content">
                    <h2 class="">Subscribe To Our Newsletter</h2>
                    <form class="subscribe-form">
                        <input type="search" class="form-control" placeholder="Enter your email">
                        <button type="submit" class="default-btn">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Subscribe Area -->
    <!-- Start Footer Area -->
    <footer class="footer-area pt-120">
        <div class="container">
            <div class="row justify-content-center" data-cues="slideInUp">
                <div class="col-xl-3 col-md-12">
                    <div class="single-footer-widget pe-3">
                        <div class="widget-logo">
                            <a href="{{ route('index') }}">
                                <img src="{{ asset('assets/images/logo-white.png') }}" alt="logo2" width="50%">
                            </a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, elit dollar consectetur adipiscing elit. Diam lectus purus ultricies neque.</p>
                        <div class="widget-social">
                            <a href="https://twitter.com/" target="_blank">
                                <i class="ri-twitter-x-line"></i>
                            </a>
                            <a href="https://www.instagram.com/" target="_blank">
                                <i class="ri-instagram-fill"></i>
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
                                        {{ settings()->address }}
                                    </li>
                                    <li>
                                        <span>Email:</span>
                                        <a href="mailto:{{ settings()->email }}">{{ settings()->email }}</a>
                                    </li>
                                    <li>
                                        <span>Phone:</span>
                                        <a href="tel:{{ settings()->phone }}">{{ settings()->phone }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-area">
                <p>
                    &copy; {{ date('Y') }} <span>{{ settings()->name }}</span> All Rights Reserved by <a href="{{ settings()->domain }}">{{ str_replace('https://', '', settings()->domain) }}</a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/scrollCue.min.js') }}"></script>
    <script src="{{ asset('assets/js/fslightbox.min.js') }}"></script>
    <script src="{{ asset('assets/js/simpleParallax.min.js') }}"></script>
    <script>
        (g => {
            var h, a, k, p = "The Google Maps JavaScript API",
                c = "google",
                l = "importLibrary",
                q = "__ib__",
                m = document,
                b = window;
            b = b[c] || (b[c] = {});
            var d = b.maps || (b.maps = {}),
                r = new Set,
                e = new URLSearchParams,
                u = () => h || (h = new Promise(async (f, n) => {
                    await (a = m.createElement("script"));
                    e.set("libraries", [...r] + "");
                    for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                    e.set("callback", c + ".maps." + q);
                    a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                    d[q] = f;
                    a.onerror = () => h = n(Error(p + " could not load."));
                    a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                    m.head.append(a)
                }));
            d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
        })
        ({
            key: "{{ Config('pep.gpak') }}",
            v: "weekly"
        });
    </script>
</body>
<script src="{{ asset('assets/js/main.js') }}"></script>
@if(in_array(Route::current()->getName(), array('add.property', 'update.property')))
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
<script type="text/javascript">
    Dropzone.autoDiscover = false;
    let pnumber = 0;
    let myDropzone = new Dropzone(".dropzone", {
        url: "{{ route('property.store.assets') }}",
        autoProcessQueue: false,
        uploadMultiple: true,
        addRemoveLinks: true,
        parallelUploads: 10,
        maxFileSize: 10,
        maxFiles: 10,
        acceptedFiles: 'image/*',
        paramName: 'files',
        init: function() {
            let drpzone = this;
            drpzone.on('sending', function(file, xhr, formData) {
                //console.log(xhr)
                $(".btn-add-property").attr("disabled", true);
                $(".btn-add-property").html("Submitting...<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>");
                var pid = document.getElementById("property_id").value;
                formData.append('property_id', pid);
                formData.append("_token", "{{ csrf_token() }}");
            });
            drpzone.on('queuecomplete', function() {
                success({
                    success: "Assets successfully updated",
                });
                window.location.href = "/add/property/success/" + pnumber;
            });
        },
        success: function(file, response) {
            //console.log(response)
            if (response.type == 'error') {
                $(".btn-add-property").attr("disabled", false);
                $(".btn-add-property").html("Submit for Approval");
                this.removeAllFiles();
                failed(response)
            } else {
                pnumber = response.property.property_number
            }
        },
    });
</script>
@endif
<script src="{{ asset('assets/js/pep.js') }}"></script>

@include("message")
</body>

</html>