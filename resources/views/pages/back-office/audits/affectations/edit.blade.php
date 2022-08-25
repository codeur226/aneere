@section("pageTitle")
{{ $title }}
@endsection
@section('sectionTitle')
<li class="breadcrumb-item"><a href="{{ route('audits.index') }}">Audits</a></li>
<li class="breadcrumb-item active" aria-current="page">Mise à jour de l'audit</li>
@endsection
<x-master-layout>

   <div class="row">
    <div class=" col-md-8 offset-1">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Mise à jour de l'audit</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('audits.update', $audit) }}" method="post" >
                    @method("PUT")
                   @include('pages.back-office.audits.affectations._formulaire', ["btnTexte" => "Enregistrer","btnCancel" => "Annuler"])
                </form>

            </div>

        </div>
    </div><!-- COL END -->
</div>
<!-- ROW-1 End-->

</x-master-layout>

