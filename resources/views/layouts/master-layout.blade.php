<!doctype html>
<html lang="en" >
    <head>

        <!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="">

		<!-- FAVICON -->
		<link rel="shortcut icon" type="image/x-icon" href="../../assets/images/brand/favicon.ico" />

		<!-- TITLE -->
		<title>{{ config('app.name', "Energie") }} - </title>

		<!-- BOOTSTRAP CSS -->
		<link href="{{asset('assetadmin/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
		<link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css"/>
        <script src="{{asset('assetadmin/js/jquery-3.4.1.min.js')}}"></script>

		<!-- STYLE CSS -->
        <link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css"/>
		<link href="{{asset('assetadmin/css/style.css')}}" rel="stylesheet"/>
		<link href="{{asset('assetadmin/css/skin-modes.css')}}" rel="stylesheet"/>
		<link href="{{asset('assetadmin/css/monCss.css')}}" rel="stylesheet"/>

		<link href="{{asset('assetadmin/css/dark-style.css')}}" rel="stylesheet"/>

		<!-- SIDE-MENU CSS -->
		<link href="{{asset('assetadmin/css/sidemenu.css')}}" rel="stylesheet">
		<!-- INTERNAL  DATA TABLE CSS-->
		<link href="{{asset('assetadmin/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet"/>
		<link href="{{asset('assetadmin/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet" />
		<link href="{{asset('assetadmin/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet" />
		<!--PERFECT SCROLL CSS-->
		<link href="{{asset('assetadmin/plugins/p-scroll/perfect-scrollbar.css')}}" rel="stylesheet"/>
        <link href="{{ asset('assetadmin/plugins/single-page/css/main.css') }}" rel="stylesheet" type="text/css">

		<!-- CUSTOM SCROLL BAR CSS-->
		<link href="{{asset('assetadmin/plugins/scroll-bar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>

		<!--- FONT-ICONS CSS -->
		<link href="{{asset('assetadmin/css/icons.css')}}" rel="stylesheet"/>
		<link href="{{asset('assetadmin/css/progressbar.css')}}" rel="stylesheet"/>

		<!-- SIDEBAR CSS -->
		<link href="{{asset('assetadmin/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
		<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">




	</head>

	<body class="app sidebar-mini">

		<div id="global-loader">
			<img src="{{asset('assetadmin/images/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<div class="page" >
			@include('pages.back-office.partials.menu-contenu')
			@include('pages.back-office.partials._footer')
		</div>
		<!-- BACK-TO-TOP -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

		<!-- JQUERY JS -->
		<script src="{{asset('assetadmin/js/monJs.js')}}"></script>
		<script src="{{asset('js/app.js')}}"></script>
		<script>
			$(function () {
			$('[data-toggle="tooltip"]').tooltip()
			})

	   </script>
		<!-- BOOTSTRAP JS -->
		<script src="{{asset('assetadmin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('assetadmin/plugins/bootstrap/js/popper.min.js')}}"></script>

		<!-- INTERNAL  DATA TABLE JS-->
		<script src="{{asset('assetadmin/plugins/datatable/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('assetadmin/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
		<script src="{{asset('assetadmin/plugins/datatable/datatable.js')}}"></script>
		<script src="{{asset('assetadmin/plugins/datatable/dataTables.responsive.min.js')}}"></script>
		<script src="{{asset('assetadmin/plugins/datatable/fileexport/dataTables.buttons.min.js')}}"></script>
		<script src="{{asset('assetadmin/plugins/datatable/fileexport/buttons.bootstrap4.min.js')}}"></script> --}}
		<script src="{{asset('assetadmin/plugins/datatable/fileexport/jszip.min.js')}}"></script>
		<script src="{{asset('assetadmin/plugins/datatable/fileexport/pdfmake.min.js')}}"></script>
		<script src="{{asset('assetadmin/plugins/datatable/fileexport/vfs_fonts.js')}}"></script>
		 <script src="{{asset('assetadmin/plugins/datatable/fileexport/buttons.html5.min.js')}}"></script>
		<script src="{{asset('assetadmin/plugins/datatable/fileexport/buttons.print.min.js')}}"></script>
		<script src="{{asset('assetadmin/plugins/datatable/fileexport/buttons.colVis.min.js')}}"></script>

		<!-- SPARKLINE JS-->
		<script src="{{asset('assetadmin/js/jquery.sparkline.min.js')}}"></script>

		<!-- CHART-CIRCLE JS-->
		<script src="{{asset('assetadmin/js/circle-progress.min.js')}}"></script>

		<!-- RATING STARJS -->
		<script src="{{asset('assetadmin/plugins/rating/jquery.rating-stars.js')}}"></script>


		<!-- EVA-ICONS JS -->
		<script src="{{asset('assetadmin/iconfonts/eva.min.js')}}"></script>

		<!-- INTERNAL CHARTJS CHART JS -->
		<script src="{{asset('assetadmin/plugins/chart/Chart.bundle.js')}}"></script> --}}
		 <script src="{{asset('assetadmin/plugins/chart/utils.js')}}"></script>

		<!-- INTERNAL PIETY CHART JS -->
		 <script src="{{asset('assetadmin/plugins/peitychart/jquery.peity.min.js')}}"></script>
		<script src="{{asset('assetadmin/plugins/peitychart/peitychart.init.js')}}"></script>

		<!-- SIDE-MENU JS-->
		<script src="{{asset('assetadmin/plugins/sidemenu/sidemenu.js')}}"></script>

		<!-- PERFECT SCROLL BAR js-->
		<script src="{{asset('assetadmin/plugins/p-scroll/perfect-scrollbar.min.js')}}"></script>
		<script src="{{asset('assetadmin/plugins/sidemenu/sidemenu-scroll.js')}}"></script>

		<!-- CUSTOM SCROLLBAR JS-->
		<script src="{{asset('assetadmin/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

		<!-- SIDEBAR JS -->
		<script src="{{asset('assetadmin/plugins/sidebar/sidebar.js')}}"></script>

		<!-- INTERNAL APEXCHART JS -->
		<script src="{{asset('assetadmin/js/apexcharts.js')}}"></script>

		<!--INTERNAL  INDEX JS -->
		<script src="{{asset('assetadmin/js/index1.js')}}"></script>

		<!-- CUSTOM JS -->
		<script src="{{asset('assetadmin/js/custom.js')}}"></script>

	</body>
</html>
