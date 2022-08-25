  @csrf

{{-- champs emplacement --}}
<div class="form-group input-group" >
  <span class="has-float-label">
  <input type="text" class="form-control" name="emplacement" id="emplacement"  value="{{old('emplacement')}}" placeholder="l'emplacement" />
  <label for="emplacement">Emplacement</label>
  </span>
  </div>
  @error('emplacement')<small class="text-danger">{{ $message }}<br></small>@enderror



  
{{-- champs Désignation et caractéristiques techniques par types d’appareils électriques  --}}
<div class="form-group input-group">
  <span class="has-float-label">
    <input type="text" class="form-control" name="designation" id="designation"   value="{{old('designation')}}" placeholder="" required/>
    <label for="designation">Désignation et caractéristiques techniques par types d’appareils électrique</label>
  </span>
</div>
@error('designation')<small class="text-danger">{{ $message }}<br></small>@enderror




{{-- champs quantité --}}
<div class="form-group input-group">
  <span class="has-float-label">
    <input type="number" class="form-control" name="quantite" id="quantite" min=0 max="200000"  
    value="{{old('quantite')}}" placeholder="Quantité" required/>
    <label for="quantite">Quantité</label>
  </span>
</div>
@error('quantite')<small class="text-danger">{{ $message }}<br></small>@enderror

{{-- champs puissance électrique --}}
<div class="form-group input-group">
  <span class="has-float-label">
    <input type="number" class="form-control" name="puissance" id="puissance" min=0 max="200000"  
    value="{{old('puissance')}}" placeholder="puissance en KWH" required/>
    <label for="puissance">Puissance électrique en KWH</label>
  </span>
</div>
@error('puissance')<small class="text-danger">{{ $message }}<br></small>@enderror




{{-- champs quantité --}}
<div class="form-group input-group">
  <span class="has-float-label">
    <input type="number" class="form-control" name="duree" id="duree" min=0 max="200000"  
    value="{{old('duree')}}" placeholder="Durée estimative de fonctionnement" required/>
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
      <option value="Bon" >Bon </option>
      <option value="Passable">Passable </option>
      <option value="Mauvais" >Mauvais</option>
      
      </select>
      <label for="etat">Etat fonctionnement</label>
  </span>
@error('etat')<small class="text-danger">{{ $message }}<br></small>@enderror
</div>



{{-- champs des saisie pour observation --}}
<div class="form-group input-group">
  <span class="has-float-label">
  <textarea name="observation" type="text" class="form-control" cols="2" rows="2" placeholder=""></textarea>
    <label for="observation" class="font-weight-bold">Observations</label>
  </span>
  
</div> 


    
 