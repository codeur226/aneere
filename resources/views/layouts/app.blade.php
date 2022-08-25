<!DOCTYPE html>
<html lang="fr">
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'ANEREE') }}</title>
		<title>ANEREE</title>
		<link rel="icon" type="image/favicon.png" href="{{asset('assetfront/img/favicon.png')}}">
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        {{-- Data-table --}}
        <link href="{{asset('assetfront/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assetfront/plugins/DataTables/DataTables-1.10.25/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
        <link href="{{asset('assetfront/css/animate.min.css')}}" rel="stylesheet"/>
		<link href="{{asset('assetfront/css/bootstrap.min.css')}}" rel="stylesheet"/>
		<link href="{{asset('assetfront/css/cubeportfolio.min.css')}}" rel="stylesheet"/>
		<link href="{{asset('assetfront/css/font-awesome.css')}}" rel="stylesheet"/>
		<link href="{{asset('assetfront/css/jquery.fancybox.min.css')}}" rel="stylesheet"/>
		<link href="{{asset('assetfront/css/magnific-popup.min.css')}}" rel="stylesheet"/>
		<link href="{{asset('assetfront/css/owl-carousel.min.css')}}" rel="stylesheet"/>
		<link href="{{asset('assetfront/css/slicknav.min.css')}}" rel="stylesheet"/>
		<!-- Bizwheel Stylesheet -->
		<link href="{{asset('assetfront/css/reset.css')}}" rel="stylesheet"/>
		<link href="{{asset('assetfront/css/style.css')}}" rel="stylesheet"/>
		<link href="{{asset('assetfront/css/responsive.css')}}" rel="stylesheet"/>
        {{-- @if((Route::current()->getName() ==='consommateur.home')||(Route::current()->getName() ==='consommateur.informations')||(Route::current()->getName() ==='consommateur.password_change'))
           <link rel="stylesheet" href="{{asset('css/style.css')}}">
            @endif --}}


	</head>
	<body id="bg">
		<div class="preeloader">
			<div class="preloader-spinner"></div>
		</div>
	  @include('pages.front-office.partials._header-nav')

        <main>{{ $slot }}</main>
        {{-- <main>   @yield('content')</main> --}}

		<!-- Client Area -->
		<div class="clients section-bg bodyconn">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="partner-slider">
							<!-- Single client -->
							<div class="single-slider">
								<div class="single-client">
									{{-- <a href="#" target="_blank"><img src="{{asset( 'assetfront/img/client/client-1.png')}}" alt="#"></a> --}}
								</div>
							</div>
							<!--/ End Single client -->
							<!-- Single client -->
							<div class="single-slider">
								<div class="single-client">
									{{-- <a href="#" target="_blank"><img src="{{asset( 'assetfront/img/client/client-2.png') }}" alt="#"></a> --}}
								</div>
							</div>
							<!--/ End Single client -->
							<!-- Single client -->
							<div class="single-slider">
								<div class="single-client">
									{{-- <a href="#" target="_blank"><img src="{{asset( 'assetfront/img/client/client-3.png')}}" alt="#"></a> --}}
								</div>
							</div>
							<!--/ End Single client -->
							<!-- Single client -->
							<div class="single-slider">
								<div class="single-client">
									{{-- <a href="#" target="_blank"><img src="{{asset( 'assetfront/img/client/client-4.png')}}" alt="#"></a> --}}
								</div>
							</div>
							<div class="single-slider">
								<div class="single-client">
									{{-- <a href="#" target="_blank"><img src="{{asset( 'assetfront/img/client/client-5.png')}}" alt="#"></a> --}}
								</div>
							</div>
							<div class="single-slider">
								<div class="single-client">
									{{-- <a href="#" target="_blank"><img src="{{asset( 'assetfront/img/client/client-6.png')}}" alt="#"></a> --}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Client Area -->
       @include('pages.front-office.partials._footer')

	</body>
</html>
