@extends('layouts.app')

@section('content')
		<div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
			<!-- .home-slider -->
			<div class="carousel-inner">
				<div class="item active" style="background-image: url(assets/images/header-1.jpg);  background-repeat: no-repeat; background-position: top;">
					<div class="caption">
						<h2 class="animated wow zoomIn" data-wow-duration=".5s" data-wow-delay=".2s">Handmade<br> Hand Carved Coffee</h2>
						<p class="animated wow fadeIn" data-wow-duration=".2s" data-wow-delay=".1s">As rich and unique as the coffee beans it is intended for, this little scoop will make your morning ritual a special occasion every day. </p> <a data-scroll class="btn get-start animated fadeInUpBig" href="#"><span>view collection</span></a> </div>
				</div>
				<div class="item" style="background-image: url(assets/images/header-2.jpg);  background-repeat: no-repeat; background-position: top;">
					<div class="caption">
						<h2 class="animated wow zoomIn" data-wow-duration=".5s" data-wow-delay=".2s">Handmade<br> Hand Carved Coffee</h2>
						<p class="animated wow fadeIn" data-wow-duration=".2s" data-wow-delay=".1s">As rich and unique as the coffee beans it is intended for, this little scoop will make your morning ritual a special occasion every day. </p> <a data-scroll class="btn get-start animated fadeInUpBig" href="#"><span>view collection</span></a> </div>
				</div>
				<div class="item" style="background-image: url(assets/images/header-3.jpg);  background-repeat: no-repeat; background-position: top;">
					<div class="caption">
						<h2 class="animated wow zoomIn" data-wow-duration=".5s" data-wow-delay=".2s">Handmade<br> Hand Carved Coffee</h2>
						<p class="animated wow fadeIn" data-wow-duration=".2s" data-wow-delay=".1s">As rich and unique as the coffee beans it is intended for, this little scoop will make your morning ritual a special occasion every day. </p> <a data-scroll class="btn get-start animated fadeInUpBig" href="#"><span>view collection</span></a> </div>
				</div>
				<!-- indicators -->
				<ol class="carousel-indicators">
					<li data-target="#home-slider" data-slide-to="0" class="active"></li>
					<li data-target="#home-slider" data-slide-to="1" class=""></li>
					<li data-target="#home-slider" data-slide-to="2" class=""></li>
				</ol>
				<!-- /indicators -->
			</div>
			<!-- /.home-slider -->
		</div>
	<section class="banner-outer">
		<!-- .banner-outer -->
		<div class="container">
			<!-- .banner-bg -->
			<div class="banner-bg">
				<div class="col-sm-4 col-md-4 col-lg-4">
					<!-- .banner-img -->
					<div class="banner-img animated wow zoomIn" data-wow-duration=".5s" data-wow-delay=".2s">
						 <img src="assets/images/banner1.png" alt="about-img1" />
						<div class="banner-text">
							<h3>Swimming Pool</h3>
							<p><a href="#">Discover Now</a></p>
						</div>
					</div>
					<!-- /.banner-outer -->
				</div>
				<div class="col-sm-4 col-md-4 col-lg-4">
					<!-- .banner-img -->
					<div class="banner-img animated wow zoomIn" data-wow-duration=".5s" data-wow-delay=".2s"> <img src="assets/images/banner2.jpg" alt="about-img1" />
						<div class="banner-text">
							<h3>Class Room</h3>
							<p><a href="#">Discover Now</a></p>
						</div>
					</div>
					<!-- /.banner-outer -->
				</div>
				<div class="col-sm-4 col-md-4 col-lg-4">
					<!-- .banner-img -->
					<div class="banner-img animated wow zoomIn" data-wow-duration=".5s" data-wow-delay=".2s">
						 <img src="assets/images/banner1.png" alt="about-img1" />
						<div class="banner-text">
							<h3>Football Pitch</h3>
							<p><a href="#">Discover Now</a></p>
						</div>
					</div>
					<!-- /.banner-outer -->
				</div>
		</div>
		<!-- /.banner -->
	</section>
	<section class="new-arrivals">
		<!-- .new-arrivals -->
		<div class="container">
			<div class="tittle text-center">
				<h2>Meet Our Team</h2>
				<p>This is the staff hideout</p>
			</div>
			<div class="row animated wow zoomIn" data-wow-duration=".5s" data-wow-delay=".2s">
				@if($team_members)
					@foreach($team_members as $team_member)
						<div class="col-md-3">
							<!-- .pro-text -->
							<div class="pro-text">
								<!-- .pro-img -->
								@if($team_member)
								<div class="pro-img"> <img src="{{ route('photo', ['filename' => $team_member->teacher->filename]) }}" alt="2" />
								@endif
									<!-- .hover-img -->
									<!-- <div class="hover-img">
										<ul>
											<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-sliders" aria-hidden="true"></i></a></li>
											<li><a href="#" data-toggle="modal" data-target="#quickModal" data-whatever="@mdo"><i class="fa fa-search" aria-hidden="true"></i></a></li>
										</ul>
									</div> -->
									<!-- /.hover-img -->
								</div>
								<!-- /.pro-img --><a href="#">{{ $team_member->name }}</a> <a href="#" class="addtocart">{{ $team_member->teacher->phone }}</a>
								<div class="price">{{ Role::team_member($team_member->role) }}</div>
							</div>
							<!-- /.pro-text -->
						</div>
					@endforeach
				@endif
							<!-- <div class="col-md-12 text-center">
					<a href="#" class="lbtn">load more</a>
				</div> -->
			</div>
		</div>
		<!-- /.new-arrivals -->
	</section>
	<section class="banner-outer">
		<!-- .banner-outer -->
		<div class="col-sm-6 col-md-6">
			<!-- .banner-img -->
			<div class="banner-img">
				<img src="assets/images/bg-banner.jpg" alt="about-img1" />
				<div class="banner-text2">
					<h4>Products Essentials</h4>
					<h3>Bottle With Wooden Cork</h3>
					<p>The Newtown sofa range is the first product Jonas Wagell has designed for Zaozuo, but one of the last to be finalized and launched.</p>
					<p><a href="#">Buy now / <span>$196.98</span></a></p>
				</div>
			</div>
			<!-- /.banner-outer -->
		</div>

		<div class="col-sm-6 col-md-6">
			<!-- .banner-img -->
			<div class="banner-img">
				<img src="assets/images/bg-banner2.jpg" alt="about-img1" />
				<div class="banner-text2">
					<h4>Products Essentials</h4>
					<h3>Hauteville Plywood Chair</h3>
					<p>The Newtown sofa range is the first product Jonas Wagell has designed for Zaozuo, but one of the last to be finalized and launched.</p>
					<p><a href="#">Buy now / <span>$196.98</span></a></p>
				</div>
			</div>
			<!-- /.banner-outer -->
		</div>
		<!-- /.banner -->
	</section>
	<section class="new-arrivals">
		<!-- .new-arrivals -->
		<div class="container">
			<div class="tittle text-center">
				<h2>Best Student In Class</h2>
				<p>Mirum est notare quam littera gothica quam nunc putamus parum claram!</p>
			</div>
			<div class="row animated wow zoomIn" data-wow-duration=".5s" data-wow-delay=".2s">
				@if($best_students)
				@foreach($best_students as $best_student)
				<div class="col-5">
					<!-- .pro-text -->
					<div class="pro-text">
						<!-- .pro-img -->
						<div class="pro-img"> <img src="{{ route('photo', ['filename' => $best_student->filename]) }}" alt="{{ $best_student->name }}" />
							<!-- .hover-img -->
							<div class="hover-img">
								<ul>
									<li>{{ $best_student->name }}</li>
									<li>{{ Classes::class_name($best_student->class_id) }}</li>
								</ul>
							</div>
							<!-- /.hover-img -->
						</div>
						<!-- /.pro-img --><a href="#">{{ $best_student->name }}</a>
						<div class="price">{{ Classes::class_name($best_student->class_id) }}</div>
					</div>
					<!-- /.pro-text -->
				</div>
				@endforeach
				@endif
			</div>
		</div>
		<!-- /.new-arrivals -->
	</section>
	<section class="client-icon">
		<div class="container">
			<ul>
				<li>
					<a href="#"><img src="assets/images/client-logo1.png" alt="client-logo1" /></a>
				</li>
				<li>
					<a href="#"><img src="assets/images/client-logo2.png" alt="client-logo2" /></a>
				</li>
				<li>
					<a href="#" class="active"><img src="assets/images/client-logo3.png" alt="client-logo3" /></a>
				</li>
				<li>
					<a href="#"><img src="assets/images/client-logo4.png" alt="client-logo4" /></a>
				</li>
				<li>
					<a href="#"><img src="assets/images/client-logo5.png" alt="client-logo4" /></a>
				</li>
			</ul>
		</div>
	</section>

	<section class="section-padding">
		<!-- Latest News -->
		<div class="container">
			<div class="tittle text-center">
				<h2>School Updates</h2>
				<p>Fresh news from the authorities</p>
			</div>
			<div class="col-sm-4 col-md-4 wow fadeIn" data-wow-duration=".2s" data-wow-delay=".1s">
				<div class="news-box">
					<div class="news-img">
						<img src="assets/images/blog-img1.jpg" alt="news-img1" />
					</div>
					<div class="news-text"> <a href="#">Anteposuerit litterarum formas.</a>
						<p>By <span>Zcubedesign</span> / September 11, 2017</p>
						<div class="news-text-content"> Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum. </div> <a href="#" class="readbtn">Read More</a> </div>
				</div>
			</div>
			<div class="col-sm-4 col-md-4 wow fadeIn" data-wow-duration=".2s" data-wow-delay=".1s">
				<div class="news-box">
					<div class="news-img">
						<img src="assets/images/blog-img2.jpg" alt="news-img1" />
					</div>
					<div class="news-text"> <a href="#">Anteposuerit litterarum formas.</a>
						<p>By <span>Zcubedesign</span> / September 11, 2017</p>
						<div class="news-text-content"> Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum. </div> <a href="#" class="readbtn">Read More</a> </div>
				</div>
			</div>
			<div class="col-sm-4 col-md-4 wow fadeIn" data-wow-duration=".4s" data-wow-delay=".3s">
				<div class="news-box">
					<div class="news-img">
						<img src="assets/images/blog-img3.jpg" alt="news-img1" />
					</div>
					<div class="news-text"> <a href="#">Anteposuerit litterarum formas.</a>
						<p>By <span>Zcubedesign</span> / September 11, 2017</p>
						<div class="news-text-content"> Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum. </div> <a href="#" class="readbtn">Read More</a> </div>
				</div>
			</div>
		</div>
		<!-- /Latest News -->
	</section>
	<!--  /main  -->
@endsection
