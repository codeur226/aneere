<x-master-layout  title=" | Thème">
   
<!-- Main Container -->
<div id="main-container">

@section("pageTitle")
{{ $title }}
@endsection

@section('sectionTitle')
<li class="breadcrumb-item"><a href="{{ route('audits.show', $appelectrique->audit_id) }}">{{ "Audit N° : ".$appelectrique->audit_id }}</a></li>
<li class="breadcrumb-item"><a href="{{ route("fiche3_index",$appelectrique->audit_id) }}">COLLECTE DE DONNEES SUR LES APPAREILS ELECTRIQUES</a></li>
<li class="breadcrumb-item active" aria-current="page" class="card-title mr-5 text-center"><a href=""> Modifier la fiche </a></li> 
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
                <h3 class="card-title">Mise à jour de la fiche</h3>
              </div>
                
                <div class="card-body">

                  <form action="{{ route('appelectriques.update',$appelectrique) }}" method="post" enctype="multipart/form-data" id="">
                    @method("PUT")
                    @include('pages.back-office.appelectriques._form_edit')
                  </form>
               
                </div>

                 
               
               </div>
            <!-- END Horizontal Form Content -->
        </div>
        <!-- END Horizontal Form Block -->
 


        </div>
    </div>


</x-master-layout>