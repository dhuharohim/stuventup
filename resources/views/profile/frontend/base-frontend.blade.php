<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>stuvent up - {{ $profile->nickname_himpunan }}</title>
	<meta name="description" content="Katen - Minimal Blog & Magazine HTML Theme">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/simple-line-icons.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('assets/css/styleMag2.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="https://cdn.tutorialjinni.com/izitoast/1.4.0/css/iziToast.min.css">

	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

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
</div> --}}

<!-- site wrapper -->
<div class="site-wrapper">

	<div class="main-overlay"></div>

	<!-- header -->
	<header class="header-personal light">
		<div class="container-xl header-top">
			<div class="row align-items-center">
	
				<div class="col-4 d-none d-md-flex d-lg-flex" style="gap: 1rem;">
					{{-- <a href="{{ route('magazine.index') }}" style="margin-left: 1rem;" class="d-block text-logo">STUVENT<span class="dot">.</span> UP</a> --}}
				
				</div>
	
				<div class="col-md-4 col-sm-12 col-xs-12 text-center">
				<!-- site logo -->
					<a class="navbar-brand" href="#"><img style="width: 20%; border-radius: 100%;
						margin-bottom: 1rem;" src="/assets/img/profile/{{ $profile['photo'] == '' ? 'default.png' : $profile['photo'] }}" alt="logo" /></a>
					<a href="#" class="d-block text-logo">{{ $profile->nickname_himpunan }}</a>
					<span class="slogan d-block text-white">{{ $profile->name_himpunan }}</span>
				</div>
	
				<div class="col-md-4 col-sm-12 col-xs-12">
					<!-- header buttons -->
					<div class="header-buttons float-md-end mt-4 mt-md-0 d-flex" style="gap: 1rem;">
						<a class="search icon-button" href="{{ route('magazine.index') }}">
							<i class="icon-home"></i>
						</a>
						@if(!empty(auth()->user()))
							@if(auth()->user()->role == 'admin')
							<a href="{{ route('home') }}" class="settings icon-button">
								<i class="icon-settings"></i>
							</a>
							@endif
						@endif
						<button class="burger-menu icon-button float-end float-md-none" >
							<span class="burger-icon"></span>
						</button>
					</div>
				</div>
	
			</div>
		</div>
		<nav class="navbar navbar-expand-lg">
			<div class="container-xl">
			   
				<div class="collapse navbar-collapse justify-content-center centered-nav " >
					<!-- menus -->
					<ul class=" navbar-nav" >
						<li class="nav-item dropdown @if($active == 'home') active @endif">
							<a class="nav-link" href="{{ route('profile.admin',['himpunan' => $profile->name_himpunan,'nav' => 'home']) }}">Home</a>
						</li>
						<li class="nav-item dropdown @if($active == 'category' || $active == 'seminar' || $active == 'pelatihan' 
						|| $active == 'olahraga' || $active == 'pameran' || $active == 'hari nasional' || $active == 'lainnya') active @endif">
							<a class="nav-link dropdown-toggle">Kategori</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item @if($active == 'seminar') active @endif" href="{{ route('profile.admin',['himpunan' => $profile->name_himpunan,'nav' => 'seminar']) }}">Seminar</a></li>
								<li><a class="dropdown-item @if($active == 'pelatihan') active @endif" href="{{ route('profile.admin',['himpunan' => $profile->name_himpunan,'nav' => 'pelatihan']) }}">Pelatihan</a></li>
								<li><a class="dropdown-item @if($active == 'olahraga') active @endif" href="{{ route('profile.admin',['himpunan' => $profile->name_himpunan,'nav' => 'olahraga']) }}">Olahraga</a></li>
								<li><a class="dropdown-item @if($active == 'pameran') active @endif" href="{{ route('profile.admin',['himpunan' => $profile->name_himpunan,'nav' => 'pameran']) }}">Pameran</a></li>
								<li><a class="dropdown-item @if($active == 'hari nasional') active @endif" href="{{ route('profile.admin',['himpunan' => $profile->name_himpunan,'nav' => 'hari nasional']) }}">Hari Nasional</a></li>
								<li><a class="dropdown-item @if($active == 'lainnya') active @endif" href="{{ route('profile.admin',['himpunan' => $profile->name_himpunan,'nav' => 'lainnya']) }}">Lainnya</a></li>
							</ul>
						</li>
						<li class="nav-item @if($active == 'kontak') active @endif"">
							<a class="nav-link" id="profile-tab" data-toggle="tab" href="{{ route('profile.admin',['himpunan' => $profile->name_himpunan,'nav' => 'kontak']) }}" role="tab" aria-controls="profile" aria-selected="false">Kontak</a>
						</li>
					</ul>
				</div> 
			</div>
		</nav>
	</header>

    <!-- section hero -->
    @yield('hero-content')
  

	<!-- section main content -->
    @yield('main-content')

	<!-- footer -->
	<footer>
		<div class="container-xl">
			<div class="footer-inner">
				<div class="row d-flex align-items-center gy-4">
					<!-- copyright text -->
					<div class="col-md-4">
						<span class="copyright">© Stuvent UP.</span>
					</div>

					<!-- go to top button -->
					<div class="col-md-4">
						<a href="#" id="return-to-top" class="float-md-end"><i class="icon-arrow-up"></i>Back to Top</a>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div><!-- end site wrapper -->

 <!-- search popup area -->
{{-- <div class="search-popup">
	<!-- close button -->
	<button type="button" class="btn-close" aria-label="Close"></button>
	<!-- content -->
	<div class="search-content">
		<div class="text-center">
			<h3 class="mb-4 mt-0">Press ESC to close</h3>
		</div>
		<!-- form -->
		<form class="d-flex search-form">
			<input class="form-control me-2" type="search" placeholder="Search and press enter ..." aria-label="Search">
			<button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
		</form>
	</div>
</div> --}}

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
                <li><a href="{{ route('profile.admin',['himpunan' => $profile->name_himpunan,'nav' => 'home']) }}">Home</a></li>
                <li class="nav-item dropdown">
                    <a href="#">Kategori</a>
                    <ul class="submenu">
						<li><a class="dropdown-item"  href="{{ route('profile.admin',['himpunan' => $profile->name_himpunan,'nav' => 'seminar']) }}">Seminar</a></li>
						<li><a class="dropdown-item" href="{{ route('profile.admin',['himpunan' => $profile->name_himpunan,'nav' => 'pelatihan']) }}">Pelatihan</a></li>
						<li><a class="dropdown-item" href="{{ route('profile.admin',['himpunan' => $profile->name_himpunan,'nav' => 'olahraga']) }}">Olahraga</a></li>
						<li><a class="dropdown-item"  href="{{ route('profile.admin',['himpunan' => $profile->name_himpunan,'nav' => 'pameran']) }}">Pameran</a></li>
						<li><a class="dropdown-item" href="{{ route('profile.admin',['himpunan' => $profile->name_himpunan,'nav' => 'hari nasional']) }}">Hari Nasional</a></li>
						<li><a class="dropdown-item"  href="{{ route('profile.admin',['himpunan' => $profile->name_himpunan,'nav' => 'lainnya']) }}">Lainnya</a></li>
                    </ul>
                </li>
                <li><a href="/#features">Daftar Himpunan</a></li>
                <li><a href="/#get-started">Tentang</a></li>
            </ul>
        </nav>
        <div style="display: flex;
        justify-content: space-between;" class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
            <a href="/">Menu utama</a>
            @if(!empty(auth()->user()))
            <a href="{{ route('logout') }}">Logout</a>
            @else
            <a href="/login">Login</a>
            @endif
        </div>
    </div>

<!-- JAVA SCRIPTS -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.sticky-sidebar.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="https://cdn.tutorialjinni.com/izitoast/1.4.0/js/iziToast.min.js" type="text/javascript"></script>

@yield('custom_js')
</body>
</html>