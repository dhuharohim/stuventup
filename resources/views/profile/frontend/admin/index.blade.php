@extends('profile.frontend.base-frontend')

@section('hero-content')
<section class="hero data-bg-image d-flex align-items-center" data-bg-image="images/other/hero.jpg">
    <div class="container-xl">
        <!-- call to action -->
        <div class="cta text-center">
            @if ($active == 'home')
            <h5 class="mt-0 mb-4 mt-4" style="color:white; font-size: 12px; font-weight:500;">{{ $profile->bio_himpunan }}</h5>
            @endif
            @if ($active == 'kontak')
            <h6 style="color: white; font-size: 12px; margin-bottom:0; margin-top: 2rem; font-weight:400;"> Nomor Telepon :  </h6>
            <a href="https://wa.me/{{ $profile->handphone }} " style="color: white; font-size: 12px; margin-bottom:0; margin-top: 2rem; font-weight:400;"> (+62) {{ $profile->handphone }}  </a>

            <h6 class="mt-4 mb-2" style="color: white; font-size: 12px; margin-top: 2rem; font-weight:400;">Media sosial :</h6>
            <ul class="social-icons list-unstyled list-inline mb-0">
                @foreach($social as $socials)
                <li class="list-inline-item">
                    <a href="{{ $socials->social_link }}">
                        <i style="font-size: 18px; color: white;" class="fab fa-{{ $socials->social_name }}"></i>
                    </a>
                </li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
    <!-- animated mouse wheel -->
    <span class="mouse">
        <span class="wheel"></span>
    </span>
    <!-- wave svg -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 260"><path fill="#FFF" fill-opacity="1" d="M0,256L60,245.3C120,235,240,213,360,218.7C480,224,600,256,720,245.3C840,235,960,181,1080,176C1200,171,1320,213,1380,234.7L1440,256L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>
