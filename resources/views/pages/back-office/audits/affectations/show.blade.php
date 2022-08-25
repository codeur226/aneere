
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
    <div class="col-lg-8">
        {{-- <div class="col-lg-10 offset-1"> --}}
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
                                                @foreach ($agrements as $agrement)
                                                    <tr>
                                                        <td> {{ $agrement->num_agrement }}</td>
                                                        <td>{{ $agrement->etat->etat }} </td>
                                                        <td>{{ $agrement->domaine->nom }} </td>
                                                        <td>{{ $agrement->date_delivrance }} </td>
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
        </div>
    </div>

            <div class="col-lg-4">
                    <div class="tab-content">
                          <div class="card">
                            <div class="card-body">
                                <div class="wideget-user">
                                    <div class="wideget-user-desc">
                                           <div class="user-wrap">
                                             <h4 class="mb-1 text-center">Les pièce fournies</h4>

                                              </div>
                                              <div class="card-header">

                                                    <div class="ml-auto pageheader-btn">
                                                        <a href="#" type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#piece{{$auditeur->id }}" class="btn btn-primary btn-icon text-white">
                                                            <span>
                                                                <i class="fe fe-plus"></i>
                                                            </span>Joindre les pièces
                                                        </a>
                                                    </div>
                                               </div>
                                          </div>

                                          <style style="text/css">
                                                table{
                                                    border: 1px solid black;
                                                    border-collapse: collapse;
                                                    table-layout: fixed;
                                                    width: 400px;
                                                }

                                                th, td {
                                                    border: 1px solid black;
                                                    word-break: break-all;
                                                }

                                            </style>
                                          @if($pieces->count() > 0)
                                          <table  class="table table-striped table-bordered ">
                                                {{-- <thead>
                                                    <tr>
                                                        <th style="width:100px; ">Pièce</th>
                                                        <th>pièce</th>
                                                        <th></th>
                                                    </tr>
                                                </thead> --}}
                                                <tbody>
                                                    @foreach ($pieces as $piece)
                                                        <tr>
                                                            <td>  {{ $piece->piece }}</td>
                                                            <td>
                                                                <a href="{{asset('piece/' . $piece->piece)}}" target="_blank" type="button" class="btn btn-sm btn-default"><i class="fa fa-download fa-lg" style="color:rgb(41, 226, 87)"></i></a>&nbsp;
                                                               <a href="#" type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#Editpiece{{ $piece->id }}"><i class="fa fa-edit fa-lg" style="color:blue"></i></a>&nbsp;
                                                                <a href="#" onClick="event.preventDefault(); deleteConfirm('{{ $piece->id }}')"><i class="fa fa-trash-o fa-lg " style="color:red"></i></a>
                                                                <form id="{{$piece->id}}" action="{{ route('pieces.destroy', $piece->id) }}" method="POST">
                                                                    {{ csrf_field() }}
                                                                    {{ method_field('DELETE') }}
                                                                </form>
                                                            </td>
                                                       </tr>
                                                      @include('pages.back-office.auditeurs.modif_piece_modal',['modalUrl'=>'dashboard.pieces','idModal' => "Editpiece".$piece->id,  'id'=>$piece->id,'etats'=>$etats,'domaines'=>$domaines ])

                                                    @endforeach
                                                </tbody>
                                        </table>
                                        @else
                                        <div class="card-body">
                                            <div class="padding-6">
                                                Aucun document n'est disponible pour le moment !!!!
                                            </div>
                                        </div>
                                        @endif
                                          {{-- @if($pieces->count() > 0)
                                          @foreach($pieces as $piece)
                                          <tr>
                                              <td>
                                                <a href="{{asset('piece/' . $piece->piece)}}" target="_blank" rel="noopener noreferrer"> Consulter <i class="fas fa-download"></i></a>

                                              </td>
                                         </tr>
                                           @endforeach
                                          contenu
                                          @endif --}}
                                    </div>
                                </div>
                        </div>
                 </div>

       @include('pages.back-office.auditeurs.ajout_agrement_modal',['modalUrl'=>'dashboard.agrements','idModal' => "agrement".$auditeur->id,  'id'=>$auditeur->id,'etats'=>$etats,'domaines'=>$domaines ])
       @include('pages.back-office.auditeurs.ajout_piece_modal',['modalUrl'=>'dashboard.pieces','idModal' => "piece".$auditeur->id,  'id'=>$auditeur->id,'etats'=>$etats,'domaines'=>$domaines ])

        </div>

</div>
</x-master-layout>
