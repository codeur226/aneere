@csrf
<div class="form-group">
  <span class="form-group has-float-label">
      <select class="form-control custom-select" name="domaine" id="domaine" required>
      <option selected  disabled value="0">Veuillez choisir le domaine </option>
      @foreach ($domaines as $item)
      <option value="{{$item->id}}" {{ $equipement->domaine_id == $item->id ? 'selected' : '' }} >{{$item->nom }} </option>
      @endforeach
      </select>
      <label for="domaine">Domaine d'audit de l'équipement </label>
  </span>
@error('domaine')<small class="text-danger">{{ $message }}<br></small>@enderror
</div>

<div class="form-group input-group">
  <span class="has-float-label">
    <input type="text" class="form-control" name="designation" placeholder="Designation" value="{{ old('designation')?? $equipement->designation }}" required/>
    <label for="designation">Designation</label>
  </span>
  @error('designation')<small class="text-danger">{{ $message }}<br></small>@enderror
</div>


<div class="btn-list text-center">
  <button type="button" onclick="history.go(-1);"class="btn btn-danger btn-sm ">{{ $btnCancel }}</button>
  <button type="submit" class="btn btn-primary btn-sm">{{ $btnTexte }}</button>
</div>
  {{-- <button type="submit" class="login100-form-btn btn-success">{{ $btnTexte }}</button> --}}