</section>
@endsection
@section('main-content')
<section class="main-content mt-5">
    <div class="container-xl">
        <div class="row gy-4">
            <div class="col-lg-8">
                <div class="row gy-4">
                    @foreach($events as $event)
                    <div class="col-sm-6">
                        <!-- post -->
                        <div class="post post-grid rounded bordered">
                            <div class="thumb top-rounded">
                                <a href="{{ route('news.detail', $event->name_activity) }}" class="category-badge position-absolute text-capitalize">{{ $event->type_activity }}</a>
                                <span class="post-format">
                                    <i class="icon-picture"></i>
                                </span>
                                <a href="{{ route('news.detail', $event->name_activity) }}"">
                                    <div class="inner">
                                        <img src="/assets/img/poster/{{ $event->profile['name_himpunan'] }}/{{ $event['img_activity'] == '' ? 'default.png' : $event['img_activity'] }}" alt="post-title" />
                                    </div>
                                </a>
                            </div>
                            <div class="details">
                                <ul class="meta list-inline mb-0">
                                    <li class="list-inline-item"><a href="#"><img style="width:25px;" src="/assets/img/profile/{{ $profile['photo'] == '' ? 'default.png' : $profile['photo'] }}" class="author" alt="author"/>{{ $profile->nickname_himpunan }}</a></li>
                                    <li class="list-inline-item">{{ $event->date_activity }}</li>
                                </ul>
                                <h5 class="post-title mb-3 mt-3"><a href="{{ route('news.detail', $event->name_activity) }}">{{ $event->name_activity }}</a></h5>
                                <input type="text" id="data-event-{{ $loop->iteration }}" value="{{ $event->desc_activity }}" hidden>
                                <div id="output-event-{{ $loop->iteration }}" class="excerpt mb-0" style="overflow: hidden;
                                text-overflow: ellipsis;
                                display: -webkit-box;
                                -webkit-line-clamp: 3;
                                        line-clamp: 3; 
                                -webkit-box-orient: vertical;"></div>
                            </div>
                            <div class="post-bottom clearfix d-flex align-items-center">
                                <div class="social-share me-auto">
                                    <button class="toggle-button icon-share"></button>
                                    <ul class="icons list-unstyled list-inline mb-0">
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
                                    </ul>
                                </div>
                                <div class="more-button float-end">
                                    <a href="{{ route('news.detail', $event->name_activity) }}"><span class="icon-options"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @if(count($events) < 1)
                        <div class="">
                            <h5 class="text-center">Tidak ada event.</h5>
                        </div>
                    @endif
                </div>

                <nav>
                    {{ $events->links() }}
                </nav>

            </div>
            <div class="col-lg-4">

                <!-- sidebar -->
                <div class="sidebar">
                    <!-- widget about -->
                    <div class="widget rounded">
                        <div class="widget-about data-bg-image text-center"
                            data-bg-image="{{ asset('assets/images/map-bg.png') }}">
                            <img src="{{ asset('assets/img/stuventlogo.png') }}" alt="logo" class="mb-4"
                                style="max-width:70px;" />
                            <p class="mb-4">Sebuah aplikasi berbasis website, yang berguna untuk mengetahui seluruh
                                informasi dari setiap kegiatan atau acara yang diadakan oleh masing-masing himpunan yang
                                terdapat di Universitas Pertamina</p>
                        </div>
                    </div>

                    <!-- widget popular posts -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">Event Himpunan Populer</h3>
                            <img src="{{ asset('assets/images/wave.svg') }}" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <!-- post -->
                            @foreach($eventPop as $pop)
                            <div class="post post-list-sm circle">
                                <div class="thumb circle">
                                    <span class="number">{{ $loop->iteration }}</span>
                                    <a href="{{ route('news.detail', $pop->name_activity) }}">
                                        <div class="inner">
                                            <img src="/assets/img/poster/{{ $pop->profile['name_himpunan'] }}/{{ $pop['img_activity'] == '' ? 'default.png' : $pop['img_activity'] }}" alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix">
                                    <h6 class="post-title my-0"><a href="{{ route('news.detail', $pop->name_activity) }}">{{ $pop->name_activity }}</a></h6>
                                    <ul class="meta list-inline mt-1 mb-0">
                                        <li class="list-inline-item">{{ $pop->date_activity }}</li>
                                        <li class="list-inline-item">{{ $pop->view_count }}</li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>		
                    </div>

                    <!-- widget categories -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">Kategori Event Himpunan</h3>
                            <img src="{{ asset('assets/images/wave.svg') }}" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <ul class="list">
                                <li><a href="#">Seminar</a><span>({{ count($eventCount->where('type_activity','seminar')) }})</span></li>
                                <li><a href="#">Pelatihan</a><span>({{ count($eventCount->where('type_activity','pelatihan')) }})</span></li>
                                <li><a href="#">Olahraga</a><span>({{ count($eventCount->where('type_activity','olahraga')) }})</span></li>
                                <li><a href="#">Pameran</a><span>({{ count($eventCount->where('type_activity','pameran')) }})</span></li>
                                <li><a href="#">Hari Nasional</a><span>({{ count($eventCount->where('type_activity','hari nasional')) }})</span></li>
                                <li><a href="#">Lainnya</a><span>({{ count($eventCount->where('type_activity','lainnya')) }})</span></li>
                            </ul>
                        </div>
                        
                    </div>


                    <!-- widget post carousel -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">Event Himpunan Akan Datang</h3>
                            <img src="{{ asset('assets/images/wave.svg') }}" class="wave" alt="wave" />
                        </div>
                        <div class="widget-content">
                            <div class="post-carousel-widget">
                                <!-- post -->
                                @foreach($eventComings as $come)
                                <div class="post post-carousel">
                                    <div class="thumb rounded">
                                        <a href="{{ route('news.detail', $come->name_activity) }}" class="category-badge position-absolute text-capitalize">{{ $come->type_activity }}</a>
                                        <a href="{{ route('news.detail', $come->name_activity) }}">
                                            <div class="inner">
                                                <img src="/assets/img/poster/{{ $come->profile['name_himpunan'] }}/{{ $come['img_activity'] == '' ? 'default.png' : $come['img_activity'] }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <h5 class="post-title mb-0 mt-4"><a href="{{ route('news.detail', $come->name_activity) }}">{{ $come->name_activity }}</a></h5>
                                    <ul class="meta list-inline mt-2 mb-0">
                                        <li class="list-inline-item"><a href="#">{{ $profile->nickname_himpunan }}</a></li>
                                        <li class="list-inline-item">{{ $come->date_activity }}</li>
                                    </ul>
                                </div>
                                @endforeach
                            </div>
                            <!-- carousel arrows -->
                            <div class="slick-arrows-bot">
                                <button type="button" data-role="none" class="carousel-botNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
                                <button type="button" data-role="none" class="carousel-botNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
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
                </div>

            </div>

        </div>

    </div>
</section>
@endsection

@section('custom_js')
<script>
    $(document).ready(function () {
        for(let i=1; i <= {{ count($profile->event) }}; i++) {
            var dataEvent = $('#data-event-'+i).val();
            var dataEventOutput = document.getElementById('output-event-'+i);
            dataEventOutput.innerHTML = dataEvent;
        }
    });
</script>

@endsection