@extends('main-home.base-home')

@section('title-portal')
    {{ __('Portal') }}
@endsection

@section('content-portal')
    <!-- hero section -->
    <section id="hero">
        <div class="container-xl">

            <div class="row gy-4">

                <div class="col-lg-8">
                    <!-- featured post large -->
                            <!-- post -->
                            <div class="post featured-post-lg"
                                style="background: url('/assets/img/poster/{{ $mostPopularEvent->profile['name_himpunan'] }}/{{ $mostPopularEvent['img_activity'] == '' ? 'default.png' : $mostPopularEvent['img_activity'] }}')">
                                <a href="{{ route('news.detail', $mostPopularEvent->name_activity) }}">
                                    <div class="details clearfix">
                                        @if ($mostPopularEvent->type_activity == 'lainnya')
                                            <a href="{{ route('news.detail', $mostPopularEvent->name_activity) }}"
                                                class="category-badge">Lainnya :
                                                {{ $mostPopularEvent->other_type }}</a>
                                        @else
                                            <a style="text-transform: capitalize;"
                                                href="{{ route('news.detail', $mostPopularEvent->name_activity) }}"
                                                class="category-badge">
                                                {{ $mostPopularEvent->type_activity }}</a>
                                        @endif
                                        <h2 class="post-title"><a
                                                href="{{ route('news.detail', $mostPopularEvent->name_activity) }}">{{ $mostPopularEvent->name_activity }}</a>
                                        </h2>
                                        <ul class="meta list-inline mb-0">
                                            <li class="list-inline-item"><a
                                                    href="{{ route('news.detail', $mostPopularEvent->name_activity) }}">{{ $mostPopularEvent->profile->name_himpunan }}</a>
                                            </li>
                                            <li class="list-inline-item">
                                                {{ $comingDate }}</li>
                                        </ul>
                                    </div>
                                    <div class="thumb rounded">
                                        <div class="inner data-bg-image"
                                            data-bg-image="/assets/img/poster/{{ $mostPopularEvent->profile['name_himpunan'] }}/{{ $mostPopularEvent['img_activity'] == '' ? 'default.png' : $mostPopularEvent['img_activity'] }}">
                                        </div>
                                    </div>

                                </a>
                            </div>

                    {{-- @foreach ($eventComing as $key => $event)
                            <div class="carousel-item {{$key == 0 ? 'active' : '' }}" >
                                    <div class="post featured-post-lg">
                                        <div class="details clearfix">
                                            @if ($event->type_activity == 'lainnya')
                                                <a href="{{ route('news.detail', $event->name_activity) }}" class="category-badge">Lainnya :
                                                    {{ $event->other_type }}</a>

                                            @else
                                                <a style="text-transform: capitalize;" href="{{ route('news.detail', $event->name_activity) }}" class="category-badge">
                                                {{ $event->type_activity }}</a>
                                            @endif
                                            <h2 class="post-title"><a
                                                    href="{{ route('news.detail', $event->name_activity) }}">{{ $event->name_activity }}</a>
                                            </h2>
                                            <ul class="meta list-inline mb-0">
                                                <li class="list-inline-item"><a
                                                        href="#">{{ $event->profile->name_himpunan }}</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    {{ $comingDate }}</li>
                                            </ul>
                                        </div>
                                        <a href="{{ route('news.detail', $event->name_activity) }}">
                                            <div class="thumb rounded">
                                                <div class="inner data-bg-image"
                                                    data-bg-image="/assets/img/poster/{{ $event->profile['name_himpunan'] }}/{{ $event['img_activity'] == '' ? 'default.png' : $event['img_activity'] }}">
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                            @endforeach --}}
                </div>

                <div class="col-lg-4">

                    <!-- post tabs -->
                    <div class="post-tabs rounded bordered">
                        <!-- tab navs -->
                        <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
                            <li class="nav-item" role="presentation"><button aria-controls="popular" aria-selected="true"
                                    class="nav-link active" data-bs-target="#popular" data-bs-toggle="tab" id="popular-tab"
                                    role="tab" type="button">Populer</button></li>
                            <li class="nav-item" role="presentation"><button aria-controls="recent" aria-selected="false"
                                    class="nav-link" data-bs-target="#recent" data-bs-toggle="tab" id="recent-tab"
                                    role="tab" type="button">Terbaru</button></li>
                        </ul>
                        <!-- tab contents -->
                        <div class="tab-content" id="postsTabContent">
                            <!-- loader -->
                            <div class="lds-dual-ring"></div>
                            <!-- popular posts -->
                            <div aria-labelledby="popular-tab" class="tab-pane fade show active" id="popular"
                                role="tabpanel">
                                <!-- post -->
                                @foreach ($eventPop as $event)
                                    @if ($event->view_count > 10)
                                        <div class="post post-list-sm circle">
                                            <div class="thumb circle">
                                                <a href="{{ route('news.detail', $event->name_activity) }}">
                                                    <div class="inner">
                                                        <img src="/assets/img/poster/{{ $event->profile['name_himpunan'] }}/{{ $event['img_activity'] == '' ? 'default.png' : $event['img_activity'] }}"
                                                            alt="post-title" />
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="details clearfix">
                                                <h6 class="post-title my-0"><a
                                                        href="{{ route('news.detail', $event->name_activity) }}">{{ $event->name_activity }}</a>
                                                </h6>
                                                <ul class="meta list-inline mt-1 mb-0">
                                                    <li class="list-inline-item text-capitalize"> {{ $event->type_activity }} </li>
                                                    <li class="list-inline-item">
                                                        {{ $event->profile->nickname_himpunan }} 
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <i class="icon-eye"></i> {{ $event->view_count }} 
                                                    </li>
                                                </ul>
                                                <div>
                                                    <b> {{ $event->date_activity }}</b>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                            <!-- recent posts -->
                            <div aria-labelledby="recent-tab" class="tab-pane fade" id="recent" role="tabpanel">
                                <!-- post -->
                                @foreach ($eventNew as $event)
                                    <div class="post post-list-sm circle">
                                        <div class="thumb circle">
                                            <a href="{{ route('news.detail', $event->name_activity) }}">
                                                <div class="inner">
                                                    <img src="/assets/img/poster/{{ $event->profile['name_himpunan'] }}/{{ $event['img_activity'] == '' ? 'default.png' : $event['img_activity'] }}" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a
                                                    href="{{ route('news.detail', $event->name_activity) }}">{{ $event->name_activity }}</a>
                                            </h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item text-capitalize"> {{ $event->type_activity }} </li>
                                                <li class="list-inline-item">
                                                    {{ $event->profile->nickname_himpunan }} 
                                                </li>
                                            </ul>
                                            <b>{{ $event->created_at->diffForHumans() }}</b>
                                        </div>
                                    </div>
                                @endforeach
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
                        <h3 class="section-title">Trending</h3>
                        <img src="{{ asset('assets/images/wave.svg') }}" class="wave" alt="wave" />
                    </div>

                    <div class="padding-30 rounded bordered">
                        <div class="row gy-5">
                            @foreach($eventPopLarge as $eventPop)
                            <div class="col-sm-6">
                                <!-- post large -->
                                <div class="post">
                                    <div class="thumb rounded">
                                        @if ($eventPop->type_activity == 'lainnya')
                                                <a href="{{ route('news.detail', $eventPop->name_activity) }}"
                                                    class="category-badge position-absolute">Lainnya :
                                                    {{ $eventPop->other_type }}</a>
                                        @else
                                                <a style="text-transform: capitalize;"
                                                    href="{{ route('news.detail', $eventPop->name_activity) }}"
                                                    class="category-badge position-absolute">
                                                    {{ $eventPop->type_activity }}</a>
                                        @endif
                                        <span class="post-format">
                                            <i class="icon-picture"></i>
                                        </span>
                                        <a href="{{ route('news.detail', $eventPop->name_activity) }}">
                                            <div class="inner">
                                                <img style="object-fit: cover;" src="/assets/img/poster/{{ $eventPop->profile['name_himpunan'] }}/{{ $eventPop['img_activity'] == '' ? 'default.png' : $eventPop['img_activity'] }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <ul class="meta list-inline mt-4 mb-0">
                                        <li class="list-inline-item"><a href="{{ route('news.detail', $eventPop->name_activity) }}">
                                        <img style="width: 20px; border-radius: 100%;" src="/assets/img/profile/{{ $eventPop->profile['photo'] == '' ? 'default.png' : $eventPop->profile['photo'] }}" class="author" alt="author" />
                                        {{ $eventPop->profile['nickname_himpunan'] }}</a></li>
                                        <li class="list-inline-item"> {{ $eventPop->date_activity }} </li>
                                        <li class="list-inline-item"> <i
                                            class="icon-eye"></i> {{ $eventPop->view_count }}</li>
                                    </ul>
                                    <h5 class="post-title mb-3 mt-3"><a href="{{ route('news.detail', $eventPop->name_activity) }}">{{ $eventPop->name_activity }}</a></h5>
                                    <input type="text" id="data-fetch-{{ $loop->iteration }}" value="{{ $eventPop->desc_activity }}" hidden>
                                    <div id="output-{{ $loop->iteration }}" style="overflow: hidden;
                                    text-overflow: ellipsis;
                                    display: -webkit-box;
                                    -webkit-line-clamp: 3;
                                            line-clamp: 3; 
                                    -webkit-box-orient: vertical;
                                    text-align:justify;"></div>
                                    <a href="{{ route('news.detail', $eventPop->name_activity) }}">Lihat selengkapnya</a>
                                
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row gy-5">
                            @foreach($eventPopSmall as $eventPopSmalls)
                            <div class="col-sm-6">
                                <!-- post -->
                                <div class="post post-list-sm square before-seperator">
                                    <div class="thumb rounded">
                                        <a href="{{ route('news.detail', $eventPopSmalls->name_activity) }}">
                                            <div class="inner">
                                                <img style="
                                                object-fit: cover;" src="/assets/img/poster/{{ $eventPopSmalls->profile['name_himpunan'] }}/{{ $eventPopSmalls['img_activity'] == '' ? 'default.png' : $eventPopSmalls['img_activity'] }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{ route('news.detail', $eventPopSmalls->name_activity) }}">{{ $eventPopSmalls->name_activity }}</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">{{ $eventPopSmalls->profile['nickname_himpunan'] }}</li>
                                            <li class="list-inline-item text-capitalize"> {{ $eventPopSmalls->type_activity }} </li>
                                            <li class="list-inline-item"> <i class="icon-eye"></i> {{ $eventPopSmalls->view_count }}</li>
                                        </ul>
                                        <div class="mt-2" id="output-small{{ $loop->iteration }}" style="overflow: hidden;
                                            text-overflow: ellipsis;
                                            display: -webkit-box;
                                            -webkit-line-clamp: 3;
                                                    line-clamp: 3; 
                                            -webkit-box-orient: vertical;
                                            text-align:justify;">
                                        </div>
                                        <a href="{{ route('news.detail', $eventPopSmalls->name_activity) }}">Lihat selengkapnya</a>

                                    </div>
                                    <input type="text" id="data-fetch-small-{{ $loop->iteration }}" value="{{ $eventPopSmalls->desc_activity }}" hidden>
                                   
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="spacer" data-height="50"></div>
                    <!-- horizontal ads -->
                    <div class="ads-horizontal text-md-center">
                        <span class="ads-title">- Sponsored Ad -</span>
                        <a href="#">
                            <img style="border-radius: 10px;" src="{{ asset('assets/images/adv3.jpg') }}"
                                alt="Advertisement" />
                        </a>
                    </div>

                    <div class="spacer" data-height="50"></div>
                    <!-- section header -->
                    <div class="spacer" data-height="50"></div>

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">Event Terbaru</h3>
                        <img src="{{ asset('assets/images/wave.svg') }}" class="wave" alt="wave" />
                    </div>

                    <div class="padding-30 rounded bordered">
                        <div class="row">
                            @foreach($latestEvent as $latest)
                            <div class="col-md-12 col-sm-6">
                                <!-- post -->
                                <div class="post post-list clearfix">
                                    <div class="thumb rounded">
                                        <span class="post-format-sm">
                                            <i class="icon-picture"></i>
                                        </span>
                                        <a href="{{ route('news.detail', $latest->name_activity) }}">
                                            <div class="inner">
                                                <img src="/assets/img/poster/{{ $latest->profile['name_himpunan'] }}/{{ $latest['img_activity']}}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details">
                                        <ul class="meta list-inline mb-3">
                                            <li class="list-inline-item"><a href="{{ route('news.detail', $latest->name_activity) }}"><img style="width: 20px;"
                                                        src="/assets/img/profile/{{ $latest->profile['photo'] == '' ? 'default.png' : $latest->profile['photo'] }}" class="author"
                                                        alt="author" />{{ $latest->profile['name_himpunan'] }}</a></li>
                                                 
                                            <li class="list-inline-item"><a href="{{ route('news.detail', $latest->name_activity) }}" style="text-transform: capitalize;">{{ $latest->type_activity }}</a></li>
                                            <li class="list-inline-item">{{ $latest->date_activity }}</li>
                                        </ul>
                                        <h5 class="post-title"><a href="{{ route('news.detail', $latest->name_activity) }}">{{ $latest->name_activity }}</a></h5>
                                        <input type="text" id="data-fetch-latest-{{ $loop->iteration }}" value="{{ $latest->desc_activity }}" hidden>
                                        <div id="output-latest-{{ $loop->iteration }}" class="excerpt mb-0" style="overflow: hidden;
                                        text-overflow: ellipsis;
                                        display: -webkit-box;
                                        -webkit-line-clamp: 3;
                                                line-clamp: 3; 
                                        -webkit-box-orient: vertical;
                                        text-align:justify;"></div>
                                        {{-- <p class="excerpt mb-0">
                                            A wonderful serenity has taken possession of my
                                            entire soul, like these sweet mornings</p> --}}
                                        <div class="post-bottom clearfix d-flex align-items-center">
                                            <div class="more-button float-end">
                                                <a href="{{ route('news.detail', $latest->name_activity) }}"><span class="icon-options"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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
                                <h3 class="widget-title">Event Kategori Pilihan</h3>
                                <img src="{{ asset('assets/images/wave.svg') }}" class="wave" alt="wave" />
                            </div>
                            <div class="widget-content">
                                <!-- post -->
                                @foreach($uniqueEventCategories as $uniqueEventCategory)
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <span class="number">{{ $loop->iteration }}</span>
                                        <a href="{{ route('news.detail', $uniqueEventCategory->name_activity) }}">
                                            <div class="inner">
                                                <img src="/assets/img/poster/{{ $uniqueEventCategory->profile['name_himpunan'] }}/{{ $uniqueEventCategory['img_activity']}}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{ route('news.detail', $uniqueEventCategory->name_activity) }}">
                                            {{ $uniqueEventCategory->name_activity }}
                                        </a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">{{ $uniqueEventCategory->profile['nickname_himpunan'] }}</li>
                                            <li class="list-inline-item" style="text-transform:capitalize;">{{ $uniqueEventCategory->type_activity }}</li>
                                            <li class="list-inline-item"> <i class="icon-eye"></i> {{ $uniqueEventCategory->view_count }} </li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- widget categories -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Kategori</h3>
                                <img src="{{ asset('assets/images/wave.svg') }}" class="wave" alt="wave" />
                            </div>
                            <div class="widget-content">
                                <ul class="list">
                                    <li><a href="#">Seminar</a><span>({{ count($eventSeminar) }})</span></li>
                                    <li><a href="#">Pelatihan</a><span>({{ count($eventPelatihan) }})</span></li>
                                    <li><a href="#">Olahraga</a><span>({{ count($eventOlahraga) }})</span></li>
                                    <li><a href="#">Pameran</a><span>({{ count($eventPameran) }})</span></li>
                                    <li><a href="#">Hari Nasional</a><span>({{ count($eventNasional) }})</span></li>
                                    <li><a href="#">Lainnya</a><span>({{ count($eventLainnya) }})</span></li>
                                </ul>
                            </div>

                        </div>

                        <!-- widget post carousel -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Event Akan Datang</h3>
                                <img src="{{ asset('assets/images/wave.svg') }}" class="wave" alt="wave" />
                            </div>
                            <div class="widget-content">
                                <div class="post-carousel-widget">
                                    <!-- post -->
                                    @foreach($eventComingNext as $eventNext)
                                    <div class="post post-carousel">
                                        <div class="thumb rounded">
                                            <a style="text-transform:capitalize" href="{{ route('news.detail', $eventNext->name_activity) }}" class="category-badge position-absolute">
                                                {{ $eventNext->type_activity }}
                                            </a>
                                            <a href="{{ route('news.detail', $eventNext->name_activity) }}">
                                                <div class="inner">
                                                    <img src="/assets/img/poster/{{ $eventNext->profile['name_himpunan'] }}/{{ $eventNext['img_activity']}}" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <h5 class="post-title mb-0 mt-4"><a href="{{ route('news.detail', $eventNext->name_activity) }}">{{ $eventNext->name_activity }}</a></h5>
                                        <ul class="meta list-inline mt-2 mb-0">
                                            <li class="list-inline-item">{{ $eventNext->date_activity }}</li>
                                        </ul>
                                    </div>
                                    @endforeach
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
                                <img src="https://universitaspertamina.ac.id/uploads/slides/tdCbQPFr6Lrob9QAsnA1pk1dWL1mwm6d5AcYnLoM.jpg" alt="Advertisement" />
                            </a>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

    <!-- footer -->
    <footer>
        <div class="container-xl">
            <div class="footer-inner">
                <div class="row d-flex align-items-center gy-4">
                    <!-- copyright text -->
                    <div class="col-md-6">
                        <span class="copyright">© 2023 Stuvent UP</span>
                    </div>

                    <!-- go to top button -->
                    <div class="col-md-6">
                        <a href="#" id="return-to-top" class="float-md-end"><i class="icon-arrow-up"></i>Back to
                            Top</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection

