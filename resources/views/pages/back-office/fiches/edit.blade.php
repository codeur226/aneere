
 @section("pageTitle")
{{ $title }}
@endsection

@section('sectionTitle')
<li class="breadcrumb-item"><a href="{{ route('fiches.index') }}">Fiches</a></li>
<li class="breadcrumb-item active" aria-current="page">Modifier la fiche</li>

@endsection
<x-master-layout>

   <div class="row">
    <div class=" col-md-8 offset-1  ">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title mr-5 text-center">Modifier la fiche</h3>
            </div>
            <div class="card-body">
                @foreach ($fiche as $fiche)
                <form action="{{ route('fiches.update',$fiche->id) }}" method="post" enctype="multipart/form-data">
                    @method("PUT")
                   @include('pages.back-office.fiches._formulaire_edit', ["btnTexte" => "Enregistrer","btnCancel" => "Annuler"])
                </form>
                @endforeach
            </div>
        </div>
    </div><!-- COL END -->
</div>
<!-- ROW-1 End-->

</x-master-layout>

