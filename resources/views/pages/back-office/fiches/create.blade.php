
 @section("pageTitle")
{{ $title }}
@endsection

@section('sectionTitle')
<li class="breadcrumb-item"><a href="{{ route('fiches.index') }}">Fiches</a></li>
<li class="breadcrumb-item active" aria-current="page">Nouvelle fiche</li>

@endsection
<x-master-layout>

   <div class="row">
    <div class=" col-md-8 offset-1  ">
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title mr-5 text-center">Nouvelle fiche</h3>
            </div>
            <div class="card-body sm ">
                <form action="{{ route('fiches.store') }}" method="POST" enctype="multipart/form-data" id="msform2">
					@method("POST")
					@include('pages.back-office.fiches._formulaire')
				</form>
            </div>
        </div>
    </div><!-- COL END -->
</div>
<!-- ROW-1 End-->

</x-master-layout>

