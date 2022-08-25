@section("pageTitle")
    {{ $title  }}
@endsection
@section('sectionTitle')
<li class="breadcrumb-item"><a href="{{ route('users.index') }}">utilisateurs</a></li>
<li class="breadcrumb-item active" aria-current="page">Détail utilisateur</li>
@endsection
<x-master-layout>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card ">
                <div class="card-header ">
                    <h3 class="card-title ">Profil de l'utilisateur</h3>

                </div>
                <div class="card-body text-center">
                    <span class="avatar avatar-xxl brround cover-image cover-image" data-image-src="{{ asset('assetadmin/images/users/user.png') }}"></span>
                    <h4 class="h4 mb-0 mt-3">{{ $user->name }}</h4>
                    {{-- <span class="mb-3 mt-3 label label-danger">{{ $user->roles ? $user->roles->first()->nom : "Utilisateur" }}</span> --}}
                    <span class="mb-3 mt-3 label label-danger">{{ $user->role->nom  }}</span>
                    <p class="card-text">{{ $user->email }}</p>
                    <p class="card-text">{{ $user->disable ? "Utilisateur désactivé" : "Utilisateur actif" }}</p>
                </div>
                <div class="card-footer text-center">
                            <button type="button" class="btn btn-secondary btn-sm" onclick="history.go(-1);">Annuler</button>
                            <a type="button" class="btn btn-primary btn-sm" href="{{ route('users.edit', $user) }}">Modifier</a>
                            @if($user->disable)
                            <a type="button" class="btn btn-success btn-sm ml-2" href="{{ route('users.activate', $user) }}">Activer</a>
                            @else
                            <a  type="button" class="btn btn-warning btn-sm ml-2" href="{{ route('users.disable', $user) }}">Désactiver</a>
                            @endif
                            <a data-toggle="tooltip" title="Supprimer l'utilisateur" onClick="event.preventDefault(); deleteConfirm('{{ $user->id }}')" class="btn btn-danger btn-sm ml-2" href="{{ route('users.destroy', $user) }}">Supprimer</a>
                            <form id="{{ $user->id }}" action="{{ route('users.destroy', $user) }}" method="POST">
                                @csrf
                                @method('DELETE')
                </div>
            </div>
        </div><!-- COL END -->
        {{-- <div class="col-md-8">
            <div class="card">
                @if ($user->medias->count()>0)
                <div class="card-header">
                    <h3 class="card-title">Les médias ajoutés par {{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @include("pages.back-office.partials._medias-list", ["medias" => $user->medias])
                    </div>
                </div>
                @else
                <div class="card-body p-5">
                    <div class="alert alert-info m-5">{{ $user->name }} n'a pas encore ajouté de médias</div>
                </div>
                @endif
                <!-- TABLE WRAPPER -->
            </div>
            <!-- SECTION WRAPPER -->
        </div> --}}
    </div>

</x-master-layout>

