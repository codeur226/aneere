
@section("pageTitle")
{{ $title }}
@endsection
@section('sectionTitle')
<li class="breadcrumb-item"><a href="{{ route('consommateurs.index',['statut'=>$etablissement->statut]) }}">{{ $etatabl=$etablissement->statut=="public" ? "Etablissements publics": "Entreprises" }}</a></li>
<li class="breadcrumb-item active" aria-current="page">Detaiils {{ $etatabl=$etablissement->statut=="public" ? "etablissement": "entreprise" }}</li>
@endsection
<x-master-layout>
<div class="row">
    <div class="col-md-12 col-lg-12">
        @include('pages.back-office.partials._message_flash')
        </div>
    <div class="col-lg-10 offset-1">
        <div class="tab-content">
            <div class="card">
                    <div class="card-body">
                        <div class="wideget-user">
                            <div class="wideget-user-desc">
                                <div class="user-wrap">
                                    <h4 class="mb-1 text-center">INFORMATIONS SUR {{ $etatabl=$etablissement->statut=="public" ? "ETABLISSEMENT": "L'ENTREPRISE" }}</h4>
                                    <hr>
                                      <div class="row">
                                          <div class="col-lg-6">
                                        <dl class="dl">
                                        <dt>Responsable :</dt>
                                        <dd class="text-uppercase"> {{ucFirst($etablissement->user->name)}} </dd>
                                        <dt>Etablissement :</dt>
                                        <dd> {{($etablissement->nom  != null) ? $etablissement->nom : "(Indisponible)"}} </dd>
                                        <dt>Domaine d'audit :</dt>
                                        <dd> {{$etablissement->domaine->nom}} </dd>
                                        <dt>Date de creation :</dt>
                                        <dd> {{ ($etablissement->date_creation != null) ? formatDate($etablissement->date_creation) : "(Indisponible)"  }} </dd>
                                        @if ($etablissement->statut != 'public')
                                        <dt> Numéro RCCM : </dt>
                                        <dd> {{  ($etablissement->num_rccm != null) ? $etablissement->num_rccm : "(Indisponible)" }}   </dd>
                                        <dt> Numéro IFU : </dt>
                                        <dd>   {{  ($etablissement->num_ifu != null) ? $etablissement->num_ifu : "(Indisponible)"}}     </dd>
                                        @endif
                                        <dt>Emai Principal :</dt>
                                        <dd> {{$etablissement->user->email}} </dd>
                                        <dt>Ville :</dt>
                                        <dd> {{$etablissement->ville->nom}} </dd>

                                    </dl>
                                         </div>
                                          <div class="col-lg-6">
                                     <dl class="dl">

                                        <dt>Police :</dt>
                                        <dd> {{($etablissement->police  != null) ? $etablissement->police : "(Indisponible)"}} </dd>
                                        <dt>Boite postale :</dt>
                                        <dd> {{($etablissement->bp != null) ? $etablissement->bp : "(Indisponible)"}} </dd>
                                        <dt>Secteur :</dt>
                                        <dd> {{($etablissement->num_secteur != null) ? $etablissement->num_secteur : "(Indisponible)"}} </dd>
                                        <dt>N° rue :</dt>
                                        <dd> {{ ($etablissement->rue != null) ? $etablissement->rue : "(Indisponible)"}} </dd>
                                        <dt>N° porte :</dt>
                                        <dd> {{ ($etablissement->num_porte != null) ? $etablissement->num_porte : "(Indisponible)"}} </dd>
                                        <dt>Tel mobile :</dt>
                                        <dd> {{ ($etablissement->tel_mobile != null) ? $etablissement->tel_mobile : "(Indisponible)"}} </dd>
                                        <dt>Tel fixe :</dt>
                                        <dd> {{ ($etablissement->tel_fixe != null) ? $etablissement->tel_fixe : "(Indisponible)"}} </dd>

                                         </dl>
                                          </div>
                                      </div>
                                </div>
                             </div>
                        </div>
                                <div class=" row m-5 d-flex justify-content-center ">
                                    <div class="">
                                    <a type="button" class="btn btn-secondary btn-sm" href="#"  onclick="history.go(-1);">Annuler</a>&nbsp;&nbsp;
                                    {{-- <a data-toggle="tooltip" data-placement="top" title="Modifier votre compte" href="{{ route('etablissements.edit', $etablissement) }}" class="btn btn-sm  btn-outline-warning ml-3"><i class="fa fa-edit"></i></a> --}}

                                            {{-- <button  data-toggle="tooltip" data-placement="top" title="Supprimer ce compte" class="btn btn-sm  btn-outline-danger delete" type="button"><i class="fa fa-trash" onClick=""></i></button> --}}
                                            <a type="button" class="btn btn-primary btn-sm" href="{{ route('consommateurs.edit',  $etablissement) }}">Modifier</a>&nbsp;&nbsp;
                                            <a type="button" class="btn btn-danger btn-sm" href="#" onClick="event.preventDefault(); deleteConfirm('{{ $etablissement->id }}')">Supprimer</i></a>

                                            <form id="{{$etablissement->id}}" action="{{ route('consommateurs.destroy', $etablissement->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                                    </td>

                                </div>

                                </div>
                    </div>
            </div>
        </div>

    {{-- <div class="col-lg-6 ">
        <div class="card" id="tribu">
            <div class="card-body">
                <div class="wideget-user">
                    <div class="wideget-user-desc">
                        <div class="user-wrap">
                            <h4 class="mb-1 text-center">CONTACTS DE L'Etablissement</h4>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

</div>
</x-master-layout>