@section('custom_js')
    <script>
        $(document).ready(function() {

            for(let i=1; i <= {{ count($latestEvent) }}; i++) {
                var dataFetchLatest = $('#data-fetch-latest-'+i).val();
                var outputFetchLatest = document.getElementById('output-latest-'+i);
                outputFetchLatest.innerHTML = dataFetchLatest;
            }
            for(let i=1; i <= {{ count($eventPopLarge) }}; i++) {
                var dataFetch = $('#data-fetch-'+i).val();
                console.log(dataFetch);

                var outputFetch = document.getElementById('output-'+i);
                outputFetch.innerHTML = dataFetch;
            }
            for(let i=1; i <= {{ count($eventPopSmall) }}; i++) {
                var dataFetchSmall = $('#data-fetch-small-'+i).val();
                console.log(dataFetchSmall);
                var outputFetchSmall = document.getElementById('output-small'+i);
                outputFetchSmall.innerHTML = dataFetchSmall;
            }
			// const text = $('#data-fetch').val();
            // const output = document.getElementById('output');
            // output.innerHTML = text;

            

            // const text2 = $('#data-fetch-latest-2').val();
            // const output2 = document.getElementById('output-latest-2');
            // output2.innerHTML = text2;

            // const text3 = $('#data-fetch-latest-3').val();
            // const output3 = document.getElementById('output-latest-3');
            // output3.innerHTML = text3;

            // const text4 = $('#data-fetch-latest-4').val();
            // const output4 = document.getElementById('output-latest-4');
            // output4.innerHTML = text4;
        })
    </script>
@endsection