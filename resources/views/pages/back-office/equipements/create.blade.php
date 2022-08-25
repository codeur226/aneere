@section("pageTitle")
{{ $title }}
@endsection

@section('sectionTitle')
{{-- <li class="breadcrumb-item"><a href="{{ route('etablissements.index') }}">Etablissements</a></li> --}}
<li class="breadcrumb-item"><a href="#" onclick="history.go(-1);">equipements</a></li>
<li class="breadcrumb-item active" aria-current="page">Nouveau equipement</li>

@endsection
<x-master-layout>

   <div class="row">
    <div class=" col-md-8 offset-1">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mr-5">Nouveau equipement</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('equipements.store') }}" method="POST">
                    @method("POST")
                   @include('pages.back-office.equipements._formulaire', ["btnTexte" => "Enregistrer","btnCancel" => "Annuler"])
                </form>

            </div>

        </div>
    </div><!-- COL END -->
</div>
<!-- ROW-1 End-->

</div>
</div><!-- COL END -->
</div>
</x-master-layout>

