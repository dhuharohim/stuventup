@extends('main-home.base-home')

@section('title-portal')
    {{ $eventDetail->name_activity }}
@endsection

@section('content-portal')
    <!-- section main content -->
	<input id="name_act" type="text" value="{{ $eventDetail->name_activity }}" hidden>
    <section class="main-content mt-3">
        <div class="container-xl">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">{{ $eventDetail->name_activity }}</a></li>
                </ol>
            </nav>

            <div class="row gy-4">

                <div class="col-lg-8">
                    <!-- post single -->
                    <div class="post post-single">
                        <!-- post header -->
                        <div class="post-header">
                            <h1 class="title mt-0 mb-3">{{ $eventDetail->name_activity }}</h1>
                            <ul class="meta list-inline mb-0">
                                <li class="list-inline-item">
                                    <a href="#">
                                        <img alt="image"
                                            src="/assets/img/profile/{{ $eventDetail->profile['photo'] == '' ? 'default.png' : $eventDetail->profile['photo'] }}"
                                            class="author" height="25" width="25" />
                                        {{ $eventDetail->profile->name_himpunan }}
                                    </a>
                                </li>
                                <li class="list-inline-item">{{ $createdAt }}</li>
                                <li class="list-inline-item"> <i class="icon-eye" style="vertical-align: inherit;"></i>
                                    {{ $eventDetail->view_count }}</li>
                            </ul>
                        </div>
                        <!-- featured image -->
                        <div class="featured-image">
                            <img alt="image"
                                src="/assets/img/poster/{{ $eventDetail->profile['name_himpunan'] }}/{{ $eventDetail['img_activity'] == '' ? 'default.png' : $eventDetail['img_activity'] }}" />
                        </div>
                        <!-- post content -->
                        <div class="post-content clearfix" id="content">
                            <input type="text" id="data-fetch" value="{{ $eventDetail->desc_activity }}" hidden>
                            <div id="output" style="text-align: justify;"></div>

                            <hr class="mt-5">
                            <div class="card">
                                <div class="card-header"
                                    style="background: #73C15E;
								color: white; text-align: center;">
                                    <strong> Informasi pelaksanaan acara {{ $eventDetail->name_activity }} </strong>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>Tanggal</td>
                                                <td style="text-align:left">{{ $dateAct }}</td>
                                            </tr>
                                            <tr>
                                                <td>Lokasi</td>
                                                <td style="text-align:left">{{ $eventDetail->place_activity }}</td>
                                            </tr>
                                            @if (empty($eventDetail->time_end_activity))
                                                <tr>
                                                    <td>Waktu</td>
                                                    <td style="text-align:left">
                                                        {{ date('H:i', strtotime($eventDetail->time_start_activity)) }} - selesai
                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td>Waktu</td>
                                                    <td style="text-align:left">
                                                        {{ date('H:i', strtotime($eventDetail->time_start_activity)) }} - {{ date('H:i', strtotime($eventDetail->time_end_activity)) }}
                                                    </td>
                                                </tr>
                                            @endif
                                            @if ($eventDetail->ticket == 'yes')
                                                <tr>
                                                    <td>Harga tiket</td>
                                                    <td style="text-align:left">Rp {{ $eventDetail->price_ticket }}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td>Kontak penanggung jawab</td>
                                                <td style="text-align:left">(+62) {{ $eventDetail->contact_pic }}
                                                    <span style="font-weight: bold">({{ $eventDetail->name_pic }})</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
								@if(empty($userRole) && $eventDetail->date_activity > $today)
									<div class="card-footer" id="card-footer" style="text-align:center; font-size:12px;">
										<p style="border-radius: 6px;
										width: 100%; "> Mohon <a href="{{ route('login') }}">login disini</a> untuk melakukan registrasi acara.</p>
										<span>Belum punya akun? <a href="{{ route('register') }}"> daftar sekarang </a></span>
									</div>
								@endif
								@if(!empty($userRole))
                                    @if(empty($dataRegist) )
                                        @if($eventDetail->ticket == 'no' && $eventDetail->date_activity > $today)
                                        <div class="card-footer" id="card-footer">
											<a id="button-regist" class="btn btn-success btn-block" style="border-radius: 6px;
											width: 100%;"> Daftar sekarang</a>
										</div>
                                        @endif
                                        @if($eventDetail->ticket == 'yes' && $eventDetail->date_activity > $today)
										<div class="card-footer" id="card-footer">
                                            <form>
                                                <a id="button-regist-ticket" class="btn btn-success btn-block" style="border-radius: 6px;
                                                width: 100%;"> Daftar sekarang</a>
                                            </form>
                                        </div>
                                        @endif
                                    @endif  
                                    @if(!empty($dataRegist))
                                        @if($dataRegist->status_regist == 'telah daftar' && $eventDetail->ticket== 'yes' && $userRole == 'user' || $userRole == 'umum')
                                            <div class="card-footer" id="card-footer">
                                                <a href="{{ route('invoice.index', $eventDetail->name_activity) }}" class="btn btn-primary btn-block" style="border-radi us: 6px;
                                                width: 100%;"> Mohon selesaikan pembayaran, klik disini untuk menampilkan invoice  </a>
                                            </div>
                                        @else
                                            <div class="card-footer" id="card-footer">
                                                <p class="btn btn-info btn-block" style="border-radius: 6px;
                                                width: 100%;"> Anda telah berhasil daftar dalam acara ini  </p>
                                            </div>
                                        @endif
								    @endif
								@endif
                                @if ($eventDetail->date_activity < $today)
                                <div class="card-footer" id="card-footer">
                                    <a class="btn btn-success btn-block" style="border-radius: 6px;
                                    width: 100%;"> Event ini telah selesai </a>
                                </div>
                                @endif
                             
                            </div>
                        </div>
                    </div>

                    <div class="spacer" data-height="50"></div>

                    <div class="about-author padding-30 rounded">
                        <div class="thumb">
                            <img src="/assets/img/profile/{{ $eventDetail->profile['photo'] == '' ? 'default.png' : $eventDetail->profile['photo'] }}" alt="Katen Doe" />
                        </div>
                        <div class="details">
                            <h4 class="name"><a href="#">{{ $eventDetail->profile->name_himpunan }}</a></h4>
                            <p>{{ $eventDetail->profile->bio_himpunan }}</p>
                            <!-- social icons -->
                            <ul class="social-icons list-unstyled list-inline mb-0">
                                @foreach($socialMedia as $social)
                                <li class="list-inline-item"><a href="{{ $social->social_link }}"><i class="fab fa-{{ $social->social_name }}"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="spacer" data-height="50"></div>

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">Komentar (3)</h3>
                        <img src="{{ asset('assets/images/wave.svg') }}" class="wave" alt="wave" />
                    </div>
                    <!-- post comments -->
                    <div class="comments bordered padding-30 rounded">

                        <ul class="comments">
                            <!-- comment item -->
                            <li class="comment rounded">
                                <div class="thumb">
                                    <img src="images/other/comment-1.png" alt="John Doe" />
                                </div>
                                <div class="details">
                                    <h4 class="name"><a href="#">John Doe</a></h4>
                                    <span class="date">Jan 08, 2021 14:41 pm</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vitae odio ut tortor
                                        fringilla cursus sed quis odio.</p>
                                    <a href="#" class="btn btn-default btn-sm">Reply</a>
                                </div>
                            </li>
                            <!-- comment item -->
                            <li class="comment child rounded">
                                <div class="thumb">
                                    <img src="images/other/comment-2.png" alt="John Doe" />
                                </div>
                                <div class="details">
                                    <h4 class="name"><a href="#">Helen Doe</a></h4>
                                    <span class="date">Jan 08, 2021 14:41 pm</span>
                                    <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet
                                        adipiscing sem neque sed ipsum.</p>
                                    <a href="#" class="btn btn-default btn-sm">Reply</a>
                                </div>
                            </li>
                            <!-- comment item -->
                            <li class="comment rounded">
                                <div class="thumb">
                                    <img src="images/other/comment-3.png" alt="John Doe" />
                                </div>
                                <div class="details">
                                    <h4 class="name"><a href="#">Anna Doe</a></h4>
                                    <span class="date">Jan 08, 2021 14:41 pm</span>
                                    <p>Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in
                                        faucibus orci luctus et ultrices posuere cubilia.</p>
                                    <a href="#" class="btn btn-default btn-sm">Reply</a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="spacer" data-height="50"></div>

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">Leave Comment</h3>
                        <img src="{{ asset('assets/images/wave.svg') }}" class="wave" alt="wave" />
                    </div>
                    <!-- comment form -->
                    <div class="comment-form rounded bordered padding-30">

                        <form id="comment-form" class="comment-form" method="post">

                            <div class="messages"></div>

                            <div class="row">

                                <div class="column col-md-12">
                                    <!-- Comment textarea -->
                                    <div class="form-group">
                                        <textarea name="InputComment" id="InputComment" class="form-control" rows="4"
                                            placeholder="Your comment here..." required="required"></textarea>
                                    </div>
                                </div>

                                <div class="column col-md-6">
                                    <!-- Email input -->
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="InputEmail" name="InputEmail"
                                            placeholder="Email address" required="required">
                                    </div>
                                </div>

                                <div class="column col-md-6">
                                    <!-- Name input -->
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="InputWeb" id="InputWeb"
                                            placeholder="Website" required="required">
                                    </div>
                                </div>

                                <div class="column col-md-12">
                                    <!-- Email input -->
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="InputName" name="InputName"
                                            placeholder="Your name" required="required">
                                    </div>
                                </div>

                            </div>

                            <button type="submit" name="submit" id="submit" value="Submit"
                                class="btn btn-default">Submit</button><!-- Submit Button -->

                        </form>
                    </div>
                </div>

                <div class="col-lg-4">

                    <!-- sidebar -->
                    <div class="sidebar">
                        <!-- widget about -->
                        <div class="widget rounded">
                            <div class="widget-about data-bg-image text-center" data-bg-image="{{ asset('assets/images/map-bg.png') }}">
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
                                <h3 class="widget-title">Event Populer</h3>
                                <img src="{{ asset('assets/images/wave.svg') }}" class="wave" alt="wave" />
                            </div>
                            <div class="widget-content">
                                <!-- post -->
                                @foreach($mostPopularEvent as $popular)
                                <div class="post post-list-sm circle">
                                    <div class="thumb circle">
                                        <span class="number">{{ $loop->iteration }}</span>
                                        <a href="{{ route('news.detail', $popular->name_activity) }}">
                                            <div class="inner">
                                                <img src="/assets/img/poster/{{ $popular->profile['name_himpunan'] }}/{{ $popular['img_activity']}}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{ route('news.detail', $popular->name_activity) }}">
                                            {{ $popular->name_activity }}
                                        </a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item text-capitalize">{{ $popular->type_activity }}</li>
                                            <li class="list-inline-item">{{ $popular->date_activity }}</li>
                                            <li class="list-inline-item"><i
                                                class="icon-eye"></i> {{ $popular->view_count }}</li>
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
                                    <li><a href="#">Seminar</a><span>{{ count($eventSeminar) }}</span></li>
                                    <li><a href="#">Pelatihan</a><span>{{ count($eventPelatihan) }}</span></li>
                                    <li><a href="#">Olahraga</a><span>{{ count($eventOlahraga) }}</span></li>
                                    <li><a href="#">Pameran</a><span>{{ count($eventPameran) }}</span></li>
                                    <li><a href="#">Hari Nasional</a><span>{{ count($eventNasional) }}</span></li>
                                    <li><a href="#">Lainnya</a><span>{{ count($eventLainnya) }}</span></li>
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
                                    @foreach($eventComingNext as $next)
                                    <div class="post post-carousel">
                                        <div class="thumb rounded">
                                            <a href="{{ route('news.detail', $next->name_activity) }}" class="category-badge position-absolute text-capitalize">{{ $next->type_activity }}</a>
                                            <a href="{{ route('news.detail', $next->name_activity) }}">
                                                <div class="inner">
                                                    <img src="/assets/img/poster/{{ $next->profile['name_himpunan'] }}/{{ $next['img_activity']}}" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <h5 class="post-title mb-0 mt-4"><a href="{{ route('news.detail', $next->name_activity) }}">
                                            {{ $next->name_activity }}
                                        </a></h5>
                                        <ul class="meta list-inline mt-2 mb-0">
                                            <li class="list-inline-item">{{ $next->profile->nickname_himpunan }}</li>
                                            <li class="list-inline-item text-capitalize">{{ $next->type_activity }}</li>
                                            <li class="list-inline-item">{{ $next->date_activity }}</li>
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
                    <div class="col-md-4">
                        <span class="copyright">© 2022 Stuvent.</span>
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
			
			const nameAct = $('#name_act').val()
            $('#button-regist').click(function(e) {
                $.ajax({
                    url: '{{url('/regist-event')}}',
                    type: 'post',
                    data: {
						"_token": "{{ csrf_token() }}",
                        "name_activity": nameAct
                    },
                    success: function(res) {
                        iziToast.show({
                            title: "Sukses",
                            position: 'topLeft',
                            message: 'Berhasil daftar acara',
                            color: 'green'
                        })
						$('#card-footer').css('display', 'none');
						setTimeout(() => {
							location.reload();
						}, 3000);
                        
                    },
                    error: function(res) {
                        iziToast.show({
                            title: "Error",
                            position: 'topLeft',
                            message: "Gagal daftar acara",
                            color: 'red'
                        })
                    }
                })
            });
            $('#button-regist-ticket').click(function(e) {
                $.ajax({
                    url: '/ticket-invoice',
                    type: 'post',
                    data: {
						"_token": "{{ csrf_token() }}",
                        "name_activity": nameAct
                    },
                    success: function(res) {
                        iziToast.show({
                            title: "Sukses",
                            position: 'topLeft',
                            message: 'Berhasil daftar acara',
                            color: 'green'
                        })
						$('#card-footer').css('display', 'none');
                        setTimeout(() => {
							window.location = '/invoice/'+ nameAct;
						}, 3000);
                    },
                    error: function(res) {
                        iziToast.show({
                            title: "Error",
                            position: 'topLeft',
                            message: "Gagal daftar acara",
                            color: 'red'
                        })
                    }
                })
            });
        })
    </script>
@endsection
