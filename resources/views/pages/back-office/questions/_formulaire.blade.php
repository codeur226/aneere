  @csrf
{{-- champ selection de la fiche --}}
  <div class="form-group input-group">
    <span class="form-group has-float-label">
        <select class="form-control custom-select" name="fiche" id="fiche" required autofocus>
        <option selected  disabled value="0">Veuillez choisir une fiche </option>
        @foreach ($fiches as $item)
        <option value="{{$item->id}}" {{ $questions->fiche_id == $item->id ? 'selected' : '' }} >{{$item->libelle }} </option>
        @endforeach
        </select>
        <label for="fiche">Fiche à la quelle appartient la question</label>
    </span>
  @error('fiche')<small class="text-danger">{{ $message }}<br></small>@enderror
  </div>
  
{{-- champs numero de la question --}}
<div class="form-group input-group">
  <span class="has-float-label">
    <input type="number" class="form-control" name="numero_question" id="numero_question" min=0 max="200"  value="{{old('numero_question')?? $questions->numero_question}}" placeholder="Numéro de la question sur la fiche" required/>
    <label for="numero_question">Numéro de la question sur la fiche</label>
  </span>
</div>
@error('numero_question')<small class="text-danger">{{ $message }}<br></small>@enderror


{{-- champs etiquette --}}
        <div class="form-group input-group">
        <span class="has-float-label">
          <input type="text" class="form-control" name="etiquette" id="etiquette"  value="{{old('etiquette')?? $questions->etiquette}}" placeholder="Etiquette de la question" required/>
          <label for="etiquette">Etiquette de la question</label>
        </span>
    </div>
   @error('etiquette')<small class="text-danger">{{ $message }}<br></small>@enderror
{{-- champs libelle --}}
   <div class="form-group input-group">
    <span class="has-float-label">
      <input type="text" class="form-control" name="libelle" id="libelle"  value="{{old('libelle')?? $questions->libelle}}" placeholder="libelle de la question (unique)" required/>
      <label for="libelle">Libellé de la question</label>
    </span>
</div>
@error('libelle')<small class="text-danger">{{ $message }}<br></small>@enderror

{{-- champ type de question --}}
<div class="form-group input-group">
  <span class="has-float-label">

  <select class="form-control" name="type" id="type" required onclick="javascript:yesnoTypeQuestion();">

      <option  selected value="null" disabled >Veuillez choisir le  type de la question</option>
      <option value="text">Champ texte mono ligne </option>
      <option value="textarea">Champ texte multi-ligne </option>
      <option value="radio">Oui/Non  </option>
      <option value="checkbox">QCM , cases à cocher  </option>
      <option value="email">E-mail  </option>
      <option value="date">Date </option>
      <option value="number">Numéro </option>
  </select>
  <label for="type">Type de reponse</label>
  </span>
  @error('type')<small class="text-dager">{{ $message }}<br></small>@enderror
</div>

{{-- champs sous-question --}}


<div class="form-group input-group">
  <span class="has-float-label">
   <br />
<div class='row'>
  <h3  class='fs-subtitle'>Cette question a-telle une sous question ?   </h3>
</div>
<div class='row'>
 
<input type='radio' id='yesCheck' onclick="javascript:yesnoCheck();" name='sousquestion' value="true" class='action-chekbox-yes'><span style='padding-top: 7px;'> Oui</span>

<input type='radio' id='noCheck' onclick="javascript:yesnoCheck();" name='sousquestion' value="false" class='action-chekbox-no' checked><span style='padding-top: 7px;'> Non</span>
</div> 

</span>
</div>
@error('sousquestion')<small class="text-danger">{{ $message }}<br></small>@enderror



  

{{-- CHAMPS DE LA SOUS QUESTION --}}



{{-- champs etiquette --}}
<div class="form-group input-group" id="etiquestion" style="display:none">
  <span class="has-float-label">
    <input type="text" class="form-control" name="etiquettesousquestion" id="etiquettesousquestion"  value="{{old('etiquettesousquestion')?? $questions->etiquette_sous_question}}" placeholder="Etiquette de la sous question" />
    <label for="etiquettesousquestion">Etiquette de la sous question</label>
  </span>
</div>
@error('etiquettesousquestion')<small class="text-danger">{{ $message }}<br></small>@enderror
{{-- champs libelle --}}
<div class="form-group input-group" id="libquestion" style="display:none">
<span class="has-float-label">
<input type="text" class="form-control" name="libellesousquestion" id="libellesousquestion"  value="{{old('libellesousquestion')?? $questions->libelle_sous_question}}" placeholder="libelle de la question (unique)" />
<label for="libellesousquestion">Libellé de la sous question</label>
</span>
</div>
@error('libellesousquestion')<small class="text-danger">{{ $message }}<br></small>@enderror


{{-- champs des saissie des sous options --}}
<div class="form-group input-group" id="listeoptions" style="display:none">
  <span class="has-float-label">
  <textarea name="optionqcms" type="text" class="form-control" cols="2" rows="2" placeholder=" séparer par des point virgule"></textarea>
    <label for="optionqcms" class="font-weight-bold">Saisissez la liste des options séparer pour des point virgule (;)</label>
  </span>
</div> 
   <br>
    <div class="btn-list text-center">
    <button type="button" onclick="history.go(-1);"class="btn btn-danger btn-lg ">Annuler</button>
    <button type="submit" class="btn btn-primary btn-lg">Enregistrer</button>
    </div>

      {{-- <script>
      // display:none //to hide
      // display:block //to show
      function yesnoCheck() {
          if (document.getElementById('yesCheck').checked) {
              document.getElementById('etiquettesousquestion').style.display='none';
          } else {
              document.getElementById('ifYes').style.display:none;
          }

          </script> --}}
       