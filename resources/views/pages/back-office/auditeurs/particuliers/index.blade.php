@section("pageTitle")
{{ $title }}
@endsection
@section('sectionTitle')
<li class="breadcrumb-item active">Particuliers</li>

@endsection
<x-master-layout>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    @include('pages.back-office.partials._message_flash')
                    </div>

                    <div class="card">

                                    <div class="card-header">
                                        <h3 class="card-title">Listes des particuliers</h3>
                                        <div class="ml-auto pageheader-btn">
                                            <a href="{{ route('auditeurs.create',['statut' => $particulier]) }}" class="btn btn-primary btn-icon text-white">
                                                <span>
                                                    <i class="fe fe-plus"></i>
                                                </span>Nouveau
                                            </a>
                                        </div>
                                    </div>
                                   @if($auditeurs->count() > 0)
                                    <div class="card-body">
                                        <div class="table-responsive">

											<table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
												<thead>
													<tr>
														<th class="wd-15p">Nom</th>
														<th class="wd-15p">Email</th>
														<th class="wd-20p">Ville</th>
														{{-- <th class="wd-20p">satut</th> --}}
													</tr>
												</thead>
												<tbody>
													@foreach ($auditeurs as $auditeur)
													<tr class="position-relative" data-toggle="tooltip" data-placement="top" title="Cliquez pour visualiser l'auditeur">>
														<td>
															<a class="stretched-link" href="{{ route('auditeurs.show', $auditeur) }}"></a>
															{{ $auditeur->nom }}
														</td>
														<td>{{ $auditeur->email }}</td>
														<td>{{$auditeur->ville->nom }}</td>
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
                                                    Aucun particulier n'est disponible pour le moment !!!!
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

