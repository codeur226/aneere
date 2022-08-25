@section("pageTitle")
{{ $title }}
@endsection
@section('sectionTitle')
<li class="breadcrumb-item active">Liste des questions</li>

@endsection
<x-master-layout>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    @include('pages.back-office.partials._message_flash')
                    </div>

                    <div class="card">

                                    <div class="card-header">
                                        <h3 class="card-title">Listes des questions</h3>
                                        <div class="ml-auto pageheader-btn">
                                            <a href="{{ route('questions.create') }}" class="btn btn-primary btn-icon text-white">
                                                <span>
                                                    <i class="fe fe-plus"></i>
                                                </span>Nouvelle question
                                            </a>


                                            {{-- <a href="#" class="btn btn-primary btn-icon text-white">
                                               
                                                <a class="btn btn-primary btn-sm pull-right" href="{{ route('export-the-docx') }}">Download the Docs Files</a> <span>
                                                    <i class="fe fe-plus"></i>
                                                </span>Télécharger le rapport Word
                                            </a> --}}
                                            </div>
                                       
                                    </div>
                                   @if($questions->count() > 0)
                                    <div class="card-body">
                                        <div class="table-responsive">

											<table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
												<thead>
													<tr>
                                                        {{-- @if(Auth::user()->role->nom == 'Directeur') --}}
														<th class="wd-15p">N° d'ordre</th>
                                                        {{-- @endif --}}
														<th class="wd-15p">Fiche</th>
														<th class="wd-15p">Etiquette</th>
														<th class="wd-15p">libelle</th>
														<th class="wd-15p">Sous question ?</th>
														<th class="wd-10p">Type de question</th>
														<th class="wd-10p">Actions</th>
														{{-- <th class="wd-20p">satut</th> --}}
													</tr>
												</thead>
												<tbody>
													@foreach ($questions as $question)
													<tr class="position-relative">
                                                     
                                                        <td>{{ $question->numero_question }}</td>
                                                        <td> {{ $question->fiche->libelle }}</td>
                                                        <td> {{ $question->etiquette}}
															<a class="stretched-link" href="{{ route('questions.show', $question->id) }}"></a>
															{{-- {{ $audit->consommateur->user->name }} --}}
														</td>

                                                            <td> {{ $question->libelle}}</td>
                                                            @if($question->sous_question==true)
                                                            <td>Oui</td>
                                                           
                                                            @else
                                                             <td> Non</td>
                                                            @endif
                                                            <td> {{ $question->type_question}}</td>
                                                        {{--<td>
                                                            <a href="{{ route('questions.show', $question->id) }}" type="button" class="btn btn-sm btn-default" ><i class="fa fa-eye fa-lg" style="color:green"></i></a>&nbsp;&nbsp;
                                                            <a href="{{ route('questions.edit', $question->id) }}" type="button" class="btn btn-sm btn-default" ><i class="fa fa-edit fa-lg" style="color:blue"></i></a>&nbsp;&nbsp;
                                                            <a href="questions.destroy" onClick="event.preventDefault(); deleteConfirm('{{ $question->id }}')"><i class="fa fa-trash-o fa-lg " style="color:red"></i></a>
                                                            <form id="{{$question->id}}" action="{{ route('questions.destroy', $question->id) }}" method="POST">
                                                                {{ csrf_field() }}
                                                                {{ method_field('DELETE') }}
                                                            </form>

                                                        </td>--}}
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
                                                    Aucune questions n'est dans la base de donnée !
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

