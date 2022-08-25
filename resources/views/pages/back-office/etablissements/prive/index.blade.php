@section("pageTitle")
{{ $title }}
@endsection
@section('sectionTitle')
<li class="breadcrumb-item active">Entreprises</li>

@endsection
<x-master-layout>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    @include('pages.back-office.partials._message_flash')
                    </div>

                    <div class="card">

                                    <div class="card-header">
                                        <h3 class="card-title">Listes des entreprises</h3>
                                        <div class="ml-auto pageheader-btn">
                                            <a href="{{ route('consommateurs.create',['statut'=>'privé']) }}" class="btn btn-primary btn-icon text-white">
                                                <span>
                                                    <i class="fe fe-plus"></i>
                                                </span>Nouveau
                                            </a>
                                        </div>
                                    </div>
                                   @if($etablissements->count() > 0)
                                    <div class="card-body">
                                        <div class="table-responsive">

											<table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
												<thead>
													<tr>
														<th class="wd-15p">N° d'identification</th>
														<th class="wd-15p">Nom</th>
														<th class="wd-15p">Email</th>
														<th class="wd-20p">Domaine</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($etablissements as $etablissement)
													<tr class="position-relative">
                                                        <td>
															<a class="stretched-link" href="{{ route('consommateurs.show', $etablissement) }}"></a>
															{{ $etablissement->num_identification }}
														</td>
														<td>{{ $etablissement->nom }}</td>
														<td>{{ $etablissement->user->email }}</td>
														<td>{{$etablissement->domaine->nom }}</td> 

													</tr>
													@endforeach
												</tbody>
											</table>
                                            @else
                                            <div class="card-body">
                                                <div class="padding-6">
                                                    Aucune entreprise n'est disponible pour le moment !!!!
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

