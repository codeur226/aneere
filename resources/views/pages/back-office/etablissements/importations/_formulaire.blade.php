@csrf


<div class="form-group input-group">
  <span class="has-float-label">
    <input type="text" class="form-control" name="nom" placeholder="nom" value="{{ $temporaire->nom }}" />
    <label for="nom">Nom</label>
  </span>
  @error('nom')<small class="text-danger">{{ $message }}<br></small>@enderror
</div>
<div class="form-group input-group">
    <span class="has-float-label">
      <input type="text" class="form-control" name="ville" placeholder="ville" value="{{  $temporaire->ville }}" />
      <label for="ville">Ville</label>
    </span>
    @error('ville')<small class="text-danger">{{ $message }}<br></small>@enderror
  </div>
  <div class="form-group input-group">
    <span class="has-float-label">
      <input type="text" class="form-control" name="type" placeholder="type" value="{{  $temporaire->type }}" />
      <label for="type">Type</label>
    </span>
    @error('type')<small class="text-danger">{{ $message }}<br></small>@enderror
  </div>
  <div class="form-group input-group">
    <span class="has-float-label">
      <input type="text" class="form-control" name="police" placeholder="police" value="{{  $temporaire->police }}" />
      <label for="police">Police</label>
    </span>
    @error('police')<small class="text-danger">{{ $message }}<br></small>@enderror
  </div>
  <div class="form-group input-group">
    <span class="has-float-label">
      <input type="text" class="form-control" name="telephone" placeholder="telephone" value="{{  $temporaire->telephone }}" />
      <label for="telephone">Telephone</label>
    </span>
    @error('telephone')<small class="text-danger">{{ $message }}<br></small>@enderror
  </div>
  <div class="form-group input-group">
    <span class="has-float-label">
      <input type="text" class="form-control" name="email" placeholder="email" value="{{ $temporaire->email }}" />
      <label for="email">Email</label>
    </span>
    @error('email')<small class="text-danger">{{ $message }}<br></small>@enderror
  </div>


<div class="btn-list text-center">
  <button type="button" onclick="history.go(-1);"class="btn btn-danger btn-sm ">{{ $btnCancel }}</button>
  <button type="submit" class="btn btn-primary btn-sm">{{ $btnTexte }}</button>
</div>
  {{-- <button type="submit" class="login100-form-btn btn-success">{{ $btnTexte }}</button> --}}

