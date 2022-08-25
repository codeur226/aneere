@section("pageTitle")
{{ $title }}
@endsection

@section('sectionTitle')
{{-- <li class="breadcrumb-item active" aria-current="page">Tableau de bord</li> --}}

@endsection
	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="{{asset('assets/css/components.min.css')}}" rel="stylesheet" type="text/css">	 --}}
	{{-- <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>	
	<script type="text/javascript" src="{{asset('assetadmin/js/echarts.js')}}"></script> --}}

<x-master-layout>

	<!-- Row -->
	<div class="row">
		{{-- Nombre de société d'audit agréé --}}
		<div class="col-xl-3 col-sm-6">
			<div class="card">
				<div class="card-body card-body-entete">
					<div class="row mb-1">
						<div class="col">
							{{-- <p class="mb-1">Nombre de sociétés agrées</p> --}}
							<h3 class="mb-0 number-font">{{ getnombresocieteAgree() }}</h3>
						</div>
						<div class="col-auto mb-0">
							<div class="dash-icon text-orange">
								<i class="fa fa-university"></i>
							</div>
						</div>
					</div>
					<span class="fs-12 text-muted"> <strong></strong><span class="fs-12 ml-0 mt-1" style="color: aliceblue">Sociétés agrées</span> <br> 
					<span style="font-family: Roboto, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: medium; color: rgb(255, 255, 255)">au {{ now()->format('d/m/Y') }}</span></span>

					{{-- <span class="fs-12 text-muted"> <strong>2.6%</strong><i class="mdi mdi-arrow-up"></i> <span class="text-muted fs-12 ml-0 mt-1">than last week</span></span> --}}
				</div>
			</div>
		</div>

{{-- Nombre de structures auditées --}}
		<div class="col-xl-3 col-sm-6">
			<div class="card">
				<div class="card-body card-body-entete">
					<div class="row mb-1">
						<div class="col">
							{{-- <p class="mb-1">Nombre de structures auditées</p> --}}
							<h3 class="mb-0 number-font">{{ getauditsRealise() }}</h3>
						</div>
						<div class="col-auto mb-0">
							<div class="dash-icon text-secondary">
								<i class="fa fa-suitcase"></i>
								{{-- <i class="bx bxs-wallet"></i>fa fa-suitcase --}}
							</div>
						</div>
					</div>
					<span class="fs-12 text-muted"> <strong></strong><span class="fs-12 ml-0 mt-1" style="color: aliceblue">Nombre de structures auditées</span>
					<br> <span style="font-family: Roboto, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: medium; color: rgb(255, 255, 255)">au {{ now()->format('d/m/Y') }}</span>
				
					{{-- @foreach (getStrutuctureAssujetis() as $item)
					{{ $ }}
						
					@endforeach --}}
				
				
				</span>
				</div>
			</div>
		</div>



{{--  Nombre d'audits à réaliser--}}

	{{-- audits déclarés en attente d'affectation --}}
		<div class="col-xl-3 col-sm-6">
			<div class="card">
				<div class="card-body card-body-entete">
					<div class="row mb-1">
						<div class="col">
							{{-- <p class="mb-1">audits déclarés en attente d'affectation</p> --}}
							<h3 class="mb-0 number-font">{{ getAttenteAffectation() }}</h3>
						</div>
						<div class="col-auto mb-0">
							<div class="dash-icon text-secondary">
								<i class="fa fa-coffee"></i>
							</div>
						</div>
					</div>
					<span class="fs-12 text-muted"> <strong></strong><span class="fs-12 ml-0 mt-1" style="color: aliceblue">audits en attente d'affectation</span>
					<br> <span style="font-family: Roboto, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: medium; color: rgb(255, 255, 255)">au {{ now()->format('d/m/Y') }}</span></span>

					{{-- <span class="fs-12 text-muted"> <strong>0.15%</strong><i class="mdi mdi-arrow-down"></i> <span class="text-muted fs-12 ml-0 mt-1">than last week</span></span> --}}
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-sm-6">
			<div class="card">	<div class="card-body card-body-entete">
					<div class="row mb-1">
						<div class="col">
							{{-- <p class="mb-1">Total Expenses</p> --}}
							<h3 class="mb-0 number-font">{{ getnombreAuditer() }}</h3>
						</div>
						<div class="col-auto mb-0">
							<div class="dash-icon text-warning">
								{{-- <i class="bx bxs-credit-card-front"></i> --}}
								<div class="dash-icon text-secondary1">
									<i class="fa fa-sticky-note-o"></i>
								</div>
							</div>
						</div>
					</div>
			<span class="fs-12 text-muted"> <strong></strong><span class="fs-12 ml-0 mt-1" style="color: aliceblue">Audits à réaliser</span>
			<br> <span style="font-family: Roboto, Cochin, Georgia, Times, 'Times New Roman', serif; font-size: medium; color: rgb(255, 255, 255)">au {{ now()->format('d/m/Y') }}</span></span>

					{{-- <span class="fs-12 text-muted"> <strong>1.05%</strong><i class="mdi mdi-arrow-up"></i> <span class="text-muted fs-12 ml-0 mt-1">than last week</span></span> --}}
				</div>
			
			</div>
		</div>
	</div> 
	<!-- Row-1 End -->

	<!-- ROW-2 -->
	 <div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
			<div class="card">
				{{-- <div class="card-header">
					<h3 class="card-title">Proportion des réalisations des audits</h3>
				</div> --}}
				<div class="card-body">
				</div>
					{{-- <div class="">
						<canvas id="canvasDoughnut" class="chartsh"></canvas>
					</div>
					<div class="mt-5 fs-12">
						<div class="float-left mr-3"><span class="dot-label bg-primary mr-1"></span><span class="">Réalisé par ANEREE</span></div>
						<div class="float-left mr-3"><span class="dot-label bg-secondary mr-1"></span><span class="">Womens</span></div>
						<div class="float-left mr-3"><span class="dot-label bg-secondary1 mr-1"></span><span class="">Kids</span></div>
						<div class="float-left mr-3"><span class="dot-label bg-canvas1 mr-1"></span><span class="">Electronics</span></div>
						<div class="float-left"><span class="dot-label bg-canvas2 mr-1"></span><span class="">Home & Furniture</span></div>
					</div> --}}


					<!-- L'élément "#mon-chart" où placer le chart height: 315px; width: 400px -->
	<div id="mon-chart" style="height: 350px; width: 800px;" ></div>
	<div id="structures-assujettis" style="height: 350px; width: 800px;" ></div>





				</div>
			</div>
		
	
	</div>
</div>
	<!-- ROW-2 END -->

	<!-- Row-3 -->
	{{-- <div class="row">


		<div class="col-lg-6 col-md-12 col-sm-12 col-xl-6">
			<div class="card overflow-hidden">
				<div class="card-header">
					<h3 class="card-title">Monthly Sales Statistics</h3>
				</div>
				<div class="card-body">
					<div id="sales" class=""></div>
				</div>
			</div>
		</div>


		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
			<div class="card overflow-hidden">
				<div class="card-body pb-0">
					<div class="">
						<div class="d-flex">
							<div class="">
								<p class="mb-1">Monthly Sales</p>
								<h2 class="mb-1  number-font">42,567</h2>
								<p class="text-muted  mb-0"><span class="text-muted fs-13 mr-2">(+43%)</span> than Last week</p>
							</div>
							<div class="ml-auto">
								<i class="bx bxs-dollar-circle fs-40 text-secondary"></i>
							</div>
						</div>
					</div>




					
				</div>
				<div class="chart-wrapper">
					<canvas id="widgetChart1" class=""></canvas>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
			<div class="card overflow-hidden">
				<div class="card-header">
					<h3 class="card-title">Sales Overview</h3>
				</div>
				<div class="card-body">
					<div class="mb-5">
						<p class="mb-2">Total Profit<span class="float-right"><b>51,234</b><span class="text-muted ml-1">(80%)</span></span></p>
						<div class="progress h-2">
							<div class="progress-bar bg-primary w-80 " role="progressbar"></div>
						</div>
					</div>
					<div class="mb-5">
						<p class="mb-2">Total Income<span class="float-right"><b>12,786</b><span class="text-muted ml-1">(50%)</span></span></p>
						<div class="progress h-2">
							<div class="progress-bar bg-secondary w-50 " role="progressbar"></div>
						</div>
					</div>
					<div class="mb-0">
						<p class="mb-2">Total Expenses<span class="float-right"><b>32,167</b><span class="text-muted ml-1">(60%)</span></span></p>
						<div class="progress h-2">
							<div class="progress-bar bg-secondary1 w-60 " role="progressbar"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div> --}}


{{-- 
	<div class="d-flex justify-content-center">
		<img src="{{ asset('assetadmin/images/brand/logo.png') }}" class="header-brand-img light-logo1" alt="logo3">
		<a class="header-brand1" href="#">
            <img src="{{asset('assetadmin/images/brand/logo-1.png')}}" class="header-brand-img toggle-logo" alt="logo1">
            <img src="{{asset('assetadmin/images/brand/logo-2.png')}}" class="header-brand-img light-logo" alt="logo2">
             <img src="{{ asset('assetadmin/images/brand/logo.png') }}" class="header-brand-img light-logo1" alt="logo3">
        </a>
		<img src="{{asset('assetadmin/images/brand/logo.png')}}" class="header-brand-img light-logo" alt="logo2">
		<a href="#" target="_blank"><img src="{{asset( 'assetfront/img/client/client-3.png')}}" alt="#"></a>
						
	</div> --}}


</div>




<!-- Importation de l'API AJAX Google Charts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	// Le code du Chart
	google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Audit', 'nombre'],

      [ "Réalisés par l'ANEREE", {{ $auditsaneree }} ], // Proportion des audits réalisés par ANEREE 
      [ "Réalisés lar les privées", {{ $auditsprive }} ], // Proportion des audits réalisés par les privées
      [ "Audits non réalisés", {{ $auditsnoneffectue }} ], // Proportion des audits réalisés non réalisés
      [ "Réalisés par les privées et validés par ANEREE", {{ $auditsprivevalides }} ], // Proportion des audits réalisés par les privées et validés par ANEREE

    
    ]);

    var options = {
      title: 'Proportion des audits réalisés par l’ANEREE et par les privées',
      is3D : true // En 3D
    };

    // On crée le chart en indiquant l'élément où le placer "#mon-chart"
    var chart = new google.visualization.PieChart(document.getElementById('mon-chart'));

    // On désine le chart avec les données et les options
    chart.draw(data, options);
  }
</script>








<script type="text/javascript">
	// Le code du Chart
	google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Audit', 'nombre'],

	  [ "Audit Bâtiment", {{ $batiment }} ], // Proportion des produits de la catégorie
      [ "Audit Industrie", {{ $industrie }} ], // Proportion des produits de la catégorie
      [ "Audit Transport", {{ $transport}} ], // Proportion des produits de la catégorie

    
    ]);

var options = {
 title: 'Nombre de structures assujettis à l’audit energetique par domaines',
  is3D : true // En 3D
};

// On crée le chart en indiquant l'élément où le placer "#mon-chart"
var chart = new google.visualization.PieChart(document.getElementById('structures-assujettis'));

// On désine le chart avec les données et les options
chart.draw(data, options);
}
</script>





</x-master-layout>
{{-- <script type="text/javascript">
	var pie_basic_element = document.getElementById('pie_basic');
	if (pie_basic_element) {
		var pie_basic = echarts.init(pie_basic_element);
		pie_basic.setOption({
			color: [
				'#2ec7c9','#b6a2de','#5ab1ef','#ffb980','#d87a80',
				'#8d98b3','#e5cf0d','#97b552','#95706d','#dc69aa',
				'#07a2a4','#9a7fd1','#588dd5','#f5994e','#c05050',
				'#59678c','#c9ab00','#7eb00a','#6f5553','#c14089'
			],          
			
			textStyle: {
				fontFamily: 'Roboto, Arial, Verdana, sans-serif',
				fontSize: 13
			},
	
			title: {
				text: 'Pie Chart Example',
				left: 'center',
				textStyle: {
					fontSize: 17,
					fontWeight: 500
				},
				subtextStyle: {
					fontSize: 12
				}
			},
	
			tooltip: {
				trigger: 'item',
				backgroundColor: 'rgba(0,0,0,0.75)',
				padding: [10, 15],
				textStyle: {
					fontSize: 13,
					fontFamily: 'Roboto, sans-serif'
				},
				formatter: "{a} <br/>{b}: {c} ({d}%)"
			},
	
			legend: {
				orient: 'horizontal',
				bottom: '0%',
				left: 'center',                   
				data: ['Fruit', 'Vegitable','Grains'],
				itemHeight: 8,
				itemWidth: 8
			},
	
			series: [{
				name: 'Product Type',
				type: 'pie',
				radius: '70%',
				center: ['50%', '50%'],
				itemStyle: {
					normal: {
						borderWidth: 1,
						borderColor: '#fff'
					}
				},
				data: [
					{value: 100, name: 'Fruit'},
					{value: 39, name: 'Vegitable'},
					{value: 60, name: 'Grains'}
				]
			}]
		});
	}
	</script> --}}