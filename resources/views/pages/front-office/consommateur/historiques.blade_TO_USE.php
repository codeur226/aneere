@extends('layouts.master')
@section('content')
<section class="dashboard">
    <div class="container">

      <div class="row">
        @include('partials.asideUser')
        <div class="col-md-9 mb-5 mt-5" >
          <div class="dashboard-contenu">
            @include('partials._notifications')
            <h5 class="text-center mb-4">
              Mes rapports
              <hr>
            </h5>

            <table class="table table-bordered">
                    <thead class="thead-light  -sm">
                      <tr>
                        <th scope="col">Date de soumission</th>
                        <th scope="col">Nombre d'exemplaire</th>

                      </tr>
                    </thead>
                    <tbody>

                      @foreach ($demandes as $demande)

                      <tr>
                        <th scope="row"> <a href="{{route('demandes.show',  $demande->uuid)}}"  class="text-dark" data-tooltip="Cliquer pour plus d'information"> {{formatDate($demande->created_at)}} </a></th>
                        <td> <a href="{{route('demandes.show', $demande->uuid)}}" class="text-dark" data-tooltip="Cliquer pour plus d'information" > {{ ($demande->nombre_exemplaires)}} <span>Exemplaire{{$demande->nombre_exemplaires > 1 ? 's':''}}</span>  </a> </td>
                      </tr>
                      @endforeach


                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    </div>
    </section>

@endsection

@push('otherjs')

 @endpush

