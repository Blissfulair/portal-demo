	<header>
		<!--  nav  -->
		<nav  class="navbar navbar-inverse navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
					<a class="navbar-brand" href="{{ route('index') }}"><img src="{{ route('photo', ['filename' => \App\Setting::find(1)->filename]) }}" alt="logo"></a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" data-hover="dropdown" data-animations="fadeIn fadeInLeft fadeInUp fadeInRight">
					<ul class="nav navbar-nav">

						<li class="dropdown"> <a href="index.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span>Home</span></a>
							<ul class="dropdown-menu dropdownhover-bottom" role="menu">
								<li><a href="index.html">Home pages 1</a></li>
								<li><a href="index2.html">Home pages 2</a></li>
								<li><a href="index3.html">Home pages 3</a></li>
								<li><a href="index4.html">Home pages 4</a></li>
							</ul>
						</li>
						<li class="dropdown"> <a href="list.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span> Shop</span></a>
							<div class="dropdown-menu dropdownhover-bottom mega-menu" role="menu">
								<div class="col-sm-8 col-md-8">
									<ul>
										<li><strong>Shop Pages</strong></li>
										<li><a href="#">Standard Shop Page</a></li>
										<li><a href="#">Small Products</a></li>
										<li><a href="#">Medium Products</a></li>
										<li><a href="#">Large Products</a></li>
										<li><a href="#">Sidebar</a></li>
										<li><a href="#">Pagination</a></li>
										<li><a href="#">Shop Infinity</a></li>
									</ul>
									<ul>
										<li><strong>Products Pages</strong></li>
										<li><a href="#">Product Page V1</a></li>
										<li><a href="#">Product Page V2</a></li>
										<li><a href="#">Product Page V3</a></li>
										<li><a href="#">Product Page V4</a></li>
										<li><a href="#">Simple Product</a></li>
										<li><a href="#">Variable Product</a></li>
										<li><a href="#">External Product</a></li>
									</ul>
									<ul>
										<li><strong>Other Shop Pages</strong></li>
										<li><a href="#">Collection</a></li>
										<li><a href="#">LookBook</a></li>
										<li><a href="#">Shopping Cart</a></li>
										<li><a href="#">Wishlist</a></li>
										<li><a href="#">Order Tracking</a></li>
										<li><a href="#">My Account</a></li>
										<li><a href="#">Checkout</a></li>
									</ul>
								</div>
								<div class="col-sm-4 col-md-4"> <img src="assets/images/Hover-menu-img.jpg" alt="Hover-menu-img"> </div>
							</div>
						</li>
						<li> <a href="#" class="dropdown-toggle"><span>About</span></a> </li>
						<li class="dropdown">
							<a href="blog.html" data-toggle="dropdown" role="button" aria-expanded="false"><span>Blog</span></a>
							<ul class="dropdown-menu dropdownhover-bottom" role="menu">
								@if(Auth::user())
									@if(Auth::user()->role == 1)
									<li><a href="">Create Blog</a></li>
									@endif
								@endif
								<li><a href="{{ route('blog') }}">News</a></li>
							</ul>
						</li>
						<li> <a href="contact.html"><span>Contact</span></a> </li>
						@if(Auth::user())
							@if(Role::isAdmin())
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<span>Activities</span></a>
							<ul class="dropdown-menu dropdownhover-bottom" role="menu">
								<li><a href="{{ route('admin') }}">Admin</a></li>
								<li><a href="{{ route('register_student.new') }}">Register New Student</a></li>
								<li><a href="{{ route('register_teacher.new') }}">Register New Teacher</a></li>
								<li><a href="grid-sidebar-left.html">View All Users</a></li>
								<li><a href="{{ route('class_display') }}">Add A New Class</a></li>
								<li><a href="{{ route('subject_form') }}">Add A New Subject</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								<span>Academic Calander</span></a>
							<ul class="dropdown-menu dropdownhover-bottom" role="menu">
								<li><a href="{{ route('calander') }}">New Term</a></li>
							</ul>
						</li>
						@elseif(Role::isTeacher())
							<li><a href="{{ route('home') }}">Biodata</a></li>
							<li class="dropdown">
								<a href="#" data-toggle="dropdown" role="button" aria-expanded="false"><span>Dashboard</span></a>
								<ul class="dropdown-menu dropdownhover-bottom" role="menu">
									<li><a href="{{ route('dashboard') }}">{{ __('Scoring') }}</a></li>
								</ul>
							</li>
							@elseif(Role::isStudent())
							<li><a href="{{ route('home') }}">Biodata</a></li>
							<li class="dropdown">
								<a href="#" data-toggle="dropdown" role="button" aria-expanded="false"><span>Study</span></a>
								<ul class="dropdown-menu dropdownhover-bottom" role="menu">
									<li><a href="{{ route('payment_form') }}">{{ __('Make Payment') }}</a></li>
									<li><a href="{{ route('payment') }}">All Payments</a></li>
									<li><a href="{{ route('results') }}">Results</a></li>
									<li><a href="blog-filter-3-columns.html">Blog Filter 3 Columns</a></li>
									<li><a href="blog-details.html">Blog Details</a></li>
								</ul>
							</li>
							@endif
						@endif
						@guest
						<li><a href="{{ route('login') }}">Portal</a></li>
						@endguest
					</ul>
					<ul class="nav navbar-nav navbar-right">
						@if(Auth::user())
						<li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdownhover-bottom" style="margin-top:0;" aria-labelledby="navbarDropdown">
								<a class="dropdown-item btn btn-block btn-lg" href="{{ route('change') }}">
                                        {{ __('Change Password') }}
                                    </a>
                                    <a class="dropdown-item btn btn-block btn-lg" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
							</li>						
							@endif
						<li>
							<a href="#" data-toggle="modal" data-target=".popup1"><img src="assets/images/top-icon1.png" alt="top-icon1"> <span>Search</span></a>
						</li>
					</ul>
					<!-- /.navbar-collapse -->
				</div>
			</div>
		</nav>
		<!--  /nav  -->
		<!-- search-popup -->
		<div class="modal fade bs-example-modal-lg search-bg popup1" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content search-popup">
					<div class="text-center">
						<a href="#" class="close2" data-dismiss="modal" aria-label="Close">× close</a>
					</div>
					<div class="search-outer">
						<div class="col-md-11"><input type="text" placeholder="Search for products..." /></div>
						<div class="col-md-1 text-right"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></div>
					</div>
				</div>
			</div>
		</div>
		<!-- /search-popup -->
		<!--  .menu  -->
		<div class="modal fade bs-example-modal-lg search-bg menu-popup" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content search-popup">
					<nav class="navbar navbar-inverse openmenu">
						<ul class="nav navbar-nav">
							<li class="dropdown"> <a href="index.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span>Home</span></a>
								<ul class="dropdown-menu dropdownhover-bottom" role="menu">
									<li><a href="index.html">Home pages 1</a></li>
									<li><a href="index2.html">Home pages 2</a></li>
									<li><a href="index3.html">Home pages 3</a></li>
									<li><a href="index4.html">Home pages 4</a></li>
								</ul>
							</li>
							<li class="dropdown"> <a href="list.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span> Shop</span></a>
								<div class="dropdown-menu dropdownhover-bottom mega-menu" role="menu">
									<div class="col-sm-8 col-md-8">
										<ul>
											<li><strong>Shop Pages</strong></li>
											<li><a href="#">Standard Shop Page</a></li>
											<li><a href="#">Small Products</a></li>
											<li><a href="#">Medium Products</a></li>
											<li><a href="#">Large Products</a></li>
											<li><a href="#">Sidebar</a></li>
											<li><a href="#">Pagination</a></li>
											<li><a href="#">Shop Infinity</a></li>
										</ul>
										<ul>
											<li><strong>Products Pages</strong></li>
											<li><a href="#">Product Page V1</a></li>
											<li><a href="#">Product Page V2</a></li>
											<li><a href="#">Product Page V3</a></li>
											<li><a href="#">Product Page V4</a></li>
											<li><a href="#">Simple Product</a></li>
											<li><a href="#">Variable Product</a></li>
											<li><a href="#">External Product</a></li>
										</ul>
										<ul>
											<li><strong>Other Shop Pages</strong></li>
											<li><a href="#">Collection</a></li>
											<li><a href="#">LookBook</a></li>
											<li><a href="#">Shopping Cart</a></li>
											<li><a href="#">Wishlist</a></li>
											<li><a href="#">Order Tracking</a></li>
											<li><a href="#">My Account</a></li>
											<li><a href="#">Checkout</a></li>
										</ul>
									</div>
									<div class="col-sm-4 col-md-4"> <img src="assets/images/Hover-menu-img.jpg" alt="Hover-menu-img"> </div>
								</div>
							</li>
							<li> <a href="#" class="dropdown-toggle"><span>About</span></a> </li>
							<li class="dropdown">
								<a href="blog.html" data-toggle="dropdown" role="button" aria-expanded="false"><span>Blog</span></a>
								<ul class="dropdown-menu dropdownhover-bottom" role="menu">
									<li><a href="blog.html">Blog</a></li>
									<li><a href="blog-columm3-masonry.html">Blog Columm 3 Masonry</a></li>
									<li><a href="blog-filter-2-columns.html">Blog Filter 2 Columns</a></li>
									<li><a href="blog-filter-3-columns.html">Blog Filter 3 Columns</a></li>
									<li><a href="blog-details.html">Blog Details</a></li>
								</ul>
							</li>
							<li> <a href="contact.html"><span>Contact</span></a> </li>
							<li class="dropdown">
								<a href="gridfull.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
									<span>Elements</span></a>
								<ul class="dropdown-menu dropdownhover-bottom" role="menu">
									<li><a href="list.html">Shop List</a></li>
									<li><a href="grid-3-columns.html">Shop Grid 3 Columns</a></li>
									<li><a href="grid-4-columns.html">Shop Grid 4 Columns</a></li>
									<li><a href="grid-sidebar-left.html">Shop Grid Sidebar Left</a></li>
									<li><a href="products-detail.html">Products Detail</a></li>
									<li><a href="products-detail02.html">Products Detail 02</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

	</header>