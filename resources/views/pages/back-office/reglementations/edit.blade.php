@section("pageTitle")
{{ $title }}
@endsection
@section('sectionTitle')
<li class="breadcrumb-item"><a href="{{ route('reglementations.index') }}">Règlementation</a></li>

<li class="breadcrumb-item" aria-current="page"><a href="{{ route('reglementations.show',$reglementation) }}">Details texte règlementataire</a></li>
<li class="breadcrumb-item active" aria-current="page">Mise à jour texte règlementataire</li>
@endsection
<x-master-layout>

   <div class="row">
    <div class=" col-md-8 offset-1">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Mise à jour d'un texte règlementaire</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('reglementations.update',$reglementation) }}" method="post" enctype="multipart/form-data">
                    @method("PUT")
                   @include('pages.back-office.reglementations._formulaire', ["btnTexte" => "Enregistrer","btnCancel" => "Annuler"])
                </form>
            </div>

        </div>
    </div><!-- COL END -->
</div>
<!-- ROW-1 End-->

</x-master-layout>

