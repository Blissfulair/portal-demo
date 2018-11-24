@extends('layouts.app')

@section('content')
<section class="blog mt-20">
		<!-- .blog -->
		<div class="container">
			<!-- Filter Controls - Simple Mode -->
			<div class="row">
				<!-- A basic setup of simple mode filter controls, all you have to do is use data-filter="all"
                     for an unfiltered gallery and then the values of your categories to filter between them -->
				<div class="col-sm-9 col-md-9">
					<div class="row">
						<div class="col-sm-12">
							<div class="blog-img">
								<img class="img-responsive" src="assets/images/blog-img01.jpg" alt="sample image">
								<div class="blog-img-hover"><a href="#"><i class="fa fa-paperclip" aria-hidden="true"></i></a></div>
							</div>
							<p class="hank"><a href="blog-details.html">How To Wear Prints In Winter</a></p>
							<p class="time">By <span>Zcube</span> / September 14, 2017</p>
							<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et...</p>
							<a href="#" class="readbtn">Read More</a>
						</div>
						<div class="col-sm-12">
							<div class="blog-img">
								<img class="img-responsive" src="assets/images/blog-img02.jpg" alt="sample image">
								<div class="blog-img-hover"><a href="#"><i class="fa fa-paperclip" aria-hidden="true"></i></a></div>
							</div>
							<p class="hank"><a href="blog-details.html">How To Wear Prints In Winter</a></p>
							<p class="time">By <span>Zcube</span> / September 14, 2017</p>
							<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et...</p>
							<a href="#" class="readbtn">Read More</a>
						</div>
						<div class="col-sm-12">
							<div class="blog-img">
								<img class="img-responsive" src="assets/images/blog-img03.jpg" alt="sample image">
								<div class="blog-img-hover"><a href="#"><i class="fa fa-paperclip" aria-hidden="true"></i></a></div>
							</div>
							<p class="hank"><a href="blog-details.html">How To Wear Prints In Winter</a></p>
							<p class="time">By <span>Zcube</span> / September 14, 2017</p>
							<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et...</p>
							<a href="#" class="readbtn">Read More</a>
						</div>
						<div class="col-sm-12">
							<div class="blog-img">
								<img class="img-responsive" src="assets/images/blog-img04.jpg" alt="sample image">
								<div class="blog-img-hover"><a href="#"><i class="fa fa-paperclip" aria-hidden="true"></i></a></div>
							</div>
							<p class="hank"><a href="blog-details.html">How To Wear Prints In Winter</a></p>
							<p class="time">By <span>Zcube</span> / September 14, 2017</p>
							<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et...</p>
							<a href="#" class="readbtn">Read More</a>
						</div>
						<div class="col-sm-12">
							<div class="blog-img">
								<img class="img-responsive" src="assets/images/blog-img05.jpg" alt="sample image">
								<div class="blog-img-hover"><a href="#"><i class="fa fa-paperclip" aria-hidden="true"></i></a></div>
							</div>
							<p class="hank"><a href="blog-details.html">How To Wear Prints In Winter</a></p>
							<p class="time">By <span>Zcube</span> / September 14, 2017</p>
							<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et...</p>
							<a href="#" class="readbtn">Read More</a>
						</div>
						<div class="col-sm-12">
							<div class="blog-img">
								<img class="img-responsive" src="assets/images/blog-img06.jpg" alt="sample image">
								<div class="blog-img-hover"><a href="#"><i class="fa fa-paperclip" aria-hidden="true"></i></a></div>
							</div>
							<p class="hank"><a href="blog-details.html">How To Wear Prints In Winter</a></p>
							<p class="time">By <span>Zcube</span> / September 14, 2017</p>
							<p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et...</p>
							<a href="#" class="readbtn">Read More</a>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-md-3">
                    @include('includes.sidebar')
				</div>
			</div>

			<div class="pagetions">
				<!-- .pagetions -->
				<div class="col-md-12">
					<ul>
						<li><a href="#">1</a></li>
						<li><a href="#" class="active">2</a></li>
						<li><a href="#">...</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<!-- /.pagetions -->
			</div>
		</div>
		<!-- /.blog -->
	</section>
@endsection