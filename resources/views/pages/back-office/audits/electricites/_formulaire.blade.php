@csrf
           <!-- progressbar -->
           <ul id="progressbar">
            <a  href="{{ route('questionnaire') }}"> <li class="active">Fiche 0</li></a>
            <li>	Fiche 1</li>
            <li>Fiche 2</li>
            <li>Fiche 3</li>
            <li>Fiche 4</li>
            <li>Fiche 5</li>
            <li>Fiche 6</li>
            <li>Fiche xxxxxxx</li>
        </ul>

        <div class="fieldset-container" id="fieldset-container">
 
           <fieldset>
            <h2 class="fs-title">Création de la collecte</h2>
            <div class="form-group">
                <span class="form-group has-float-label">
                  <input type="date" class="form-control" name="dateCollecte" placeholder="dateCollecter" />
                  <label for="dateCollecte">Date collecte</label>
                </span>
            </div>
              <div class="form-group">
                <span class="form-group has-float-label">
                  <input type="text" class="form-control" name="pointFocal" placeholder="pointFocalr" />
                  <label for="pointFocal">Point focal</label>
                </span>
              </div>
              <div class="form-group">
                <span class="form-group has-float-label">
                  <input type="number" class="form-control" name="telephone" placeholder="telephoner" />
                  <label for="telephone">Telephone</label>
                </span>
              </div>
            
            <input type="button"  name="next" onclick="sousQuestion(1)" class="next action-button" value="Suivant" />
        </fieldset>

 {{-- GESTION DES INFORMATION DE LA FICHE 1 --}}
        <fieldset> 
          <h2 class='fs-title'>INFORMATIONS D’ORDRE GENERAL</h2>
          <div class='row'>
            <h3  class='fs-subtitle'>	Disposez-vous d’une installation solaire photovoltaïque pour votre bâtiment ? </h3>
          </div>



          <div class='row'>
          @csrf

          @foreach ($q_fiche0 as $question)
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

              @endforeach
              @error('sousquestion')<small class="text-danger">{{ $message }}<br></small>@enderror


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
</div>














        <hr>
          <input type='button' name='previous' class='previous action-button' value='Precedent' />
          <input type='button'  name='next' class='next action-button' value='Suivant' />
      </fieldset>      

      <fieldset> 
        <h2 class='fs-title'>Questions de la fiche 1</h2>
        <div class='row'>
          <h3  class='fs-subtitle'>	Disposez-vous d’une installation solaire photovoltaïque pour votre bâtiment ? </h3>
        </div>
      <div class='row'>
        <input type='checkbox' name='choix181' id='action-chekbox-yes18' class='action-chekbox-yes'><span style='padding-top: 7px;'> Oui</span>

        <input type='checkbox' name='choix182' id='action-chekbox-no18' class='action-chekbox-no'><span style='padding-top: 7px;'> Non</span>
      </div> 
      <div>
        <div class="row"> 
          <h3  class="fs-subtitle"><span id="option181">Si oui quelle est sa capacité et quel constat avez-vous fait ?</span> <span id="option182"> Si non, pourquoi ?  </span></h3>
        </div>
        <br> 
        <div class="form-group">
            <span class="form-group has-float-label">
            <textarea name="rt18" type="text" class="form-control" cols="2" rows="2"></textarea>
              <label for="reponse">Reponse</label>
            </span>
          </div> 
      </div>
      <hr>
        <input type='button' name='previous' class='previous action-button' value='Precedent' />
        <input type='button'  name='next' class='next action-button' value='Suivant' />
    </fieldset>           

      <fieldset>
          
          <h2 class='fs-title'>Question n°19</h2>
          <div class='row'>
            <h3  class='fs-subtitle'>Le toit est-il accessible ?   </h3>
          </div>
        <div class='row'>
          <input type='checkbox' id='action-chekbox-yes19' name='choix191'  class='action-chekbox-yes'><span style='padding-top: 7px;'> Oui</span>

          <input type='checkbox' id='action-chekbox-no19' name='choix192' class='action-chekbox-no'><span style='padding-top: 7px;'> Non</span>
        </div> 
        <div id="sousquestion19">
          <div class="row"> 
            <h3  class="fs-subtitle">Si oui, vérifiez (noter les observations) </h3>
          </div>
          <br> 
          <div class="form-group">
              <span class="form-group has-float-label">
              <textarea name="" type="text" class="form-control" cols="2" rows="2"></textarea>
                <label for="reponse">Reponse</label>
              </span>
            </div> 
        </div>
        <hr>
          <input type='button' name='previous' class='previous action-button' value='Precedent' />
          <input type='submit'  name='next' class='submit action-button' value='Enregistrer' />
      </fieldset>













        </div>
{{--
</div>
    <div class="btn-list text-center">
        <button type="button" onclick="history.go(-1);"class="btn btn-danger btn-sm ">{{ $btnCancel }}</button>
        <button type="submit" class="btn btn-primary btn-sm">{{ $btnTexte }}</button>
    </div>
 --}} 