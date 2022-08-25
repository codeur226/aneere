@section("pageTitle")
{{ $title }}
@endsection
@section('sectionTitle')
<li class="breadcrumb-item active">Questionnaire</li>

@endsection
<x-master-layout>

            <div class="row">
                <div class="col-md-12 col-lg-12">
                    @include('pages.back-office.partials._message_flash')
                    </div>
                    <div class=" col-md-10 offset-1 ">
                    <div class="card">

                                    <div class="card-header">
                                        <h3 class="card-title">Questionnaire</h3>
                                       
                                    </div>
                                   @if($questions->count() > 0)
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <form action="{{ route('reponses.store') }}"  method="POST" enctype="multipart/form-data" id="msform">
                                                @method("POST")
                                                @csrf

                                                @foreach ($questions as $question)
                                                <br/>
                                                    @if($question->type_question=="text")
                                                    {{-- Construction de questionnnaire de type texte --}}
                                                    <div class="form-group input-group">
                                                        <span class="has-float-label">
                                                          <input type="hidden" name="{{ $question->id }}" id="{{ $question->id }}" value="{{ $question->id }}" />

                                                          <input type="text" class="form-control" name="{{ $question->libelle }}" id="{{ $question->libelle }}"  placeholder="??" required/>
                                                          <label for="{{ $question->libelle }}"  class="font-weight-bold">{{  $question->numero_question }}.  {{  $question->etiquette }}</label>
                                                        </span>
                                                    </div>
                                                    @error('{{ $question->libelle }}')<small class="text-danger">{{ $message }}<br></small>@enderror
                                                    @if($question->sous_question==true)
                                                          <div class="form-group input-group">
                                                            <span class="has-float-label">
                                                              
                                                              <input type="text" class="form-control" name="{{ $question->libelle_sous_question }}" id="{{ $question->libelle_sous_question }}"  placeholder="" required/>
                                                              <label for="{{ $question->libelle_sous_question }}"  class="font-weight-bold">{{  $question->etiquette_sous_question }}</label>
                                                            </span>
                                                        </div>
                                                        @error('{{ $question->libelle_sous_question }}')<small class="text-danger">{{ $message }}<br></small>@enderror
                                                 
                                                    @endif
                                                    
                                                    @elseif($question->type_question=="Radio")
                                                    {{-- cConstruction de questionnnaire de type radio--}}
                                                    <div class="form-group input-group">
                                                      <span class="has-float-label">
                                                       <br />
                                                    <div class='row'>
                                                      <h3  class='fs-subtitle'>{{  $question->numero_question }}.  {{  $question->etiquette }}</h3>
                                                    </div>
                                                    <div class='row'>
                                                      <input type="hidden" name="{{ $question->id }}" id="{{ $question->id }}" value="{{ $question->id }}" />

                                                            <input type="radio"  class='action-chekbox-yes'name="{{ $question->libelle }}" value="true" id="oui" /> <span style='padding-top: 7px;'> Oui</span>
                                                            {{-- <label for="oui">Oui</label><br/> --}}
                                                            <input type="radio"  class='action-chekbox-no' name="{{ $question->libelle }}" value="false" id="non" /><span style='padding-top: 7px;'> Non</span>
                                                           
                                                          </div> 
                                                        
                                                        </span>
                                                        </div>
                                                        @error('{{ $question->libelle }}')<small class="text-danger">{{ $message }}<br></small>@enderror
                                                        @if($question->sous_question==true)
                                                        <div class="form-group input-group">
                                                          <span class="has-float-label">
                                                            <input type="text" class="form-control" name="{{ $question->libelle_sous_question }}" id="{{ $question->libelle_sous_question }}"  placeholder="" required/>
                                                            <label for="{{ $question->libelle_sous_question }}"  class="font-weight-bold">{{  $question->etiquette_sous_question }}</label>
                                                          </span>
                                                      </div>
                                                      @error('{{ $question->libelle_sous_question }}')<small class="text-danger">{{ $message }}<br></small>@enderror
                                               
                                                  @endif


                                                   @elseif($question->type_question=="textarea")
                                                    <div class="form-group input-group">
                                                        <span class="has-float-label">
                                                          <input type="hidden" name="{{ $question->id }}" id="{{ $question->id }}" value="{{ $question->id }}" />


                                                        <textarea name="{{ $question->libelle }}" type="text" class="form-control" cols="2" rows="2"></textarea>
                                                          <label for="{{ $question->libelle }}" class="font-weight-bold">{{  $question->numero_question }}.  {{  $question->etiquette }}</label>
                                                        </span>
                                                      </div> 

                                                    @elseif($question->type_question=="checkbox")
                                                    <div class="form-group input-group">
                                                      <span class="has-float-label">
                                                       <br />
                                                    <div class='row'>
                                                      <h3  class='fs-subtitle'>Cette question a-telle une sous question ?   </h3>
                                                    </div>
                                                    <div class='row'>
                                                      
                                                     
                                                      {{-- {{  $options= }} --}}
                                                    @foreach (getlisteqcm($question->id) as $item) 
                                                                                                    {{--A REVOIR  --}}
                                                     {{-- <input type="hidden" name="{{ $question->id }}" id="{{ $question->id }}" value="{{ $question->id }}" /> --}}
                                                      {{-- {{ $nom_champs= }} --}}
                                                    <input type='checkbox' id='{{str_replace(' ', '',$item->libelle_option) }}' name='{{ str_replace(' ', '',$item->libelle_option) }}' value="true" class='action-chekbox-yes'><span style='padding-top: 7px;'> {{ $item->etiquette_option }}</span>
                                                    <input type='checkbox' id='test' name='test' value="true" class='action-chekbox-yes'><span style='padding-top: 7px;'> test</span>

                                                    @endforeach
                                                    @error('sousquestion')<small class="text-danger">{{ $message }}<br></small>@enderror
{{-- 

                                                    <div class="form-group input-group">
                                                        <span class="has-float-label">
                                                        <textarea name="option_{{ $question->libelle }}" type="text" class="form-control" cols="2" rows="2" placeholder="Exemple : Bonne;Passable;Mauvais"></textarea>
                                                          <label for="option_{{ $question->libelle }}"  class="font-weight-bold">Saissisez les différente options de la question séparer par des points virgules</label>
                                                        </span>
                                                      </div>  --}}


                                                    @elseif($question->type_question=="email")
                                                    {{-- Construction de questionnnaire de type email --}}
                                                    <div class="form-group input-group">
                                                        <span class="has-float-label">
                                                          <input type="hidden" name="{{ $question->id }}" id="{{ $question->id }}" value="{{ $question->id }}" />


                                                          <input type="email" class="form-control" name="{{ $question->libelle }}" id="{{ $question->libelle }}"  placeholder="??" required/>
                                                          <label for="{{ $question->libelle }}" class="font-weight-bold">{{  $question->numero_question }}.  {{  $question->etiquette }}</label>
                                                        </span>
                                                    </div>
                                                    @error('{{ $question->libelle }}')<small class="text-danger">{{ $message }}<br></small>@enderror

                                                    @elseif($question->type_question=="date")
                                                     {{-- Construction de questionnnaire de type date --}}
                                                     <div class="form-group input-group">
                                                        <span class="has-float-label">
                                                          <input type="hidden" name="{{ $question->id }}" id="{{ $question->id }}" value="{{ $question->id }}" />


                                                          <input type="date" class="form-control" name="{{ $question->libelle }}" id="{{ $question->libelle }}"  placeholder="jj/mm/aaaa" required/>
                                                          <label for="{{ $question->libelle }}"  class="font-weight-bold">{{  $question->numero_question }}.  {{  $question->etiquette }}</label>
                                                        </span>
                                                    </div>
                                                    @error('{{ $question->libelle }}')<small class="text-danger">{{ $message }}<br></small>@enderror


                                                    @elseif($question->type_question=="number")
                                                     {{-- Construction de questionnnaire de type numero --}}
                                                     <div class="form-group input-group">
                                                        <span class="has-float-label">
                                                          <input type="hidden" name="{{ $question->id }}" id="{{ $question->id }}" value="{{ $question->id }}" />


                                                          <input type="number" class="form-control" name="{{ $question->libelle }}" id="{{ $question->libelle }}"  placeholder="??" required/>
                                                          <label for="{{ $question->libelle }}"  class="font-weight-bold">{{  $question->numero_question }}.  {{  $question->etiquette }}</label>
                                                        </span>
                                                    </div>
                                                    @error('{{ $question->libelle }}')<small class="text-danger">{{ $message }}<br></small>@enderror


                                                    @endif

											@endforeach

                                              </form>
										



                                            @else
                                            <div class="card-body">
                                                <div class="padding-6">
                                                    Aucune questions n'est dans la base de donnée !
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                        @endif
                        <!-- TABLE WRAPPER -->
                    </div>
                    <div class="btn-list text-center">
                      <button type="button" onclick="history.go(-1);"class="btn btn-danger btn-lg ">Annuler</button>
                      <button type="submit" class="btn btn-primary btn-lg">Enregistrer</button>
                      </div>

                    <!-- SECTION WRAPPER -->
                    </div>
                </div>
            </div>




</x-master-layout>

