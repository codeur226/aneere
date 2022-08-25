@section("pageTitle")
{{ $title }}
@endsection
@section('sectionTitle')
<li class="breadcrumb-item"><a href="{{ route('consommateurs.index') }}">Etablissements</a></li>
<li class="breadcrumb-item active" aria-current="page">Batiments</li>

@endsection
<x-master-layout>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    @include('pages.back-office.partials._message_flash')
                    </div>
                    <div class="card">

                        <div class="card-header">
                            <h3 class="card-title">Les Batiments</h3>
                            <div class="ml-auto pageheader-btn">
                                <a href="{{ route('batiments.create') }}" class="btn btn-primary btn-icon text-white">
                                    <span>
                                        <i class="fe fe-plus"></i>
                                    </span>Nouveau
                                </a>
                            </div>
                        </div>
                         @if($batiments->count() > 0)
                        <div class="card-body">
                            <div class="table-responsive">
                                    <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p">ETABLISSEMENT</th>
                                                <th class="wd-15p">N° COMPTEUR</th>
                                                <th class="wd-15p">DATE DE DECLARATION</th>
                                                <th class="w-5"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($batiments as $batiment)
                                            {{-- {{ dd($batiment->etablissement->user->name) }} --}}
                                            <tr>
                                                <td><a style="color: black">  {{ $batiment->consommateur->user->name }}</a></td>
                                                <td><a style="color: black">  {{ $batiment->num_compteur }}</a></td>
                                                <td><a style="color: rgb(15, 14, 14)">{{ $batiment->date_declaration }} </a></td>
                                                <td><a href="{{ route('batiments.edit', ['currentEtablissement'=>$batiment->consommateur->statut, $batiment]) }}"><i class="fa fa-edit fa-lg" style="color:blue"></i></a>&nbsp;&nbsp;
                                                <a href="#" onClick="event.preventDefault(); deleteConfirm('{{ $batiment->id }}')"><i class="fa fa-trash-o fa-lg " style="color:red"></i></a>
                                                <form id="{{$batiment->id}}" action="{{ route('batiments.destroy', $batiment->id) }}" method="POST">
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
                                            Aucun bâtiment n'est disponible pour le moment !!!!
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif
                        <!-- TABLE WRAPPER -->
                    </div>
                    <!-- SECTION WRAPPER -->
                </div>
            </div>




</x-master-layout>

