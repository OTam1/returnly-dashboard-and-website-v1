<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Meta Tags -->
     <meta charset="utf-8">
     <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
     <!-- Author -->
     <meta name="author" content="Return-ly">
     <!-- description -->
     <meta name="description" content="Return-ly">
     <!-- keywords -->
     <meta name="keywords" content="Return-ly">
     <!-- Page Title -->
     <title>RETURN-LY</title>
    <!-- Favicon -->
    <link rel="icon" href="../landing-page-assetes/img/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="../landing-page-assetes/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../landing-page-assetes/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../landing-page-assetes/img/favicon-16x16.png">
    <!-- Bundle -->
    <link rel="stylesheet" href="../landing-page-assetes/vendor/css/bundle.min.css">
    <!-- Plugin Css -->
    <link rel="stylesheet" href="../landing-page-assetes/vendor/css/cubeportfolio.min.css">
    <link rel="stylesheet" href="../landing-page-assetes/vendor/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../landing-page-assetes/css/animate.min.css">
    <link rel="stylesheet" href="../landing-page-assetes/css/jquery.fancybox.css">
    <link rel="stylesheet" href="../landing-page-assetes/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="../landing-page-assetes/css/line-awesome.min.css">
    <!-- Style Sheet -->
    <link rel="stylesheet" href="../landing-page-assetes/css/style.css">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="150">

<!--  PRELOADER  -->
<div class="loader-area">
    <div class='loader'>
        <div class='one'></div>
        <div class='two'></div>
        <div class='three'></div>
    </div>
</div>

