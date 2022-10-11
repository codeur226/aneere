<div class="page-main" >
   @include('pages.back-office.partials._menu')
   @include('pages.back-office.partials._nav')
    <div class="app-content" >
        <div class="side-app">

            <!-- PAGE-HEADER -->
            <div class="page-header">
                <div class="container">
                    <div class="container">
                        <div class="mx-auto page-title" style="width:1000px; display:flex; align-items:center; justify-content:center;">@yield('pageTitle')</div>
                    </div>
                    <ol class="breadcrumb">
                        {{-- <li class="breadcrumb-item"><a href="accueil">Accueil</a></li> --}}
                        @yield('sectionTitle')

                    </ol>
                </div>
                    <div class="ml-auto pageheader-btn">
                          <div class="btn-list">
                             @yield("buttons")
                            </div>
                    </div>
            </div>
            <!-- PAGE-HEADER END -->
            {{-- @if(session("success"))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ session("success") }}
                </div>
            @endif
                @if(session("error"))
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ session("error") }}
                </div>
               @endif
                @if(session("warning"))
                <div class="alert alert-warning" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ session("warning") }}
                </div>
               @endif --}}
           {{ $slot }}
        </div>
    </div>
    <!-- CONTAINER END -->
</div>


