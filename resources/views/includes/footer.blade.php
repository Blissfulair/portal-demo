<footer>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<!-- f-weghit -->
					<div class="f-weghit">
						@if($setting = \App\Setting::find(1))
						<img src="{{ route('photo', ['filename' => $setting->filename]) }}" alt="logo">
						@endif
						<p>Outstock is a premium Templates theme with advanced admin module. It’s extremely customizable, easy to use and fully responsive and retina ready.</p>
						<ul>
							<li><i class="icon-location-pin icons" aria-hidden="true"></i> <strong>Add:</strong> 1234 Heaven Stress, Beverly Hill, Melbourne, USA.</li>
							<li><i class="icon-envelope-letter icons"></i> <strong>Email:</strong> Contact@erentheme.com</li>
							<li><i class="icon-call-in icons"></i> <strong>Phone Number:</strong> (800) 123 456 789</li>
						</ul>
					</div>
					<!-- /f-weghit -->
				</div>
				<div class="col-xs-12 col-sm-3 col-md-3">
					<!-- f-weghit2 -->
					<div class="f-weghit2">
						<h4>Information</h4>
						<ul>
							<li><a href="#">About Us</a></li>
							<li><a href="#">Careers</a></li>
							<li><a href="#">Delivery Inforamtion </a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Terms & Condition</a></li>
						</ul>
					</div>
					<!-- /f-weghit2 -->
				</div>
				<div class="col-xs-12 col-sm-3 col-md-3">
					<!-- f-weghit2 -->
					<div class="f-weghit2">
						<h4>Customer Service</h4>
						<ul>
							<li><a href="#">Shipping Policy</a></li>
							<li><a href="#">Help & Contact Us</a></li>
							<li><a href="#">Returns & Refunds </a></li>
							<li><a href="#">Online Stores</a></li>
							<li><a href="#">Terms & Conditions</a></li>
						</ul>
					</div>
					<!-- /f-weghit2 -->
				</div>

			</div>
		</div>
		<!-- copayright -->
		<div class="copayright cwhite">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6">
						Copyright &copy; <a href="#">Outstock</a> all rights reserved. Powered by <a href="#">zcube</a>
					</div>
					<div class="text-right col-xs-12 col-sm-6 col-md-6">
						<div class="f-sicon2">
							<ul>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /copayright -->
	</footer>