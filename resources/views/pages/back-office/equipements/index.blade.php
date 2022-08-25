@section("pageTitle")
{{ $title }}
@endsection
@section('sectionTitle')
{{-- <li class="breadcrumb-item"><a href="{{ route('etablissements.index') }}">Etablissements</a></li> --}}
<li class="breadcrumb-item active" aria-current="page">equipements</li>

@endsection
<x-master-layout>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    @include('pages.back-office.partials._message_flash')
                    </div>
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Liste des équipements
                                  {{-- {{ $etablissement->user->name }} --}}
                            </h3>
                            <div class="ml-auto pageheader-btn">
                                <a href="{{ route('equipements.create') }}" class="btn btn-primary btn-icon text-white">
                                    <span>
                                        <i class="fe fe-plus"></i>
                                    </span>Nouveau
                                </a>
                            </div>
                        </div>
                         @if($equipements->count() > 0)
                        <div class="card-body">
                            <div class="table-responsive">
                                    <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p">designation</th>
                                                <th class="wd-15p">Domaine</th>
                                                <th class="w-5"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($equipements as $equipement)
                                            {{-- {{ dd($equipement->etablissement->secteur) }} --}}
                                            <tr>
                                                <td><a style="color: black">  {{ $equipement->designation }}</a></td>
                                                <td><a style="color: rgb(15, 14, 14)">{{ $equipement->domaine->nom }} </a></td>
                                                <td><a href="{{ route('equipements.edit', $equipement) }}"><i class="fa fa-edit fa-lg" style="color:blue"></i></a>&nbsp;&nbsp;
                                                <a href="#" onClick="event.preventDefault(); deleteConfirm('{{ $equipement->id }}')"><i class="fa fa-trash-o fa-lg " style="color:red"></i></a>
                                                <form id="{{$equipement->id}}" action="{{ route('equipements.destroy', $equipement->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            </td></tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <div class="card-body">
                                        <div class="padding-6">
                                            Aucun equipement n'est disponible pour le moment !!!!
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
</x-master-layout>

