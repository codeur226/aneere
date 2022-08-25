@section("pageTitle")
    {{ $title }}
@endsection
@section('sectionTitle')
<li class="breadcrumb-item"><a href="{{ route('users.index') }}">utilisateurs</a></li>
<li class="breadcrumb-item "><a href="{{ route('users.show',$user) }}">Details utilisateurs</a></li>
<li class="breadcrumb-item active" aria-current="page">Mise à jour</li>
@endsection
<x-master-layout>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Mise à jour du mot de passe</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('profil_save') }}" method="POST">

{{--
                        @method("PUT") --}}
                       @include('pages.back-office.users._formulaire_profil', ["btnTexte" => "Enregistrer","btnCancel" => "Annuler"])
                       {{-- @include('pages.back-office.users._edit-user', ["btnTexte" => "Ajouter"]) --}}

                    </form>
                </div>
            </div>
        </div><!-- COL END -->
    </div>

</x-master-layout>

