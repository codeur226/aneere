@section("pageTitle")
    {{ $title }}
@endsection
{{-- @section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('users.index') }}">Utilisateurs</a></li>
<li class="breadcrumb-item active" aria-current="page">Nouveau utilisateur</li>
@endsection --}}
@section('sectionTitle')
<li class="breadcrumb-item"><a href="{{ route('users.index') }}">utilisateurs</a></li>

<li class="breadcrumb-item active" aria-current="page">Nouveau</li>
@endsection
<x-master-layout>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Nouvel utilisateur</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @method("POST")
                       @include('pages.back-office.users._formulaire', ["btnTexte" => "Enregistrer", "btnCancel" => "Annuler"])
                    </form>
                </div>
            </div>
        </div><!-- COL END -->
    </div>

</x-master-layout>

