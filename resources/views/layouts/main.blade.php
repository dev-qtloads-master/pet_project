<!DOCTYPE html>
<html lang="en">
  <head>
    <title>yours companion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('Assets/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('Assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/owl.theme.default.min.css')}}">


    <link rel="stylesheet" href="{{asset('Assets/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/jquery.timepicker.css')}}">

    <link rel="stylesheet" href="{{asset('Assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('Assets/css/style.css')}}">

    @yield('css')

  </head>
  <body>




	{{-- <header class="header-strip">
        <a href="#" class="logo">
            <img src="{{asset('Assets/images/yc logo.jpeg')}}" alt="Logo">
            <span>YOURS COMPANION </span>
        </a>

        <div class="search-container">
            <span class="search-icon">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </span>
            <input type="text" placeholder="Search anything for your pet...">
        </div>

        <div class="right-section">
            <a href="#" class="nav-link">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
                <span>Support</span>
            </a>

            <a href="{{ route('login') }}" class="nav-link">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span>Log In</span>
            </a>

            <a href="{{ route('register') }}" class="nav-link">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span>Sign Up</span>
            </a>

            <a href="#" class="nav-link cart-container">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <span>Cart</span>
                <div class="cart-badge">6</div>
            </a>
        </div>
    </header> --}}

    <header class="header-strip">
        <a href="#" class="logo">
            <img src="{{ asset('Assets/images/yc logo.jpeg') }}" alt="Logo">
            <span>YOURS COMPANION</span>
        </a>

        <div class="search-container">
            <span class="search-icon">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </span>
            <input type="text" placeholder="Search anything for your pet...">
        </div>

        <div class="right-section">
            @guest
                <a href="{{ route('login') }}" class="nav-link">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span>Log In</span>
                </a>
                <a href="{{ route('register') }}" class="nav-link">
                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span>Sign Up</span>
                </a>
            @else
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="nav-link" style="background: none; border: none; color: inherit; cursor: pointer;">
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        <span>Log Out</span>
                    </button>
                </form>
            @endguest

            <a href="#" class="nav-link cart-container">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <span>Cart</span>
                <div class="cart-badge">6</div>
            </a>
        </div>
    </header>



		<nav class="navbar">
			<div class="container">
				<div class="nav-content">

					<button class="mobile-menu-btn">☰</button>
					<ul class="nav-links">
						<li class="nav-item">
							<a href="#" class="nav-link">Dogs</a>
							<div class="dropdown-content">
								<div class="dropdown-section">
									<div class="dropdown-title">FOOD</div>
									<div class="dropdown-links">
										<a href="#">Wet Food</a>
										<a href="#">Dry Food</a>
										<a href="#">Supplements</a>
									</div>
								</div>
								<div class="dropdown-section">
									<div class="dropdown-title">TREATS</div>
									<div class="dropdown-links">
										<a href="#">Natural Treats</a>
										<a href="#">Creamy Treats</a>
										<a href="#">View All Treats</a>
									</div>
								</div>
								<div class="dropdown-section">
									<div class="dropdown-title">GROOMING</div>
									<div class="dropdown-links">
										<a href="#">Shampoo & Odour Control</a>
										<a href="#">Brushes & Combs</a>
										<a href="#">Tick & Flea</a>
									</div>
								</div>
								<div class="promo-section">
									<div>
										<h3>Treats starting at ₹80</h3>
										<p>250+ delights</p>
										<a href="#" class="shop-now-btn">Shop Now →</a>
									</div>
									<img src="{{asset('Assets/images/yc logo.jpeg')}}?height=200&width=200" alt="Promotional image" style="width: 100%; height: auto; margin-top: 20px;">
								</div>
							</div>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">Cats</a>
							<div class="dropdown-content">
								<div class="dropdown-section">
									<div class="dropdown-title">FOOD</div>
									<div class="dropdown-links">
										<a href="#">Wet Food</a>
										<a href="#">Dry Food</a>
										<a href="#">Kitten Food</a>
										<a href="#">Supplements</a>
									</div>
								</div>
								<div class="dropdown-section">
									<div class="dropdown-title">LITTER & SUPPLIES</div>
									<div class="dropdown-links">
										<a href="#">Litter</a>
										<a href="#">Toilets & Trays</a>
										<a href="#">Scoopers</a>
										<a href="#">Stain & Odour</a>
									</div>
								</div>
								<div class="dropdown-section">
									<div class="dropdown-title">TOYS</div>
									<div class="dropdown-links">
										<a href="#">Plush Toys</a>
										<a href="#">Interactive Toys</a>
										<a href="#">Scratchers</a>
										<a href="#">Catnip</a>
									</div>
								</div>
								<div class="promo-section">
									<div>
										<h3>Treats starting at ₹80</h3>
										<p>250+ delights</p>
										<a href="#" class="shop-now-btn">Shop Now →</a>
									</div>
									<img src="{{asset('Assets/images/yc logo.jpeg')}}?height=200&width=200" alt="Cat treats promotion" style="width: 100%; height: auto; margin-top: 20px;">
								</div>
							</div>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link"> Animals</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">Brands</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">Shop by Lifestage</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link"> locator</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">Book a vet</a>
						</li>

						<li class="nav-item">
							<a href="#" class="nav-link">Offer Zone</a>
						</li>

					</ul>
				</div>
			</div>
		</nav>
    <!-- END nav -->

    @yield('content')



    <footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">Petsitting</h2>
						<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
						<ul class="ftco-footer-social p-0">
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><span class="fa fa-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><span class="fa fa-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="fa fa-instagram"></span></a></li>
            </ul>
					</div>
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">Latest News</h2>
						<div class="block-21 mb-4 d-flex">
              <a class="img mr-4 rounded" style="background-image: url({{asset('Assets/images/image_1.jpg')}});"></a>
              <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> April 7, 2020</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
            <div class="block-21 mb-4 d-flex">
              <a class="img mr-4 rounded" style="background-image: url({{asset('Assets/images/image_2.jpg')}});"></a>
              <div class="text">
                <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                <div class="meta">
                  <div><a href="#"><span class="icon-calendar"></span> April 7, 2020</a></div>
                  <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                  <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                </div>
              </div>
            </div>
					</div>
					<div class="col-md-6 col-lg-3 pl-lg-5 mb-4 mb-md-0">
						<h2 class="footer-heading">Quick Links</h2>
						<ul class="list-unstyled">
              <li><a href="#" class="py-2 d-block">Home</a></li>
              <li><a href="#" class="py-2 d-block">About</a></li>
              <li><a href="#" class="py-2 d-block">Services</a></li>
              <li><a href="#" class="py-2 d-block">Works</a></li>
              <li><a href="#" class="py-2 d-block">Blog</a></li>
              <li><a href="#" class="py-2 d-block">Contact</a></li>
            </ul>
					</div>
					<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
						<h2 class="footer-heading">Have a Questions?</h2>
						<div class="block-23 mb-3">
              <ul>
                <li><span class="icon fa fa-map"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                <li><a href="#"><span class="icon fa fa-paper-plane"></span><span class="text">info@yourdomain.com</span></a></li>
              </ul>
            </div>
					</div>
				</div>
				<div class="row mt-5">
          <div class="col-md-12 text-center">

            <p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib.com</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
			</div>
		</footer>




  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{asset('Assets/js/jquery.min.js')}}"></script>
  <script src="{{asset('Assets/js/jquery-migrate-3.0.1.min.js')}}"></script>
  <script src="{{asset('Assets/js/popper.min.js')}}"></script>
  <script src="{{asset('Assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('Assets/js/jquery.easing.1.3.js')}}"></script>
  <script src="{{asset('Assets/js/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('Assets/js/jquery.stellar.min.js')}}"></script>
  <script src="{{asset('Assets/js/jquery.animateNumber.min.js')}}"></script>
  <script src="{{asset('Assets/js/bootstrap-datepicker.js')}}"></script>
  <script src="{{asset('Assets/js/jquery.timepicker.min.js')}}"></script>
  <script src="{{asset('Assets/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('Assets/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('Assets/js/scrollax.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset('Assets/js/google-map.js')}}"></script>
  <script src="{{asset('Assets/js/main.js')}}"></script>


  @yield('scripts')
  </body>
</html>
