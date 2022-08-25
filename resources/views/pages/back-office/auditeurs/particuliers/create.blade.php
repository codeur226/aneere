@section("pageTitle")
{{ $title }}
@endsection

@section('sectionTitle')
<li class="breadcrumb-item"><a href="{{ route('auditeurs.index',['statut'=>'particulier']) }}">Particuliers</a></li>
<li class="breadcrumb-item active" aria-current="page">nouveau particulier</li>

@endsection
<x-master-layout>

   <div class="row">
    <div class=" col-md-12 ">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mr-5 text-center">Nouveau particulier</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('auditeurs.store',['statut' => 'particulier']) }}" method="POST" >
                    @method("POST")
                   @include('pages.back-office.auditeurs.particuliers._formulaire', ["btnTexte" => "Enregistrer","btnCancel" => "Annuler"])
                </form>
                {{-- <script type="text/javascript">
                        function ShowHideDiv() {
                            var chkYes = document.getElementById("prive");
                            var num_rccm = document.getElementById("num_rccm");
                            num_rccm.style.display = chkYes.checked ? "block" : "none";
                            var num_ifu = document.getElementById("num_ifu");
                            num_ifu.style.display = chkYes.checked ? "block" : "none";
                            var autre = document.getElementById("autre");
                            autre.style.display = chkYes.checked ? "block" : "none";
                        }
                </script>
            <script>
            $(function() {
            $("input[name='publique']").click(function() {
            if ($("#prive").is(":checked")) {
            $("#num_rccm").show();
            $("#num_ifu").show();
            $("#autre").show();
            } else {
            $("#num_rccm").hide();
            $("#num_ifu").hide();
            $("#autre").hide();
            }
            });
            });
            </script> --}}

            </div>

        </div>
    </div><!-- COL END -->
</div>
<!-- ROW-1 End-->

</x-master-layout>

