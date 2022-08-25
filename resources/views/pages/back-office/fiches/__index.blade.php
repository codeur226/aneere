@section("pageTitle")
{{ $title }}
@endsection
@section('sectionTitle')
<li class="breadcrumb-item active">Audits</li>

@endsection
<x-master-layout>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    @include('pages.back-office.partials._message_flash')
                    </div>

                    <div class="card">

                                    <div class="card-header">
                                        <h3 class="card-title">Listes des audits déclarés en attente d'affectation</h3>
                                        <div class="ml-auto pageheader-btn">
                                            <button type="submit" id="#button1" class="btn btn-success " data-toggle="modal"
                                                data-target="#multi_trans" onclick="affecter()" disabled>
                                                <i class="fal fa-exchange-alt"></i>Affectation
                                            </button>
                                            <a href="{{ route('fiches.create') }}" class="btn btn-primary btn-icon text-white">
                                                <span>
                                                    <i class="fe fe-plus"></i>
                                                </span>Nouvel audit
                                            </a>

                                        </div>
                                    </div>
                                   @if($fiches->count() > 0)
                                    <div class="card-body">
                                        <div class="table-responsive">

											<table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
												<thead>
													<tr>
                                                     	<th class="wd-15p">Ordre de la Fiche</th>
                                                     	<th class="wd-15p">Fiche</th>
                                                        <th class="wd-15p">Actions</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($fiches as $fiche)
													{{-- <tr class="position-relative"> --}}
                                                        <tr>
                                                            <td>{{ $fiche->ordre }}</td>
                                                            <td>{{ $fiche->libelle }}</td>
															<a class="stretched-link" href="{{ route('fiches.show', $fiche) }}"></a>
															{{-- {{ $audit->consommateur->user->name }} --}}
														</td>

                                                            {{-- <button > --}}
                                                            <td>
                                                                <a href="{{ route('fiches.edit', $fiche->id) }}" type="button" class="btn btn-sm btn-default" ><i class="fa fa-edit fa-lg" style="color:blue"></i></a>&nbsp;&nbsp;
                                                                <a href="fiches.destroy" onClick="event.preventDefault(); deleteConfirm('{{ $fiche->id }}')"><i class="fa fa-trash-o fa-lg " style="color:red"></i></a>
                                                                <form id="{{$fiche->id}}" action="{{ route('fiches.destroy', $fiche->id) }}" method="POST">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                </form>

                                                               

                                                            </td>
                                                       </tr>

													{{-- </tr> --}}
                                                    {{-- @include('pages.back-office.audits.affectations._affecter_agent_modal',['modalUrl'=>'dashboard.affecter','id' => $audit->id, 'users' =>$users  ]) --}}
													@endforeach
												</tbody>
											</table>
                                            @else
                                            <div class="card-body">
                                                <div class="padding-6">
                                                    Aucune fiche n'est disponible pour le moment !!!!
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


            <script src="{{asset('assetadmin/js/jquery-3.4.1.min.js')}}"></script>
            <script>

                $("#checkAll").click(function() {
                    $('input:checkbox').not(this).prop('checked', this.checked);
                });
                function affecter() {
                    var selected = new Array();
                    $('input:checked').each(function() {
                        selected.push($(this).attr('value'));
                        // console.log($(this).attr('value'))
                    });
                    $('#AffecterToAgent').val(selected)
                }

                var checkboxes = $("input[type='checkbox']"),
                    submitButt = $("button[type='submit']");

                checkboxes.click(function() {
                    submitButt.attr("disabled", !checkboxes.is(":checked"));
                });
            </script>
  

</x-master-layout>

