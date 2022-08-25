

<x-app-layout>
      <!-- Features Area -->
		<section class="features-area section-bg">

			<div   class="container ">
				<div class="row bg-white">
                    <div class="list-group list-group-flush col-3 mt-5">
                        <span class="p-3  border" align="center ">
                          reglementations
                        </span>
                        @php ($total = 0)
                        @foreach ($types as $type)
                        <a href="{{ route('reglementationType',['type'=>$type->id]) }}" class="list-group-item list-group-item-action">{{  $type->libelle}} ({{ $type->reglementations->count() }}) </a>
                        @php ($total +=$type->reglementations->count() )
                        @endforeach
                        <a href="{{ route('reglementationType',['type'=>null]) }}" class="list-group-item list-group-item-action"> TOUTE CATEGORIE ({{ $total }}) </a>
                    </div>

                    <div class="col-9">
                            {{-- <div class="row"> --}}
                        <table id="domaine" class="table shopping-summery" >
                            <thead style="font-size: 13px;">
                                <tr class="main-hading">
                                    <th>REFERENCE ET OBJET</th>
                                    <th>DATE DE MISE EN LIGNE</th>
                                    <th class="text-center">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reglementations as $reglementation)
                                <tr class="line" style="text" data-href="{{ 'storage/'.$reglementation->fichier }}"  style="font-size: 13px;">
                                    <td>
                                        <i class="fa fa-file-pdf-o d-inline mr-2" aria-hidden="true"></i>
                                        {{ $reglementation->reference}}

                                        {{-- <p class="product-des d-inline"><a href="#">{{ $reglementation->objet }}</a></p> --}}
                                    </td>
                                    <td class=" align-middle w-10" data-title="No" >{{ $reglementation->created_at->format('d-m-Y H:m') }}</td>
                                    <td class="action align-middle text-center" data-title="Remove"><span class="h-1 border bg-warning button"><a href="#"><i class="fa fa-eye ml-3 mr-3" aria-hidden="true"></i></a></span></td>
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
