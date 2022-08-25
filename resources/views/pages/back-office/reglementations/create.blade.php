@section("pageTitle")
{{ $title }}
@endsection

@section('sectionTitle')
<li class="breadcrumb-item"><a href="#">Règlementation</a></li>
<li class="breadcrumb-item"><a href="{{ route('reglementations.index') }}">Détail type de texte règlementaire</a></li>
<li class="breadcrumb-item active" aria-current="page">Nouveau texte règlementaire</li>

@endsection
<x-master-layout>

   <div class="row">
    <div class=" col-md-8 offset-1">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mr-5">Nouvelle règlementation</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('reglementations.store') }}" method="POST" enctype="multipart/form-data">
                    @method("POST")
                   @include('pages.back-office.reglementations._formulaire', ["btnTexte" => "Enregistrer","btnCancel" => "Annuler"])
                </form>
            </div>

        </div>
    </div><!-- COL END -->
</div>
<!-- ROW-1 End-->

</x-master-layout>

