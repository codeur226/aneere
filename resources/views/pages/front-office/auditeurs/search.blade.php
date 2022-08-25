

<x-app-layout>
    <!-- Features Area -->
      <section class="features-area section-bg">

          <div   class="container ">
              <div class="row bg-white">
                  <div class="list-group list-group-flush col-3 mt-5">
                      <span class="p-3  border" align="center ">
                        auditeurs
                      </span>
                      @php $total = 0;

                      $etat= App\Models\Etat::where('etat','like','Actif')->first();
                      @endphp
                      @foreach ($domaines as $domaine)  
                     
                      <a href="{{ route('auditeurs.search',$domaine) }}" class="list-group-item @if($domaine->id == $domaine_id) {{ set_active_green(['auditeurs.search']) }}@endif list-group-item-action">{{  $domaine->nom}} ({{ $auditeurs->where('domaine_id','like', $domaine->id)->count() }}) </a>
                      {{-- $domaine->agrements->where('etat_id','like', $etat->id)->count() --}}
                      {{-- @php ($auditeurs->count())     --}}
                      @php ($total +=$domaine->agrements->where('etat_id','like', $etat->id)->count() )
                      @endforeach
                      
                      <a href="{{ route('auditeurs.search',-1) }}" class="list-group-item list-group-item-action @if($domaine_id == -1) {{ set_active_green(['auditeurs.search']) }}@endif"> TOUT DOMAINE ({{ $auditeurs->count() }}) </a>
                  </div>

                  <div class="col-9">
                          {{-- <div class="row"> --}}
                      <table id="secteur" class="table shopping-summery" >
                          <thead style="font-size: 13px;">
                              <tr class="main-hading">
                                  <th>NOM</th>
                                  <th>VILLE</th>
                                  <th>TYPE</th>
                                  @if($domaine_id == -1)
                                  <th>DOMAINE</th>
                                  @endif
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($auditeurs as $auditeur)
                              <tr class="line" style="text"  style="font-size: 13px;">
                                  <td class=" align-middle w-10" data-title="No">
                                      {{-- <i class="fa fa-file-pdf-o d-inline mr-2" aria-hidden="true"></i> --}}
                                      {{ $auditeur->nom}}

                                      {{-- <p class="product-des d-inline"><a href="#">{{ $reglementation->objet }}</a></p> --}}
                                  </td>
                                  <td class=" align-middle w-10" data-title="No" >{{ $auditeur->ville }}</td>
                                  <td class=" align-middle w-10" data-title="No">{{ $auditeur->personne }}</td>
                                  @if($domaine_id == -1)
                                  <td class=" align-middle w-10" data-title="No">{{ $auditeur->domaine }}</td>
                                  @endif
                              </tr>
                              @endforeach

                          </tbody>
                      </table>
                  {{-- </div> --}}
              </div>
                  {{-- <div class="col-lg-3 col-md-6 col-12">
                      <!-- Single Feature -->
                      <div class="single-feature">
                          <div class="icon-head"><i class="fa fa-podcast"></i></div>
                          <h4><a href="service-single.html">Quality Service</a></h4>
                          <p>Aenean aliquet rutrum enimn scelerisque. Nam dictumanpo, antequis laoreet ullamcorper, velitsd odio scelerisque tod</p>
                          <div class="button">
                              <a href="service-single.html" class="bizwheel-btn"><i class="fa fa-arrow-circle-o-right"></i>Learn More</a>
                          </div>
                      </div>
                      <!--/ End Single Feature -->
                  </div>
                  <div class="col-lg-3 col-md-6 col-12">
                      <!-- Single Feature -->
                      <div class="single-feature active">
                          <div class="icon-head"><i class="fa fa-podcast"></i></div>
                          <h4><a href="service-single.html">On-time Delivery</a></h4>
                          <p>Aenean aliquet rutrum enimn scelerisque. Nam dictumanpo, antequis laoreet ullamcorper, velitsd odio scelerisque tod</p>
                          <div class="button">
                              <a href="service-single.html" class="bizwheel-btn"><i class="fa fa-arrow-circle-o-right"></i>Learn More</a>
                          </div>
                      </div>
                      <!--/ End Single Feature -->
                  </div>
                  <div class="col-lg-3 col-md-6 col-12">
                      <!-- Single Feature -->
                      <div class="single-feature">
                          <div class="icon-head"><i class="fa fa-podcast"></i></div>
                          <h4><a href="service-single.html">24/7 Live support</a></h4>
                          <p>Aenean aliquet rutrum enimn scelerisque. Nam dictumanpo, antequis laoreet ullamcorper, velitsd odio scelerisque tod</p>
                          <div class="button">
                              <a href="service-single.html" class="bizwheel-btn"><i class="fa fa-arrow-circle-o-right"></i>Learn More</a>
                          </div>
                      </div>
                      <!--/ End Single Feature -->
                  </div> --}}
              </div>
          </div>

      </section>

      </x-app-layout>
