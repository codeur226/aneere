@section("pageTitle")
{{ $title }}
@endsection
@section('sectionTitle')
<li class="breadcrumb-item"><a href="{{ route('equipements.index') }}">equipements</a></li>
<li class="breadcrumb-item active" aria-current="page">Mise à jour</li>
@endsection
<x-master-layout>

   <div class="row">
    <div class=" col-md-8 offset-1">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mr-5">Mise à jour de l'équipement</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('equipements.update',$equipement) }}" method="post">
                    @method("PUT")
                   @include('pages.back-office.equipements._formulaire', ["btnTexte" => "Enregistrer","btnCancel" => "Annuler"])
                </form>
                {{-- @dd($equipement->etablissement->secteur->id,$equipement->etablissement->id) --}}
            </div>


        </div>
    </div><!-- COL END -->
</div>
<!-- ROW-1 End-->

</x-master-layout>

