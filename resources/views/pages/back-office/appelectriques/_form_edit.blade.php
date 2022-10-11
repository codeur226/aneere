@csrf

     {{-- champs emplacement --}}
<div class="form-group input-group" >
  <span class="has-float-label">
  <input type="text" class="form-control" name="emplacement" id="emplacement"  value="{{old('emplacement')?? $appelectrique->emplacement}}" placeholder="l'emplacement" />
  <label for="emplacement">Emplacement</label>
  </span>
  </div>
  @error('emplacement')<small class="text-danger">{{ $message }}<br></small>@enderror



  
{{-- champs Désignation et caractéristiques techniques par types d’appareils électriques  --}}
<div class="form-group input-group">
  <span class="has-float-label">
    <input type="text" class="form-control" name="designation" id="designation"   value="{{old('designation')?? $appelectrique->designation}}" placeholder="" required/>
    <label for="designation">Désignation et caractéristiques techniques par types d’appareils électrique</label>
  </span>
</div>
@error('designation')<small class="text-danger">{{ $message }}<br></small>@enderror




{{-- champs quantité --}}
<div class="form-group input-group">
  <span class="has-float-label">
    <input type="number" class="form-control" name="quantite" id="quantite" min=0 max="200000"  
    value="{{old('quantite')?? $appelectrique->quantite}}" placeholder="Quantité" required/>
    <label for="quantite">Quantité</label>
  </span>
</div>
@error('quantite')<small class="text-danger">{{ $message }}<br></small>@enderror

{{-- champs puissance électrique --}}
<div class="form-group input-group">
  <span class="has-float-label">
    <input type="number" class="form-control" name="puissance" id="puissance" min=0 max="200000"  
    value="{{old('puissance')?? $appelectrique->puissance_electrique}}" placeholder="puissance en KWH" required/>
    <label for="puissance">Puissance électrique en KWH</label>
  </span>
</div>
@error('puissance')<small class="text-danger">{{ $message }}<br></small>@enderror




{{-- champs quantité --}}
<div class="form-group input-group">
  <span class="has-float-label">
    <input type="number" class="form-control" name="duree" id="duree" min=0 max="200000"  
    value="{{old('duree')?? $appelectrique->duree}}" placeholder="Durée estimative de fonctionnement" required/>
    <label for="duree">Durée estimative de fonctionnement</label>
  </span>
</div>
@error('duree')<small class="text-danger">{{ $message }}<br></small>@enderror


{{-- champ selection de la etat de fonctionnement --}}
<div class="form-group input-group">
  <span class="form-group has-float-label">
      <select class="form-control custom-select" name="etat" id="etat" required >
      <option selected  disabled value="0">Veuillez choisir un état </option>
      B = Bon ; P = Passable M = Mauvais
      <option {{ ($appelectrique->etat_fonctionnement=="Bon" OR old('etat')=="Bon") ? "selected": "" }} value="Bon" >Bon </option>
      <option {{ ($appelectrique->etat_fonctionnement=="Passable" OR old('etat')=="Passable") ? "selected": "" }} value="Passable">Passable </option>
      <option {{ ($appelectrique->etat_fonctionnement=="Mauvais" OR old('etat')=="Mauvais") ? "selected": "" }} value="Mauvais">Mauvais</option>
      
      </select>
      <label for="etat">Etat fonctionnement</label>
  </span>
@error('etat')<small class="text-danger">{{ $message }}<br></small>@enderror
</div>



{{-- champs des saisie pour observation --}}

<div class="form-group input-group">
    <label class="col-md-4 control-label" for="observation">Observations</label>
    <div class="form-group">
        <textarea id="observation" name="observation" cols="2" rows="2" class="form-control" placeholder="{{$appelectrique->Observations}}"></textarea>
    </div>
</div>

     
     
<div class="card-footer" style="display: flex; align-items:center; justify-content:center;">
  <a href="{{ route("fiche3_index",$appelectrique->audit_id) }}" class="btn btn-success btn-lg mr-2" >Annuler</a>
  <button type="submit" class="btn btn-primary btn-lg">Enregistrer</button>
</div>