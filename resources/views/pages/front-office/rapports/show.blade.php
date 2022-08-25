<link rel="stylesheet" href="{{asset('css/style.css')}}">
<x-app-layout>
<section class="dashboard">
    <div class="container">

      <div class="row">
        @include('pages.front-office.partials.asideConsommateur')
        <div class="col-md-9 mb-5 mt-5" >
          {{-- @include('pages.back-office.partials._message_flash') --}}
          <div class="dashboard-contenu">

            @include('pages.front-office.partials._message_flash')
            <h5 class="text-center mb-4">
              Détails du rapport
              <hr>
            </h5>
            
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

                                              <dd > <span style="color: white;background-color:blue">{{$rapport->etat }} </span> </dd>
                                              @elseif($rapport->etat=="Validé")
                                              <dd > <span style="color: white;background-color: green">{{$rapport->etat }} </span></dd>
                                                @elseif($rapport->etat=="Réjeté")
                                                <dd> <span style="color: white;background-color: red">{{$rapport->etat }} </span></dd>
                                                @else
                                                <dd> <span style="color: white;background-color: darkorange">{{$rapport->etat }} </span></dd>

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
                                          <a type="button" class="btn btn-danger btn-lg" href="{{route('rapports.index')   }}">Fermer</a>&nbsp;&nbsp;
                                          <a type="button" class="btn btn-primary btn-lg"  href="{{route('rapports.edit',$rapport)   }}"><i class="fa fa-edit ml-3 mr-3" aria-hidden="true"></i> Modifier</a>
                                         </span>
                                         {{-- <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#rapportModal" >Réjeter</button>
                                         <a type="button" class="btn btn-primary btn-lg"  href="{{ route('valider',$rapport) }}">Valider</a>&nbsp;&nbsp; --}}



                                            
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
              </div>
            
             
            
            
              {{-- <h3 id="demo" onclick="myFunction()">Click me to change my color.</h3> --}}


          
            
            </div>
        </div>
    </div>
    </div>
    </section>

      <script>
    
    $('#rapportModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-body input').val(recipient)
  })

//   $( "#rapportModal" ).dialog({
//  open: function( event, ui ) {
//      var boxInput=$("#befor-box").find('input[name="motif"]').val(); //get the value..
    
var motif=$( "#rapportModal" ).find("#motif").val();

 }
});



// function myFunction() {
//   // var motif =document.getElementById("motif").val();
//   var motif=$( "#rapportModal" ).find("#motif").val();
// }
// }



// function delConfirm (){
//             //alert(id);
//             $(function(){
//                 //alert(id);
//                 document.getElementById("motif").val(); // setAttribute("value", id);
//             });

//         }
      </script>



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
</x-app-layout>








