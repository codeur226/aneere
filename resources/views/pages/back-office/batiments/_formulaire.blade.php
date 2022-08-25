@csrf
<div class="form-group">
  <span class="form-group has-float-label">
      <select class="form-control custom-select" name="domaine" id="domaine" required >
      <option selected value="0" disabled>Veuillez choisir le domaine </option>
      @foreach ($domaines as $item)
      <option value="{{$item->id}}" >{{$item->nom }} </option>
      {{-- <option value="{{$item->id}}" {{ $batiment->domaine_id == $item->id ? 'selected' : '' }} >{{$item->nom }} </option> --}}
      @endforeach
      </select>
      <label for="domaine">Domaine d'audit de l'etablissement</label>
  </span>
@error('domaine')<small class="text-danger">{{ $message }}<br></small>@enderror
</div>

<div class="form-group">
  <span class="form-group has-float-label">
      <select class="form-control" name="consommateur_id"  id="consommateur" required > </select>
      <label for="consommateur">consommateur</label>
@error('consommateur_id')<small class="text-danger">{{ $message }}<br></small>@enderror
</div>

<div class="form-group input-group">
    <span class="has-float-label">

    <select class="form-control" name="niveau" id="niveau" required>

        <option  selected value="null" disabled >Veuillez choisir le  niveau du bâtiment</option>

        <option value="R+0" @if($batiment->niveau == "R+0") selected @endif>R+0  </option>
        <option value="R+1" @if($batiment->niveau == "R+1") selected @endif>R+1  </option>
        <option value="R+2" @if($batiment->niveau == "R+2") selected @endif>R+2  </option>
        <option value="R+3" @if($batiment->niveau == "R+3") selected @endif>R+3  </option>
        <option value="R+4" @if($batiment->niveau == "R+4") selected @endif>R+4  </option>
        <option value="R+5" @if($batiment->niveau == "R+5") selected @endif>R+5  </option>
    </select>
    <label for="niveau">Niveau du bâtiment</label>
    </span>
    @error('niveau')<small class="text-dager">{{ $message }}<br></small>@enderror
</div>
<div class="form-group input-group">
  <span class="has-float-label">
    <input type="number" class="form-control" name="num_compteur" placeholder="N° compteur" value="{{ old('num_compteur')?? $batiment->num_compteur }}"/>
    <label for="num_compteur">N° compteur</label>
  </span>
  @error('num_compteur')<small class="text-danger">{{ $message }}<br></small>@enderror
</div>
    <div class="form-group input-group">
        <span class="has-float-label">
            <input type="date" class="form-control" name="date_declaration" id="date_declaration" value="{{ old('date_declaration') ?? $batiment->date_declaration }}" placeholder="Date de creation de l'etablissement" />
            <label for="date_declaration">Date de déclaration</label>
        </span>
        @error('date_declaration')<small class="text-danger">{{ $message }}<br></small>@enderror
    </div>
<div class="btn-list text-center">
  <button type="button" onclick="history.go(-1);"class="btn btn-danger btn-sm ">{{ $btnCancel }}</button>
  <button type="submit" class="btn btn-primary btn-sm">{{ $btnTexte }}</button>
</div>
  {{-- <button type="submit" class="login100-form-btn btn-success">{{ $btnTexte }}</button> --}}

