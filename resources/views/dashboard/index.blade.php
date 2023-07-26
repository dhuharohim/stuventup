@extends('base')

@section('custom_css')
<style>
.nav-pills .nav-link.active {
  background-color: #71c55d;
  color: white;
  font-family: "Roboto", sans-serif;
}
.nav-pills .nav-link {
  /* background-color: #71c55d; */
  color: black;
  font-family: "Roboto", sans-serif;    
}


</style>

@endsection

@section('main-content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container" data-aos="fade-in">
            <h1>Welcome to Stuvent UP</h1>
            <h2>Pusat informasi acara di setiap himpunan Universitas Pertamina</h2>
            <img src="assets/img/event.png" alt="Hero Imgs" data-aos="zoom-out" data-aos-delay="100" class="img-fluid"
                style="width: 330px">
            <a href="{{ route('magazine.index') }}" class="btn-get-started scrollto">Telusuri Kegiatan</a>

    </section><!-- End Hero Section -->
    <main id="main">

        <!-- ======= Get Started Section ======= -->
        <section id="get-started" class="padd-section text-center">
            <div class="container text-left" data-aos="fade-up">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="assets/img/stuventlogo.png" alt="" class="img-fluid" style="width: 50%">
                    </div>
                    <div class="col-sm-6">
                        <div class="section-title text-start">
                            <h3 class="mt-4" style="margin-bottom: 2rem ">Apa itu Stuvent UP? </h3>
                            <p style="text-align: justify"> Stuvent UP(Student Event Universitas Pertamina) merupakan sebuah
                                aplikasi berbasis website, yang
                                berguna untuk mengetahui seluruh informasi dari setiap kegiatan atau acara yang diadakan
                                oleh
                                masing-masing himpunan yang terdapat di Universitas Pertamina. Dengan adanya wadah informasi
                                ini, diharapkan dapat membantu
                                dari segi media publikasinya.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 4rem;"> 
                    <div class="col-sm-12">
                        <div class="section-title text-center">
                            <h3 class="" style="margin-bottom: 2rem">{{ __('Bagaimana cara kerjanya?') }} </h3>
                            <ul class="nav nav-pills justify-content-center" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active color" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                        aria-selected="true">{{ __('Mahasiswa') }}</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link color" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                        type="button" role="tab" aria-controls="profile"
                                        aria-selected="false">{{ __('Admin Himpunan') }}</button>
                                </li>
                            </ul>

                            <div class="tab-content mt-4" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <p style="text-align: justify; text-align-last: center;">
                                        Cara kerja dari Stuvent UP cukup sederhana, dimana mahasiswa tinggal klik tombol
                                        "Telusuri Kegiatan" diatas, dan akan ditampilkan seluruh kegiatan dari masing-masing
                                        himpunan dan UKM, mulai dari yang terbaru hingga terlama, kegiatan yang populer
                                        karena
                                        banyaknya orang yang telah registrasi di kegiatan tersebut.
                                        Setelah itu, mahasiswa dapat memilih kegiatan yang menarik, dan bisa langsung
                                        registrasi
                                        ke dalam kegiatan tersebut dengan cara menekan tombol registrasi dan melakukan
                                        pengisian
                                        formulir registrasinya. Jika suatu kegiatan memiliki biaya registrasi, maka saat
                                        setelah
                                        melakukan pengisian form registrasi, akan menuju halaman dimana terdapat contact
                                        personnya.
                                        Dan dimohon agar segera konfirmasi bahwa telah mendaftar.

                                    </p>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <p style="text-align: justify; text-align-last: center;">
                                            Cara kerja untuk Admin Himpunan atau mahasiswa perwakilan dari himpunan,
                                            yaitu dengan cara login terlebih dahulu dengan username dan password yang telah disediakan.
                                            Lalu, masuk ke bagian upload atau posting suatu kegiatan yang akan berlangsung, dimana nantinya
                                            akan melakukan pengisian form. Setelah semuanya selesai, klik upload, dan cek apakah kegiatan 
                                            telah berhasil di unggah di menu daftar kegiatan atau bisa di cek di website stuvent up.
                                            Jika terdapat mahasiswa yang daftar dalam kegiatan tersebut, data pendaftar dapat dilihat
                                            di menu daftar kegiatan dan klik tombol pendaftar.
                                        </p>
                            
                                </div>
                            </div>
                        </div>
                    </div>        
                       
                   
                </div>

            </div>

        </section><!-- End Get Started Section -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="padd-section text-center">

            <div class="container" data-aos="fade-up">
                <div class="section-title text-center">
                    <h3>Siapa saja yang tergabung?</h3>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    @php 
                        use App\Models\Profile;
                        $himpunan = Profile::all();
                    @endphp
                    @foreach($himpunan as $daftar)
                    <div class="col-md-6 col-lg-4">
                        <a href="{{ route('profile.admin', ['himpunan' => $daftar->name_himpunan, 'nav'=> 'home', 'tipe'=> 'umum'] ) }}" target="__blank">
                            <div class="feature-block">
                                <img src="/assets/img/profile/{{ $daftar->photo == '' ? 'default.png' : $daftar->photo }}" alt="img">
                                <h4>{{ $daftar->name_himpunan }}</h4>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Features Section -->



    </main><!-- End #main -->
@endsection
