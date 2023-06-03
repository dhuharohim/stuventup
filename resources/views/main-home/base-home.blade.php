<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    @php
        
    @endphp
    <title>stuvent up - @yield('title-portal')</title>
    <meta name="description" content="Stuvent UP">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="shortcut icon" href="{{ asset('assets/img/stuvent.png') }}" />

    <!-- STYLES -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/simple-line-icons.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/styleMag2.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="https://cdn.tutorialjinni.com/izitoast/1.4.0/css/iziToast.min.css">

      {{-- <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> --}}
</head>

<body>

    <!-- preloader -->
    {{-- <div id="preloader">
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
     --}}
     <div class="site-wrapper">
        <div class="main-overlay"></div>
        <!-- header -->
        <header class="header-default">
            <nav class="navbar navbar-expand-lg">
                <div class="container-xl">
                    <!-- site logo -->
                    <img src="{{ asset('assets/img/stuvent.png') }}" style="width: 3rem;" alt="logo" />
                    <a href="{{ route('magazine.index') }}" style="margin-left: 1rem;" class="d-block text-logo">STUVENT<span class="dot">.</span> UP</a>

                    <div class="collapse navbar-collapse">
                        <!-- menus -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item dropdown active">
                                <a class="nav-link" href="{{ route('magazine.index') }}">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle"  href="#">Kategori</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('category.index', 'seminar') }}">Seminar</a></li>
                                    <li><a class="dropdown-item" href="{{ route('category.index', 'pelatihan') }}">Pelatihan</a></li>
                                    <li><a class="dropdown-item" href="{{ route('category.index', 'olahraga') }}">Olahraga</a></li>
                                    <li><a class="dropdown-item" href="{{ route('category.index', 'pameran') }}">Pameran</a></li>
                                    <li><a class="dropdown-item" href="{{ route('category.index', 'nasional') }}">Hari Nasional</a></li>
                                    <li><a class="dropdown-item" href="{{ route('category.index', 'lainnya') }}">Lainnya</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="category.html">Daftar Himpunan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Tentang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">Kontak</a>
                            </li>
                        </ul>
                    </div>

                    <!-- header right section -->
                    <div class="header-right">
                        @php
                            $user = auth()->user();
                        @endphp
                        <!-- header buttons -->
                        <div class="header-buttons">
                            @if(!empty($user))
                                @if($user->role == 'admin')
                                    <a href="{{ route('profile.admin', $user->name) }}" class="search icon-button">
                                        <img src="{{ asset('assets/img/person.svg') }}" alt="">
                                    </a>
                                @elseif($user->role == 'masyarakat' || $user->role == 'umum')
                                    <a href="{{ route('profile.general') }}" class="search icon-button">
                                        <img src="{{ asset('assets/img/person.svg') }}" alt="">
                                    </a>
                                @endif
                            @else 
                                    <a href="{{route('login')}}">Login sekarang</a>
                            @endif
                            <button class="burger-menu icon-button">
                                <span class="burger-icon"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        @yield('content-content')
    </div><!-- end site wrapper -->

    @yield('content-portal')

    <!-- search popup area -->
    <div class="search-popup">
        <!-- close button -->
        <button type="button" class="btn-close" aria-label="Close"></button>
        <!-- content -->
        <div class="search-content">
            <div class="text-center">
                <h3 class="mb-4 mt-0">My Profile</h3>
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
        <div style="display: flex;
        align-self: center;
        margin: 2rem 0;">
            <img style="width:60px;" src="{{ asset('assets/img/stuvent.png') }}" alt="stuvent" />
        </div>

        <!-- menu -->
        <nav>
            <ul class="vertical-menu">
                <li><a href="category.html">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  href="#">Kategori</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="">Seminar</a></li>
                        <li><a class="dropdown-item" href="">Pelatihan</a></li>
                        <li><a class="dropdown-item" href="blog-single-alt.html">Olahraga</a></li>
                        <li><a class="dropdown-item" href="about.html">Pameran</a></li>
                        <li><a class="dropdown-item" href="contact.html">Hari Nasional</a></li>
                        <li><a class="dropdown-item" href="contact.html">Lainnya</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">Daftar Himpunan</a></li>
                <li><a href="contact.html">Tentang</a></li>
                <li><a href="contact.html">Kontak</a></li>
            </ul>
        </nav>
        <div style="display: flex;
        justify-content: space-between;" class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
            <a href="/">Menu utama</a>
            @if(!empty($user))
            <a href="{{ route('logout') }}">Logout</a>
            @else
            <a href="/login">Login</a>
            @endif
        </div>
    </div>

    <!-- JAVA SCRIPTS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js" integrity="sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA==" crossorigin="anonymous"></script>

    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="https://cdn.tutorialjinni.com/izitoast/1.4.0/js/iziToast.min.js" type="text/javascript"></script>

    @yield('custom_js')

</body>

</html>
