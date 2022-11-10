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

                    <div class="col-md-6 col-lg-4">
                        <a href="https://www.instagram.com/hmteup/" target="__blank">
                            <div class="feature-block">

                                <img src="assets/img/himpunan/elektro.png" alt="img">
                                <h4>Himpunan Mahasiswa Teknik Elektro</h4>


                            </div>
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <a href="https://www.instagram.com/geofisikaorthonorm/" target="__blank">
                            <div class="feature-block">
                                <img src="assets/img/himpunan/geofis.png" alt="img">
                                <h4>Himpunan Mahasiswa Teknik Geofisika</h4>
                            </div>
                        </a>

                    </div>

                    <div class="col-md-6 col-lg-4">
                        <a href="https://www.instagram.com/hmik.up/" target="__blank">
                            <div class="feature-block">
                                <img src="assets/img/himpunan/himakom.jpeg" alt="img">
                                <h4>Himpunan Mahasiswa Ilmu Komputer</h4>
                            </div>
                        </a>

                    </div>

                    <div class="col-md-6 col-lg-4">
                        <a href="https://www.instagram.com/himalog.up/" target="__blank">
                            <div class="feature-block">
                                <img src="assets/img/himpunan/himalog.png" alt="img">
                                <h4>Himpunan Mahasiswa Teknik Logistik</h4>
                            </div>
                        </a>

                    </div>

                    <div class="col-md-6 col-lg-4">
                        <a href="https://www.instagram.com/hmtg.mahandraga/" target="__blank">
                            <div class="feature-block">
                                <img src="assets/img/himpunan/geologi.jpeg" alt="img">
                                <h4>Himpunan Mahasiswa Teknik Geologi</h4>
                            </div>
                        </a>

                    </div>

                    <div class="col-md-6 col-lg-4">
                        <a href="https://www.instagram.com/hmhi.up/" target="__blank">
                            <div class="feature-block">
                                <img src="assets/img/himpunan/hmhi.jpeg" alt="img">
                                <h4>Himpunan Mahasiswa Hubungan Internasional</h4>
                            </div>
                        </a>

                    </div>

                    <div class="col-md-6 col-lg-4">
                        <a href="https://www.instagram.com/hmk.up/" target="__blank">
                            <div class="feature-block">
                                <img src="assets/img/himpunan/hmtk.jpeg" alt="img">
                                <h4>Himpunan Mahasiswa Ilmu Kimia</h4>
                            </div>
                        </a>

                    </div>

                    <div class="col-md-6 col-lg-4">
                        <a href="https://www.instagram.com/hmts.up/" target="__blank">
                            <div class="feature-block">
                                <img src="assets/img/himpunan/hmts.jpeg" alt="img">
                                <h4>Himpunan Mahasiswa Teknik Sipil</h4>
                            </div>
                        </a>

                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="https://www.instagram.com/himakom.up/" target="__blank">
                            <div class="feature-block">
                                <img src="assets/img/himpunan/komunikasi.png" alt="img">
                                <h4>Himpunan Mahasiswa Ilmu Komunikasi</h4>
                            </div>
                        </a>

                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="https://www.instagram.com/manajemen.up/" target="__blank">
                            <div class="feature-block">
                                <img src="assets/img/himpunan/manajemen.png" alt="img">
                                <h4>Himpunan Mahasiswa Manajemen</h4>
                            </div>
                        </a>

                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="https://www.instagram.com/economics.pertamina/" target="__blank">
                            <div class="feature-block">
                                <img src="assets/img/himpunan/ekonomi.png" alt="img">
                                <h4>Himpunan Mahasiswa Ilmu Ekonomi</h4>
                            </div>
                        </a>

                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="https://www.instagram.com/mesin.up/" target="__blank">
                            <div class="feature-block">
                                <img src="assets/img/himpunan/mesin.png" alt="img">
                                <h4>Himpunan Mahasiswa Teknik Mesin</h4>
                            </div>
                        </a>

                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="https://www.instagram.com/hmtk.up/" target="__blank">
                            <div class="feature-block">
                                <img src="assets/img/himpunan/tekling.png" alt="img">
                                <h4>Himpunan Mahasiswa Teknik Kimia</h4>
                            </div>
                        </a>

                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="https://www.instagram.com/hmtl.up/" target="__blank">
                            <div class="feature-block">
                                <img src="assets/img/himpunan/hmtl.png" alt="img">
                                <h4>Himpunan Mahasiswa Teknik Lingkungan</h4>
                            </div>
                        </a>

                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="https://www.instagram.com/hmtmspruda/" target="__blank">
                            <div class="feature-block">
                                <img src="assets/img/himpunan/hmtm.png" alt="img">
                                <h4>Himpunan Mahasiswa Teknik Perminyakan</h4>
                            </div>
                        </a>

                    </div>

                </div>
            </div>
        </section><!-- End Features Section -->



    </main><!-- End #main -->
@endsection
