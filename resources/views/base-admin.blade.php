<!DOCTYPE html>
<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
data-template="vertical-menu-template-no-customizer">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>stuvent.up - admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/stuvent.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/styleAdmin.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/simple-line-icons.css') }}" type="text/css" media="all">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/bundle/ijabo/ijaboCropTool.min.css') }}" />
    <script src="https://cdn.tiny.cloud/1/zin9ldpsb6vcx5wlmc5mcuyu27a66e8r96voqx247balahs1/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        
    <script>
         tinymce.init({
           selector: 'textarea#editor', });
    </script>

    <link rel="stylesheet" href="https://cdn.tutorialjinni.com/izitoast/1.4.0/css/iziToast.min.css">


    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    {{-- <script src="assets/vendor/js/template-customizer.js"></script> --}}
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/js/config.js') }}"></script>

    @yield('custom_css')

</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="/home" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="{{ asset('assets/img/stuvent.png') }}" alt="" class="img-fluid" width="30">
                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">Stuvent.UP</span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                
                    <li class="menu-item @yield('dashboard')">
                        <a href="/home" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>
                    <li class="menu-item @yield('event')">
                        <a href="{{ route('event.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-layout"></i>
                            <div data-i18n="Layouts">Event</div>
                        </a>
                  </li>
                </ul>
            </aside>
            <!-- / Menu -->
            <div class="layout-page">
              <!-- Navbar -->
      
              <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                  id="layout-navbar">
                  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                          <i class="bx bx-menu bx-sm"></i>
                      </a>
                  </div>
      
                  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                      <!-- Search -->
                      <div class="navbar-nav align-items-center">
                          <div class="nav-item d-flex align-items-center">
                            {{-- @section('title-section')
                            Data Kegiatan Himpunan
                            @endsection
                              <h5>@yield('title-section')</h5> --}}
                              <i class="bx bx-search fs-4 lh-0"></i>
                              <input
                                type="text"
                                class="form-control border-0 shadow-none"
                                placeholder="Search..."
                                aria-label="Search..."
                              />
                          </div>
                      </div>
                      <!-- /Search -->
      
                      <ul class="navbar-nav flex-row align-items-center ms-auto">
                          <!-- Place this tag where you want the button to render. -->
      
      
                          <!-- User -->
                          <li class="nav-item navbar-dropdown dropdown-user dropdown">
                              <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                  data-bs-toggle="dropdown">
                                  <div class="avatar avatar-online">
                                      <img src="/assets/img/profile/{{ $profile['photo'] =='' ? 'default.png' : $profile['photo'] }}" alt
                                          class="w-px-40 h-auto rounded-circle" />
                                  </div>
                              </a>
                              <ul class="dropdown-menu dropdown-menu-end">
                                  <li>
                                      <a class="dropdown-item" href="#">
                                          <div class="d-flex">
                                              <div class="flex-shrink-0 me-3">
                                                  <div class="avatar avatar-online">
                                                    <img src="/assets/img/profile/{{ $profile['photo'] =='' ? 'default.png' : $profile['photo'] }}" alt
                                          class="w-px-40 h-auto rounded-circle" />
                                                  </div>
                                              </div>
                                              <div class="flex-grow-1">
                                                  <span class="fw-semibold d-block">{{ $user->username }}</span>
                                                  <small class="text-muted">{{ $user->name }}</small>
                                              </div>
                                          </div>
                                      </a>
                                  </li>
                                  <li>
                                      <div class="dropdown-divider"></div>
                                  </li>
                                  <li>
                                      <a class="dropdown-item" href="{{ route('profile.index') }}">
                                          <i class="bx bx-cog me-2"></i>
                                          <span class="align-middle">Setting</span>
                                      </a>
                                  </li>
                                  <li>
                                      <div class="dropdown-divider"></div>
                                  </li>
                                  <li>
                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                          onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                          <i class="bx bx-power-off me-2"></i>
                                          <span class="align-middle">Log Out</span>
                                      </a>
      
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          class="d-none">
                                          @csrf
                                      </form>
      
                                  </li>
                              </ul>
                          </li>
                          <!--/ User -->
                      </ul>
                  </div>
              </nav>
      
              <!-- / Navbar -->
      
              <!-- Content wrapper -->
              <div class="content-wrapper">
                  <!-- Content -->
                  @yield('main-content')

                  <!-- / Content -->
      
                  <!-- Footer -->
                  <footer class="content-footer footer bg-footer-theme">
                      <div
                          class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                          <div class="mb-2 mb-md-0 text-center">
                              © Copyrights Stuvent UP. All right reserved.
                              <script>
                                  document.write(new Date().getFullYear());
                              </script>
                              , Design by
                              <a href="https://www.instagram.com/cmd.exee/" target="__blank"
                                  class="footer-link fw-bolder">cmd.exee</a>
                          </div>
      
                      </div>
                  </footer>
                  <!-- / Footer -->
      
                  <div class="content-backdrop fade"></div>
              </div>
              <!-- Content wrapper -->
          </div>
            <!-- Layout container -->
            
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    {{-- <script src="assets/vendor/libs/hammer/hammer.js"></script> --}}
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Main JS -->
    <script src="{{ asset('assets/js/mainAdmin.js') }}"></script>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.tutorialjinni.com/izitoast/1.4.0/js/iziToast.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js" integrity="sha512-BmM0/BQlqh02wuK5Gz9yrbe7VyIVwOzD1o40yi1IsTjriX/NGF37NyXHfmFzIlMmoSIBXgqDiG1VNU6kB5dBbA==" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/bundle/ijabo/ijaboCropTool.min.js') }}"></script>
    
    @yield('custom_js')

</body>

</html>
