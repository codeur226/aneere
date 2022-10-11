<x-master-layout  title=" | Thème">
   
<!-- Main Container -->
<div id="main-container">

@section("pageTitle")
{{ $title }}
@endsection

@section('sectionTitle')
<li class="breadcrumb-item"><a href="{{ route('collectes.index') }}">COLLECTE DE DONNEES SUR LES APPAREILS ELECTRIQUES</a></li>
<li class="breadcrumb-item active" aria-current="page" class="card-title mr-5 text-center"><a href="{{ route('appelectriques.index') }}"> Listes des données pour cette audit </a></li> 
@endsection

<div class="row">
    <div class="container">
     <div class="col-lg-12">
         @include('pages.back-office.partials._message_flash')

         {{-- <div class="ml-auto pageheader-btn"> --}}
            {{-- <div class="ml-auto pageheader-btn">
            
            </div> --}}

     </div>
    </div>
    
    
    </div>
 </div>

 
     <!-- Page content -->
     <div id="page-content">
       
     <!-- Horizontal Form Block -->
     <div class="block">
            <!-- Horizontal Form Title -->
            <div class="block-title">
                {{--<div class="block-options pull-right">
                    <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">No Borders</a>
                </div>--}}
                        {{-- <h2>Ajouterunthème</h2> --}}
                        
                </div>
            <!-- END Horizontal Form Title -->

            <!-- Horizontal Form Content -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mr-5 text-center"><a href="{{ route('fiche3_index',$audit_id) }}" class="btn btn-primary btn-icon text-white">
                       <span>
                           <i class="fa fa-book"></i>
                       </span>Liste des données des appareils électiques pour cet audit
                   </a></h3>
                     {{-- ordinateur, imprimante, photocopieuse, congélateur, projecteur, etc --}}
                </div>
                
                <div class="card-body">
                 
                    
               
                      <form action="{{ route('appelectriques.store') }}" method="POST" enctype="multipart/form-data" id="">
                        @foreach($fiches as $fiche)
                    <div class="form-group" >
                      <input type="hidden" id="fiche" value="{{ old('fiche') ?? $fiche->id}}" name="fiche" class="form-control">
                    </div>
                    @endforeach
                    <div class="form-group" >
                      <input type="hidden" id="audit" value="{{ old('audit') ?? $audit_id}}" name="audit" class="form-control">
                      </div>
                        @method("POST")
                    @include('pages.back-office.appelectriques._form')

                  </form>
               
                  <form id="{{ $audit_id }}" method="POST" enctype="multipart/form-data" action="{{ route("terminerAudit",$audit_id) }}">
                    @csrf
                    @method("GET")
                  </form>
               
                 </div>

                 
               
               </div>
            <!-- END Horizontal Form Content -->
        </div>
        <!-- END Horizontal Form Block -->
 


        </div>
    </div>


</x-master-layout>