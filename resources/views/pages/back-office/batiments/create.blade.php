@section("pageTitle")
{{ $title }}
@endsection

@section('sectionTitle')
{{-- <li class="breadcrumb-item"><a href="{{ route('etablissements.index') }}">Etablissements</a></li> --}}
<li class="breadcrumb-item"><a href="#" onclick="history.go(-1);">Batiments</a></li>
<li class="breadcrumb-item active" aria-current="page">Nouveau Batiment</li>

@endsection
<x-master-layout>

   <div class="row">
    <div class=" col-md-8 offset-1">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mr-5">Nouveau batiment</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('batiments.store') }}" method="POST">
                    @method("POST")
                   @include('pages.back-office.batiments._formulaire', ["btnTexte" => "Enregistrer","btnCancel" => "Annuler"])
                </form>
            </div>
            <script src="{{asset('assetadmin/js/jquery-3.4.1.min.js')}}"></script>
            <script>
                $(function() {

                    // Récupération des id pour consommateur et domaine
                    var domaine_id  = {{ old('domaine',0) }};
                    var consommateur_id = {{ old('consommateur',0)}};
                    // Sélection du domaine
                    $('#domaine').val(domaine_id).prop('selected', true);
                    // Synchronisation des consommateurs
                    consommateurSave(domaine_id);
                    // Changement de la  domaine
                    $('#domaine').on('change', function(e) {
                        var domaine_id = e.target.value;
                        consommateur_id = false;
                        consommateurSave(domaine_id);
                        // console.log(domaine_id);
                    });
                    // Requête Ajax pour les consommateurs
                    function consommateurSave(domaineId) {
                        $.get('{{ url('consommateur/consommateur') }}/'+ domaineId + "", function(data) {
                            // console.log(data);
                            $('#consommateur').empty();
                            // $("#consommateur").append(new Option("Veillez choisir  consommateur", "null"));
                            // $('#consommateur').append($('<option>', {
                            //     value: null,
                            //     text : 'Veillez choisir  consommateur'
                            // }));
                            // $('#consommateur').prop('required', true);

                            $.each(data, function(index, consommateur) {
                            //  console.log(consommateur);
                            $.get('{{ url('consommateur/user') }}/'+ consommateur.user_id + "", function(user) {
                            //    console.log(user);
                                $('#consommateur').append($('<option>', {
                                    value: consommateur.id,
                                    text : user.name
                                }));
                            });
                             });
                            if(consommateur_id) {
                                $('#consommateur').val(consommateur_id).prop('selected', true);
                            }

                        });
                    }

                });
                </script>
        </div>
    </div><!-- COL END -->
</div>
<!-- ROW-1 End-->

</x-master-layout>

