<!-- Start Top Header Area -->
<div class="top-header-area">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-7 col-md-7">
                <ul class="top-header-info-with-social">
                    <li>
                        <div class="social">
                            <a href="https://twitter.com/" target="_blank">
                                <i class="ri-twitter-x-line"></i>
                            </a>
                            <a href="https://www.instagram.com/" target="_blank">
                                <i class="ri-instagram-fill"></i>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="mail-info">
                            <i class="ri-mail-line"></i>
                            <a href="mailto:{{ settings()['email'] }}">{{ settings()['email'] }}</a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-5 col-md-5 text-end">
                <div class="top-header-call-info">
                    <x-icon name="flag-country-{{ country()['flag'] }}" class="w-5 h-5 me-2" />
                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#countryModal">{{ country()['short_name'] }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Top Header Area -->

<!-- Start Navbar Area -->
<nav class="navbar navbar-expand-xl" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('assets/images/logo.webp') }}" alt="logo">
        </a>
        <form class="search-form">
            <input type="text" class="search-field" placeholder="Search Property by Id">
            <button type="submit">
                <i class="ri-search-line"></i>
            </button>
        </form>
        <button class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvas">
            <span class="burger-menu">
                <span class="top-bar"></span>
                <span class="middle-bar"></span>
                <span class="bottom-bar"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="{{ route('index') }}" class="nav-link active">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="dropdown-toggle nav-link">
                        Property
                        <i class="ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item">
                            <a href="property-grid.html" class="nav-link">Featured Properties</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('featured.category') }}" class="nav-link">Categories</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('featured.category') }}" class="nav-link">Cities</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="dropdown-toggle nav-link">
                        Investment
                        <i class="ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item">
                            <a href="property-grid.html" class="nav-link">Featured Projects</a>
                        </li>
                        <li class="nav-item">
                            <a href="property-grid.html" class="nav-link">Cities</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('index') }}" class="nav-link">
                        Buyers
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('index') }}" class="nav-link">
                        Sellers
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('index') }}" class="nav-link">
                        Agents
                    </a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)" class="dropdown-toggle nav-link">
                        Blog
                        <i class="ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item">
                            <a href="blog-grid.html" class="nav-link">Blog Grid</a>
                        </li>
                    </ul>
                </li>
                @auth
                <li class="nav-item">
                    <a href="javascript:void(0)" class="dropdown-toggle nav-link">
                        Hello {{ Auth::user()->name }}
                        <i class="ri-arrow-down-s-line"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.listing') }}" class="nav-link">My Listings</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.wishlist') }}" class="nav-link">My Wishlist</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.profile') }}" class="nav-link">My Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.settings') }}" class="nav-link">My Settings</a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0)" class="dropdown-toggle nav-link">
                                Add Property
                                <i class="ri-arrow-down-s-line"></i>
                            </a>
                            <ul class="dropdown-menu">
                                @forelse(propertyCategories() as $key => $item)
                                <li class="nav-item">
                                    <a href="{{ route('add.property', ['cid' => encrypt($item->id)]) }}" class="nav-link">{{ $item->name }}</a>
                                </li>
                                @empty
                                @endforelse
                            </ul>
                        </li>
                        <li class="nav-item">
                            {{ html()->form('post', route('logout'))->open() }}
                            <button class="nav-link" type="submit">Logout &nbsp;&nbsp;<i class="ri-logout-circle-r-line"></i></button>
                            {{ html()->form()->close() }}
                        </li>
                    </ul>
                </li>
                @endauth
            </ul>
            <div class="others-option d-flex align-items-center">
                @if(!Auth::user())
                <div class="option-item">
                    <div class="user-info">
                        <a href="{{ route('login') }}">Log In</a> / <a href="{{ route('register') }}">Register</a>
                    </div>
                </div>
                @endif
                <div class="option-item">
                    <a href="{{ route('choose.category') }}" class="btn default-btn">List Your Property</a>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- End Navbar Area -->
