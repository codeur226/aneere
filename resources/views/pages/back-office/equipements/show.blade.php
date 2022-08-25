
@section("pageTitle")
{{ $title }}
@endsection
@section('sectionTitle')
<li class="breadcrumb-item"><a href="{{ route('batiments.index') }}">Règlementation</a></li>

<li class="breadcrumb-item active" aria-current="page">Détail type de texte règlementaire</li>
@endsection
<x-master-layout>
 <div class="row">
<div class="col-lg-4">
    <div class="col-md-12 col-lg-12">
        @include('pages.back-office.partials._message_flash')
        </div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Détail du batiment : {{ $batiment->etablissement->user->name }}</h3>
        </div>
        <div class=" card-body">
            <div class="padding-4">

                <tr><td><strong>Libéllé </strong>  : {{ $batiment->num_compteur }} </td></tr><br><br>
                </td></tr><br><br>
                <tr> <td><a href="{{ route('batiments.index') }}"><i class="fa fa-mail-reply fa-lg" style="color:black"></i></a>&nbsp;&nbsp;
                    <a href="{{ route('batiments.edit', $batiment) }}"><i class="fa fa-edit fa-lg" style="color:blue"></i></a>&nbsp;&nbsp;
                    <a href="#" onClick="event.preventDefault(); deleteConfirm('{{ $batiment->id }}')"><i class="fa fa-trash-o fa-lg " style="color:red"></i></a>

                    <form id="{{$batiment->id}}" action="{{ route('batiments.destroy', $batiment->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                </td></tr><br><br>
            </div>
        </div>
    </div>
</div><!-- COL END -->

</div>
</x-master-layout>
