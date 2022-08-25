@section("pageTitle")
{{ $title }}
@endsection
@section('sectionTitle')
<li class="breadcrumb-item active">Liste des fiches</li>

@endsection
<x-master-layout>
    

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    @include('pages.back-office.partials._message_flash')
                    </div>

                    <div class="card">

                                    <div class="card-header">
                                        <h3 class="card-title">Listes des fiches</h3>
                                        <div class="ml-auto pageheader-btn">
                                        <a href="{{ route('fiches.create') }}" class="btn btn-primary btn-icon text-white">
                                            <span>
                                                <i class="fe fe-plus"></i>
                                            </span>Nouvelle fiche
                                        </a>
                                        </div>
                                    </div>
                                   @if($fiches->count() > 0)
                                    <div class="card-body">
                                        <div class="table-responsive">

											<table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
												<thead>
													<tr>
                                                        {{-- @if(Auth::user()->role->nom == 'Directeur') --}}
														<th class="wd-15p">ORDRE DE LA FICHE</th>
														<th class="wd-15p">LIBELLE</th>
														{{-- <thclass="wd-15p">ACTIONS</th> --}}
													</tr>
												</thead>
												<tbody>
													@foreach ($fiches as $fiche)
													<tr class="position-relative">
                                                        <td><a class="stretched-link" href="{{ route('fiches.show', $fiche->id) }}" data-toggle="tooltip" data-placement="top" title="Voir les details">{{ $fiche->ordre }}</a></td>
                                                        <td>{{ $fiche->libelle }}</td>
														
															{{-- {{ $audit->consommateur->user->name }} --}}
														</td>
                                                        {{--<td>
                                                            <a class="stretched-link" href="{{ route('fiches.show', $fiche->id) }}"><i class="fa fa-eye fa-lg" style="color:blue"></i></a>
                                                            <a href="{{ route('fiches.edit', $fiche->id) }}" type="button" class="btn btn-sm btn-default" ><i class="fa fa-edit fa-lg" style="color:blue"></i></a>&nbsp;&nbsp;
                                                                
                                                            
                                                            {{-- <a href="fiches.destroy" onClick="event.preventDefault(); deleteConfirm('{{ $fiche->id }}')"><i class="fa fa-trash-o fa-lg " style="color:red"></i></a>
                                                                <form id="{{$fiche->id}}" action="{{ route('fiches.destroy', $fiche) }}" method="POST">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                </form> 

                                                                <a href="fiches.destroy" onClick="event.preventDefault(); deleteConfirm('{{ $fiche->id }}')"><i class="fa fa-trash-o fa-lg " style="color:red"></i></a>
                                                                <form id="{{$fiche->id}}" action="{{ route('fiches.destroy', $fiche->id) }}" method="POST">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                </form>

                                                                {{-- 
                                                                <a href="{{ route("fiches.destroy", $fiche->id) }}" class="btn btn-danger btn-sm mr-2"  onClick="
                                                                    event.preventDefault(); 
                                                                    if(confirm('Etes-vous sur de vouloir supprimer cette fiche ?')) 
                                                                    document.getElementById('{{ $fiche->id }}').submit();" ><i class="fa fa-trash-o fa-lg"></i></a>
                                                                <form id="{{ $fiche->id }}" method="post" action="{{ route("fiches.destroy", $fiche->id) }}">
                                                                    @csrf
                                                                    @method("delete")
                                                                </form> 
                                                                
                

                                                        </td>--}}

													</tr>
													@endforeach
												</tbody>
											</table>
                                            @else
                                            <div class="card-body">
                                                <div class="padding-6">
                                                    Aucune fiche n'est dans la base de donnée !
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

