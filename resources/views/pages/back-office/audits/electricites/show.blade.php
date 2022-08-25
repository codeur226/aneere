
@section("pageTitle")
{{ $title }}
@endsection
@section('sectionTitle')
<li class="breadcrumb-item"><a href="{{ route('collectes.index') }}">Audits</a></li>
{{-- <li class="breadcrumb-item"><a href="{{ route('audits.index', ['statut'=> 'particulier']) }}">Particuliers</a></li> --}}
<li class="breadcrumb-item active" aria-current="page">Details audit</li>
@endsection
<x-master-layout>
<div class="row">
    <div class="col-md-8 offset-2">
        @include('pages.back-office.partials._message_flash')
        </div>
    <div class="col-lg-8 offset-2">
        <div class="tab-content">
            <div class="card2 card">
                    <div class="card-body">
                        <div class="wideget-user">
                            <div class="wideget-user-desc">
                                <div class="user-wrap">
                                    <h4 class="mb-1 text-center">INFORMATIONS SUR L'AUDIT</h4>
                                    <hr>
                                      <div class="row">
                                          <div class="col-md-12">
                                        <dl class="dl">

                                        <dt>Identifiant :</dt>
                                        <dd> {{$audit->id }} </dd>
                                        <dt>Etablissement :</dt>
                                        <dd> {{$audit->consommateur->user->name }} </dd>
                                        <dt>Date de déclaration :</dt>
                                        <dd> {{ formatDate($audit->dateDeclaration) }} </dd>
                                        <dt>Date echeance :</dt>
                                        <dd> {{ formatDate($audit->dateEcheance) }} </dd>
                                        <dt>Etat :</dt>
                                       
                                        <dd> {{$audit->etat}} </dd>
                                        {{-- <dd> {{$audit}} </dd> --}}
                                    </dl>
                                  </div>

                                </div>
                             </div>
                        </div>
                                <div class=" row m-5 d-flex justify-content-center ">
                                    <div class="">
                                    <a type="button" class="btn btn-danger btn-lg" href="#"  onclick="history.go(-1);">Annuler</a>&nbsp;&nbsp;
                                    @if($audit->etat=='Clôturé')
                                    
                                    <a type="button" class="btn btn-success btn-lg" href="{{ route('exporter',$audit) }}"><i class="fe fe-book"></i>Le rapport</a>&nbsp;&nbsp;
                                    
                                    
                                    @else
                                    
                                        <a type="button" class="btn btn-primary btn-lg" href="{{ route('questionnaire',$audit) }}">Réaliser l'audit</a>&nbsp;&nbsp;
                                   
                                        <a type="button" class="btn btn-warning btn-lg" href="{{ route('cloturer',$audit) }}">Clôturer l'audit</a>&nbsp;&nbsp;
                                        
                                    
                                        
                                    @endif
                                        {{-- {{ route('audits.show', $audit) }}" --}}
                                        {{-- <a href="{{ route('exporter') }}" class="btn btn-primary btn-icon text-white"> --}}
                                               
                                            {{-- <a class="btn btn-primary btn-sm pull-right" href="{{ route('export-the-docx') }}">Download the Docs Files</a> <span> --}}
                                                {{-- <i class="fe fe-book"></i>
                                            </span>Télécharger le rapport
                                        </a> --}}
                                    

                                    </td>

                                </div>

                                </div>
                    </div>
            </div>
        </div>
            {{-- @include('pages.back-office.audits.ajout_agrement_modal',['modalUrl'=>'dashboard.agrements','idModal' => "agrement".$audit->id,  'id'=>$audit->id,'etats'=>$etats,'domaines'=>$domaines ]) --}}
        </div>

</div>
</x-master-layout>