<!-- START NAVBAR SECTION -->
<header>

    <!--    NAVBAR FOR LARGE SCREEN-->
    <nav id="my-nav1" class="navbar navbar-expand-lg navbar-light rounded-bar transparent-bar">

        <div class="logo small-screen">
            <a href="#home" class="scroll"><img src="../landing-page-assetes/img/Return-ly-logo.png" alt="Logo Img"></a>
        </div>

        <div class="container bg-trans-color">
            <div class="row no-gutters w-100">
                <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                    <div class="collapse navbar-collapse">
                        <div class="col-3 col-md-2 col-lg-3 text-left p-0">
                            <div class="logo">
                                <a href="#home" class="scroll"><img src="../landing-page-assetes/img/Return-ly-logo2.png" alt="Logo Img"></a>
                            </div>
                        </div>
                        <div class="col-7 p-0">
                        <ul id="primary" class="navbar-nav text-center">

                            <li class="nav-item">
                                <a class="nav-link" href="#">{{__('landingpage.home')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#feature">{{__('landingpage.about')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#testimonial">{{__('landingpage.clients')}}</a>
                            </li>
                            <li class="nav-item">
                                <a href="#contact" class="nav-link">{{__('landingpage.contact')}}</a>
                            </li>
                            @if (session('locale') == 'en')
                            <li class="nav-item">
                                <a href="{{ route('switch.language', 'ar') }}" class="btn btn-slider pink-btn rounded-pill"><i class="fa fa-globe" aria-hidden="true"></i> {{ __('Ar') }}</a>
                            </li>
                            @else
                            <li class="nav-item">
                                <a href="{{ route('switch.language', 'en') }}" class="btn btn-slider pink-btn rounded-pill"><i class="fa fa-globe" aria-hidden="true"></i> {{ __('En') }}</a>
                            </li>
                            @endif
                        </ul>
                        </div>

                        <div class="col-3 text-right p-0">
                            {{-- <div class="banner-icons">
                            <a href="#"><i class="lab la-facebook-f icons fb"></i></a>
                            <a href="#"><i class="lab la-twitter icons twt"></i></a>
                            <a href="#"><i class="lab la-instagram icons inst"></i></a>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="javascript:void(0)" class="sidemenu_btn" id="sidemenu_toggle">
            <span></span>
            <span></span>
            <span></span>
        </a>
    </nav>

    <!--Side Nav-->
    <div class="side-menu hidden">
        <div class="inner-wrapper">
            <span class="btn-close" id="btn_sideNavClose"><i></i><i></i></span>
            <nav class="side-nav w-100">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link scroll" href="#home">{{__('landingpage.home')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll" href="#feature">{{__('landingpage.about')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll" href="#testimonial">{{__('landingpage.clients')}}</a>
                    </li>
                    <li class="nav-item">
                        <a href="#contact" class="nav-link">{{__('landingpage.contact')}}</a>
                    </li>
                    @if (session('locale') == 'en')
                    <li class="nav-item">
                        <a href="{{ route('switch.language', 'ar') }}" class="btn btn-slider pink-btn rounded-pill"><i class="fa fa-globe" aria-hidden="true"></i> {{ __('Ar') }}</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('switch.language', 'en') }}" class="btn btn-slider pink-btn rounded-pill"><i class="fa fa-globe" aria-hidden="true"></i> {{ __('En') }}</a>
                    </li>
                    @endif
                </ul>
            </nav>

            <div class="side-footer w-100">
                {{-- <div class="banner-icons">
                    <a href="#"><i class="lab la-facebook-f icons"></i></a>
                    <a href="#"><i class="lab la-twitter icons"></i></a>
                    <a href="#"><i class="lab la-instagram icons"></i></a>
                </div> --}}
                <p>&copy; 2023 RETURN-LY. Made With Love by Revival-Lab.</p>
            </div>
        </div>
    </div>
    <a id="close_side_menu" href="javascript:void(0);"></a>
    <!-- End side menu -->
</header>

<section id="home" class="home">
    <div class="container">
        <div class="row height">
            <div class="col-12 col-md-6 height d-flex align-items-center text-left">
                <div class="text d-flex align-items-center">
                    <div class="home-text text-black height1">
                        <h6 class="sub-heading mb-2">{{__('landingpage.have-lost-item')}}</h6>
                        <h1 class="main-heading mb-0">{{__('landingpage.its-not-lost-yet')}}</h1>
                        <h4 class="heading mb-3">{{__('landingpage.we-will-find-it')}}</h4>
                        @guest
                        <a href="register" class="btn btn-slider pink-btn rounded-pill">{{__('landingpage.claim-now')}}</a>
                        @endguest
                        @auth
                        <a href="dashboard" class="btn btn-slider pink-btn rounded-pill">{{__('landingpage.claim-now')}}</a>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="large-logo">
                    <img src="../landing-page-assetes/img/Returnly-large.png" alt="img">
                </div>

                <div class="plant1">
                    <div class="large-icon plant-home">
                        <img src="../landing-page-assetes/img/Luggage.png" alt="img">
                    </div>
<!--                    <div class="shadow-home">-->
<!--                        <img src="../landing-page-assetes/img/shadow.png" alt="img">-->
<!--                    </div>-->
                </div>

            </div>
        </div>
    </div>

    <svg class="yellow-square" viewBox="0 0 200 655" xmlns="http://www.w3.org/2000/svg">
        <rect  x = "0" y = "32" width = "1616" height = "1616" rx="28" ry="28" fill="#422B72" transform = "rotate(-45 200 100)"/>
    </svg>

    <svg class="left-square small-view" viewBox="0 0 310 655" xmlns="http://www.w3.org/2000/svg">
        <rect  x = "0" y = "32" width = "1616" height = "1616" rx="48" ry="48" fill="#422B72" transform = "rotate(135 100 245)"/>
    </svg>

</section>

<section id="feature" class="feature">
    <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-sm-12 text-center">
                    <div class="text">
                        <div class="home-text text-black">
                            <h1 class="main-heading mb-4">{{__('landingpage.we-are-returnly')}}</h1>
                            <p class="sub-heading mb-4">{{__('landingpage.we-efficiently')}}</p>
                            <a href="#" class="btn btn-slider pink-btn rounded-pill">{{__('landingpage.learn-more')}}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-90">
                <div class="col-12 col-md-3 mb-3 mb-md-0" style="z-index: 2;">
                    <div class="card box text-center">
                        <div class="feature-icon text-center">
                            <i class="far fas fa-microchip"></i>
                        </div>
                        <div class="card-body">
                            <p class="card-text sub-heading text-black">{{__('landingpage.advanced-technology')}}</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-3 mt-5 mt-md-0 mb-3 mb-md-0">
                    <div class="card box text-center">
                        <div class="feature-icon text-center center">
                            <i class="far fas fa-project-diagram"></i>
                        </div>
                        <div class="card-body">
                            <p class="card-text sub-heading text-black">{{__('landingpage.large-partners-network')}}</p>
                        </div>
                    </div>

                </div>

                <div class="col-12 col-md-3 mt-5 mt-md-0 mb-3 mb-md-0">
                    <div class="card box text-center">
                        <div class="feature-icon text-center center">
                            <i class="far fas fa-shipping-fast"></i>
                        </div>
                        <div class="card-body">
                            <p class="card-text sub-heading text-black">{{__('landingpage.express-delivery')}}</p>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-3 mt-5 mt-md-0">
                    <div class="card box text-center">
                        <div class="feature-icon text-center">
                            <i class="far fas fa-shield-alt"></i>
                        </div>
                        <div class="card-body">
                            <p class="card-text sub-heading text-black">{{__('landingpage.safe-and')}}<br>{{__('landingpage.secure')}}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>

<section id="stats" class="stats">
        <div class="container">
            <div class="row m-0">
                    <div class="col-lg-6 {{__('landingpage.join-company-title-class')}} col-md-10 offset-md-0 col-sm-12 p-0">
                        <div class="stats-text">
                            <div class="home-text text-black">
                                <h1 class="sub-heading">{{__('landingpage.let-us-show-you-some-stats')}}</h1>
                                <h1 class="main-heading mt-3 mb-4">{{__('landingpage.our-happy-founds')}}</h1>
                                <!--<p class="sub-heading mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut-->
                                <!--    aliqua</p>-->
                            </div>
                        </div>
                    </div>
                     {{-- <div class="col-2">
                         <div class="plant-img">
                             <div class="plant">
                                <img src="../landing-page-assetes/img/wallet.png" alt="img">
                             </div>
                         </div>
                     </div> --}}
                 </div>

            <div class="row mt-40">
                <div class="col-lg-8 offset-lg-4 col-md-12 offset-md-0 col-sm-12">
                    <div class="row">
                        <div class="col-12 col-md-4">
                                <div class="stats-box d-flex">
                                    <div class="stats-icon">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="stats-box-text ml-4">
                                        <h1 class="numbering">10740+</h1>
                                        <p class="sub-heading">{{__('landingpage.retuned-items')}}</p>
                                    </div>
                                </div>
                            </div>

                        <div class="col-12 col-md-4 mt-4 mt-md-0">
                            <div class="stats-box d-flex">
                                <div class="stats-icon">
                                    <i class="fas fa-handshake"></i>
                                </div>
                                <div class="stats-box-text ml-4">
                                    <h1 class="numbering">500+</h1>
                                    <p class="sub-heading">{{__('landingpage.partners')}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-4 mt-4 mt-md-0">
                            <div class="stats-box d-flex">
                                <div class="stats-icon">
                                    <i class="fas fa-city"></i>
                                </div>
                                <div class="stats-box-text ml-4">
                                    <h1 class="numbering">200+</h1>
                                    <p class="sub-heading">{{__('landingpage.cities-and-locations')}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <svg class="left-square stats" viewBox="0 0 310 655" xmlns="http://www.w3.org/2000/svg">
        <rect  x = "0" y = "32" width = "1616" height = "1616" rx="48" ry="48" fill="#422B72" transform = "rotate(135 100 245)"/>
    </svg>

</section>


<section id="design" class="design">

    <div class="col-lg-6 offset-lg-4 col-md-6 offset-md-4 col-sm-12 text-left p-0">
        <div class="stats-text pl-3 pr-3 pl-md-5">
            <div style="{{__('landingpage.join-company-css')}}" class="home-text text-black">
                <h1 class="sub-heading">{{__('landingpage.let-us-make-you-happy-with')}}</h1>
                <h1 class="main-heading mt-3 mb-4"><span class="text-yellow">{{__('landingpage.join-our')}}</span> {{__('landingpage.partners-newtork')}}</h1>
                {{-- <p class="sub-heading mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, eiusmod tempor incididunt ut
                    aliq. Sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p> --}}
                    <div class="joinus-form-suc"></div>
                    <form class="joinus-form" id="joinus-form">
                        @csrf
                        <div class="row mt-5">
                            <div class="col-sm-12" id="result"></div>
                        </div>
                        <div class="container">

                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="{{__('landingpage.company-name')}}" required id="company_name" name="companyName">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="email" placeholder="{{__('landingpage.email')}}" required id="company_email" name="companyEmail">
                                </div>
                                <div class="form-group ">
                                    <input class="form-control" type="phone" placeholder="{{__('landingpage.phone')}}" required id="company_phone" name="companyPhone">
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-group ">
                                    <input class="form-control" type="text" placeholder="{{__('landingpage.industry')}}" required id="company_industry" name="companyIndustry">
                                </div>
                                <div class="form-group ">
                                    <input class="form-control" type="text" placeholder="{{__('landingpage.country')}}" required id="company_country" name="companyCountry">
                                </div>
                                <div class="form-group ">
                                    <input class="form-control" type="text" placeholder="{{__('landingpage.city')}}" required id="company_city" name="companyCity">
                                </div>
                            </div>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-slider pink-btn rounded-pill w-100 contact_btn" id="submit_btn">
                            <i class="fa fa-spinner fa-spin mr-2 d-none" aria-hidden="true"></i>
                            <b>{{__('landingpage.send')}}</b>
                        </button>
                    </form>
                                    {{-- <a href="#" class="btn btn-main pink-btn rounded-pill mt-3">Lorem ipsum</a> --}}
            </div>
        </div>
    </div>

    <svg class="right-square small-view" viewBox="0 0 312 600" xmlns="http://www.w3.org/2000/svg" style="z-index: -1;">
        <rect  x = "0" y = "32" width = "1616" height = "1616" rx="48" ry="48" fill="#422B72" transform = "rotate(-45 310 100)"/>
    </svg>

</section>


<section id="testimonial" class="testimonial">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6">
                <h1 class="main-heading text-center text-black">{{__('landingpage.wonderful-words')}}</h1>
                <div id="testimonial-carousal" class="owl-carousel owl-theme testimonial-owl pt-5 pb-5 text-center">

                    <div class="item">
                        <div class="quotes mb-4">
                            <i class="fas fa-quote-right"></i>
                        </div>

                        <div class="description pl-0 pr-0 pl-md-4 pr-md-4 mb-4">
                            <p class="text-black sub-heading">{{__('landingpage.1st-comment')}}</p>
                        </div>
                        <div class="testimonial-tittle mt-3 mb-3">
                            <h3 class="mb-0">Sara Williams</h3>
                        </div>
                    </div>

                    <div class="item">
                        <div class="quotes mb-4">
                            <i class="fas fa-quote-right"></i>
                        </div>

                        <div class="description pl-0 pr-0 pl-md-4 pr-md-4 mb-4">
                            <p class="text-black sub-heading">{{__('landingpage.2nd-comment')}}</p>
                        </div>
                        <div class="testimonial-tittle mt-3 mb-3">
                            <h3 class="mb-0">Sara Williams</h3>
                        </div>
                    </div>

                    {{-- <div class="item">
                        <div class="quotes mb-4">
                            <i class="fas fa-quote-right"></i>
                        </div>

                        <div class="description pl-0 pr-0 pl-md-4 pr-md-4 mb-4">
                            <p class="text-black sub-heading">Lorem ipsum dolor sit amet, consectetur adipi elit, sed do smod tempor incididunt ut
                                labore et dolore magna sed do smod tempor incididunt ut
                                labore et aten aliqua. Ut enim veniam,  velit esse cillum</p>
                        </div>
                        <div class="testimonial-tittle mt-3 mb-3">
                            <h3 class="mb-0">Sara Williams</h3>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-9">
                {{-- <div class="sponser-tags owl-carousel owl-theme">
                    <div class="item brand-img d-flex justify-content-center">
                        <img src="../landing-page-assetes/img/brand.png" alt="brand1">
                    </div>
                    <div class="item brand-img d-flex justify-content-center">
                        <img src="../landing-page-assetes/img/brand.png" alt="brand2">
                    </div>
                    <div class="item brand-img d-flex justify-content-center">
                        <img src="../landing-page-assetes/img/brand.png" alt="brand3">
                    </div>
                    <div class="item brand-img d-flex justify-content-center">
                        <img src="../landing-page-assetes/img/brand.png" alt="brand4">
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

    <svg class="right-square test" viewBox="0 0 312 600" xmlns="http://www.w3.org/2000/svg">
        <rect  x = "0" y = "32" width = "1616" height = "1616" rx="48" ry="48" fill="#422B72" transform = "rotate(-45 310 100)"/>
    </svg>

    <svg class="left-square gallery small-view" viewBox="0 0 310 655" xmlns="http://www.w3.org/2000/svg">
        <rect  x = "0" y = "32" width = "1616" height = "1616" rx="48" ry="48" fill="#422B72" transform = "rotate(135 100 245)"/>
    </svg>

</section>


<section id="contact" class="contact">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 style="{{__('landingpage.contactus-title-css')}}" class="main-heading text-black">{{__('landingpage.intrested')}}<br>{{__('landingpage.lets-get-in-touch')}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-7" style="{{__('landingpage.contactus-form-css')}}">
                <div class="contact-form-suc"></div>
                <form class="contact-form" id="contact-form">
                    @csrf
                    <div class="row mt-5">
                        <div class="col-sm-12" id="result"></div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="{{__('landingpage.your-name')}}" required id="candidate_name" name="userName">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="email" placeholder="{{__('landingpage.email')}}" required id="user_email" name="userEmail">
                            </div>
                            <div class="form-group ">
                                <input class="form-control" type="text" placeholder="{{__('landingpage.subject')}}" id="user_subject" name="userSubject">
                            </div>
                        </div>
                        <div class="col-12 col-md-7">
                            <div class="form-group ">
                                <textarea class="form-control" placeholder="{{__('landingpage.your-msg')}}" required rows="7" id="user_message" name="userMessage"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-slider pink-btn rounded-pill w-100 contact_btn" id="submit_btn">
                        <i class="fa fa-spinner fa-spin mr-2 d-none" aria-hidden="true"></i>
                        <b>{{__('landingpage.send-msg')}}</b>
                    </button>
                </form>
            </div>

            <div class="col-12 col-md-5 mt-5">
                <div class="address-part ml-3">
                <div class="address d-flex mb-4">
                    <i class="fas fa-map-marker-alt address-icon mr-3"></i>
                    <p>Building No. 7330, Wadi Wij - Riyadh,<br> Saudi Arabia</p>
                </div>
                <div class="address d-flex mb-4">
                    <i class="fas fa-phone-volume address-icon mr-3"></i>
                    <p>+966 11 461 0000
                        {{-- <span class="ml-3">  +1 631 12345678 </span>4 --}}
                     </p>
                </div>
                <div class="address d-flex mr-3">
                    <i class="fas fa-paper-plane address-icon mr-3"></i>
                    <p>info@return-ly.com</p>
                </div>
                </div>

                <div class="plant1">
                    <div class="plant-contact">
                        <img src="../landing-page-assetes/img/Return-ly-3D.png" alt="img">
                    </div>
                    <div class="shadow-contact">
                        {{-- <img src="../landing-page-assetes/img/shadow-contact.png" alt="img"> --}}
                    </div>
                </div>
            </div>
        </div>

<!--        FOOTER SECTION ROW-->
        <div class="row footer">
            <div class="col-12 col-md-5">
                {{-- <ul class="footer_ul mb-50">
                    <li class="footer_list"><i class="lab la-facebook-f fb"></i></li>
                    <li class="footer_list"><i class="lab la-twitter twt"></i></li>
                    <li class="footer_list"><i class="lab la-google-plus gogle"></i></li>
                    <li class="footer_list"><i class="lab la-linkedin-in link"></i></li>
                    <li class="footer_list"><i class="lab la-instagram inst"></i></li>
                    <li class="footer_list"><i class="las la-envelope gmail"></i></li>
                </ul> --}}
                <p class="info footer_text ml-3"><i class="far fa-copyright"></i>2023 RETURN-LY. Made With Love by Revival-Lab.</p>

            </div>
        </div>

    </div>
</section>


<!-- JavaScript -->
<script src="../landing-page-assetes/vendor/js/bundle.min.js"></script>

<!-- Plugin Js -->
<script src="../landing-page-assetes/vendor/js/owl.carousel.min.js"></script>
<script src="../landing-page-assetes/vendor/js/jquery.cubeportfolio.min.js"></script>
<script src="../landing-page-assetes/vendor/js/parallaxie.min.js"></script>

<!-- custom script -->
<script src="../landing-page-assetes/js/jquery.fancybox.js"></script>
<script src="../landing-page-assetes/js/jquery.fancybox.min.js"></script>
<script src="../landing-page-assetes/vendor/js/owl.carousel.min.js"></script>
<script src="../landing-page-assetes/js/mediaelement-and-player.min.js"></script>
<script src="../landing-page-assetes/js/tilt.jquery.js"></script>
<script src="../landing-page-assetes/js/script.js"></script>
<script>
    $('#joinus-form').submit(function(event) {
    event.preventDefault();

    // Send the form data using AJAX
    $.ajax({
        url: '{{ route('joinus') }}',
        method: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response) {
            // Display the success message
            $('.joinus-form-suc').text(response.message).addClass('alert-success').show();
        },
        error: function(xhr, status, error) {
            // Handle the error
            console.error(error);
        }
    });
});
</script>
<script>
    $('#contact-form').submit(function(event) {
    event.preventDefault();

    // Send the form data using AJAX
    $.ajax({
        url: '{{ route('contactus') }}',
        method: 'POST',
        data: $(this).serialize(),
        dataType: 'json',
        success: function(response) {
            // Display the success message
            $('.contact-form-suc').text(response.message).addClass('alert-success').show();
        },
        error: function(xhr, status, error) {
            // Handle the error
            console.error(error);
        }
    });
});
</script>


</body>
</html>