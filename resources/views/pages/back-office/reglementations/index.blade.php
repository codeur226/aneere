@section("pageTitle")
{{ $title }}
@endsection
@section('sectionTitle')
<li class="breadcrumb-item active">Réglementations</li>

{{-- <li class="breadcrumb-item active" aria-current="page">Mise à jour</li> --}}
@endsection
<x-master-layout>
            <div class="row">
            <div class="container">
                <div class="col-lg-12">
                    @include('pages.back-office.partials._message_flash')

                </div>
            </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12">

                    <div class="card">

                                <div class="card-header">
                                       <h3 class="card-title">Listes des reglementations</h3>
                                    <div class="ml-auto pageheader-btn">
                                        <a href="{{ route('reglementations.create') }}" class="btn btn-primary btn-icon text-white">
                                            <span>
                                                <i class="fe fe-plus"></i>
                                            </span> Nouvelle
                                        </a>
                                 </div>
                                </div>
                            @if($reglementations->count() > 0)
                                    <div class="card-body">
                                        <div class="table-responsive">

											<table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
												<thead>
													<tr>
														<th class="wd-15p">Reference</th>
														<th class="wd-15p">Date création</th>
														<th class="wd-20p">type</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($reglementations as $reglementation)
													<tr class="position-relative">
														<td>
															<a class="stretched-link" href="{{ route('reglementations.show', $reglementation) }}"  data-toggle="tooltip" data-placement="top" title="Voir les details"></a>
															 {{  Str::limit($reglementation->reference,  20)  }}
														</td>
                                                            <td>{{ $reglementation->date }}</td>
                                                            <td>{{$reglementation->type->libelle }}</td>
													 </tr>
													@endforeach
												</tbody>
											</table>
                                            @else
                                            <div class="card-body">
                                                <div class="padding-6">
                                                    Aucune reglementation n'est disponible pour le moment !!!!
                                                </div>
                                            </div>
                                        @endif
                                        </div>
                                    </div>
                    </div>
                </div>
            </div>
</x-master-layout>

