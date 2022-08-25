<link rel="stylesheet" href="{{asset('css/style.css')}}">
<x-app-layout>
    <section class="dashboard">
        <div class="container">

            <div class="row">
                @include('pages.front-office.partials.asideConsommateur')
                <div class="col-md-9 mb-5 mt-5">
                    <div class="dashboard-contenu">
                        <h5 class="text-center">
                            @include('pages.front-office.partials._message_flash')
                            Informations sur     l'établissement
                            <hr>
                        </h5>
                        <div class="col my-2 pl-5 d-flex justify-content-center">
                            <a id="link_maj"  class="btn btn-primary btn-sm">Mettre à jour les informations de mon établissement</a>
                        </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <div class="generale-information">
                                        <dl class="dl">
                                            <dt>Nom :</dt>
                                            <dd class="text-uppercase"> {{ucFirst($consommateur->user->name)}} </dd>
                                            <dt>Secteur :</dt>
                                            <dd> {{($consommateur->domaine->nom!=null) ? $consommateur->domaine->nom : "(Indéfini)"    }} </dd>
                                            {{-- @dd($consommateur->statut ) --}}
                                            @if ($consommateur->statut != 'public')
                                            <dt> Numéro RCCM : </dt>
                                            <dd> {{  ($consommateur->num_rccm !=null) ? $consommateur->num_rccm : "(Indéfini)" }}   </dd>
                                            <dt> Numéro IFU : </dt>
                                            <dd>   {{  ($consommateur->num_ifu!=null) ? $consommateur->num_ifu : "(Indéfini)" }}     </dd>
                                            @endif
                                            <dt>Date de creation :</dt>
                                            <dd> {{  ($consommateur->date_creation !=null) ? formatDate($consommateur->date_creation) : "(Indéfini)"  }} </dd>
                                            <dt>Date de declaration :</dt>
                                            <dd> {{ ($audit->dateDeclaration != null) ? formatDate($audit->dateDeclaration) : "(Indéfini)" }} </dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="file-information">
                                        <dl class="dl">
                                            <dt>Emai :</dt>
                                            <dd> {{  ($consommateur->user->email !=null) ? $consommateur->user->email : "(Indéfini)" }} </dd>
                                            <dt>Ville :</dt>
                                            <dd> {{  ($consommateur->ville->nom != null) ? $consommateur->ville->nom : "(Indéfini)" }} </dd>
                                            <dt>Tel mobile :</dt>
                                            <dd> {{  ($consommateur->tel_mobile != null) ? $consommateur->tel_mobile  : "(Indéfini)" }} </dd>
                                            <dt>Tel fixe :</dt>
                                            <dd> {{  ($consommateur->tel_fixe !=null) ? $consommateur->tel_fixe : "(Indéfini)" }} </dd>
                                            <dt> BP :</dt>
                                            <dd> {{  ($consommateur->bp !=null) ? $consommateur->bp : "(Indéfini)" }} </dd>
                                            <dt>Statut :</dt>
                                            <dd>{{  ($consommateur->statut !=null) ? $consommateur->statut  : "(Indéfini)"  }}</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>

                     </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
