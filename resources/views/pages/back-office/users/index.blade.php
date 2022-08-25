@section("pageTitle")
    {{ $title }}
@endsection
@section('sectionTitle')
{{-- <li class="breadcrumb-item"><a href="{{ route('types.index') }}">Règlementation</a></li> --}}

<li class="breadcrumb-item active" aria-current="page">Utilisateur</li>
@endsection

<x-master-layout>

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                      <h3 class="card-title">Tous les utilisateurs</h3>
                        <div class="ml-auto pageheader-btn">

                            <a href="{{ route('users.create') }}" class="btn btn-primary btn-icon text-white">
                                <span>
                                    <i class="fe fe-plus"></i>
                                </span> Nouveau
                            </a>
                        </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="wd-15p">Nom</th>
                                    <th class="wd-15p">Email</th>
                                    <th class="wd-20p">Profil</th>
                                    <th class="wd-20p">Etat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr class="position-relative">
                                    <td>
                                        <a class="stretched-link" href="{{ route('users.show', $user) }}"></a>

                                        {{ $user->name }}
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td><strong><h6>{{ $user->role->nom }}</h6></strong> </td>
                                    <td>
                                        @if ($user->disable)
                                        <small class="badge badge-danger" >Désactivé</small>
                                            @else
                                            <small class="badge badge-success">Activé</small>
                                        @endif
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- TABLE WRAPPER -->
            </div>
            <!-- SECTION WRAPPER -->
        </div>
    </div>

</x-master-layout>

