{{-- <!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @section('title')
        News Event
    @endsection
    <title>stuventup - @yield('title')</title>
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/mdi/css/materialdesignicons.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/aos/dist/aos.css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/owl.carousel/dist/assets/owl.theme.default.min.css') }}" />
    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="{{ asset('assets/img/stuvent.png') }}" />
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/styleMag.css') }}">
    <!-- endinject -->
</head>

<body>
    <div class="container-scroller">
        <div class="main-panel">
            <header id="header">
                <div class="container">
                    <!-- partial:partials/_navbar.html -->
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="d-flex justify-content-between align-items-center navbar-top">
                            <div>
                                <a class="navbar-brand" href="#"><img src="assets/img/stuventText.png"
                                        style="width: 50%;" alt="" /></a>
                            </div>
                            <div>
                                <div class="navbar-right" style="justify-content: right">
                                    @if ($user == null)
                                        <a href="{{ route('login') }}" style="color:inherit;">Login | </a>
                                        <a href="{{ route('register') }}"
                                            style="color:inherit; margin-left:0.25rem">Register</a>
                                    @elseif($user->role == 'user')
                                        <p>Halo, {{ $user->name }}!</p>
                                    @elseif($user->role == 'admin')
                                        <p>Halo, admin {{ $user->username }}!</p>
                                    @endif
                                </div>

                                <ul class="navbar-right">
                                    <li>{{ $date }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="navbar-bottom-menu">
                            <button class="navbar-toggler" type="button" data-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="navbar-collapse justify-content-center collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav d-lg-flex justify-content-between align-items-center">
                                    <li>
                                        <button class="navbar-close">
                                            <i class="mdi mdi-close"></i>
                                        </button>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link active" href="#">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/world.html">Seminar/Webinar</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/author.html">Pelatihan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/news-post.html">Olahraga</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/business.html">Pameran/Festival</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/sports.html">Hari Nasional</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="pages/sports.html">Lainnya</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#"><i class="mdi mdi-magnify"></i></a>
                                    </li>
                                    <div class="nav-hide">
                                        @if ($user == null)
                                            <a href="{{ route('login') }}" style="color:inherit;">Login</a> |
                                            <a href="{{ route('register') }}" style="color:inherit;">Register</a>
                                        @elseif($user->role == 'user')
                                            <p>Halo, {{ $user->name }}!</p>
                                        @elseif($user->role == 'admin')
                                            <p>Halo, admin {{ $user->username }}!</p>
                                        @endif
                                        <p> {{ $date }}</p>
                                    </div>


                                </ul>
                            </div>
                        </div>
                    </nav>

                    <!-- partial -->
                </div>
            </header>
            <div class="container">
                <div class="row mt-4">
                    <div class="col-lg-8">
                        <h3>Event Baru</h3>
                        <div class="owl-carousel owl-theme" id="main-banner-carousel">
                            @foreach ($eventNew as $event)
                                <a href="{{ route('news.detail', $event->name_activity) }}">
                                    <div class="item">
                                        <div class="carousel-content-wrapper mb-2">
                                            <div class="carousel-content">
                                                <div style="background: black;">
                                                    @if ($event->type_activity == 'olahraga')
                                                    <p style="font-size:12px; line-height:0;">Olahraga</p>
                                                    @elseif($event->type_activity == 'seminar')
                                                    <p style="font-size:12px; line-height:0;">Seminar</p>
                                                    @elseif($event->type_activity == 'pameran')
                                                    <p style="font-size:12px; line-height:0;">Pameran</p>

                                                    @elseif($event->type_activity == 'nasional')
                                                    <p style="font-size:12px; line-height:0;">Hari Nasional</p>

                                                    @elseif($event->type_activity == 'pelatihan')
                                                    <p style="font-size:12px; line-height:0;">Pelatihan</p>

                                                    @elseif($event->type_activity == 'lainnya')
                                                    <p style="font-size:12px; line-height:0;">Lainnya : {{ $event->other_type }}</p>
                                                    @endif
                                                    
                                                </div>
                                                <h1 class="font-weight-bold" style="margin-bottom: 0;">
                                                    {{ $event->name_activity }}
                                                </h1>

                                                <p class="text-color m-0 pt-2 d-flex align-items-center" >
                                                    <span class="fs-10 mr-1">{{ $event->profile->name_himpunan }}
                                                        | {{ $event->created_at->diffForHumans() }} <i
                                                            class="mdi mdi-calendar-clock mr-3"></i></span>

                                                </p>
                                            </div>
                                            <div class="carousel-image">
                                                <img src="assets/img/dashboard/banner.jpg" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h3>Event populer</h3>
                        <div class="row">
                            @foreach ($eventPop as $eventPop)
                                @if ($eventPop->view_count > 10)
                                    <div class="col-sm-6">
                                        <div class="py-3 border-bottom">
                                            @if ($eventPop->type_activity == 'olahraga')
                                                <p style="font-size: 10px; margin-bottom:0;">Olahraga</p>
                                            @elseif($eventPop->type_activity == 'seminar')
                                                <p style="font-size: 10px; margin-bottom:0;">Seminar</p>
                                            @elseif($eventPop->type_activity == 'nasional')
                                                <p style="font-size: 10px; margin-bottom:0;">Nasional</p>
                                            @elseif($eventPop->type_activity == 'pameran')
                                                <p style="font-size: 10px; margin-bottom:0;">Pameran</p>
                                            @elseif($eventPop->type_activity == 'pelatihan')
                                                <p style="font-size: 10px; margin-bottom:0;">Pelatihan</p>
                                            @elseif($eventPop->type_activity == 'lainnya')
                                                <p style="font-size: 10px; margin-bottom:0;">Lainnya :
                                                    {{ $eventPop->other_type }}</p>
                                            @endif
                                            <div class="d-flex align-items-center pb-2">

                                                <a href="{{ route('news.detail', $eventPop->name_activity) }}"
                                                    class="fs-14 m-0 font-weight-medium line-height-sm"
                                                    style="color:inherit;">
                                                    {{ $eventPop->name_activity }}
                                                </a>
                                            </div>
                                            <span class="fs-12 text-muted">{{ $eventPop->profile->name_himpunan }} |
                                                {{ $eventPop->view_count }} kali dilihat.</span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="world-news">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-flex position-relative  float-left">
                                <h3 class="section-title">World News</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 grid-margin mb-5 mb-sm-2">
                            <div class="position-relative image-hover">
                                <img src="assets/img/dashboard/travel.jpg" class="img-fluid" alt="world-news" />
                                <span class="thumb-title">TRAVEL</span>
                            </div>
                            <h5 class="font-weight-bold mt-3">
                                Refugees flood Turkey's border with Greece
                            </h5>
                            <p class="fs-15 font-weight-normal">
                                Lorem Ipsum has been the industry's standard dummy text
                            </p>
                            <a href="#" class="font-weight-bold text-dark pt-2">Read Article</a>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-5 mb-sm-2">
                            <div class="position-relative image-hover">
                                <img src="assets/img/dashboard/news.jpg" class="img-fluid" alt="world-news" />
                                <span class="thumb-title">NEWS</span>
                            </div>
                            <h5 class="font-weight-bold mt-3">
                                South Korea’s Moon Jae-in sworn in vowing address
                            </h5>
                            <p class="fs-15 font-weight-normal">
                                Lorem Ipsum has been the industry's standard dummy text
                            </p>
                            <a href="#" class="font-weight-bold text-dark pt-2">Read Article</a>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-5 mb-sm-2">
                            <div class="position-relative image-hover">
                                <img src="assets/img/dashboard/art.jpg" class="img-fluid" alt="world-news" />
                                <span class="thumb-title">ART</span>
                            </div>
                            <h5 class="font-weight-bold mt-3">
                                These puppies are training to assist in avalanche rescue
                            </h5>
                            <p class="fs-15 font-weight-normal">
                                Lorem Ipsum has been the industry's standard dummy text
                            </p>
                            <a href="#" class="font-weight-bold text-dark pt-2">Read Article</a>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-5 mb-sm-2">
                            <div class="position-relative image-hover">
                                <img src="assets/img/dashboard/business.jpg" class="img-fluid" alt="world-news" />
                                <span class="thumb-title">BUSINESS</span>
                            </div>
                            <h5 class="font-weight-bold mt-3">
                                'Love Is Blind' couple opens up about their first year
                            </h5>
                            <p class="fs-15 font-weight-normal">
                                Lorem Ipsum has been the industry's standard dummy text
                            </p>
                            <a href="#" class="font-weight-bold text-dark pt-2">Read Article</a>
                        </div>
                    </div>
                </div>
                <div class="editors-news">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="d-flex position-relative float-left">
                                <h3 class="section-title">Popular News</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6  mb-5 mb-sm-2">
                            <div class="position-relative image-hover">
                                <img src="assets/img/dashboard/glob.jpg" class="img-fluid" alt="world-news" />
                                <span class="thumb-title">NEWS</span>
                            </div>
                            <h1 class="font-weight-600 mt-3">
                                Melania Trump speaks about courage at State Department
                            </h1>
                            <p class="fs-15 font-weight-normal">
                                Lorem Ipsum has been the industry's standard dummy text ever
                                since the 1500s, when an unknown printer took a galley of type
                                and
                            </p>
                        </div>
                        <div class="col-lg-6  mb-5 mb-sm-2">
                            <div class="row">
                                <div class="col-sm-6  mb-5 mb-sm-2">
                                    <div class="position-relative image-hover">
                                        <img src="assets/img/dashboard/star-magazine-5.jpg" class="img-fluid"
                                            alt="world-news" />
                                        <span class="thumb-title">POLITICS</span>
                                    </div>
                                    <h5 class="font-weight-600 mt-3">
                                        A look at California's eerie plane graveyards
                                    </h5>
                                    <p class="fs-15 font-weight-normal">
                                        Lorem Ipsum has been the industry's standard dummy text
                                    </p>
                                </div>
                                <div class="col-sm-6  mb-5 mb-sm-2">
                                    <div class="position-relative image-hover">
                                        <img src="assets/img/dashboard/star-magazine-6.jpg" class="img-fluid"
                                            alt="world-news" />
                                        <span class="thumb-title">TRAVEL</span>
                                    </div>
                                    <h5 class="font-weight-600 mt-3">
                                        The world's most beautiful racecourses
                                    </h5>
                                    <p class="fs-15 font-weight-normal">
                                        Lorem Ipsum has been the industry's standard dummy text
                                    </p>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-6  mb-5 mb-sm-2">
                                    <div class="position-relative image-hover">
                                        <img src="assets/img/dashboard/star-magazine-7.jpg" class="img-fluid"
                                            alt="world-news" />
                                        <span class="thumb-title">POLITICS</span>
                                    </div>
                                    <h5 class="font-weight-600 mt-3">
                                        Japan cancels cherry blossom festivals over virus fears
                                    </h5>
                                    <p class="fs-15 font-weight-normal">
                                        Lorem Ipsum has been the industry's standard dummy text
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <div class="position-relative image-hover">
                                        <img src="assets/img/dashboard/star-magazine-8.jpg" class="img-fluid"
                                            alt="world-news" />
                                        <span class="thumb-title">TRAVEL</span>
                                    </div>
                                    <h5 class="font-weight-600 mt-3">
                                        Classic cars reborn as electric vehicles
                                    </h5>
                                    <p class="fs-15 font-weight-normal">
                                        Lorem Ipsum has been the industry's standard dummy text
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="popular-news">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="d-flex position-relative float-left">
                                <h3 class="section-title">Editor choice</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-sm-4  mb-5 mb-sm-2">
                                    <div class="position-relative image-hover">
                                        <img src="assets/img/dashboard/star-magazine-9.jpg" class="img-fluid"
                                            alt="world-news" />
                                        <span class="thumb-title">LIFESTYLE</span>
                                    </div>
                                    <h5 class="font-weight-600 mt-3">
                                        The island country that gave Mayor Pete his name
                                    </h5>
                                </div>
                                <div class="col-sm-4 mb-5 mb-sm-2">
                                    <div class="position-relative image-hover">
                                        <img src="assets/img/dashboard/star-magazine-10.jpg" class="img-fluid"
                                            alt="world-news" />
                                        <span class="thumb-title">SPORTS</span>
                                    </div>
                                    <h5 class="font-weight-600 mt-3">
                                        Disney parks expand (good) vegan food options
                                    </h5>
                                </div>
                                <div class="col-sm-4 mb-5 mb-sm-2">
                                    <div class="position-relative image-hover">
                                        <img src="assets/img/dashboard/star-magazine-11.jpg" class="img-fluid"
                                            alt="world-news" />
                                        <span class="thumb-title">INTERNET</span>
                                    </div>
                                    <h5 class="font-weight-600 mt-3">
                                        A hot springs where clothing is optional after dark
                                    </h5>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-4 mb-5 mb-sm-2">
                                    <div class="position-relative image-hover">
                                        <img src="assets/img/dashboard/star-magazine-12.jpg" class="img-fluid"
                                            alt="world-news" />
                                        <span class="thumb-title">NEWS</span>
                                    </div>
                                    <h5 class="font-weight-600 mt-3">
                                        Japanese chef carves food into incredible pieces of art
                                    </h5>
                                </div>
                                <div class="col-sm-4 mb-5 mb-sm-2">
                                    <div class="position-relative image-hover">
                                        <img src="assets/img/dashboard/star-magazine-13.jpg" class="img-fluid"
                                            alt="world-news" />
                                        <span class="thumb-title">NEWS</span>
                                    </div>
                                    <h5 class="font-weight-600 mt-3">
                                        The Misanthrope Society: A Taipei bar for people who
                                    </h5>
                                </div>
                                <div class="col-sm-4 mb-5 mb-sm-2">
                                    <div class="position-relative image-hover">
                                        <img src="assets/img/dashboard/star-magazine-14.jpg" class="img-fluid"
                                            alt="world-news" />
                                        <span class="thumb-title">TOURISM</span>
                                    </div>
                                    <h5 class="font-weight-600 mt-3">
                                        From Pakistan to the Caribbean: Curry's journey
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="position-relative mb-3">
                                <img src="assets/img/dashboard/star-magazine-15.jpg" class="img-fluid"
                                    alt="world-news" />
                                <div class="video-thumb text-muted">
                                    <span><i class="mdi mdi-menu-right"></i></span>LIVE
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="d-flex position-relative float-left">
                                        <h3 class="section-title">Latest News</h3>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="border-bottom pb-3">
                                        <h5 class="font-weight-600 mt-0 mb-0">
                                            South Korea’s Moon Jae-in sworn in vowing address
                                        </h5>
                                        <p class="text-color m-0 d-flex align-items-center">
                                            <span class="fs-10 mr-1">2 hours ago</span>
                                            <i class="mdi mdi-bookmark-outline mr-3"></i>
                                            <span class="fs-10 mr-1">126</span>
                                            <i class="mdi mdi-comment-outline"></i>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="border-bottom pt-4 pb-3">
                                        <h5 class="font-weight-600 mt-0 mb-0">
                                            South Korea’s Moon Jae-in sworn in vowing address
                                        </h5>
                                        <p class="text-color m-0 d-flex align-items-center">
                                            <span class="fs-10 mr-1">2 hours ago</span>
                                            <i class="mdi mdi-bookmark-outline mr-3"></i>
                                            <span class="fs-10 mr-1">126</span>
                                            <i class="mdi mdi-comment-outline"></i>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="border-bottom pt-4 pb-3">
                                        <h5 class="font-weight-600 mt-0 mb-0">
                                            South Korea’s Moon Jae-in sworn in vowing address
                                        </h5>
                                        <p class="text-color m-0 d-flex align-items-center">
                                            <span class="fs-10 mr-1">2 hours ago</span>
                                            <i class="mdi mdi-bookmark-outline mr-3"></i>
                                            <span class="fs-10 mr-1">126</span>
                                            <i class="mdi mdi-comment-outline"></i>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="pt-4">
                                        <h5 class="font-weight-600 mt-0 mb-0">
                                            South Korea’s Moon Jae-in sworn in vowing address
                                        </h5>
                                        <p class="text-color m-0 d-flex align-items-center">
                                            <span class="fs-10 mr-1">2 hours ago</span>
                                            <i class="mdi mdi-bookmark-outline mr-3"></i>
                                            <span class="fs-10 mr-1">126</span>
                                            <i class="mdi mdi-comment-outline"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main-panel ends -->
            <!-- container-scroller ends -->

            <!-- partial:partials/_footer.html -->
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="border-top"></div>
                        </div>
                        <div class="col-sm-3 col-lg-3">
                            <ul class="footer-vertical-nav">
                                <li class="menu-title"><a href="pages/news-post.html">News</a></li>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="pages/world.html">World</a></li>
                                <li><a href="pages/author.html">Magazine</a></li>
                                <li><a href="pages/business.html">Business</a></li>
                                <li><a href="pages/politics.html">Politics</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-3 col-lg-3">
                            <ul class="footer-vertical-nav">
                                <li class="menu-title"><a href="pages/world.html">World</a></li>
                                <li><a href="pages/sports.html">Sports</a></li>
                                <li><a href="pages/art.html">Art</a></li>
                                <li><a href="#">Magazine</a></li>
                                <li><a href="pages/real-estate.html">Real estate</a></li>
                                <li><a href="pages/travel.html">Travel</a></li>
                                <li><a href="pages/author.html">Author</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-3 col-lg-3">
                            <ul class="footer-vertical-nav">
                                <li class="menu-title"><a href="#">Features</a></li>
                                <li><a href="#">Photography</a></li>
                                <li><a href="#">Video</a></li>
                                <li><a href="pages/news-post.html">Newsletters</a></li>
                                <li><a href="#">Live Events</a></li>
                                <li><a href="#">Stores</a></li>
                                <li><a href="#">Jobs</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-3 col-lg-3">
                            <ul class="footer-vertical-nav">
                                <li class="menu-title"><a href="#">More</a></li>
                                <li><a href="#">RSS</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">User Agreement</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="pages/aboutus.html">About us</a></li>
                                <li><a href="pages/contactus.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-flex justify-content-between">
                                <img src="assets/img/logo.svg" class="footer-logo" alt="" />

                                <div class="d-flex justify-content-end footer-social">
                                    <h5 class="m-0 font-weight-600 mr-3 d-none d-lg-flex">Follow on</h5>
                                    <ul class="social-media">
                                        <li>
                                            <a href="#">
                                                <i class="mdi mdi-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="mdi mdi-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="mdi mdi-youtube"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="mdi mdi-linkedin"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="mdi mdi-twitter"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div
                                class="d-lg-flex justify-content-between align-items-center border-top mt-5 footer-bottom">
                                <ul class="footer-horizontal-menu">
                                    <li><a href="#">Terms of Use.</a></li>
                                    <li><a href="#">Privacy Policy.</a></li>
                                    <li><a href="#">Accessibility & CC.</a></li>
                                    <li><a href="#">AdChoices.</a></li>
                                    <li><a href="#">Advertise with us Transcripts.</a></li>
                                    <li><a href="#">License.</a></li>
                                    <li><a href="#">Sitemap</a></li>
                                </ul>
                                <p class="font-weight-medium">
                                    © 2020 <a href="https://www.bootstrapdash.com/" target="_blank"
                                        class="text-dark">@ BootstrapDash</a>, Inc.All Rights Reserved.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <!-- partial -->
        </div>
    </div>
    <!-- inject:js -->
    <script src="{{ asset('assets/vendor/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{ asset('assets/vendor/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{ asset('assets/js/jsMag.js') }}"></script>
    <!-- End custom js for this page-->
</body>

</html> --}}

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>stuvent up - news</title>
    <meta name="description" content="Stuvent UP">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">

    <!-- STYLES -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/simple-line-icons.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/styleMag2.css') }}" type="text/css" media="all">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- preloader -->
    <div id="preloader">
        <div class="book">
            <div class="inner">
                <div class="left"></div>
                <div class="middle"></div>
                <div class="right"></div>
            </div>
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </div>

    <!-- site wrapper -->
    <div class="site-wrapper">

        <div class="main-overlay"></div>

        <!-- header -->
        <header class="header-default">
            <nav class="navbar navbar-expand-lg">
                <div class="container-xl">
                    <!-- site logo -->
                  <img src="assets/img/stuvent.png" alt="logo" style="width:7%;"/>

                    <div class="collapse navbar-collapse">
                        <!-- menus -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown active">
                                <a class="nav-link" href="index.html">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="category.html">Seminar/Webinar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="category.html">Pelatihan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Olahraga</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Pameran</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Hari Nasional</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Lainnya</a>
                            </li>
                        </ul>
                    </div>

                    <!-- header right section -->
                    <div class="header-right">
                        <!-- header buttons -->
                        <div class="header-buttons">
                            <button class="search icon-button">
                                <i class="icon-magnifier"></i>
                            </button>
                            <button class="burger-menu icon-button">
                                <span class="burger-icon"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <!-- hero section -->
        <section id="hero">

            <div class="container-xl">

                <div class="row gy-4">

                    <div class="col-lg-8">

                        <!-- featured post large -->
                        <div class="post featured-post-lg">
                            <div class="details clearfix">
                                <a href="" class="category-badge">Inspiration</a>
                                <h2 class="post-title"><a href="blog-single.html">5 Easy Ways You Can Turn Future Into
                                        Success</a></h2>
                                <ul class="meta list-inline mb-0">
                                    <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                    <li class="list-inline-item">29 March 2021</li>
                                </ul>
                            </div>
                            <a href="blog-single.html">
                                <div class="thumb rounded">
                                    <div class="inner data-bg-image" data-bg-image="images/posts/featured-lg.jpg">
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

                    <div class="col-lg-4">

                        <!-- post tabs -->
                        <div class="post-tabs rounded bordered">
                            <!-- tab navs -->
                            <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
                                <li class="nav-item" role="presentation"><button aria-controls="popular"
                                        aria-selected="true" class="nav-link active" data-bs-target="#popular"
                                        data-bs-toggle="tab" id="popular-tab" role="tab"
                                        type="button">Popular</button></li>
                                <li class="nav-item" role="presentation"><button aria-controls="recent"
                                        aria-selected="false" class="nav-link" data-bs-target="#recent"
                                        data-bs-toggle="tab" id="recent-tab" role="tab"
                                        type="button">Recent</button></li>
                            </ul>
                            <!-- tab contents -->
                            <div class="tab-content" id="postsTabContent">
                                <!-- loader -->
                                <div class="lds-dual-ring"></div>
                                <!-- popular posts -->
                                <div aria-labelledby="popular-tab" class="tab-pane fade show active" id="popular"
                                    role="tabpanel">
                                    <!-- post -->
                                    <div class="post post-list-sm circle">
                                        <div class="thumb circle">
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/tabs-1.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make
                                                    Your iPhone Faster</a></h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- post -->
                                    <div class="post post-list-sm circle">
                                        <div class="thumb circle">
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/tabs-2.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy
                                                    Method That Works For All</a></h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- post -->
                                    <div class="post post-list-sm circle">
                                        <div class="thumb circle">
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/tabs-3.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="blog-single.html">10 Ways To
                                                    Immediately Start Selling Furniture</a></h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- post -->
                                    <div class="post post-list-sm circle">
                                        <div class="thumb circle">
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/tabs-4.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="blog-single.html">15 Unheard Ways To
                                                    Achieve Greater Walker</a></h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- recent posts -->
                                <div aria-labelledby="recent-tab" class="tab-pane fade" id="recent"
                                    role="tabpanel">
                                    <!-- post -->
                                    <div class="post post-list-sm circle">
                                        <div class="thumb circle">
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/tabs-2.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy
                                                    Method That Works For All</a></h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- post -->
                                    <div class="post post-list-sm circle">
                                        <div class="thumb circle">
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/tabs-1.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make
                                                    Your iPhone Faster</a></h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- post -->
                                    <div class="post post-list-sm circle">
                                        <div class="thumb circle">
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/tabs-4.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="blog-single.html">15 Unheard Ways To
                                                    Achieve Greater Walker</a></h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- post -->
                                    <div class="post post-list-sm circle">
                                        <div class="thumb circle">
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/tabs-3.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="blog-single.html">10 Ways To
                                                    Immediately Start Selling Furniture</a></h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </section>

        <!-- section main content -->
        <section class="main-content">
            <div class="container-xl">

                <div class="row gy-4">

                    <div class="col-lg-8">

                        <!-- section header -->
                        <div class="section-header">
                            <h3 class="section-title">Editor’s Pick</h3>
                            <img src="images/wave.svg" class="wave" alt="wave" />
                        </div>

                        <div class="padding-30 rounded bordered">
                            <div class="row gy-5">
                                <div class="col-sm-6">
                                    <!-- post -->
                                    <div class="post">
                                        <div class="thumb rounded">
                                            <a href="category.html"
                                                class="category-badge position-absolute">Lifestyle</a>
                                            <span class="post-format">
                                                <i class="icon-picture"></i>
                                            </span>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/editor-lg.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <ul class="meta list-inline mt-4 mb-0">
                                            <li class="list-inline-item"><a href="#"><img
                                                        src="images/other/author-sm.png" class="author"
                                                        alt="author" />Katen Doe</a></li>
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                        <h5 class="post-title mb-3 mt-3"><a href="blog-single.html">15 Unheard Ways To
                                                Achieve Greater Walker</a></h5>
                                        <p class="excerpt mb-0">A wonderful serenity has taken possession of my entire
                                            soul, like these sweet mornings of spring which I enjoy</p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- post -->
                                    <div class="post post-list-sm square">
                                        <div class="thumb rounded">
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/editor-sm-1.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make
                                                    Your iPhone Faster</a></h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- post -->
                                    <div class="post post-list-sm square">
                                        <div class="thumb rounded">
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/editor-sm-2.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy
                                                    Method That Works For All</a></h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- post -->
                                    <div class="post post-list-sm square">
                                        <div class="thumb rounded">
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/editor-sm-3.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="blog-single.html">10 Ways To
                                                    Immediately Start Selling Furniture</a></h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- post -->
                                    <div class="post post-list-sm square">
                                        <div class="thumb rounded">
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/editor-sm-4.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="blog-single.html">15 Unheard Ways To
                                                    Achieve Greater Walker</a></h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="spacer" data-height="50"></div>

                        <!-- horizontal ads -->
                        <div class="ads-horizontal text-md-center">
                            <span class="ads-title">- Sponsored Ad -</span>
                            <a href="#">
                                <img src="images/ads/ad-750.png" alt="Advertisement" />
                            </a>
                        </div>

                        <div class="spacer" data-height="50"></div>

                        <!-- section header -->
                        <div class="section-header">
                            <h3 class="section-title">Trending</h3>
                            <img src="images/wave.svg" class="wave" alt="wave" />
                        </div>

                        <div class="padding-30 rounded bordered">
                            <div class="row gy-5">
                                <div class="col-sm-6">
                                    <!-- post large -->
                                    <div class="post">
                                        <div class="thumb rounded">
                                            <a href="category.html"
                                                class="category-badge position-absolute">Culture</a>
                                            <span class="post-format">
                                                <i class="icon-picture"></i>
                                            </span>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/trending-lg-1.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <ul class="meta list-inline mt-4 mb-0">
                                            <li class="list-inline-item"><a href="#"><img
                                                        src="images/other/author-sm.png" class="author"
                                                        alt="author" />Katen Doe</a></li>
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                        <h5 class="post-title mb-3 mt-3"><a href="blog-single.html">Facts About
                                                Business That Will Help You Success</a></h5>
                                        <p class="excerpt mb-0">A wonderful serenity has taken possession of my entire
                                            soul, like these sweet mornings of spring which I enjoy</p>
                                    </div>
                                    <!-- post -->
                                    <div class="post post-list-sm square before-seperator">
                                        <div class="thumb rounded">
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/trending-sm-1.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make
                                                    Your iPhone Faster</a></h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- post -->
                                    <div class="post post-list-sm square before-seperator">
                                        <div class="thumb rounded">
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/trending-sm-2.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy
                                                    Method That Works For All</a></h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <!-- post large -->
                                    <div class="post">
                                        <div class="thumb rounded">
                                            <a href="category.html"
                                                class="category-badge position-absolute">Inspiration</a>
                                            <span class="post-format">
                                                <i class="icon-earphones"></i>
                                            </span>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/trending-lg-2.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <ul class="meta list-inline mt-4 mb-0">
                                            <li class="list-inline-item"><a href="#"><img
                                                        src="images/other/author-sm.png" class="author"
                                                        alt="author" />Katen Doe</a></li>
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                        <h5 class="post-title mb-3 mt-3"><a href="blog-single.html">5 Easy Ways You
                                                Can Turn Future Into Success</a></h5>
                                        <p class="excerpt mb-0">A wonderful serenity has taken possession of my entire
                                            soul, like these sweet mornings of spring which I enjoy</p>
                                    </div>
                                    <!-- post -->
                                    <div class="post post-list-sm square before-seperator">
                                        <div class="thumb rounded">
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/trending-sm-3.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="blog-single.html">Here Are 8 Ways To
                                                    Success Faster</a></h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- post -->
                                    <div class="post post-list-sm square before-seperator">
                                        <div class="thumb rounded">
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/trending-sm-4.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="blog-single.html">Master The Art Of
                                                    Nature With These 7 Tips</a></h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="spacer" data-height="50"></div>

                        <!-- section header -->
                        <div class="section-header">
                            <h3 class="section-title">Inspiration</h3>
                            <img src="images/wave.svg" class="wave" alt="wave" />
                            <div class="slick-arrows-top">
                                <button type="button" data-role="none"
                                    class="carousel-topNav-prev slick-custom-buttons" aria-label="Previous"><i
                                        class="icon-arrow-left"></i></button>
                                <button type="button" data-role="none"
                                    class="carousel-topNav-next slick-custom-buttons" aria-label="Next"><i
                                        class="icon-arrow-right"></i></button>
                            </div>
                        </div>

                        <div class="row post-carousel-twoCol post-carousel">
                            <!-- post -->
                            <div class="post post-over-content col-md-6">
                                <div class="details clearfix">
                                    <a href="category.html" class="category-badge">Inspiration</a>
                                    <h4 class="post-title"><a href="blog-single.html">Want To Have A More Appealing
                                            Tattoo?</a></h4>
                                    <ul class="meta list-inline mb-0">
                                        <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                                <a href="blog-single.html">
                                    <div class="thumb rounded">
                                        <div class="inner">
                                            <img src="images/posts/inspiration-1.jpg" alt="thumb" />
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- post -->
                            <div class="post post-over-content col-md-6">
                                <div class="details clearfix">
                                    <a href="category.html" class="category-badge">Inspiration</a>
                                    <h4 class="post-title"><a href="blog-single.html">Feel Like A Pro With The Help Of
                                            These 7 Tips</a></h4>
                                    <ul class="meta list-inline mb-0">
                                        <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                                <a href="blog-single.html">
                                    <div class="thumb rounded">
                                        <div class="inner">
                                            <img src="images/posts/inspiration-2.jpg" alt="thumb" />
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- post -->
                            <div class="post post-over-content col-md-6">
                                <div class="details clearfix">
                                    <a href="category.html" class="category-badge">Inspiration</a>
                                    <h4 class="post-title"><a href="blog-single.html">Your Light Is About To Stop
                                            Being Relevant</a></h4>
                                    <ul class="meta list-inline mb-0">
                                        <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                        <li class="list-inline-item">29 March 2021</li>
                                    </ul>
                                </div>
                                <a href="blog-single.html">
                                    <div class="thumb rounded">
                                        <div class="inner">
                                            <img src="images/posts/inspiration-3.jpg" alt="thumb" />
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="spacer" data-height="50"></div>

                        <!-- section header -->
                        <div class="section-header">
                            <h3 class="section-title">Latest Posts</h3>
                            <img src="images/wave.svg" class="wave" alt="wave" />
                        </div>

                        <div class="padding-30 rounded bordered">

                            <div class="row">

                                <div class="col-md-12 col-sm-6">
                                    <!-- post -->
                                    <div class="post post-list clearfix">
                                        <div class="thumb rounded">
                                            <span class="post-format-sm">
                                                <i class="icon-picture"></i>
                                            </span>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/latest-sm-1.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details">
                                            <ul class="meta list-inline mb-3">
                                                <li class="list-inline-item"><a href="#"><img
                                                            src="images/other/author-sm.png" class="author"
                                                            alt="author" />Katen Doe</a></li>
                                                <li class="list-inline-item"><a href="#">Trending</a></li>
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                            <h5 class="post-title"><a href="blog-single.html">The Next 60 Things To
                                                    Immediately Do About Building</a></h5>
                                            <p class="excerpt mb-0">A wonderful serenity has taken possession of my
                                                entire soul, like these sweet mornings</p>
                                            <div class="post-bottom clearfix d-flex align-items-center">
                                                <div class="social-share me-auto">
                                                    <button class="toggle-button icon-share"></button>
                                                    <ul class="icons list-unstyled list-inline mb-0">
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-facebook-f"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-twitter"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-linkedin-in"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-pinterest"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-telegram-plane"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="far fa-envelope"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="more-button float-end">
                                                    <a href="blog-single.html"><span class="icon-options"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-6">
                                    <!-- post -->
                                    <div class="post post-list clearfix">
                                        <div class="thumb rounded">
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/latest-sm-2.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details">
                                            <ul class="meta list-inline mb-3">
                                                <li class="list-inline-item"><a href="#"><img
                                                            src="images/other/author-sm.png" class="author"
                                                            alt="author" />Katen Doe</a></li>
                                                <li class="list-inline-item"><a href="#">Lifestyle</a></li>
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                            <h5 class="post-title"><a href="blog-single.html">Master The Art Of Nature
                                                    With These 7 Tips</a></h5>
                                            <p class="excerpt mb-0">A wonderful serenity has taken possession of my
                                                entire soul, like these sweet mornings</p>
                                            <div class="post-bottom clearfix d-flex align-items-center">
                                                <div class="social-share me-auto">
                                                    <button class="toggle-button icon-share"></button>
                                                    <ul class="icons list-unstyled list-inline mb-0">
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-facebook-f"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-twitter"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-linkedin-in"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-pinterest"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-telegram-plane"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="far fa-envelope"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="more-button float-end">
                                                    <a href="blog-single.html"><span class="icon-options"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-6">
                                    <!-- post -->
                                    <div class="post post-list clearfix">
                                        <div class="thumb rounded">
                                            <span class="post-format-sm">
                                                <i class="icon-camrecorder"></i>
                                            </span>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/latest-sm-3.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details">
                                            <ul class="meta list-inline mb-3">
                                                <li class="list-inline-item"><a href="#"><img
                                                            src="images/other/author-sm.png" class="author"
                                                            alt="author" />Katen Doe</a></li>
                                                <li class="list-inline-item"><a href="#">Fashion</a></li>
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                            <h5 class="post-title"><a href="blog-single.html">Facts About Business
                                                    That Will Help You Success</a></h5>
                                            <p class="excerpt mb-0">A wonderful serenity has taken possession of my
                                                entire soul, like these sweet mornings</p>
                                            <div class="post-bottom clearfix d-flex align-items-center">
                                                <div class="social-share me-auto">
                                                    <button class="toggle-button icon-share"></button>
                                                    <ul class="icons list-unstyled list-inline mb-0">
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-facebook-f"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-twitter"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-linkedin-in"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-pinterest"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-telegram-plane"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="far fa-envelope"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="more-button float-end">
                                                    <a href="blog-single.html"><span class="icon-options"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-sm-6">
                                    <!-- post -->
                                    <div class="post post-list clearfix">
                                        <div class="thumb rounded">
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/latest-sm-4.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details">
                                            <ul class="meta list-inline mb-3">
                                                <li class="list-inline-item"><a href="#"><img
                                                            src="images/other/author-sm.png" class="author"
                                                            alt="author" />Katen Doe</a></li>
                                                <li class="list-inline-item"><a href="#">Politic</a></li>
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                            <h5 class="post-title"><a href="blog-single.html">Your Light Is About To
                                                    Stop Being Relevant</a></h5>
                                            <p class="excerpt mb-0">A wonderful serenity has taken possession of my
                                                entire soul, like these sweet mornings</p>
                                            <div class="post-bottom clearfix d-flex align-items-center">
                                                <div class="social-share me-auto">
                                                    <button class="toggle-button icon-share"></button>
                                                    <ul class="icons list-unstyled list-inline mb-0">
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-facebook-f"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-twitter"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-linkedin-in"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-pinterest"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="fab fa-telegram-plane"></i></a></li>
                                                        <li class="list-inline-item"><a href="#"><i
                                                                    class="far fa-envelope"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="more-button float-end">
                                                    <a href="blog-single.html"><span class="icon-options"></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- load more button -->
                            <div class="text-center">
                                <button class="btn btn-simple">Load More</button>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-4">

                        <!-- sidebar -->
                        <div class="sidebar">
                            <!-- widget about -->
                            <div class="widget rounded">
                                <div class="widget-about data-bg-image text-center" data-bg-image="images/map-bg.png">
                                    <img src="images/logo.svg" alt="logo" class="mb-4" />
                                    <p class="mb-4">Hello, We’re content writer who is fascinated by content fashion,
                                        celebrity and lifestyle. We helps clients bring the right content to the right
                                        people.</p>
                                    <ul class="social-icons list-unstyled list-inline mb-0">
                                        <li class="list-inline-item"><a href="#"><i
                                                    class="fab fa-facebook-f"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i
                                                    class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i
                                                    class="fab fa-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i
                                                    class="fab fa-pinterest"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i
                                                    class="fab fa-medium"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i
                                                    class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <!-- widget popular posts -->
                            <div class="widget rounded">
                                <div class="widget-header text-center">
                                    <h3 class="widget-title">Popular Posts</h3>
                                    <img src="images/wave.svg" class="wave" alt="wave" />
                                </div>
                                <div class="widget-content">
                                    <!-- post -->
                                    <div class="post post-list-sm circle">
                                        <div class="thumb circle">
                                            <span class="number">1</span>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/tabs-1.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make
                                                    Your iPhone Faster</a></h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- post -->
                                    <div class="post post-list-sm circle">
                                        <div class="thumb circle">
                                            <span class="number">2</span>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/tabs-2.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy
                                                    Method That Works For All</a></h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- post -->
                                    <div class="post post-list-sm circle">
                                        <div class="thumb circle">
                                            <span class="number">3</span>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/posts/tabs-3.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="blog-single.html">10 Ways To
                                                    Immediately Start Selling Furniture</a></h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- widget categories -->
                            <div class="widget rounded">
                                <div class="widget-header text-center">
                                    <h3 class="widget-title">Explore Topics</h3>
                                    <img src="images/wave.svg" class="wave" alt="wave" />
                                </div>
                                <div class="widget-content">
                                    <ul class="list">
                                        <li><a href="#">Lifestyle</a><span>(5)</span></li>
                                        <li><a href="#">Inspiration</a><span>(2)</span></li>
                                        <li><a href="#">Fashion</a><span>(4)</span></li>
                                        <li><a href="#">Politic</a><span>(1)</span></li>
                                        <li><a href="#">Trending</a><span>(7)</span></li>
                                        <li><a href="#">Culture</a><span>(3)</span></li>
                                    </ul>
                                </div>

                            </div>

                            <!-- widget newsletter -->
                            <div class="widget rounded">
                                <div class="widget-header text-center">
                                    <h3 class="widget-title">Newsletter</h3>
                                    <img src="images/wave.svg" class="wave" alt="wave" />
                                </div>
                                <div class="widget-content">
                                    <span class="newsletter-headline text-center mb-3">Join 70,000 subscribers!</span>
                                    <form>
                                        <div class="mb-2">
                                            <input class="form-control w-100 text-center" placeholder="Email address…"
                                                type="email">
                                        </div>
                                        <button class="btn btn-default btn-full" type="submit">Sign Up</button>
                                    </form>
                                    <span class="newsletter-privacy text-center mt-3">By signing up, you agree to our
                                        <a href="#">Privacy Policy</a></span>
                                </div>
                            </div>

                            <!-- widget post carousel -->
                            <div class="widget rounded">
                                <div class="widget-header text-center">
                                    <h3 class="widget-title">Celebration</h3>
                                    <img src="images/wave.svg" class="wave" alt="wave" />
                                </div>
                                <div class="widget-content">
                                    <div class="post-carousel-widget">
                                        <!-- post -->
                                        <div class="post post-carousel">
                                            <div class="thumb rounded">
                                                <a href="category.html" class="category-badge position-absolute">How
                                                    to</a>
                                                <a href="blog-single.html">
                                                    <div class="inner">
                                                        <img src="images/widgets/widget-carousel-1.jpg"
                                                            alt="post-title" />
                                                    </div>
                                                </a>
                                            </div>
                                            <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">5 Easy Ways
                                                    You Can Turn Future Into Success</a></h5>
                                            <ul class="meta list-inline mt-2 mb-0">
                                                <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                        <!-- post -->
                                        <div class="post post-carousel">
                                            <div class="thumb rounded">
                                                <a href="category.html"
                                                    class="category-badge position-absolute">Trending</a>
                                                <a href="blog-single.html">
                                                    <div class="inner">
                                                        <img src="images/widgets/widget-carousel-2.jpg"
                                                            alt="post-title" />
                                                    </div>
                                                </a>
                                            </div>
                                            <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">Master The Art
                                                    Of Nature With These 7 Tips</a></h5>
                                            <ul class="meta list-inline mt-2 mb-0">
                                                <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                        <!-- post -->
                                        <div class="post post-carousel">
                                            <div class="thumb rounded">
                                                <a href="category.html" class="category-badge position-absolute">How
                                                    to</a>
                                                <a href="blog-single.html">
                                                    <div class="inner">
                                                        <img src="images/widgets/widget-carousel-1.jpg"
                                                            alt="post-title" />
                                                    </div>
                                                </a>
                                            </div>
                                            <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">5 Easy Ways
                                                    You Can Turn Future Into Success</a></h5>
                                            <ul class="meta list-inline mt-2 mb-0">
                                                <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- carousel arrows -->
                                    <div class="slick-arrows-bot">
                                        <button type="button" data-role="none"
                                            class="carousel-botNav-prev slick-custom-buttons" aria-label="Previous"><i
                                                class="icon-arrow-left"></i></button>
                                        <button type="button" data-role="none"
                                            class="carousel-botNav-next slick-custom-buttons" aria-label="Next"><i
                                                class="icon-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>

                            <!-- widget advertisement -->
                            <div class="widget no-container rounded text-md-center">
                                <span class="ads-title">- Sponsored Ad -</span>
                                <a href="#" class="widget-ads">
                                    <img src="images/ads/ad-360.png" alt="Advertisement" />
                                </a>
                            </div>

                            <!-- widget tags -->
                            <div class="widget rounded">
                                <div class="widget-header text-center">
                                    <h3 class="widget-title">Tag Clouds</h3>
                                    <img src="images/wave.svg" class="wave" alt="wave" />
                                </div>
                                <div class="widget-content">
                                    <a href="#" class="tag">#Trending</a>
                                    <a href="#" class="tag">#Video</a>
                                    <a href="#" class="tag">#Featured</a>
                                    <a href="#" class="tag">#Gallery</a>
                                    <a href="#" class="tag">#Celebrities</a>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </section>

        <!-- instagram feed -->
        <div class="instagram">
            <div class="container-xl">
                <!-- button -->
                <a href="#" class="btn btn-default btn-instagram">@Katen on Instagram</a>
                <!-- images -->
                <div class="instagram-feed d-flex flex-wrap">
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="images/insta/insta-1.jpg" alt="insta-title" />
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="images/insta/insta-2.jpg" alt="insta-title" />
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="images/insta/insta-3.jpg" alt="insta-title" />
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="images/insta/insta-4.jpg" alt="insta-title" />
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="images/insta/insta-5.jpg" alt="insta-title" />
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="images/insta/insta-6.jpg" alt="insta-title" />
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer -->
        <footer>
            <div class="container-xl">
                <div class="footer-inner">
                    <div class="row d-flex align-items-center gy-4">
                        <!-- copyright text -->
                        <div class="col-md-4">
                            <span class="copyright">© 2021 Katen. Template by ThemeGer.</span>
                        </div>

                        <!-- social icons -->
                        <div class="col-md-4 text-center">
                            <ul class="social-icons list-unstyled list-inline mb-0">
                                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>

                        <!-- go to top button -->
                        <div class="col-md-4">
                            <a href="#" id="return-to-top" class="float-md-end"><i
                                    class="icon-arrow-up"></i>Back to Top</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- end site wrapper -->

    <!-- search popup area -->
    <div class="search-popup">
        <!-- close button -->
        <button type="button" class="btn-close" aria-label="Close"></button>
        <!-- content -->
        <div class="search-content">
            <div class="text-center">
                <h3 class="mb-4 mt-0">Press ESC to close</h3>
            </div>
            <!-- form -->
            <form class="d-flex search-form">
                <input class="form-control me-2" type="search" placeholder="Search and press enter ..."
                    aria-label="Search">
                <button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
            </form>
        </div>
    </div>

    <!-- canvas menu -->
    <div class="canvas-menu d-flex align-items-end flex-column">
        <!-- close button -->
        <button type="button" class="btn-close" aria-label="Close"></button>

        <!-- logo -->
        <div class="logo">
            <img src="images/logo.svg" alt="Katen" />
        </div>

        <!-- menu -->
        <nav>
            <ul class="vertical-menu">
                <li class="active">
                    <a href="index.html">Home</a>
                    <ul class="submenu">
                        <li><a href="index.html">Magazine</a></li>
                        <li><a href="personal.html">Personal</a></li>
                        <li><a href="personal-alt.html">Personal Alt</a></li>
                        <li><a href="minimal.html">Minimal</a></li>
                        <li><a href="classic.html">Classic</a></li>
                    </ul>
                </li>
                <li><a href="category.html">Lifestyle</a></li>
                <li><a href="category.html">Inspiration</a></li>
                <li>
                    <a href="#">Pages</a>
                    <ul class="submenu">
                        <li><a href="category.html">Category</a></li>
                        <li><a href="blog-single.html">Blog Single</a></li>
                        <li><a href="blog-single-alt.html">Blog Single Alt</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>

        <!-- social icons -->
        <ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
        </ul>
    </div>

    <!-- JAVA SCRIPTS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>
