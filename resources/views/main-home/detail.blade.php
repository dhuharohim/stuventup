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
								@if(empty($userRole))
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
                                    <a id="button-regist" class="btn btn-success btn-block" style="border-radius: 6px;
                                    width: 100%;"> Event ini telah selesai </a>
                                </div>
                                @endif
                             
                            </div>
                        </div>
                        <!-- post bottom section -->
                        <div class="post-bottom">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-6 col-12 text-center text-md-start">
                                    <!-- tags -->
                                    <a href="#" class="tag">#Trending</a>
                                    <a href="#" class="tag">#Video</a>
                                    <a href="#" class="tag">#Featured</a>
                                </div>
                                <div class="col-md-6 col-12">
                                    <!-- social icons -->
                                    <ul class="social-icons list-unstyled list-inline mb-0 float-md-end">
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"><i
                                                    class="fab fa-linkedin-in"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a>
                                        </li>
                                        <li class="list-inline-item"><a href="#"><i
                                                    class="fab fa-telegram-plane"></i></a></li>
                                        <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="spacer" data-height="50"></div>

                    <div class="about-author padding-30 rounded">
                        <div class="thumb">
                            <img src="images/other/avatar-about.png" alt="Katen Doe" />
                        </div>
                        <div class="details">
                            <h4 class="name"><a href="#">Katen Doe</a></h4>
                            <p>Hello, I’m a content writer who is fascinated by content fashion, celebrity and lifestyle.
                                She helps clients bring the right content to the right people.</p>
                            <!-- social icons -->
                            <ul class="social-icons list-unstyled list-inline mb-0">
                                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="spacer" data-height="50"></div>

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">Comments (3)</h3>
                        <img src="images/wave.svg" class="wave" alt="wave" />
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
                        <img src="images/wave.svg" class="wave" alt="wave" />
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
                            <div class="widget-about data-bg-image text-center" data-bg-image="images/map-bg.png">
                                <img src="images/logo.svg" alt="logo" class="mb-4" />
                                <p class="mb-4">Hello, We’re content writer who is fascinated by content fashion,
                                    celebrity and lifestyle. We helps clients bring the right content to the right people.
                                </p>
                                <ul class="social-icons list-unstyled list-inline mb-0">
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a>
                                    </li>
                                </ul>
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
                                        <h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make Your
                                                iPhone Faster</a></h6>
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
                                        <h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy Method
                                                That Works For All</a></h6>
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
                                        <h6 class="post-title my-0"><a href="blog-single.html">10 Ways To Immediately
                                                Start Selling Furniture</a></h6>
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
                                <span class="newsletter-privacy text-center mt-3">By signing up, you agree to our <a
                                        href="#">Privacy Policy</a></span>
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
                                            <a href="category.html" class="category-badge position-absolute">How to</a>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/widgets/widget-carousel-1.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">5 Easy Ways You Can
                                                Turn Future Into Success</a></h5>
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
                                        <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">Master The Art Of
                                                Nature With These 7 Tips</a></h5>
                                        <ul class="meta list-inline mt-2 mb-0">
                                            <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                    <!-- post -->
                                    <div class="post post-carousel">
                                        <div class="thumb rounded">
                                            <a href="category.html" class="category-badge position-absolute">How to</a>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/widgets/widget-carousel-1.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">5 Easy Ways You Can
                                                Turn Future Into Success</a></h5>
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

                        <!-- widget tags -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Tag Clouds</h3>
                                <img src="images/wave.svg" class="wave" alt="wave" />
                            </div>
                            <div class="widget-content">
                                <a href="#" class="tag">#Trending</a>
                                <a href="#" class="tag">#Video</a>
                                <a href="#" class="tag">#Featured</a>
                                <a href="#" class="tag">#Gallery</a>
                                <a href="#" class="tag">#Celebrities</a>
                            </div>
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
