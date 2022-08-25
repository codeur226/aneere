<!DOCTYPE html>
<html lang="zxx">
	<head>
		<!-- Meta Tag -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'ANEREE') }}</title>

		<!-- Title Tag  -->
		<title>ANEREE</title>

		<!-- Favicon -->
		<link rel="icon" type="image/favicon.png" href="{{assset('assetfront/img/favicon.png')}}">

		<!-- Web Font -->
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        {{-- Data-table --}}
        <link href="{{seciure_asset'assetfront/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{seciure_asset'assetfront/plugins/DataTables/DataTables-1.10.25/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
		 <!-- <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">  -->

        <!-- INTERNAL  DATA TABLE CSS-->
		 <!-- <link href="{{seciure_asset'assetadmin/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
		<link href="{{seciure_asset'assetadmin/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{seciure_asset'assetadmin/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" /> -->
		<!-- Bizwheel Plugins CSS -->
         <!-- <link href="{{seciure_asset'assetfront/css/animate.min.css')}}" rel="stylesheet"/> -->

        <link href="{{seciure_asset'assetfront/css/animate.min.css')}}" rel="stylesheet"/>
		<link href="{{seciure_asset'assetfront/css/bootstrap.min.css')}}" rel="stylesheet"/>
		<link href="{{seciure_asset'assetfront/css/cubeportfolio.min.css')}}" rel="stylesheet"/>
		<link href="{{seciure_asset'assetfront/css/font-awesome.css')}}" rel="stylesheet"/>
		<link href="{{seciure_asset'assetfront/css/jquery.fancybox.min.css')}}" rel="stylesheet"/>
		<link href="{{seciure_asset'assetfront/css/magnific-popup.min.css')}}" rel="stylesheet"/>
		<link href="{{seciure_asset'assetfront/css/owl-carousel.min.css')}}" rel="stylesheet"/>
		<link href="{{seciure_asset'assetfront/css/slicknav.min.css')}}" rel="stylesheet"/>


		<!-- Bizwheel Stylesheet -->
		<link href="{{seciure_asset'assetfront/css/reset.css')}}" rel="stylesheet"/>
		<link href="{{seciure_asset'assetfront/css/style.css')}}" rel="stylesheet"/>
		<link href="{{seciure_asset'assetfront/css/responsive.css')}}" rel="stylesheet"/>
        <!-- app style -->
        {{-- <link rel="stylesheet" href="{{ seciure_asset'css/login.css') }}"> --}}


		<!-- Bizwheel Colors -->
		<!--<link rel="stylesheet" href="css/skins/skin-1.css">
		<!--<link rel="stylesheet" href="css/skins/skin-2.css">-->
		<!--<link rel="stylesheet" href="css/skins/skin-3.css">-->
		<!--<link rel="stylesheet" href="css/skins/skin-4.css">-->

		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<body id="bg">

		<!-- Boxed Layout -->
		{{-- <div id="page" class="site boxed-layout"> --}}

		<!-- Preloader -->
		<div class="preeloader">
			<div class="preloader-spinner"></div>
		</div>
		<!-- End Preloader -->

		<!-- Header -->
		<header class="header">
			<!-- Topbar -->
			<div class="topbar">
				<div class="container">
					<div class="row ">
						<div class="col-lg-12 col-12 pb-1">

							<!-- Top Contact -->
							<div class="top-contact d-inline">
                                    <!-- Image Logo -->
                                    <div class="img-logo">
                                        <a href="index.html">
                                            <img src="{{seciure_asset'assetfront/img/logo.png')}}" alt="#">
                                        </a>
                                    </div>
								{{-- <div class="single-contact"><i class="fa fa-phone"></i>N° tel: +(226) 70 86 73 40</div>
								<div class="single-contact"><i class="fa fa-envelope-open"></i>Email: infos@aneree.bf</div> --}}
								{{-- <div class="single-contact"><i class="fa fa-clock-o"></i>Ouvert de: 7h30 - 16h30</div> --}}
							</div>
							<!-- End Top Contact -->


							<div class="topbar-right mt-4 d-inline">
								<!-- Social Icons -->
								{{-- <ul class="social-icons">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								</ul> --}}
                                @if (Route::has('login'))
                                      {{-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> --}}
                                        @auth
                                        <ul class="nav border border-success p-2" >
                                        <li class="icon-active mt-2" style="z-index: 100000;">
                                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                                                <a class="d-inline text-black " href="#">
                                                    {{-- <i class="fa fa-user-o" aria-hidden="true"></i> --}}
                                                    <span class=".align-middle   pl-2  ">
                                                        {{ Auth::user()->name }}
                                                    </span>
                                                </a>
                                            <ul class="sub-menu">
                                                <li>
                                                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout').submit()">Deconnexion</a>
                                                    <form id="logout" method="POST" action="{{ route('logout') }}">
                                                        @csrf

                                                    </form>
                                                </li>
                                            </ul>
                                        </li></ul>
                                           {{-- <div class="dropdown profile-1">
                                                <a href="#" data-toggle="dropdown" class="nav-link pr-2  leading-none d-flex">
                                                    <i class="fa fa-user-o" aria-hidden="true"></i>
                                                    <span class=".align-middle font-weight-semibold pl-2 ">
                                                        {{ Auth::user()->name }}
                                                    </span>
                                                </a>
                                            </div> --}}
                                        {{-- <li> <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a></li> --}}
                                            @else
                                            <div class="button mr-3" >
                                            <a href="{{ route('login') }}" class="bizwheel-btn">Se connecter</a>
                                            </div>
                                            @if (Route::has('register'))
                                            <div class="button">
                                            <a href="{{ route('register') }}" class="bizwheel-btn">S'inscrire</a>
                                            </div>
                                            @endif
                                        @endauth
                                          {{-- </div> --}}
                                @endif

							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Topbar -->
			<!-- Middle Header -->
			<div class="middle-header">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="middle-inner">
								<div class="row">
                                    <div class="col-lg-2 col-md-3 col-12 " >
                                        <div class="mobile-nav mt-1" ></div>
                                    </div>
									<div class="col-lg-12 col-md-12 col-12">
										<div class="menu-area">
											<!-- Main Menu -->
											<nav class="navbar navbar-expand-lg">
												<div class="navbar-collapse">
													<div class="nav-inner" style="min-width: 780px;">
														<div class="menu-home-menu-container">
															<!-- Naviagiton -->
															<ul id="nav" class="nav main-menu menu navbar-nav">
																<li><a href="index.html">Accueil</a></li>
																<li><a href="{{ route('reglementations.search',-1) }}">Règlementation</a></li>
                                                                <li><a href="services.html">Auditeurs agréés</a></li>
                                                                <li class="icon-active"><a href="services.html">Etablissements</a>
                                                                    <ul class="sub-menu">
																		<li><a href="about.html">Industrie</a></li>
																		<li><a href="404.html">Bâtiment</a></li>
																		<li><a href="404.html">Transport</a></li>
																	</ul>
                                                                </li>
                                                                <li><a href="services.html">Particuliers</a></li>
																<li class="icon-active"><a href="#">Nos services</a>
																	<ul class="sub-menu">
																		<li><a href="about.html">Audit énergetique</a></li>
																	</ul>
																</li>
																<li><a href="services.html">Nous contacter</a></li>

															</ul>
															<!--/ End Naviagiton -->
														</div>
													</div>
												</div>
											</nav>
											<!--/ End Main Menu -->
											<!-- Right Bar -->
											{{-- <div class="right-bar">
												<!-- Search Bar -->
												<ul class="right-nav">
													<li class="top-search"><a href="#0"><i class="fa fa-search"></i></a></li>
													<li class="bar"><a class="fa fa-bars"></a></li>
												</ul>
												<!--/ End Search Bar -->
												<!-- Search Form -->
												<div class="search-top">
													<form action="#" class="search-form" method="get">
														<input type="text" name="s" value="" placeholder="Search here"/>
														<button type="submit" id="searchsubmit"><i class="fa fa-search"></i></button>
													</form>
												</div>
												<!--/ End Search Form -->
											</div> --}}
											<!--/ End Right Bar -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Middle Header -->
			<!-- Sidebar Popup -->
			{{-- <div class="sidebar-popup">
				<div class="cross">
					<a class="btn"><i class="fa fa-close"></i></a>
				</div>
				<div class="single-content">
					<h4>About Bizwheel</h4>
					<p>The main component of a healthy environment for self esteem is that it needs be nurturing. It should provide unconditional warmth.</p>
					<!-- Social Icons -->
					<ul class="social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
					</ul>
				</div>
				<div class="single-content">
					<h4>Important Links</h4>
					<ul class="links">
						<li><a href="#">About Us</a></li>
						<li><a href="#">Our Services</a></li>
						<li><a href="#">Portfolio</a></li>
						<li><a href="#">Pricing Plan</a></li>
						<li><a href="#">Blog & News</a></li>
						<li><a href="#">Contact us</a></li>
					</ul>
				</div>
			</div> --}}
			<!--/ Sidebar Popup -->
		</header>
		<!--/ End Header -->

		<!-- Hero Slider -->
		{{-- <section class="hero-slider style1">
			<div class="home-slider">
				<!-- Single Slider -->
				<div class="single-slider" style="background-image:url('https://via.placeholder.com/1700x800.png')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7 col-md-8 col-12">
								<div class="welcome-text">
									<div class="hero-text">
										<h4>We are always ready to help you</h4>
										<h1>Our Creative Designer Waiting for Projects</h1>
										<div class="p-text">
											<p>Nunc tincidunt venenatis elit. Etiam venenatis quam vel maximus bibendum Pellentesque elementum dapibus diam tristique</p>
										</div>
										<div class="button">
											<a href="contact.html" class="bizwheel-btn theme-1 effect">Work with us</a>
											<a href="portfolio.html" class="bizwheel-btn theme-2 effect">View Our Portfolio</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/ End Single Slider -->
				<!-- Single Slider -->
				<div class="single-slider" style="background-image:url('https://via.placeholder.com/1700x800.png')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7 col-md-8 col-12">
								<div class="welcome-text">
									<div class="hero-text">
										<h4>Your time is so important for us</h4>
										<h1>Build Your WorldClass Brand with Bizwheel</h1>
										<div class="p-text">
											<p>Nunc tincidunt venenatis elit. Etiam venenatis quam vel maximus bibendum Pellentesque elementum dapibus diam tristique</p>
										</div>
										<div class="button">
											<a href="blog.html" class="bizwheel-btn theme-1 effect">Read our blog</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/ End Single Slider -->
				<!-- Single Slider -->
				<div class="single-slider" style="background-image:url('https://via.placeholder.com/1700x800.png')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7 col-md-8 col-12">
								<div class="welcome-text">
									<div class="hero-text">
										<h4>Our experties are waiting for you</h4>
										<h1>Best Way to Represent your Next Business </h1>
										<div class="p-text">
											<p>Nunc tincidunt venenatis elit. Etiam venenatis quam vel maximus bibendum Pellentesque elementum dapibus diam tristique</p>
										</div>
										<div class="button">
											<a href="team.html" class="bizwheel-btn theme-2 effect">Our Leaders</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--/ End Single Slider -->
			</div>
		</section> --}}
		<!--/ End Hero Slider -->

		<!-- Features Area -->
		{{-- <section class="features-area section-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Feature -->
						<div class="single-feature">
							<div class="icon-head"><i class="fa fa-podcast"></i></div>
							<h4><a href="service-single.html">Creative Design</a></h4>
							<p>Aenean aliquet rutrum enimn scelerisque. Nam dictumanpo, antequis laoreet ullamcorper, velitsd odio scelerisque tod</p>
							<div class="button">
								<a href="service-single.html" class="bizwheel-btn"><i class="fa fa-arrow-circle-o-right"></i>Learn More</a>
							</div>
						</div>
						<!--/ End Single Feature -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Feature -->
						<div class="single-feature">
							<div class="icon-head"><i class="fa fa-podcast"></i></div>
							<h4><a href="service-single.html">Quality Service</a></h4>
							<p>Aenean aliquet rutrum enimn scelerisque. Nam dictumanpo, antequis laoreet ullamcorper, velitsd odio scelerisque tod</p>
							<div class="button">
								<a href="service-single.html" class="bizwheel-btn"><i class="fa fa-arrow-circle-o-right"></i>Learn More</a>
							</div>
						</div>
						<!--/ End Single Feature -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Feature -->
						<div class="single-feature active">
							<div class="icon-head"><i class="fa fa-podcast"></i></div>
							<h4><a href="service-single.html">On-time Delivery</a></h4>
							<p>Aenean aliquet rutrum enimn scelerisque. Nam dictumanpo, antequis laoreet ullamcorper, velitsd odio scelerisque tod</p>
							<div class="button">
								<a href="service-single.html" class="bizwheel-btn"><i class="fa fa-arrow-circle-o-right"></i>Learn More</a>
							</div>
						</div>
						<!--/ End Single Feature -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Feature -->
						<div class="single-feature">
							<div class="icon-head"><i class="fa fa-podcast"></i></div>
							<h4><a href="service-single.html">24/7 Live support</a></h4>
							<p>Aenean aliquet rutrum enimn scelerisque. Nam dictumanpo, antequis laoreet ullamcorper, velitsd odio scelerisque tod</p>
							<div class="button">
								<a href="service-single.html" class="bizwheel-btn"><i class="fa fa-arrow-circle-o-right"></i>Learn More</a>
							</div>
						</div>
						<!--/ End Single Feature -->
					</div>
				</div>
			</div>

		</section> --}}
        <main>{{ $slot }}</main>
		<!--/ End Features Area -->

		<!-- Call To Action -->
		{{-- <section class="call-action overlay" style="background-image:url('https://via.placeholder.com/1500x300')">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-12">
						<div class="call-inner">
							<h2>Brand Products &amp; Creativity is our Fashion</h2>
							<p>ehicula maximus velit. Morbi non tincidunt purus, a hendrerit nisi. Vivamus elementum</p>
						</div>
					</div>
					<div class="col-lg-3 col-12">
						<div class="button">
							<a href="portfolio.html" class="bizwheel-btn">Our Portfolio</a>
						</div>
					</div>
				</div>
			</div>
		</section> --}}
		<!--/ End Call to action -->

		<!-- Services -->
		{{-- <section class="services section-bg section-space">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title style2 text-center">
							<div class="section-top">
								<h1><span>Creative</span><b>Service We Provide</b></h1><h4>We provide quality service &amp; support..</h4>
							</div>
							<div class="section-bottom">
								<div class="text-style-two">
									<p>Aliquam Sodales Justo Sit Amet Urna Auctor Scelerisquinterdum Leo Anet Tempus Enim Esent Egetis Hendrerit Vel Nibh Vitae Ornar Sem Velit Aliquam</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-4 col-12">
						<!-- Single Service -->
						<div class="single-service">
							<div class="service-head">
								<img src="https://via.placeholder.com/555x410" alt="#">
								<div class="icon-bg"><i class="fa fa-handshake-o"></i></div>
							</div>
							<div class="service-content">
								<h4><a href="service-business.html">Business Strategy</a></h4>
								<p>Cras venenatis, purus sit amet tempus mattis, justo nisi facilisis metus, in tempus ipsum ipsum eu ipsum. Class aptent taciti</p>
								<a class="btn" href="service-business.html"><i class="fa fa-arrow-circle-o-right"></i>View Service</a>
							</div>
						</div>
						<!--/ End Single Service -->
					</div>
					<div class="col-lg-4 col-md-4 col-12">
						<!-- Single Service -->
						<div class="single-service">
							<div class="service-head">
								<img src="https://via.placeholder.com/555x410" alt="#">
								<div class="icon-bg"><i class="fa fa-html5"></i></div>
							</div>
							<div class="service-content">
								<h4><a href="service-develop.html">Web Development</a></h4>
								<p>Cras venenatis, purus sit amet tempus mattis, justo nisi facilisis metus, in tempus ipsum ipsum eu ipsum. Class aptent taciti</p>
								<a class="btn" href="service-develop.html"><i class="fa fa-arrow-circle-o-right"></i>View Service</a>
							</div>
						</div>
						<!--/ End Single Service -->
					</div>
					<div class="col-lg-4 col-md-4 col-12">
						<!-- Single Service -->
						<div class="single-service">
							<div class="service-head">
								<img src="https://via.placeholder.com/555x410" alt="#">
								<div class="icon-bg"><i class="fa fa-cube"></i></div>
							</div>
							<div class="service-content">
								<h4><a href="service-market.html">Market Research</a></h4>
								<p>Cras venenatis, purus sit amet tempus mattis, justo nisi facilisis metus, in tempus ipsum ipsum eu ipsum. Class aptent taciti</p>
								<a class="btn" href="service-market.html"><i class="fa fa-arrow-circle-o-right"></i>View Service</a>
							</div>
						</div>
						<!--/ End Single Service -->
					</div>
				</div>
			</div>
		</section> --}}
		<!--/ End Services -->

		<!-- Portfolio -->
		{{-- <section class="portfolio section-space">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
						<div class="section-title default text-center">
							<div class="section-top">
								<h1><span>Project</span><b>Our Works</b></h1>
							</div>
							<div class="section-bottom">
								<div class="text">
									<p>Lorem Ipsum Dolor Sit Amet, Conse Ctetur Adipiscing Elit, Sed Do Eiusmod Tempor Ares Incididunt Utlabore. Dolore Magna Ones Baliqua</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="portfolio-menu">
							<!-- Portfolio Nav -->
							<ul id="portfolio-nav" class="portfolio-nav tr-list list-inline cbp-l-filters-work">
								<li data-filter="*" class="cbp-filter-item active">All</li>
								<li data-filter=".animation" class="cbp-filter-item">Animation</li>
								<li data-filter=".branding" class="cbp-filter-item">Branding</li>
								<li data-filter=".business" class="cbp-filter-item">Business</li>
								<li data-filter=".consulting" class="cbp-filter-item">Consulting</li>
								<li data-filter=".marketing" class="cbp-filter-item">Marketing</li>
								<li data-filter=".seo" class="cbp-filter-item">SEO</li>
							</ul>
							<!--/ End Portfolio Nav -->
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="portfolio-main">
							<div id="portfolio-item" class="portfolio-item-active">
								<div class="cbp-item business animation">
									<!-- Single Portfolio -->
									<div class="single-portfolio">
										<div class="portfolio-head overlay">
											<img src="https://via.placeholder.com/600x415" alt="#">
											<a class="more" href="portfolio-single.html"><i class="fa fa-long-arrow-right"></i></a>
										</div>
										<div class="portfolio-content">
											<h4><a href="portfolio-single.html">Creative Marketing</a></h4>
											<p>Business, Aniamtion</p>
										</div>
									</div>
									<!--/ End Single Portfolio -->
								</div>
								<div class="cbp-item seo consulting">
									<!-- Single Portfolio -->
									<div class="single-portfolio">
										<div class="portfolio-head overlay">
											<img src="https://via.placeholder.com/600x415" alt="#">
											<a class="more" href="portfolio-single.html"><i class="fa fa-long-arrow-right"></i></a>
										</div>
										<div class="portfolio-content">
											<h4><a href="portfolio-single.html">Creative Marketing</a></h4>
											<p>Seo, Consulting</p>
										</div>
									</div>
									<!--/ End Single Portfolio -->
								</div>
								<div class="cbp-item marketing seo">
									<!-- Single Portfolio -->
									<div class="single-portfolio">
										<div class="portfolio-head overlay">
											<img src="https://via.placeholder.com/600x415" alt="#">
											<a class="more" href="portfolio-single.html"><i class="fa fa-long-arrow-right"></i></a>
										</div>
										<div class="portfolio-content">
											<h4><a href="portfolio-single.html">Creative Marketing</a></h4>
											<p>Marketing, SEO</p>
										</div>
									</div>
									<!--/ End Single Portfolio -->
								</div>
								<div class="cbp-item animation branding">
									<!-- Single Portfolio -->
									<div class="single-portfolio">
										<div class="portfolio-head overlay">
											<img src="https://via.placeholder.com/600x415" alt="#">
											<a class="more" href="portfolio-single.html"><i class="fa fa-long-arrow-right"></i></a>
										</div>
										<div class="portfolio-content">
											<h4><a href="portfolio-single.html">Creative Marketing</a></h4>
											<p>Animation, Branding</p>
										</div>
									</div>
									<!--/ End Single Portfolio -->
								</div>
								<div class="cbp-item branding consulting">
									<!-- Single Portfolio -->
									<div class="single-portfolio">
										<div class="portfolio-head overlay">
											<img src="https://via.placeholder.com/600x415" alt="#">
											<a class="more" href="portfolio-single.html"><i class="fa fa-long-arrow-right"></i></a>
										</div>
										<div class="portfolio-content">
											<h4><a href="portfolio-single.html">Creative Marketing</a></h4>
											<p>Branding, Consulting</p>
										</div>
									</div>
									<!--/ End Single Portfolio -->
								</div>
								<div class="cbp-item business marketing">
									<!-- Single Portfolio -->
									<div class="single-portfolio">
										<div class="portfolio-head overlay">
											<img src="https://via.placeholder.com/600x415" alt="#">
											<a class="more" href="portfolio-single.html"><i class="fa fa-long-arrow-right"></i></a>
										</div>
										<div class="portfolio-content">
											<h4><a href="portfolio-single.html">Creative Marketing</a></h4>
											<p>Business</p>
										</div>
									</div>
									<!--/ End Single Portfolio -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> --}}
		<!--/ End Portfolio -->

		<!-- Testimonials -->
		{{-- <section class="testimonials section-space" style="background-image:url('https://via.placeholder.com/1500x700')">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-9 col-12">
						<div class="section-title default text-left">
							<div class="section-top">
								<h1><b>Our Satisfied Clients</b></h1>
							</div>
							<div class="section-bottom">
								<div class="text"><p>some of our great clients and their review</p></div>
							</div>
						</div>
						<div class="testimonial-inner">
							<div class="testimonial-slider">
								<!-- Single Testimonial -->
								<div class="single-slider">
									<ul class="star-list">
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
									</ul>
									<p>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the <strong>industry's standard</strong> dummy text ever sinsimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
									<!-- Client Info -->
									<div class="t-info">
										<div class="t-left">
											<div class="client-head"><img src="https://via.placeholder.com/70x70" alt="#"></div>
											<h2>Julias Dien <span>CEO / Creative IT</span></h2>
										</div>
										<div class="t-right">
											<div class="quote"><i class="fa fa-quote-right"></i></div>
										</div>
									</div>
								</div>
								<!-- / End Single Testimonial -->
								<!-- Single Testimonial -->
								<div class="single-slider">
									<ul class="star-list">
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
									</ul>
									<p>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the <strong>industry's standard</strong> dummy text ever sinsimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
									<!-- Client Info -->
									<div class="t-info">
										<div class="t-left">
											<div class="client-head"><img src="https://via.placeholder.com/70x70" alt="#"></div>
											<h2>Buman Panama <span>Founder, Jolace Group</span></h2>
										</div>
										<div class="t-right">
											<div class="quote"><i class="fa fa-quote-right"></i></div>
										</div>
									</div>
								</div>
								<!-- / End Single Testimonial -->
								<!-- Single Testimonial -->
								<div class="single-slider">
									<ul class="star-list">
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
									</ul>
									<p>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the <strong>industry's standard</strong> dummy text ever sinsimply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
									<!-- Client Info -->
									<div class="t-info">
										<div class="t-left">
											<div class="client-head"><img src="https://via.placeholder.com/70x70" alt="#"></div>
											<h2>Donald Bonam <span>Developer, Soft IT</span></h2>
										</div>
										<div class="t-right">
											<div class="quote"><i class="fa fa-quote-right"></i></div>
										</div>
									</div>
								</div>
								<!-- / End Single Testimonial -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> --}}
		<!--/ End Testimonials -->

		<!-- Latest Blog -->
		{{-- <section class="latest-blog section-space">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
						<div class="section-title default text-center">
							<div class="section-top">
								<h1><b> Nos auditeurs agréés</b></h1>
							</div>
							<div class="section-bottom">
								<div class="text">
									<p>Lorem Ipsum Dolor Sit Amet, Conse Ctetur Adipiscing Elit, Sed Do Eiusmod Tempor Ares Incididunt Utlabore. Dolore Magna Ones Baliqua</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="blog-latest blog-latest-slider">
							<div class="single-slider">
								<!-- Single Blog -->
								<div class="single-news ">
									<div class="news-head overlay">
										<span class="news-img" style="background-image:url('https://via.placeholder.com/700x530')"></span>
										<a href="#" class="bizwheel-btn theme-2">Read more</a>
									</div>
									<div class="news-body">
										<div class="news-content">
											<h3 class="news-title"><a href="blog-single.html">We Provide you Best &amp; Creative Consulting Service</a></h3>
											<div class="news-text"><p>Sed tempus pulvinar augue ut euismod. Donec a nisi volutpat, dignissim mauris eget. Quisque vitae nunc sit amet eros pellentesque tempus at sit amet sem. Maecenas feugiat mauris</p></div>
											<ul class="news-meta">
												<li class="date"><i class="fa fa-calendar"></i>April 2020</li>
												<li class="view"><i class="fa fa-comments"></i>0</li>
											</ul>
										</div>
									</div>
								</div>
								<!--/ End Single Blog -->
							</div>
							<div class="single-slider">
								<!-- Single Blog -->
								<div class="single-news ">
									<div class="news-head overlay">
										<span class="news-img" style="background-image:url('https://via.placeholder.com/700x530')"></span>
										<a href="#" class="bizwheel-btn theme-2">Read more</a>
									</div>
									<div class="news-body">
										<div class="news-content">
											<h3 class="news-title"><a href="blog-single.html">We Provide you Best &amp; Creative Consulting Service</a></h3>
											<div class="news-text"><p>Sed tempus pulvinar augue ut euismod. Donec a nisi volutpat, dignissim mauris eget. Quisque vitae nunc sit amet eros pellentesque tempus at sit amet sem. Maecenas feugiat mauris</p></div>
											<ul class="news-meta">
												<li class="date"><i class="fa fa-calendar"></i>April 2020</li>
												<li class="view"><i class="fa fa-comments"></i>0</li>
											</ul>
										</div>
									</div>
								</div>
								<!--/ End Single Blog -->
							</div>
							<div class="single-slider">
								<!-- Single Blog -->
								<div class="single-news ">
									<div class="news-head overlay">
										<span class="news-img" style="background-image:url('https://via.placeholder.com/700x530')"></span>
										<a href="#" class="bizwheel-btn theme-2">Read more</a>
									</div>
									<div class="news-body">
										<div class="news-content">
											<h3 class="news-title"><a href="blog-single.html">We Provide you Best &amp; Creative Consulting Service</a></h3>
											<div class="news-text"><p>Sed tempus pulvinar augue ut euismod. Donec a nisi volutpat, dignissim mauris eget. Quisque vitae nunc sit amet eros pellentesque tempus at sit amet sem. Maecenas feugiat mauris</p></div>
											<ul class="news-meta">
												<li class="date"><i class="fa fa-calendar"></i>April 2020</li>
												<li class="view"><i class="fa fa-comments"></i>0</li>
											</ul>
										</div>
									</div>
								</div>
								<!--/ End Single Blog -->
							</div>
							<div class="single-slider">
								<!-- Single Blog -->
								<div class="single-news ">
									<div class="news-head overlay">
										<span class="news-img" style="background-image:url('https://via.placeholder.com/700x530')"></span>
										<a href="#" class="bizwheel-btn theme-2">Read more</a>
									</div>
									<div class="news-body">
										<div class="news-content">
											<h3 class="news-title"><a href="blog-single.html">We Provide you Best &amp; Creative Consulting Service</a></h3>
											<div class="news-text"><p>Sed tempus pulvinar augue ut euismod. Donec a nisi volutpat, dignissim mauris eget. Quisque vitae nunc sit amet eros pellentesque tempus at sit amet sem. Maecenas feugiat mauris</p></div>
											<ul class="news-meta">
												<li class="date"><i class="fa fa-calendar"></i>April 2020</li>
												<li class="view"><i class="fa fa-comments"></i>0</li>
											</ul>
										</div>
									</div>
								</div>
								<!--/ End Single Blog -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> --}}
		<!--/ End Latest Blog -->

		<!-- Client Area -->
		<div class="clients section-bg">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="partner-slider">
							<!-- Single client -->
							<div class="single-slider">
								<div class="single-client">
									<a href="#" target="_blank"><img src="{{asset( 'assetfront/img/client/client-1.png')}}" alt="#"></a>
								</div>
							</div>
							<!--/ End Single client -->
							<!-- Single client -->
							<div class="single-slider">
								<div class="single-client">
									<a href="#" target="_blank"><img src="{{asset( 'assetfront/img/client/client-2.png') }}" alt="#"></a>
								</div>
							</div>
							<!--/ End Single client -->
							<!-- Single client -->
							<div class="single-slider">
								<div class="single-client">
									<a href="#" target="_blank"><img src="{{asset( 'assetfront/img/client/client-3.png')}}" alt="#"></a>
								</div>
							</div>
							<!--/ End Single client -->
							<!-- Single client -->
							<div class="single-slider">
								<div class="single-client">
									<a href="#" target="_blank"><img src="{{asset( 'assetfront/img/client/client-4.png')}}" alt="#"></a>
								</div>
							</div>
							<!--/ End Single client -->
							<!-- Single client -->
							<div class="single-slider">
								<div class="single-client">
									<a href="#" target="_blank"><img src="{{asset( 'assetfront/img/client/client-5.png')}}" alt="#"></a>
								</div>
							</div>
							<!--/ End Single client -->
							<!-- Single client -->
							<div class="single-slider">
								<div class="single-client">
									<a href="#" target="_blank"><img src="{{asset( 'assetfront/img/client/client-6.png')}}" alt="#"></a>
								</div>
							</div>
							<!--/ End Single client -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Client Area -->

		<!-- Footer -->
		<footer class="footer" style="background-image:url('img/map.png')">

			<!-- Copyright -->
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="copyright-content">
								<!-- Copyright Text -->
								<p>© Copyright tout droit réservé ANEREE</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Copyright -->
		</footer>
