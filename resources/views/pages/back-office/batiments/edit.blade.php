@section("pageTitle")
{{ $title }}
@endsection
@section('sectionTitle')
<li class="breadcrumb-item"><a href="{{ route('batiments.index') }}">Batiments</a></li>

<li class="breadcrumb-item active" aria-current="page">Mise à jour</li>
@endsection
<x-master-layout>

   <div class="row">
    <div class=" col-md-8 offset-1">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mr-5">Mise à jour du batiment : {{ $batiment->consommateur->user->name }}</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('batiments.update',$batiment) }}" method="post">
                    @method("PUT")
                   @include('pages.back-office.batiments._formulaire', ["btnTexte" => "Enregistrer","btnCancel" => "Annuler"])
                </form>
            </div>
            <script src="{{asset('assetadmin/js/jquery-3.4.1.min.js')}}"></script>
            <script>
                $(function() {

                    // Récupération des id pour consommateur et domaine
                    var domaine_id  = "{{ old('domaine',$batiment->consommateur->domaine->id) }}" ;
                    var consommateur_id = "{{ old('consommateur',$batiment->consommateur->id) }}" ;
                    // Sélection du domaine
                    $('#domaine').val(domaine_id).prop('selected', true);
                    // Synchronisation des consommateurs
                    // consommateurUpdate(domaine_id);
                    // Changement de la  domaine
                    $('#domaine').on('change', function(e) {
                        var domaine_id = e.target.value;
                        // consommateur_id = false;
                        consommateurUpdate(domaine_id);
                    });
                    // Requête Ajax pour les consommateurs
                    function consommateurUpdate(domaineId) {
                        $.get('{{ url('dashboard/consommateur') }}/'+ domaineId + "", function(data) {
                            // console.log(data);
                            $('#consommateur').empty();
                             $('#consommateur').append($('<option>', {
                                value: null,
                                text : 'Veuillez choisir l\'consommateur'
                                }));
                            $.each(data, function(index, consommateur) {
                            //  console.log(consommateur);
                            $.get('{{ url('dashboard/user') }}/'+ consommateur.user_id + "", function(user) {
                            //    console.log(user);
                                $('#consommateur').append($('<option>', {
                                    value: consommateur.id,
                                    text : user.name
                                }));
                                if(consommateur_id==consommateur.id) {
                                $('#consommateur').val(consommateur.id).prop('selected', true);
                            }
                            });
                             });

                        });
                    }

                });
                </script>
        </div>
    </div><!-- COL END -->
</div>
<!-- ROW-1 End-->

</x-master-layout>

