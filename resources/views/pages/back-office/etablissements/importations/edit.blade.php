@section("pageTitle")
{{ $title }}
@endsection
@section('sectionTitle')
<li class="breadcrumb-item"><a href="{{ route('importations.index',['importation'=>$temporaire->importation->id]) }}">Importation</a></li>
<li class="breadcrumb-item active" aria-current="page">Mise à jour consommateur</li>
@endsection
<x-master-layout>

   <div class="row">
    <div class=" col-md-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Mise à jour consommateur</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('temporaires.update',$temporaire) }}" method="post" >
                    @method("PUT")
                   @include('pages.back-office.etablissements.importations._formulaire', ["btnTexte" => "Enregistrer","btnCancel" => "Annuler"])
                </form>
                 
            </div>

        </div>
    </div><!-- COL END -->
</div>
<!-- ROW-1 End-->

</x-master-layout>

