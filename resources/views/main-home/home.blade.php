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
                    <div class="post-carousel-widget carousel-item">
                        @foreach ($eventComing as $event)
                            <!-- post -->
                            <div class="post featured-post-lg"
                                style="background: url('/assets/img/poster/{{ $event->profile['name_himpunan'] }}/{{ $event['img_activity'] == '' ? 'default.png' : $event['img_activity'] }}')">
                                <a href="{{ route('news.detail', $event->name_activity) }}">
                                    <div class="">
                                        <div class="details clearfix">
                                            @if ($event->type_activity == 'lainnya')
                                                <a href="{{ route('news.detail', $event->name_activity) }}"
                                                    class="category-badge">Lainnya :
                                                    {{ $event->other_type }}</a>
                                            @else
                                                <a style="text-transform: capitalize;"
                                                    href="{{ route('news.detail', $event->name_activity) }}"
                                                    class="category-badge">
                                                    {{ $event->type_activity }}</a>
                                            @endif
                                            <h2 class="post-title"><a
                                                    href="{{ route('news.detail', $event->name_activity) }}">{{ $event->name_activity }}</a>
                                            </h2>
                                            <ul class="meta list-inline mb-0">
                                                <li class="list-inline-item"><a
                                                        href="{{ route('news.detail', $event->name_activity) }}">{{ $event->profile->name_himpunan }}</a>
                                                </li>
                                                <li class="list-inline-item">
                                                    {{ $comingDate }}</li>
                                            </ul>
                                        </div>
                                        <div class="thumb rounded">
                                            <div class="inner data-bg-image"
                                                data-bg-image="/assets/img/poster/{{ $event->profile['name_himpunan'] }}/{{ $event['img_activity'] == '' ? 'default.png' : $event['img_activity'] }}">
                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </div>
                        @endforeach
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
                                                <div class="meta list-inline mt-1 mb-0">
                                                    <p class="list-inline-item">
                                                        {{ $event->profile->name_himpunan }} <span
                                                            style="margin-left: 1rem;" class="list-inline-item"> <i
                                                                class="icon-eye"></i> {{ $event->view_count }} </span>
                                                    </p>

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
                                                    <img src="assets/img/bg.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a
                                                    href="{{ route('news.detail', $event->name_activity) }}">{{ $event->name_activity }}</a>
                                            </h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">{{ $event->created_at->diffForHumans() }}</li>
                                            </ul>
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
                            @foreach($eventPopLarge as $eventPopLarge)
                            <div class="col-sm-6">
                                <!-- post large -->
                                <div class="post">
                                    <div class="thumb rounded">
                                        @if ($eventPopLarge->type_activity == 'lainnya')
                                                <a href="{{ route('news.detail', $eventPopLarge->name_activity) }}"
                                                    class="category-badge position-absolute">Lainnya :
                                                    {{ $eventPopLarge->other_type }}</a>
                                            @else
                                                <a style="text-transform: capitalize;"
                                                    href="{{ route('news.detail', $eventPopLarge->name_activity) }}"
                                                    class="category-badge position-absolute">
                                                    {{ $eventPopLarge->type_activity }}</a>
                                            @endif
                                        <span class="post-format">
                                            <i class="icon-picture"></i>
                                        </span>
                                        <a href="{{ route('news.detail', $eventPopLarge->name_activity) }}">
                                            <div class="inner">
                                                <img style="height: 10rem;
                                                object-fit: cover;" src="/assets/img/poster/{{ $eventPopLarge->profile['name_himpunan'] }}/{{ $eventPopLarge['img_activity'] == '' ? 'default.png' : $eventPopLarge['img_activity'] }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <ul class="meta list-inline mt-4 mb-0">
                                        <li class="list-inline-item"><a href="#"><img style="width: 20px;
                                            border-radius: 100%;"
                                                    src="/assets/img/profile/{{ $eventPopLarge->profile['photo'] == '' ? 'default.png' : $eventPopLarge->profile['photo'] }}" class="author"
                                                    alt="author" />{{ $eventPopLarge->profile['name_himpunan'] }}</a></li>
                                    </ul>
                                    <h5 class="post-title mb-3 mt-3"><a href="blog-single.html">{{ $eventPopLarge->name_activity }}</a></h5>
                                    <input type="text" id="data-fetch" value="{{ $eventPopLarge->desc_activity }}" hidden>
                                    <div id="output" style="overflow: hidden;
                                    text-overflow: ellipsis;
                                    display: -webkit-box;
                                    -webkit-line-clamp: 3;
                                            line-clamp: 3; 
                                    -webkit-box-orient: vertical;
                                    text-align:justify;"></div>
                                    <a href="{{ route('news.detail', $eventPopLarge->name_activity) }}">Lihat selengkapnya</a>
                                
                                </div>
                            </div>
                            @endforeach
                            @foreach($eventPopSmall as $eventPopSmall)
                            <div class="col-sm-6">
                                <!-- post -->
                                <div class="post post-list-sm square before-seperator">
                                    <div class="thumb rounded">
                                        <a href="{{ route('news.detail', $eventPopSmall->name_activity) }}">
                                            <div class="inner">
                                                <img style="
                                                object-fit: cover;" src="/assets/img/poster/{{ $eventPopSmall->profile['name_himpunan'] }}/{{ $eventPopSmall['img_activity'] == '' ? 'default.png' : $eventPopSmall['img_activity'] }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="blog-single.html">{{ $eventPopSmall->name_activity }}</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">{{ $eventPopSmall->date_activity, "D M Y" }}</li>
                                        </ul>
                                    </div>
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
                    <div class="section-header">
                        <h3 class="section-title">Inspiration</h3>
                        <img src="images/wave.svg" class="wave" alt="wave" />
                        <div class="slick-arrows-top">
                            <button type="button" data-role="none" class="carousel-topNav-prev slick-custom-buttons"
                                aria-label="Previous"><i class="icon-arrow-left"></i></button>
                            <button type="button" data-role="none" class="carousel-topNav-next slick-custom-buttons"
                                aria-label="Next"><i class="icon-arrow-right"></i></button>
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
                                                    <img src="images/widgets/widget-carousel-1.jpg" alt="post-title" />
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
                                            <a href="category.html" class="category-badge position-absolute">Trending</a>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/widgets/widget-carousel-2.jpg" alt="post-title" />
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
                                                    <img src="images/widgets/widget-carousel-1.jpg" alt="post-title" />
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
			const text = $('#data-fetch').val();
            const output = document.getElementById('output');
            output.innerHTML = text;
        })
    </script>
@endsection