@section("pageTitle")
{{ $title }}
@endsection

@section('sectionTitle')
<li class="breadcrumb-item"><a href="#">Audits</a></li>
<li class="breadcrumb-item"><a href="{{ route('#') }}">Enregistrement des questions d'audits</a></li>
<li class="breadcrumb-item active" aria-current="page">Nouvelle question</li>

@endsection
<x-master-layout>

   <div class="row">
    <div class=" col-md-8 offset-1">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mr-5">Nouvelle question</h3>
            </div>
            <div class="card-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @method("POST")
                   {{-- @include('pages.back-office.questions._formulaire', ["btnTexte" => "Enregistrer","btnCancel" => "Annuler"]) --}}
                </form>
            </div>

        </div>
    </div><!-- COL END -->
</div>
<!-- ROW-1 End-->

</x-master-layout>

