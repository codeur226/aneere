<link rel="stylesheet" href="{{asset('css/style.css')}}">
<x-app-layout>
<section class="dashboard">
    <div class="container">

      <div class="row">
        @include('pages.front-office.partials.asideConsommateur')
        <div class="col-md-9 mb-5 mt-5" >
          <div class="dashboard-contenu">

            {{-- @include('partials._notifications') --}}
            <h5 class="text-center mb-4">
              Mes rapports
              <div class="pull-right">
              <a href="{{ route('rapports.create') }}" class="btn btn-primary btn-icon text-white ">
                <span>
                    <i class="fe fe-plus"></i>
                </span>Ajouter un rapport</a>
                </div>
              <hr>
            </h5>
            
           
                    
            
            
            
            
            <div class="col-12">
              {{-- <div class="row"> --}}
          <table id="secteur" class="table shopping-summery" >
              <thead style="font-size: 13px;">
                  <tr class="main-hading">
                    <th scope="col">Rapport</th>
                    <th scope="col">Etat</th>
                    <th scope="col">Date de soumission</th>                        
                    <th scope="col">Date de modification</th>                        
                    
                   
                    <th scope="col">Actions</th>

                  </tr>
              </thead>
              <tbody>
                  

                   @foreach ($rapports as $item)
                   @if($item->etat=="Nouveau")
                    <tr  style="background-color:#d4e3f0" >
                      <td data-href="{{ asset('storage/'.$item->url) }}"><i class="fa fa-file-pdf-o d-inline mr-2" aria-hidden="true"></i>{{ $item->libelle }}</td>
                     
                        <td> {{ $item->etat }} </td>
                        <td class=" align-middle w-10"> {{ $item->created_at->format('d-m-Y H:m') }}</td>
                        <td class=" align-middle w-10"> {{ $item->updated_at->format('d-m-Y H:m') }}</td>
                     
                        <td>
                        <span class="h-1 border bg-warning button">
                          <a href="{{route('rapports.show',$item)   }}"><i class="fa fa-eye ml-3 mr-3" aria-hidden="true"></i></a>
                          </span>
                      <span class="h-1 border bg-primary button">
                       <a href="{{route('rapports.edit',$item)   }}"><i class="fa fa-edit ml-3 mr-3" aria-hidden="true"></i></a>
                    </span>
                    </td>                      
                    </tr>
                    @elseif($item->etat=="Validé")
                    <tr  style="background-color:#6cf583" >
                      <td data-href="{{ asset('storage/'.$item->url) }}"><i class="fa fa-file-pdf-o d-inline mr-2" aria-hidden="true"></i>{{ $item->libelle }}</td>
                     
                        <td> {{ $item->etat }} </td>
                        <td class=" align-middle w-10"> {{ $item->created_at->format('d-m-Y H:m') }}</td>
                        <td class=" align-middle w-10"> {{ $item->updated_at->format('d-m-Y H:m') }}</td>
                     
                        <td>
                        <span class="h-1 border bg-warning button">
                          <a href="{{route('rapports.show',$item)   }}"><i class="fa fa-eye ml-3 mr-3" aria-hidden="true"></i></a>
                          </span>
                      <span class="h-1 border bg-primary button">
                       <a href="{{route('rapports.edit',$item)   }}"><i class="fa fa-edit ml-3 mr-3" aria-hidden="true"></i></a>
                    </span>
                    </td>                      
                    </tr>

                    @elseif($item->etat=="Réjeté")
                    <tr  style="background-color:#e76262" >
                      <td data-href="{{ asset('storage/'.$item->url) }}"><i class="fa fa-file-pdf-o d-inline mr-2" aria-hidden="true"></i>{{ $item->libelle }}</td>
                     
                        <td> {{ $item->etat }} </td>
                        <td class=" align-middle w-10"> {{ $item->created_at->format('d-m-Y H:m') }}</td>
                        <td class=" align-middle w-10"> {{ $item->updated_at->format('d-m-Y H:m') }}</td>
                     
                        <td>
                        <span class="h-1 border bg-warning button">
                          <a href="{{route('rapports.show',$item)   }}"><i class="fa fa-eye ml-3 mr-3" aria-hidden="true"></i></a>
                          </span>
                      <span class="h-1 border bg-primary button">
                       <a href="{{route('rapports.edit',$item)   }}"><i class="fa fa-edit ml-3 mr-3" aria-hidden="true"></i></a>
                    </span>
                    </td>                      
                    </tr>


                    @else
                    <tr  style="background-color:hsl(61, 80%, 54%)" >
                      <td data-href="{{ asset('storage/'.$item->url) }}"><i class="fa fa-file-pdf-o d-inline mr-2" aria-hidden="true"></i>{{ $item->libelle }}</td>
                     
                        <td> {{ $item->etat }} </td>
                        <td class=" align-middle w-10"> {{ $item->created_at->format('d-m-Y H:m') }}</td>
                        <td class=" align-middle w-10"> {{ $item->updated_at->format('d-m-Y H:m') }}</td>
                     
                        <td>
                        <span class="h-1 border bg-warning button">
                          <a href="{{route('rapports.show',$item)   }}"><i class="fa fa-eye ml-3 mr-3" aria-hidden="true"></i></a>
                          </span>
                      <span class="h-1 border bg-primary button">
                       <a href="{{route('rapports.edit',$item)   }}"><i class="fa fa-edit ml-3 mr-3" aria-hidden="true"></i></a>
                    </span>
                    </td>                      
                    </tr>
                    @endif


                  @endforeach

              </tbody>
          </table>
      {{-- </div> --}}
  </div>
            
            </div>
        </div>
    </div>
    </div>
    </section>
</x-app-layout>







