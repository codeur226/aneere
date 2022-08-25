{{-- GESTION DES INFORMATION DE LA FICHE 1 --}}
<fieldset class="pre-scrollable"> 
  <h2 class='fs-title'>COLLECTE DE DONNEES SUR LES TABLEAUX ELECTRIQUES</h2>

  <div class='row'>
  @csrf

  @foreach ($q_fiche4 as $question)
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
              <input type="text" class="form-control" name="{{ $question->libelle_sous_question }}" id="{{ $question->libelle_sous_question }}"  placeholder="" />
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
          <h3  class='fs-subtitle'> {{  $question->numero_question }}.  {{  $question->etiquette }}     </h3>
  
        </div>
        <div class='row'>
          {{-- Parcourir la liste des QCM pour contruire les QCm liés a la questions--}}
          @foreach ($optionsqcms as $item)  
          {{-- Si le question_id dans QCM == id de question, alors il cnstruit  --}}
          @if($item->question_id==$question->id)                                                     
          <input type='checkbox' id='{{ $item->libelle_option }}' name='{{ $item->libelle_option}}' value="true" class='action-chekbox-yes'><span style='padding-top: 7px;'> {{ $item->etiquette_option }}</span>
          @endif
        @endforeach
      </div>
    </div>
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