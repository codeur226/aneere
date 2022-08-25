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
                                    <img src="{{asset('assetfront/img/logo.png')}}" alt="#">
                                </a>
                            </div>
                    </div>
                    <div class="topbar-right mt-4 d-inline">
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
{{-- 
                                        <li>
                                            <a href="{{ route('consommateur-password') }}">Mon compte</a>
                                        </li> --}}
                                        <li>
                                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout').submit()">Deconnexion</a>
                                            <form id="logout" method="POST" action="{{ route('logout') }}">
                                                @csrf

                                            </form>
                                        </li>
                                    </ul>
                                </li></ul>
                                    @else
                                    <div class="button mr-3" >
                                    <a href="{{ route('login') }}" class="btn btn-primary">Se connecter</a>
                                    </div>
                                    {{-- @if (Route::has('register'))
                                    <div class="button">
                                    <a href="{{ route('register') }}" class="bizwheel-btn">S'inscrire</a>
                                    </div>
                                    @endif --}}
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
                                                        {{-- <li><a href="{{ url('/') }}">Accueil</a></li> --}}
                                                        <li><a href="{{ route('reglementations.search',-1) }}">Règlementations</a></li>
                                                        <li><a href="{{ route('auditeurs.search',-1) }}">Auditeurs agréés</a></li>
                                                        @can('etablissement')
                                                        <li><a href="{{ route('consommateur.home') }}">Mon espace</a>
                                                        </li>
                                                        @endcan
                                                        <li><a href="{{ route('equipements.search',-1) }}">Equipements</a></li>
                                                        {{-- <li class="icon-active"><a href="#">Nos services</a>
                                                            <ul class="sub-menu">
                                                                <li><a href="about.html">Audit énergetique</a></li>
                                                            </ul>
                                                        </li> --}}
                                                        <li><a href="services.html">Nous contacter</a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </nav>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
