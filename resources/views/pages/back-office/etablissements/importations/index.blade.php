
@section("pageTitle")
{{ $title }}
@endsection
@section('sectionTitle') 
{{-- <li class="breadcrumb-item"><a href="{{ route('auditeurs.index',['statut'=>'cabinet']) }}">Cabinets</a></li> --}}
<li class="breadcrumb-item active" aria-current="page">Importation</li>
@endsection
<x-master-layout>
<div class="row">
    <div class="col-md-12 col-lg-12">
        @include('pages.back-office.partials._message_flash')
        </div>
        <div class="col-lg-3">
                <div class="tab-content">
                      <div class="card">
                            {{-- <div class="card-body"> --}}

                                {{-- @foreach ($importations as $importation)
                                <ul class="side-menu">
                                    
                            
                                    <li class="slide">
                                        <a href="{{ route('importations.index', ['importation'=>$importation->id]) }}" class="side-menu__item @if($importation->id == $curentImportation) {{ set_active_back(['importations.index']) }}@endif">
                                            
                                            
                                            <span class="side-menu__label">{{ $importation->date_importation }} </span>
                                        </a>
                                        <a href="#" onClick="event.preventDefault(); deleteConfirm('{{ $importation->id }}')"><i class="fa fa-trash-o fa-lg " style="color:red"></i></a>
                                        <form id="{{$importation->id}}" action="{{ route('importations.destroy', $importation->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </li>
                                </ul>
                                @endforeach --}}

                                 <table  class="table">
                                    <thead>
                                        <tr>
                                            <th class="wd-10p"></th>
                                            <th class="wd-15p">IMPORTATIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($importations as $importation)
                                        <tr>

                                            
                                            <td>

                                                <a href="#" onClick="event.preventDefault(); deleteConfirm('{{ $importation->id }}')"><i class="fa fa-trash-o fa-lg " style="color:red"></i></a>
                                                <form id="{{$importation->id}}" action="{{ route('importations.destroy', $importation->id) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{ route('importations.index', ['importation'=>$importation->id]) }}" class="side-menu__item @if($importation->id == $curentImportation) {{ set_active_back(['importations.index']) }}@endif">
                                                 {{ $importation->date_importation }} </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table> 


                            {{-- </div> --}}
                      </div>

                </div>

        </div>
    <div class="col-lg-9">
        {{-- <div class="col-lg-10 offset-1"> --}}
            <div class="tab-content">
                  <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Listes des consommateurs importés</h3>
                        <div class="ml-auto pageheader-btn">
                            @if($curentImportation != -1)
                            <a href="{{ route("importations.import",$curentImportation) }}" id="#button1" class="btn btn-success text-white">
                                                <i class="fe fe-plus"></i>Déclarer
                            </a>
                            @endif
                            <a data-toggle="modal" data-target="#importation" href="#" class="btn btn-primary btn-icon text-white">
                                <span>
                                    <i class="fe fe-plus"></i>
                                </span>Importer
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if($importations->count() > 0)
                            <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">Etablissement</th>
                                        <th class="wd-15p">Ville</th>
                                        <th class="wd-20p">Type</th>
                                        <th class="w-10">Telephone</th>
                                        <th class="wd-15p">Email</th>
                                        <th class="w-5"> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($temporaires as $temporaire)

                                    <tr class="position-relative">

                                        <td>{{ $temporaire->nom }}</td>
                                        <td>{{ $temporaire->ville }}</td>
                                        <td>{{$temporaire->type }}</td>
                                        <td>{{$temporaire->telephone }}</td>
                                        <td>{{ $temporaire->email }}</td>
                                        <td><a href="{{ route('temporaires.edit', $temporaire) }}"><i class="fa fa-edit fa-lg" style="color:blue"></i></a>&nbsp;&nbsp;
                                            <a href="#" onClick="event.preventDefault(); deleteConfirm('{{ $temporaire->id }}')"><i class="fa fa-trash-o fa-lg " style="color:red"></i></a>
                                            <form id="{{$temporaire->id}}" action="{{ route('temporaires.destroy', $temporaire->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <div class="card-body">
                                <div class="padding-6">
                                    Aucune données d'importation n'est disponible pour le moment !!!!
                                </div>
                            </div>
                            @endif
                        </div>
                        @include('pages.back-office.etablissements.importations.upload_modal',['modalUrl'=>'dashboard.importations','idModal' => "importation" ])

                    </div>
            </div>
        </div>
    </div>

</x-master-layout>
