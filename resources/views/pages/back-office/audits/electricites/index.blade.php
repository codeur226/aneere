@section("pageTitle")
{{ $title }}
@endsection
@section('sectionTitle')
<li class="breadcrumb-item active">Audits declarés</li>

@endsection
<x-master-layout>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    @include('pages.back-office.partials._message_flash')
                    </div>

                    <div class="card">

                                    <div class="card-header">
                                        <h3 class="card-title">Listes des audits d'electricité</h3>
                                        {{-- <div class="ml-auto pageheader-btn">
                                            <a href="{{ route('auditeurs.create',['statut' => $particulier]) }}" class="btn btn-primary btn-icon text-white">
                                                <span>
                                                    <i class="fe fe-plus"></i>
                                                </span>Nouveau
                                            </a>
                                        </div> --}}
                                    </div>
                                   @if($audits->count() > 0)
                                    <div class="card-body">
                                        <div class="table-responsive">

											<table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
												<thead>
													<tr>
                                                        @if(Auth::user()->role->nom == 'Directeur')
														<th class="wd-15p">Agent</th>
                                                        @endif
                                                        <th class="wd-10p">Etat</th>
														<th class="wd-15p">Etablissement</th>
														<th class="wd-15p">Point focal</th>
														<th class="wd-15p">Date declaration</th>
														<th class="wd-15p">Date echeance</th>
														
														{{-- <th class="wd-20p">satut</th> --}}
													</tr>
												</thead>
												<tbody>
													@foreach ($audits as $audit)
													<tr class="position-relative">
                                                        @if(Auth::user()->role->nom == 'Directeur')
                                                        <td> {{ ($audit->user) ? $audit->user->name : 'Non affecté' }}</td>
														@endif
                                                        <td> {{ $audit->etat }}</td>
                                                        <td> {{ $audit->consommateur->nom }}</td>
                                                        <td>
															<a class="stretched-link" href="{{ route('audits.show', $audit) }}"></a>
															{{ $audit->consommateur->user->name }}
														</td>
														{{-- <td>{{ $audit->consommateur->user->name  }} </td> --}}
                                                            <td> {{ formatDate($audit->dateDeclaration) }}</td>
                                                            <td> {{ formatDate($audit->dateEcheance) }}</td>
                                                            
                                                        {{-- <td>
                                                            @if ($auditeur->statut == 'publique')
                                                            <small class="badge badge-success" >Auditeur physique</small>
                                                              @else
                                                              <small class="badge badge-danger">Auditeur moral</small>
                                                            @endif
                                                        </td> --}}

													</tr>
													@endforeach
												</tbody>
											</table>
                                            @else
                                            <div class="card-body">
                                                <div class="padding-6">
                                                    Aucun audit n'est affecté pour le moment !!!!
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

