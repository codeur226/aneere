
@section("pageTitle")
{{ $title }}
@endsection
@section('sectionTitle')
<li class="breadcrumb-item"><a href="{{ route('indexback') }}">RAPPORTS</a></li>
{{-- <li class="breadcrumb-item"><a href="{{ route('audits.index', ['statut'=> 'particulier']) }}">Particuliers</a></li> --}}
<li class="breadcrumb-item active" aria-current="page">Details du rapport</li>
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
                                <h4 class="mb-1 text-center">INFORMATIONS SUR LE RAPPORT</h4>
                                <hr>
                                  <div class="row">
                                      <div class="col-md-12">
                                    <dl class="dl">

                                    <dt>Date de soumission :</dt>
                                    <dd> {{$rapport->created_at }} </dd>
                                    <dt>Etat :</dt>
                                    @if($rapport->etat=="Nouveau")

                                    <dd> <span style="color: white;background-color:blue">{{$rapport->etat }} </span> </dd>
                                    @elseif($rapport->etat=="Validé")
                                    <dd > <span style="color: white;background-color: green">{{$rapport->etat }} </span></dd>
                                      @elseif($rapport->etat=="Réjeté")
                                      <dd> <span style="color: white;background-color: red">{{$rapport->etat }} </span></dd>
                                      @else
                                      <dd > <span style="color: white;background-color: darkorange">{{$rapport->etat }} </span></dd>

                                    @endif
                                    <dt>Rapport :</dt>
                                    <dd data-href="{{ asset('storage/'.$rapport->url) }}"><i class="fa fa-file-pdf-o d-inline mr-2" aria-hidden="true"></i>{{ $rapport->libelle }}  </dd>
                                  
                                </dl>
                              </div>

                            </div>
                         </div>
                    </div>
                            <div class=" row m-5 d-flex justify-content-center ">
                                <div class="">
                                <a type="button" class="btn btn-danger btn-lg" href="#"  onclick="history.go(-1);">Fermer</a>&nbsp;&nbsp;
                               </span>
                               <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#rapportModal" >Réjeter</button>
                               <a type="button" class="btn btn-primary btn-lg"  href="{{ route('valider',$rapport) }}">Valider</a>&nbsp;&nbsp;



                                  
                                {{-- @endif --}}
                                

                                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button> --}}
                                
                                
                            


                                </td>

                            </div>

                            </div>
                </div>
        </div>

        
         
            <div class="card-footer">
             <h6>Historique du rapport</h6>
             @foreach($commentaires as $item)
             <div>
               <hr>
              <span style="color: coral"> {{ $item->commentaire }} </span> <br>
              <span style="font-style: italic"> Date {{ $item->created_at }}  <br> Utilisateur : {{ getnomUtilisateur($item->user_id )}}</span>
              @endforeach

             </div>
             
            </div>


    </div>
            {{-- @include('pages.back-office.audits.ajout_agrement_modal',['modalUrl'=>'dashboard.agrements','idModal' => "agrement".$audit->id,  'id'=>$audit->id,'etats'=>$etats,'domaines'=>$domaines ]) --}}
        </div>

</div>



{{-- FENETRE DU MODAL --}}

<div class="modal fade" id="rapportModal" tabindex="-1" role="dialog" aria-labelledby="rapportModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="rapportModalLabel">Motif de rejet du rapport</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
  
  
            <form action="{{ route('rejeter',$rapport) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('POST')
                  
                    <div class="form-group">
                      <label for="motif" class="col-form-label">Motif:</label>
                      
                        <input type="hidden" class="form-control" name="user" id="user" value="{{ Auth::user()->id }}">
                        
                      <textarea class="form-control" name="motif" id="motif" required></textarea>
                    </div>
                
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                  <button type="submit" class="btn btn-primary" >Enregister</button>
                </div>
      </form>
      </div>
    </div>
  </div>
</x-master-layout>