<!-- INTERNAL  DATA TABLE JS-->
		{{-- <script src="{{asset('assetadmin/plugins/datatable/jquery.dataTables.min.js')}}"></script> --}}
		{{-- <script src="{{asset('assetadmin/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script> --}}
		{{-- <script src="{{asset('assetadmin/plugins/datatable/datatable.js')}}"></script>
		<script src="{{asset('assetadmin/plugins/datatable/dataTables.responsive.min.js')}}"></script>
		<script src="{{asset('assetadmin/plugins/datatable/fileexport/dataTables.buttons.min.js')}}"></script>
		<script src="{{asset('assetadmin/plugins/datatable/fileexport/buttons.bootstrap4.min.js')}}"></script> --}}
		{{-- <script src="{{asset('assetadmin/plugins/datatable/fileexport/jszip.min.js')}}"></script>
		<script src="{{asset('assetadmin/plugins/datatable/fileexport/pdfmake.min.js')}}"></script>
		<script src="{{asset('assetadmin/plugins/datatable/fileexport/vfs_fonts.js')}}"></script>
		 <script src="{{asset('assetadmin/plugins/datatable/fileexport/buttons.html5.min.js')}}"></script>
		<script src="{{asset('assetadmin/plugins/datatable/fileexport/buttons.print.min.js')}}"></script>
		<script src="{{asset('assetadmin/plugins/datatable/fileexport/buttons.colVis.min.js')}}"></script> --}}
		<!-- Jquery JS -->
		<script src="{{asset('assetfront/js/jquery.min.js')}}"></script>
		<script src="{{asset('assetfront/js/jquery-migrate-3.0.0.js')}}"></script>

		<!-- Popper JS -->
		<script src="{{asset('assetfront/js/popper.min.js')}}"></script>
		<!-- Bootstrap JS -->
		<script src="{{asset('assetfront/js/bootstrap.min.js')}}"></script>
		<!-- Modernizr JS -->
		<script src="{{asset('assetfront/js/modernizr.min.js')}}"></script>
		<!-- ScrollUp JS -->
		<script src="{{asset('assetfront/js/scrollup.js')}}"></script>
		<!-- FacnyBox JS -->
		<script src="{{asset('assetfront/js/jquery-fancybox.min.js')}}"></script>
		<!-- Cube Portfolio JS -->
		<script src="{{asset('assetfront/js/cubeportfolio.min.js')}}"></script>
		<!-- Slick Nav JS -->
		<script src="{{asset('assetfront/js/slicknav.min.js')}}"></script>
		<!-- Slick Nav JS -->
		<script src="{{asset('assetfront/js/slicknav.min.js')}}"></script>
		<!-- Slick Slider JS -->
		<script src="{{asset('assetfront/js/owl-carousel.min.js')}}"></script>
		<!-- Easing JS -->
		<script src="{{asset('assetfront/js/easing.js')}}"></script>
		<!-- Magnipic Popup JS -->
		<script src="{{asset('assetfront/js/magnific-popup.min.js')}}"></script>
		<!-- Active JS -->
		<script src="{{asset('assetfront/js/active.js')}}"></script>
        {{-- data-table --}}
        <script src="{{asset('assetfront/js/jquery.min.js')}}"></script>
        <script src="{{asset('assetfront/plugins/DataTables/DataTables-1.10.25/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assetfront/plugins/DataTables/DataTables-1.10.25/js/dataTables.bootstrap4.min.js')}}"></script>
        <script>
            // $(document).ready(function(){
            // $("#search").on("keyup", function() {
            //     var value = $(this).val().toLowerCase();
            //     $("#secteur .line").filter(function() {
            //     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            //     });
            // });
            // });
            $('.message a').click(function(){
                $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
                });
            $(".list-group .list-group-item").click(function(e) {
                $(".list-group .list-group-item").removeClass("active");
                $(e.target).addClass("active");
                });
                jQuery(document).ready(function($) {
                $('*[data-href]').on('click', function() {
                    // window.location = $(this).data("href");
                    // var url = $(this).attr('href');
                    window.open($(this).data("href"), '_blank');
                });
            });
            // $(document).ready(function() {
                $('#secteur').DataTable();
            // } );
        </script>
	</body>
</html>