<!-- Start Responsive Navbar Area -->
<div class="responsive-navbar offcanvas offcanvas-end" tabindex="-1" id="navbarOffcanvas">
    <div class="offcanvas-header">
        <a href="index.html" class="logo d-inline-block">
            <img src="assets/images/logo.png" alt="logo">
        </a>
        <button type="button" data-bs-dismiss="offcanvas" aria-label="Close" class="close-btn">
            <i class="ri-close-line"></i>
        </button>
    </div>
    <div class="offcanvas-body">
        <div class="accordion" id="navbarAccordion">
            <div class="accordion-item">
                <button class="accordion-button collapsed active" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    Home
                </button>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#navbarAccordion">
                    <div class="accordion-body">
                        <div class="accordion" id="navbarAccordion">
                            <div class="accordion-item">
                                <a class="accordion-link active" href="index.html">
                                    Main Demo
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a class="accordion-link" href="index-2.html">
                                    Real Estate Demo
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a class="accordion-link" href="index-3.html">
                                    Commercial Real Estate
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a class="accordion-link" href="index-4.html">
                                    Residential Real Estate
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a class="accordion-link" href="index-5.html">
                                    Development Real Estate
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Pages
                </button>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
                    <div class="accordion-body">
                        <div class="accordion" id="navbarAccordion">
                            <div class="accordion-item">
                                <a href="about-us.html" class="accordion-link">
                                    About Us
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="agents.html" class="accordion-link">
                                    Agents
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="agent-profile.html" class="accordion-link">
                                    Agent Profile
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="pricing.html" class="accordion-link">
                                    Pricing
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="what-we-do.html" class="accordion-link">
                                    What We Do
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="neighborhood.html" class="accordion-link">
                                    Neighborhood
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="inquiry-form.html" class="accordion-link">
                                    Inquiry Form
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="gallery.html" class="accordion-link">
                                    Gallery
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="customers-review.html" class="accordion-link">
                                    Customers Review
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="faq.html" class="accordion-link">
                                    FAQ
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="my-account.html" class="accordion-link">
                                    My Account
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="privacy-policy.html" class="accordion-link">
                                    Privacy Policy
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="terms-conditions.html" class="accordion-link">
                                    Terms & Conditions
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="not-found.html" class="accordion-link">
                                    404 Error Page
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Property
                </button>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
                    <div class="accordion-body">
                        <div class="accordion" id="navbarAccordion">
                            <div class="accordion-item">
                                <a href="property-grid.html" class="accordion-link">
                                    Property Grid
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="property-right-sidebar.html" class="accordion-link">
                                    Property Right Sidebar
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="property-left-sidebar.html" class="accordion-link">
                                    Property Left Sidebar
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="property-top-filter.html" class="accordion-link">
                                    Property Top Filter
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="property-with-map.html" class="accordion-link">
                                    Property With Map
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="property-with-top-map.html" class="accordion-link">
                                    Property With Top Map
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="property-categories.html" class="accordion-link">
                                    Property Categories
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="compare-property.html" class="accordion-link">
                                    Compare Property
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="add-property.html" class="accordion-link">
                                    Add Property
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="property-wishlist.html" class="accordion-link">
                                    Property Wishlist
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="property-details.html" class="accordion-link">
                                    Property Details
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="property-details-with-slide.html" class="accordion-link">
                                    Property Details With Slide
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Blog
                </button>
                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#navbarAccordion">
                    <div class="accordion-body">
                        <div class="accordion" id="navbarAccordion">
                            <div class="accordion-item">
                                <a href="blog-grid.html" class="accordion-link">
                                    Blog Grid
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="blog-right-sidebar.html" class="accordion-link">
                                    Blog Right Sidebar
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="blog-left-sidebar.html" class="accordion-link">
                                    Blog Left Sidebar
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="blog-details.html" class="accordion-link">
                                    Blog Details
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="blog-details-right-sidebar.html" class="accordion-link">
                                    Blog Details Right Sidebar
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="blog-details-left-sidebar.html" class="accordion-link">
                                    Blog Details Left Sidebar
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="author.html" class="accordion-link">
                                    Author
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="categories.html" class="accordion-link">
                                    Categories
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="tags.html" class="accordion-link">
                                    Tags
                                </a>
                            </div>
                            <div class="accordion-item">
                                <a href="search-result.html" class="accordion-link">
                                    Search Result
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="others-option">
            @if(!Auth::user())
            <div class="option-item">
                <div class="user-info">
                    <a href="{{ route('login') }}">Log In</a> / <a href="{{ route('register') }}">Register</a>
                </div>
            </div>
            @else
            <div class="option-item">
                {{ html()->form('post', route('logout'))->open() }}
                <button class="nav-link" type="submit">Logout &nbsp;&nbsp;<i class="ri-logout-circle-r-line"></i></button>
                {{ html()->form()->close() }}
            </div>
            @endif
            <div class="option-item">
                <a href="contact-us.html" class="default-btn">List Your Property</a>
            </div>
            <div class="option-item">
                <form class="search-form">
                    <input type="text" class="search-field" placeholder="Search property">
                    <button type="submit">
                        <i class="ri-search-line"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Responsive Navbar Area -->