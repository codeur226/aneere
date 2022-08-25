
@section("pageTitle")
{{ $title }}
@endsection
@section('sectionTitle')
<li class="breadcrumb-item"><a href="{{ route('reglementations.index') }}">Règlementation</a></li>
<li class="breadcrumb-item active" aria-current="page">Details texte règlementataire</li>
@endsection
<x-master-layout>
<div class="row">
   <div class="container">
    <div class="col-lg-12">
        @include('pages.back-office.partials._message_flash')
    </div>
   </div>
</div>

 <div class="row">
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Détail de la reglementation</h3>
        </div>
        <div class=" card-body">
            <div class="padding-4">
                <tr>
                    <td><strong>Type </strong>  : <small class="badge badge-success"> {{ $reglementation->type->libelle }}</small></td>
                </tr><br>
                <tr>
                    <td><strong>Date publication </strong>  : {{ $reglementation->date }}</td>
                </tr><br>
                <tr>
                    <td><strong>Réference </strong>  : {{ $reglementation->reference }} </td>
                </tr><br> <br>
                    {{-- <tr> <td><strong> Objet</strong> : {{ $reglementation->objet }} </td></tr><br><br> --}}
                 {{-- <img  src=" {{ asset('storage/'.$reglementation->fichier) }}" width="20%" height="20%" alt="{{ $reglementation->libelle }}"> --}}
                 <tr>
                    <td >
                            <iframe src="{{ asset('storage/'.$reglementation->fichier) }}" style="width:100%; height:500px;" frameborder="0"></iframe>
                    </td>
                </tr>
            </tr><br><br>
                <tr>
                    <td>
                        <div class="btn-list text-center">
                            <a type="button" class="btn btn-secondary btn-sm" href="{{ route('reglementations.index') }}">Annuler</a>&nbsp;&nbsp;
                            <a type="button" class="btn btn-primary btn-sm" href="{{ route('reglementations.edit',  $reglementation) }}">Modifier</a>&nbsp;&nbsp;
                            <a type="button" class="btn btn-danger btn-sm" href="#" onClick="event.preventDefault(); deleteConfirm('{{ $reglementation->id }}')">Supprimer</a>

                            <form id="{{$reglementation->id}}" action="{{ route('reglementations.destroy', $reglementation->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            </form>
                        </div>
                    </td>
                </tr><br><br>
            </div>
        </div>
    </div>
</div><!-- COL END -->

</div>
</x-master-layout>
