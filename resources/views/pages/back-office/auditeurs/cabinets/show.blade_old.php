
@section("pageTitle")
{{ $title }}
@endsection
@section('sectionTitle')
<li class="breadcrumb-item"><a href="{{ route('auditeurs.index',['statut'=>'cabinet']) }}">Cabinets</a></li>
<li class="breadcrumb-item active" aria-current="page">Details cabinet</li>
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
                                    <h4 class="mb-1 text-center">INFORMATIONS SUR LE CABINET</h4>
                                    <hr>
                                      <div class="row">
                                          <div class="col-lg-6">
                                        <dl class="dl">
                                        <dt>Nom :</dt>
                                        <dd class="text-uppercase"> {{ucFirst($auditeur->nom)}} </dd>
                                        <dt>Email :</dt>
                                        <dd> {{$auditeur->email}} </dd>
                                        <dt> Numéro RCCM : </dt>
                                        <dd> {{ $auditeur->num_rccm }}   </dd>
                                        <dt> Numéro IFU : </dt>
                                        <dd>   {{ $auditeur->num_ifu }}     </dd>
                                        <dt>Date de creation :</dt>
                                        <dd> {{ $auditeur->date_creation }} </dd>
                                        <dt>Date de declaration :</dt>
                                        <dd> {{ $auditeur->date_declaration }} </dd>
                                    </dl>
                                         </div>
                                          <div class="col-lg-6">
                                     <dl class="dl">

                                        <dt>Tel mobile :</dt>
                                        <dd> {{$auditeur->tel_mobile}} </dd>
                                        <dt>Tel fixe :</dt>
                                        <dd> {{$auditeur->tel_fixe}} </dd>
                                        <dt>Boite postale :</dt>
                                        <dd> {{$auditeur->num_bp}} </dd>
                                         <dt>Ville :</dt>
                                         <dd> {{$auditeur->ville->nom}} </dd>
                                         <dt>Secteur :</dt>
                                         <dd> {{$auditeur->secteur}} </dd>
                                         <dt>N° rue :</dt>
                                         <dd> {{$auditeur->rue}} </dd>
                                         <dt>N° porte :</dt>
                                         <dd> {{$auditeur->secteur}} </dd>
                                      </dl>
                                    </div>
                                      </div>
                                      <div class="card-header">
                                        <h3 class="card-title text-center">Les agrements de {{$auditeur->nom}} </h3>

                                        <div class="ml-auto pageheader-btn">
                                            <a href="#" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#agrement{{$auditeur->id }}" class="btn btn-primary btn-icon text-white">
                                                <span>
                                                    <i class="fe fe-plus"></i>
                                                </span>Nouvel agrement
                                            </a>
                                        </div>


                                    </div>
                                    @if($agrements->count() > 0)
                                      <table  class="table table-striped table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p">Nom</th>
                                                <th class="wd-15p">Etat</th>
                                                <th class="wd-20p">Domaine</th>
                                                <th class="wd-20p">Date de delivrance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tbody>
                                                @foreach ($agrements as $agrement)
                                                <tr>
                                                    <td><a style="color: black">  {{ $agrement->num_agrement }}</a></td>
                                                    <td><a style="color: rgb(15, 14, 14)">{{ $agrement->etat->etat }} </a></td>
                                                    <td><a style="color: rgb(15, 14, 14)">{{ $agrement->domaine->nom }} </a></td>
                                                    <td><a style="color: rgb(15, 14, 14)">{{ $agrement->date_delivrance }} </a></td>
                                            {{-- <button > --}}
                                                    <td><a href="#" type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#Editagrement{{ $agrement->id }}"><i class="fa fa-edit fa-lg" style="color:blue"></i></a>&nbsp;&nbsp;
                                                    <a href="#" onClick="event.preventDefault(); deleteConfirm('{{ $agrement->id }}')"><i class="fa fa-trash-o fa-lg " style="color:red"></i></a>
                                                    <form id="{{$agrement->id}}" action="{{ route('agrements.destroy', $agrement->id) }}" method="POST">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                </td>
                                            </tr>
                                        @include('pages.back-office.auditeurs.modif_agrement_modal',['modalUrl'=>'dashboard.agrements','idModal' => "Editagrement".$agrement->id,  'id'=>$agrement->id,'etats'=>$etats,'domaines'=>$domaines ])

                                                @endforeach
                                            </tbody>
                                    </table>
                                    @else
                                    <div class="card-body">
                                        <div class="padding-6">
                                            Aucun agrement n'est disponible pour le moment !!!!
                                        </div>
                                    </div>
                                    @endif
                                </div>
                             </div>
                        </div>
                                <div class=" row m-5 d-flex justify-content-center ">
                                    <div class="">
                                    <a type="button" class="btn btn-secondary btn-sm" href="#"  onclick="history.go(-1);">Annuler</a>&nbsp;&nbsp;
                                    {{-- <a data-toggle="tooltip" data-placement="top" title="Modifier votre compte" href="{{ route('auditeurs.edit', $auditeur) }}" class="btn btn-sm  btn-outline-warning ml-3"><i class="fa fa-edit"></i></a> --}}

                                            {{-- <button  data-toggle="tooltip" data-placement="top" title="Supprimer ce compte" class="btn btn-sm  btn-outline-danger delete" type="button"><i class="fa fa-trash" onClick=""></i></button> --}}
                                            <a type="button" class="btn btn-primary btn-sm" href="{{ route('auditeurs.edit',  $auditeur) }}">Modifier</a>&nbsp;&nbsp;
                                            <a type="button" class="btn btn-danger btn-sm" href="#" onClick="event.preventDefault(); deleteConfirm('{{ $auditeur->id }}')">Supprimer</i></a>

                                            <form id="{{$auditeur->id}}" action="{{ route('auditeurs.destroy', $auditeur->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>


                                </div>

                                </div>
                    </div>
            </div>
       @include('pages.back-office.auditeurs.ajout_agrement_modal',['modalUrl'=>'dashboard.agrements','idModal' => "agrement".$auditeur->id,  'id'=>$auditeur->id,'etats'=>$etats,'domaines'=>$domaines ])

        </div>

</div>
</x-master-layout>
