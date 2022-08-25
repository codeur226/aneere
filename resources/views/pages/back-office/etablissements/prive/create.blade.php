@section("pageTitle")
{{ $title }}
@endsection

@section('sectionTitle')
<li class="breadcrumb-item"><a href="{{ route('consommateurs.index',['statut'=>'privé']) }}">Entreprises</a></li>
<li class="breadcrumb-item active" aria-current="page">nouvelle entreprise</li>

@endsection
<x-master-layout>

   <div class="row">
    <div class=" col-md-12 ">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mr-5 text-center">Nouvel entreprise</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('consommateurs.store',['statut'=>'privé']) }}" method="POST" >
                    @method("POST")
                   @include('pages.back-office.etablissements.prive._formulaire', ["btnTexte" => "Enregistrer","btnCancel" => "Annuler"])
                </form>


            </div>

        </div>
    </div><!-- COL END -->
</div>
<!-- ROW-1 End-->
<script src="{{asset('assetadmin/js/jquery-3.4.1.min.js')}}"></script>
<script>
    $(function() {

        var domaine_id  = {{ old('domaine_id',0) }};
        // Sélection du domaine
        setIdentifier(domaine_id);
        // Changement de la  domaine
        $('#domaine_id').on('change', function(e) {
            var domaine_id = e.target.value;
            setIdentifier(domaine_id);
        });
        // Requête Ajax pour les consommateurs
        function setIdentifier(domaineId) {
            $.get('{{ url('consommateur/identifier') }}/'+ domaineId + "/"+ -1 + "", function(data) {
                $('#num_identification').val(data)


            });
        }

    });
    </script>
</x-master-layout>

