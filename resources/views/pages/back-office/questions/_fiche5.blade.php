{{-- GESTION DES INFORMATIONS DE LA FICHE 1 --}}
<fieldset class="pre-scrollable"> 
  <h2 class='fs-title'>COLLECTE DE DONNEES SUR LES CABLES ELECTRIQUES</h2>

  <div class='row'>
  @csrf

  @foreach ($q_fiche5 as $question)
  <br/>
      @if($question->type_question=="text")
        {{-- Construction de questionnnaire de type texte --}}
        <div class="form-group input-group">
            <span class="has-float-label">
              <br/>
              <div class='row'>
                <h3  class='fs-subtitle'>{{  $question->numero_question }}.  {{  $question->libelle }}</h3>
              </div>
              <input type="hidden" name="{{ $question->id }}" id="{{ $question->id }}" value="{{ $question->id }}" />
              <input type="text" class="form-control" name="{{ $question->etiquette }}" id="{{ $question->etiquette }}"  placeholder="??" required/>
              {{--<label for="{{ $question->libelle }}"  class="font-weight-bold">{{  $question->numero_question }}  {{  $question->etiquette }}</label>--}}
            </span>
        </div>
        @error('{{ $question->etiquette }}')<small class="text-danger">{{ $message }}<br></small>@enderror
        @if($question->sous_question==true)
              <div class="form-group input-group">
                <span class="has-float-label">
                  <br/>
                  <div class='row'>
                    <h3  class='fs-subtitle'>{{  $question->libelle_sous_question }}</h3>
                  </div>
                  <input type="text" class="form-control" name="{{ $question->etiquette_sous_question }}" id="{{ $question->etiquette_sous_question }}"  placeholder="" />
                </span>
            </div>
            @error('{{ $question->etiquette_sous_question }}')<small class="text-danger">{{ $message }}<br></small>@enderror
        @endif
      @endif

      
      @if($question->type_question=="radio")
      {{-- cConstruction de questionnnaire de type radio--}}
      <div class="form-group input-group">
        <span class="has-float-label">
         <br />
      <div class='row'>
        <h3  class='fs-subtitle'>{{  $question->numero_question }}.  {{  $question->libelle }}</h3>
      </div>
      <div class='row'>
        <input type="hidden" name="{{ $question->id }}" id="{{ $question->id }}" value="{{ $question->id }}" />

              <input type="radio"  class='action-chekbox-yes' name="{{  $question->etiquette }}" value="true" id="{{  $question->etiquette }}" /> <span style='padding-top: 7px;'> Oui</span>
              {{-- <label for="oui">Oui</label><br/> --}}
              <input type="radio"  class='action-chekbox-no' name="{{  $question->etiquette }}" value="false" id="{{  $question->etiquette }}" /><span style='padding-top: 7px;'> Non</span>
             
            </div> 
          
          </span>
          </div>
        @error('{{ $question->etiquette }}')<small class="text-danger">{{ $message }}<br></small>@enderror
        @if($question->sous_question==true)
          <div class="form-group input-group">
            <span class="has-float-label">
                <br/>
                <div class='row'>
                  <h3  class='fs-subtitle'>{{  $question->libelle_sous_question }}</h3>
                </div>
              <input type="text" class="form-control" name="{{ $question->etiquette_sous_question }}" id="{{ $question->etiquette_sous_question }}"  placeholder="" required/>
            </span>
        </div>
        @error('{{ $question->etiquette_sous_question }}')<small class="text-danger">{{ $message }}<br></small>@enderror
        @endif
      @endif



     @if($question->type_question=="textarea")
      <div class="form-group input-group">
          <span class="has-float-label">
            <br/>
                <div class='row'>
                  <h3  class='fs-subtitle'>{{  $question->numero_question }}.  {{  $question->libelle }}</h3>
                </div>
            <input type="hidden" name="{{ $question->id }}" id="{{ $question->id }}" value="{{ $question->id }}" />
          <textarea name="{{ $question->etiquette }}" type="text" class="form-control" cols="2" rows="2"></textarea>
          </span>
        </div> 

        @if($question->sous_question==true)
          <div class="form-group input-group">
            <span class="has-float-label">
              <br/>
                <div class='row'>
                  <h3  class='fs-subtitle'>{{  $question->libelle_sous_question }}</h3>
                </div>
              <input type="text" class="form-control" name="{{ $question->etiquette_sous_question }}" id="{{ $question->etiquette_sous_question }}"  placeholder="" required/>
            </span>
        </div>
        @error('{{ $question->etiquette_sous_question }}')<small class="text-danger">{{ $message }}<br></small>@enderror
        @endif
      @endif

      @if($question->type_question=="checkbox")
                  <div class="form-group input-group">
                    <span class="has-float-label">
                  <br/>
                  <div class='row'>
                    <h3  class='fs-subtitle'> {{  $question->numero_question }}.  {{  $question->libelle }}     </h3>
                  </div>
                  <div class='row'>
                    {{-- Parcourir la liste des QCM pour contruire les QCm li??s a la questions--}}
                    @foreach ($optionsqcms as $item)  
                    {{-- Si le question_id dans QCM == id de question, alors il cnstruit  --}}
                    @if($item->question_id==$question->id)                                                     
                    <input type='checkbox' id='{{ $item->libelle_option }}' name='{{$question->etiquette}}[]' value="{{ $item->etiquette_option }}" class='action-chekbox-yes'><span style='padding-top: 7px;'> {{ $item->etiquette_option }}</span>
                    @endif
                  @endforeach
                </div>
              </div>
                  @error('{{ $item->libelle_option }}')<small class="text-danger">{{ $message }}<br></small>@enderror
                  @if($question->sous_question==true)
                  <div class="form-group input-group">
                    <span class="has-float-label">
                      <br/>
                        <div class='row'>
                          <h3  class='fs-subtitle'>{{  $question->libelle_sous_question }}</h3>
                        </div>
                      <input type="text" class="form-control" name="{{ $question->etiquette_sous_question }}" id="{{ $question->etiquette_sous_question }}"  placeholder="" required/>
                    </span>
                </div>
                @error('{{ $question->etiquette_sous_question }}')<small class="text-danger">{{ $message }}<br></small>@enderror
                @endif
              @endif
                


      @if($question->type_question=="email")
        {{-- Construction de questionnnaire de type email --}}
        <div class="form-group input-group">
            <span class="has-float-label">
              <br/>
                  <div class='row'>
                    <h3  class='fs-subtitle'> {{  $question->numero_question }}.  {{  $question->libelle }}     </h3>
                  </div>
              <input type="hidden" name="{{ $question->id }}" id="{{ $question->id }}" value="{{ $question->id }}" />
              <input type="email" class="form-control" name="{{ $question->etiquette }}" id="{{ $question->etiquette }}"  placeholder="" required/>
            </span>
        </div>
        @error('{{ $question->libelle }}')<small class="text-danger">{{ $message }}<br></small>@enderror

        @if($question->sous_question==true)
            <div class="form-group input-group">
              <span class="has-float-label">
                <br/>
                        <div class='row'>
                          <h3  class='fs-subtitle'>{{  $question->libelle_sous_question }}</h3>
                        </div>
                <input type="text" class="form-control" name="{{ $question->etiquette_sous_question }}" id="{{ $question->etiquette_sous_question }}"  placeholder="" required/>
              </span>
          </div>
          @error('{{ $question->etiquette_sous_question }}')<small class="text-danger">{{ $message }}<br></small>@enderror
        @endif
      @endif

      @if($question->type_question=="date")
       {{-- Construction de questionnnaire de type date --}}
       <div class="form-group input-group">
          <span class="has-float-label">
            <br/>
                  <div class='row'>
                    <h3  class='fs-subtitle'> {{  $question->numero_question }}.  {{  $question->libelle }}     </h3>
                  </div>
            <input type="hidden" name="{{ $question->id }}" id="{{ $question->id }}" value="{{ $question->id }}" />
            <input type="date" class="form-control" name="{{ $question->etiquette }}" id="{{ $question->etiquette }}"  placeholder="jj/mm/aaaa" required/>
          </span>
      </div>
      @error('{{ $question->etiquette }}')<small class="text-danger">{{ $message }}<br></small>@enderror

      @if($question->sous_question==true)
          <div class="form-group input-group">
            <span class="has-float-label">
              <br/>
                        <div class='row'>
                          <h3  class='fs-subtitle'>{{  $question->libelle_sous_question }}</h3>
                        </div>
              <input type="text" class="form-control" name="{{ $question->etiquette_sous_question }}" id="{{ $question->etiquette_sous_question }}"  placeholder="" required/>
            </span>
        </div>
        @error('{{ $question->etiquette_sous_question }}')<small class="text-danger">{{ $message }}<br></small>@enderror
        @endif
      @endif


      @if($question->type_question=="number")
       {{-- Construction de questionnnaire de type numero --}}
       <div class="form-group input-group">
          <span class="has-float-label">
            <br/>
                  <div class='row'>
                    <h3  class='fs-subtitle'> {{  $question->numero_question }}.  {{  $question->libelle }}     </h3>
                  </div>
            <input type="hidden" name="{{ $question->id }}" id="{{ $question->id }}" value="{{ $question->id }}" />
            <input type="number" class="form-control" name="{{ $question->etiquette }}" id="{{ $question->etiquette }}"  placeholder="" required/>
          </span>
      </div>
      @error('{{ $question->etiquette }}')<small class="text-danger">{{ $message }}<br></small>@enderror

      @if($question->sous_question==true)
          <div class="form-group input-group">
            <span class="has-float-label">
              <br/>
                        <div class='row'>
                          <h3  class='fs-subtitle'>{{  $question->libelle_sous_question }}</h3>
                        </div>
              <input type="text" class="form-control" name="{{ $question->etiquette_sous_question }}" id="{{ $question->etiquette_sous_question }}"  placeholder="" required/>
            </span>
        </div>
        @error('{{ $question->etiquette_sous_question }}')<small class="text-danger">{{ $message }}<br></small>@enderror
        @endif
      @endif

@endforeach
</div>


<hr>
  <input type='button' name='previous' class='previous action-button' value='Precedent' />
  <input type='button'  name='next' class='next action-button' value='Suivant' />
</fieldset>