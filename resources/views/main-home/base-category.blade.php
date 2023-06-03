<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Kategori - @yield('kategori')</title>
	<meta name="description" content="Katen - Minimal Blog & Magazine HTML Theme">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">

	<!-- STYLES -->
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
	<style>
		.dropdown-item.active, .dropdown-item:active {
		background-color: #73c15e !important;
		}
		.dropdown-item:focus, .dropdown-item:hover{
			color: #4B7C3E !important;
		}
	</style>
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
	<header class="header-personal">
        <div class="container-xl header-top">
			<div class="row align-items-center">
				<div class="col-md-6 col-sm-12 col-xs-12 d-flex">
				<!-- site logo -->
					<a class="navbar-brand" style="width: 10%;" href="personal.html"><img src="{{ asset('assets/img/stuvent.png') }}" alt="logo" /></a>
					<a href="personal.html" style="margin-left: 1rem;" class="d-block text-logo">STUVENT<span class="dot">.</span> UP</a>
				</div>

				<div class="col-md-6 col-sm-12 col-xs-12">
					<!-- header buttons -->
					<div class="header-buttons float-md-end mt-4 mt-md-0">
						<button class="search icon-button">
							<i class="icon-magnifier"></i>
						</button>
						<button class="burger-menu icon-button ms-2 float-end float-md-none">
							<span class="burger-icon"></span>
						</button>
					</div>
				</div>

			</div>
        </div>
		<nav class="navbar navbar-expand-lg">
			<div class="container-xl">
				<div class="collapse navbar-collapse justify-content-center centered-nav">
					<!-- menus -->
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="{{ route('magazine.index') }}">Home</a>
						</li>
						<li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle " href="#">Kategori</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item @yield('active-seminar')" href="{{ route('category.index', 'seminar') }}">Seminar</a></li>
								<li><a class="dropdown-item @yield('active-pelatihan')" href="{{ route('category.index', 'pelatihan') }}">Pelatihan</a></li>
								<li><a class="dropdown-item @yield('active-olahraga')" href="{{ route('category.index', 'olahraga') }}">Olahraga</a></li>
								<li><a class="dropdown-item @yield('active-pameran')" href="{{ route('category.index', 'pameran') }}">Pameran</a></li>
								<li><a class="dropdown-item @yield('active-nasional')" href="{{ route('category.index', 'nasional') }}">Hari Nasional</a></li>
								<li><a class="dropdown-item @yield('active-lainnya')" href="{{ route('category.index', 'lainnya') }}">Lainnya</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contact.html">Daftar Himpunan</a>
						</li>
                        <li class="nav-item">
							<a class="nav-link" href="contact.html">Tentang</a>
						</li>
                        <li class="nav-item">
							<a class="nav-link" href="contact.html">Kontak</a>
						</li>
					</ul>
				</div>

			</div>
		</nav>
	</header>

    {{-- category header --}}
    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                @if($category == 'seminar')
                <h1 class="mt-0 mb-2">Seminar</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">Kategori</li>
                        <li class="breadcrumb-item active" aria-current="page">Seminar</li>
                    </ol>
                </nav>
                @elseif($category == 'nasional')
                <h1 class="mt-0 mb-2">Nasional</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">Kategori</li>
                        <li class="breadcrumb-item active" aria-current="page">Nasional</li>
                    </ol>
                </nav>
                @elseif($category == 'olahraga')
                <h1 class="mt-0 mb-2">Olahraga</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">Kategori</li>
                        <li class="breadcrumb-item active" aria-current="page">Olahraga</li>
                    </ol>
                </nav>
                @elseif($category == 'pameran')
                <h1 class="mt-0 mb-2">Pameran</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">Kategori</li>
                        <li class="breadcrumb-item active" aria-current="page">Pameran</li>
                    </ol>
                </nav>
                @elseif($category == 'pelatihan')
                <h1 class="mt-0 mb-2">Pelatihan</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">Kategori</li>
                        <li class="breadcrumb-item active" aria-current="page">Pelatihan</li>
                    </ol>
                </nav>
                @elseif($category == 'lainnya')
                <h1 class="mt-0 mb-2">Lainnya</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item">Kategori</li>
                        <li class="breadcrumb-item active" aria-current="page">Lainnya</li>
                    </ol>
                </nav>
                @endif
            </div>
        </div>
    </section>

	<!-- section main content -->
	<section class="main-content">
        <div class="container-xl">
            @if($category == 'seminar')
                @yield('seminar-content')
            @elseif($category == 'olahraga')
                @yield('olahraga-content')
            @elseif($category == 'pameran')
                @yield('pameran-content')
            @elseif($category == 'pelatihan')
                @yield('pelatihan-content')
            @elseif($category == 'nasional')
                @yield('nasional-content')
            @elseif($category == 'lainnya')
                @yield('lainnya-content')
            @endif
		</div>
	</section>

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
							<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
						</ul>
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
<div class="search-popup">
	<!-- close button -->
	<button type="button" class="btn-close" aria-label="Close"></button>
	<!-- content -->
	<div class="search-content">
		<div class="text-center">
			<h3 class="mb-4 mt-0">Cari event <span class="text-capitalize">{{ $category }}</span></h3>
		</div>
		<!-- form -->
		<div class="d-flex search-form">
			<input id="search-{{$category}}" class="form-control me-2" type="search" placeholder="" aria-label="Search">
			<a id="submit-{{$category}}" class="btn btn-default btn-lg"><i class="icon-magnifier"></i></a>
		</div>
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