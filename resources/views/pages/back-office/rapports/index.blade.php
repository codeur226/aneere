@section("pageTitle")
{{-- @section("Gestion des rapports d'audit externes") --}}
{{ $title }}
@endsection
@section('sectionTitle')
{{-- <li class="breadcrumb-item active">Rapports d'audit externe</li> --}}
<div> 
  <button class="btn btn-primary btn-lg" >Nouveaux ({{ $nouveaux }})</button>
  <button class="btn btn-success btn-lg" >Validés ({{$valides }})</button>
  <button class="btn btn-danger btn-lg" >Réjétés ({{ $rejete }})</button>
  <button class="btn btn-warning btn-lg">Modifiés par l'établissement ({{ $modifies }})</button>
</div>

@endsection
<x-master-layout>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    @include('pages.back-office.partials._message_flash')
                    </div>

                    <div class="card">

                                    <div class="card-header">
                                        <h3 class="card-title">Listes des rapports audits externe</h3>
                                      
                                    </div>
                                   @if($rapports->count() > 0)
                                    <div class="card-body">
                                        <div class="table-responsive">

											<table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
												<thead>
													<tr>
														<th class="wd-15p">Rapport</th>
                                                        <th class="wd-10p">Etat</th>
														<th class="wd-15p">Date de soumission</th>
														<th class="wd-15p">Date de modification</th>
														<th class="wd-15p">Actions</th>
														
														{{-- <th class="wd-20p">satut</th> --}}
													</tr>
												</thead>
												<tbody>
                                                    {{-- @foreach ($rapports as $item)
                                                    @if($item->etat=="Nouveau")
													<tr class="position-relative" style="background-color:#d4e3f0">
                                                            <td data-href="{{ asset('storage/'.$item->url) }}"><i class="fa fa-file-pdf-o d-inline mr-2" aria-hidden="true"></i>{{ $item->libelle }}</td>
                                                           
                                                              <td> {{ $item->etat }} </td>
                                                              <td class=" align-middle w-10"> {{ $item->created_at->format('d-m-Y H:m') }}</td>
                                                              <td class=" align-middle w-10"> {{ $item->updated_at->format('d-m-Y H:m') }}</td>
                                                           
                                                              <td>
                                                                <a class="stretched-link" href="{{ route('showback',$item) }}"><i class="fa fa-eye fa-lg" style="color:blue"></i></a>
                                                                {{-- <a href="{{ route('rapports.edit',$item)  }}" type="button" class="btn btn-sm btn-default" ><i class="fa fa-edit fa-lg" style="color:blue"></i></a>&nbsp;&nbsp; --}}
                                                                   
                                                              {{-- <span class="h-1 border bg-warning button">
                                                                <a href="{{route('showback',$item)   }}"><i class="fa fa-eye ml-3 mr-3" aria-hidden="true"></i></a>
                                                                </span>
                                                            <span class="h-1 border bg-primary button">
                                                             <a href="{{route('rapports.edit',$item)   }}"><i class="fa fa-edit ml-3 mr-3" aria-hidden="true"></i></a>
                                                          </span> --}}
                                                          {{-- </td>                      
                                                          </tr>
													</tr>
                                                    @elseif($item->etat=="Validé")
                                                    <tr  style="background-color:#6cf583" >
                                                        <td data-href="{{ asset('storage/'.$item->url) }}"><i class="fa fa-file-pdf-o d-inline mr-2" aria-hidden="true"></i>{{ $item->libelle }}</td>
                                                       
                                                          <td> {{ $item->etat }} </td>
                                                          <td class=" align-middle w-10"> {{ $item->created_at->format('d-m-Y H:m') }}</td>
                                                          <td class=" align-middle w-10"> {{ $item->updated_at->format('d-m-Y H:m') }}</td>
                                                       
                                                          <td>
                                                            <a class="stretched-link" href="{{ route('showback',$item) }}"><i class="fa fa-eye fa-lg" style="color:blue"></i></a>
                                                             
                                                      </td>                      
                                                      </tr>
                                  
                                                      @elseif($item->etat=="Réjeté")
                                                      <tr  style="background-color:#e76262" >
                                                        <td data-href="{{ asset('storage/'.$item->url) }}"><i class="fa fa-file-pdf-o d-inline mr-2" aria-hidden="true"></i>{{ $item->libelle }}</td>
                                                       
                                                          <td> {{ $item->etat }} </td>
                                                          <td class=" align-middle w-10"> {{ $item->created_at->format('d-m-Y H:m') }}</td>
                                                          <td class=" align-middle w-10"> {{ $item->updated_at->format('d-m-Y H:m') }}</td>
                                                       
                                                          <td>
                                                            <a class="stretched-link" href="{{ route('showback',$item) }}"><i class="fa fa-eye fa-lg" style="color:blue"></i></a>
                                                             
                                                      </td>                      
                                                      </tr> 
                                  
                                                      @else
                                                      <tr  style="background-color:hsl(61, 80%, 54%)" >
                                                        <td data-href="{{ asset('storage/'.$item->url) }}"><i class="fa fa-file-pdf-o d-inline mr-2" aria-hidden="true"></i>{{ $item->libelle }}</td>
                                                       
                                                          <td> {{ $item->etat }} </td>
                                                          <td class=" align-middle w-10"> {{ $item->created_at->format('d-m-Y H:m') }}</td>
                                                          <td class=" align-middle w-10"> {{ $item->updated_at->format('d-m-Y H:m') }}</td>
                                                       
                                                          <td>
                                                            <a class="stretched-link" href="{{ route('showback',$item) }}"><i class="fa fa-eye fa-lg" style="color:blue"></i></a>
                                                             
                                                      </td>                      
                                                      </tr>
                                                      @endif
													@endforeach --}}






                                                    @foreach ($rapports as $item)
                                                    @if($item->etat=="Nouveau")
                                                     <tr style="background-color:#d4e3f0" >
                                                       <td data-href="{{ asset('storage/'.$item->url) }}"><i class="fa fa-file-pdf-o d-inline mr-2" aria-hidden="true"></i>{{ $item->libelle }}</td>
                                                      
                                                         <td> {{ $item->etat }} </td>
                                                         <td class=" align-middle w-10"> {{ $item->created_at->format('d-m-Y H:m') }}</td>
                                                         <td class=" align-middle w-10"> {{ $item->updated_at->format('d-m-Y H:m') }}</td>
                                                      
                                                         <td>
                                                         <span class="h-1 border bg-warning button">
                                                           <a href="{{route('showback',$item)   }}"><i class="fa fa-eye fa-lg" style="color:blue"></i></a>
                                                           </span>
                                                       {{-- <span class="h-1 border bg-primary button">
                                                        <a href="{{route('rapports.edit',$item)   }}"><i class="fa fa-edit ml-3 mr-3" aria-hidden="true"></i></a>
                                                     </span> --}}
                                                     </td>                      
                                                     </tr>
                                                     @elseif($item->etat=="Validé")
                                                     <tr   style="background-color:#6cf583" >

                                                      
                                                       <td data-href="{{ asset('storage/'.$item->url) }}">
                                                        <i class="fa fa-file-pdf-o d-inline mr-2" aria-hidden="true">
                                                         </i>{{ $item->libelle }}</td>

                                                         
                                                      
                                                         <td> {{ $item->etat }} </td>
                                                         <td class=" align-middle w-10"> {{ $item->created_at->format('d-m-Y H:m') }}</td>
                                                         <td class=" align-middle w-10"> {{ $item->updated_at->format('d-m-Y H:m') }}</td>
                                                      
                                                         <td>
                                                         <span class="h-1 border bg-warning button">
                                                           <a href="{{route('showback',$item)   }}"><i class="fa fa-eye fa-lg" style="color:blue"></i></a>
                                                           </span>
                                                       {{-- <span class="h-1 border bg-primary button">
                                                        <a href="{{route('rapports.edit',$item)   }}"><i class="fa fa-edit ml-3 mr-3" aria-hidden="true"></i></a>
                                                     </span> --}}
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
                                                           <a href="{{route('showback',$item)   }}"><i class="fa fa-eye fa-lg" style="color:blue"></i></a>
                                                           </span>
                                                       {{-- <span class="h-1 border bg-primary button">
                                                        <a href="{{route('rapports.edit',$item)   }}"><i class="fa fa-edit ml-3 mr-3" aria-hidden="true"></i></a>
                                                     </span> --}}
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
                                                           <a href="{{route('showback',$item)   }}"><i class="fa fa-eye fa-lg" style="color:blue"></i></a>
                                                           </span>
                                                       {{-- <span class="h-1 border bg-primary button">
                                                        <a href="{{route('rapports.edit',$item)   }}"><i class="fa fa-edit ml-3 mr-3" aria-hidden="true"></i></a>
                                                     </span> --}}
                                                     </td>                      
                                                     </tr>
                                                     @endif
                                 
                                 
                                                   @endforeach



												</tbody>
											</table>
                                            @else
                                            <div class="card-body">
                                                <div class="padding-6">
                                                    Aucun rapports dans votre tableau de bord !!!!
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                        @endif
                        <!-- TABLE WRAPPER -->
                    </div>
                    <!-- SECTION WRAPPER -->
                </div>
            </div>




</x-master-layout>

