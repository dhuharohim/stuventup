@extends('main-home.base-category')

@section('kategori')
    Pameran
@endsection

@section('active-pameran')
    active
@endsection

@section('pameran-content')
<div class="row gy-4">
    <div class="col-lg-8">
        <div class="row gy-4">
            @foreach($eventPameran as $pameran)
            <div class="col-sm-6">
                <!-- post -->
                <div class="post post-grid rounded bordered">
                    <div class="thumb top-rounded">
                        <a href="{{ route('news.detail', $pameran->name_activity) }}" class="category-badge position-absolute">pameran</a>
                        <span class="post-format d-flex justify-content-center">
                            <i class="icon-picture d-flex align-self-center"></i>
                        </span>
                        <a href="{{ route('news.detail', $pameran->name_activity) }}">
                            <div class="inner">
                                <img src="/assets/img/poster/{{ $pameran->profile['name_himpunan'] }}/{{ $pameran['img_activity'] == '' ? 'default.png' : $pameran['img_activity'] }}" alt="post-title" />
                            </div>
                        </a>
                    </div>
                    <div class="details">
                        <ul class="meta list-inline mb-0">
                            <li class="list-inline-item"><a href="{{ route('profile.admin', ['himpunan' => $pameran->profile->name_himpunan , 'nav' => 'home', 'tipe' => 'home']) }}"><img style="width: 20px;"
                                src="/assets/img/profile/{{ $pameran->profile['photo'] == '' ? 'default.png' : $pameran->profile['photo'] }}" class="author"
                                alt="author" />{{ $pameran->profile['nickname_himpunan'] }}</a></li>
                            <li class="list-inline-item">{{$pameran->date_activity}}</li>
                        </ul>
                        <h5 class="post-title mb-3 mt-3"><a href="{{ route('news.detail', $pameran->name_activity) }}">{{$pameran->name_activity}}</a></h5>
                        <input type="text" id="data-fetch-pameran-{{ $loop->iteration }}" value="{{ $pameran->desc_activity }}" hidden>
                        <div id="output-pameran-{{ $loop->iteration }}" class="excerpt mb-0" style="overflow: hidden;
                        text-overflow: ellipsis;
                        display: -webkit-box;
                        -webkit-line-clamp: 2;
                                line-clamp: 2; 
                        -webkit-box-orient: vertical;
                        text-align:justify;"></div>
                    </div>
                    <div class="post-bottom clearfix d-flex align-items-center">
                        <div class="social-share me-auto">
                            <button class="toggle-button icon-share"></button>
                            <ul class="icons list-unstyled list-inline mb-0">
                                <li class="list-inline-item"><a href="https://www.facebook.com/sharer.php?u={{route('news.detail', $pameran->name_activity)}}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a target="_blank" href="https://twitter.com/intent/tweet?text={{route('news.detail', $pameran->name_activity)}}&url={{route('news.detail', $pameran->name_activity)}}"><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="https://www.linkedin.com/sharing/share-offsite/?url={{route('news.detail', $pameran->name_activity)}}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                <li class="list-inline-item"><a target="_blank" href="https://t.me/share/url?url={{route('news.detail', $pameran->name_activity)}}&text={{route('news.detail', $pameran->name_activity)}}"><i class="fab fa-telegram-plane"></i></a></li>
                            </ul>
                        </div>
                        <div class="more-button float-end">
                            <a href="{{ route('news.detail', $pameran->name_activity) }}"><span class="icon-options"></span></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <nav>
            {{ $eventPameran->links() }}
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
                    <h3 class="widget-title">Event Pameran Populer</h3>
                    <img src="{{asset('assets/images/wave.svg')}}" class="wave" alt="wave" />
                </div>
                <div class="widget-content">
                    <!-- post -->
                    @foreach($eventPameranPopuler as $pameranPop)
                    <div class="post post-list-sm circle">
                        <div class="thumb circle">
                            <span class="number">{{ $loop->iteration }}</span>
                            <a href="{{ route('news.detail', $pameranPop->name_activity) }}">
                                <div class="inner">
                                    <img src="/assets/img/poster/{{ $pameranPop->profile['name_himpunan'] }}/{{ $pameranPop['img_activity'] == '' ? 'default.png' : $pameranPop['img_activity'] }}" alt="post-title" />
                                </div>
                            </a>
                        </div>
                        <div class="details clearfix">
                            <h6 class="post-title my-0"><a href="{{ route('news.detail', $pameranPop->name_activity) }}">{{ $pameranPop->name_activity }}</a></h6>
                            <ul class="meta list-inline mt-1 mb-0">
                                <li class="list-inline-item">{{ $pameranPop->profile->nickname_himpunan}} </li>
                                <li class="list-inline-item">{{ $pameranPop->date_activity}} </li>
                                <li class="list-inline-item"><i class="icon-eye" style="margin-right: 10px;"></i>{{ $pameranPop->view_count}} </li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>		
            </div>

            <!-- widget categories -->
            <div class="widget rounded">
                <div class="widget-header text-center">
                    <h3 class="widget-title">Kategori Lainnya</h3>
                    <img src="{{asset('assets/images/wave.svg')}}" class="wave" alt="wave" />
                </div>
                <div class="widget-content">
                    <ul class="list">
                        <li><a href="{{ route('category.index', 'seminar') }}">Seminar</a><span>({{count($eventSeminar)}})</span></li>
                        <li><a href="{{ route('category.index', 'olahraga') }}">Olahraga</a><span>({{count($eventOlahraga)}})</span></li>
                        <li><a href="{{ route('category.index', 'pelatihan') }}">Pelatihan</a><span>({{count($eventPelatihan)}})</span></li>
                        <li><a href="{{ route('category.index', 'nasional') }}">Hari Nasional</a><span>({{count($eventNasional)}})</span></li>
                        <li><a href="{{ route('category.index', 'lainnya') }}">Lainnya</a><span>({{count($eventLainnya)}})</span></li>
                    </ul>
                </div>
                
            </div>

            <!-- widget post carousel -->
            <div class="widget rounded">
                <div class="widget-header text-center">
                    <h3 class="widget-title">Event Pameran Yang Akan Datang</h3>
                    <img src="{{asset('assets/images/wave.svg')}}" class="wave" alt="wave" />
                </div>
                <div class="widget-content">
                    <div class="post-carousel-widget">
                        <!-- post -->
                        @foreach($eventPameranComing as $next)
                        <div class="post post-carousel">
                            <div class="thumb rounded">
                                <a href="{{ route('news.detail', $next->name_activity) }}" class="category-badge position-absolute text-capitalize">{{ $next->type_activity }}</a>
                                <a href="{{ route('news.detail', $next->name_activity) }}">
                                    <div class="inner">
                                        <img src="/assets/img/poster/{{ $next->profile['name_himpunan'] }}/{{ $next['img_activity'] == '' ? 'default.png' : $next['img_activity'] }}" alt="post-title" />
                                    </div>
                                </a>
                            </div>
                            <h5 class="post-title mb-0 mt-4"><a href="{{ route('news.detail', $next->name_activity) }}">{{ $next->name_activity }}</a></h5>
                            <ul class="meta list-inline mt-2 mb-0">
                                <li class="list-inline-item"><a href="#">{{ $next->profile->nickname_himpunan }}</a></li>
                                <li class="list-inline-item">{{ $next->date_activity }}</li>
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
@endsection

@section('custom_js')
<script>
    $(document).ready(function() {
        for(let i=1; i <= {{ count($eventPameran) }}; i++) {
                var fetchPameran = $('#data-fetch-pameran-'+i).val();
                var outputFetchPameran = document.getElementById('output-pameran-'+i);
                outputFetchPameran.innerHTML = fetchPameran;
        }

        $('#submit-pameran').on('click', function(e) {
            var search = $('#search-pameran').val();
            window.location.href = "/category/{{ $category }}?q= " +search;

        })
    })
</script>
@endsection