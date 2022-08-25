@csrf
{{-- @dd($audit) --}}


<div class="form-group">
    <span class="form-group has-float-label">
        <select class="form-control custom-select" name="consommateur_id" id="consommateur" required >
        <option selected value="0" disabled>Veuillez choisir l'établissement </option>
        @foreach ($consommateurs as $item)
        {{-- <option value="{{$item->id}}" >{{$item->user->name }} </option> --}}
        <option value="{{$item->id}}" {{ $audit->consommateur_id == $item->id ? 'selected' : '' }} >{{$item->nom}} </option>
        @endforeach
        </select>
        <label for="consommateur">Veuillez choisir l'établissement</label>
    </span>
  @error('consommateur')<small class="text-danger">{{ $message }}<br></small>@enderror
  </div>

{{-- <div class="form-group">
  <span class="form-group has-float-label">
    <input type="date" class="form-control" name="dateDeclaration" placeholder="dateDeclarationr" value="{{ old('dateDeclaration')?? $audit->dateDeclaration }}" required/>
    <label for="dateDeclaration">Date déclaration</label>
 @error('dateDeclaration')<small class="text-danger">{{ $message }}<br></small>@enderror
</div>

<div class="form-group">
    <span class="form-group has-float-label">
      <input type="date" class="form-control" name="dateEcheance" placeholder="dateEcheance" value="{{ old('dateEcheance')?? $audit->dateEcheance }}" required/>
      <label for="dateEcheance">Date écheance</label>
   @error('dateEcheance')<small class="text-danger">{{ $message }}<br></small>@enderror
  </div> --}}

<div class="btn-list text-center">
  <button type="button" onclick="history.go(-1);"class="btn btn-danger btn-sm ">{{ $btnCancel }}</button>
  <button type="submit" class="btn btn-primary btn-sm">{{ $btnTexte }}</button>
</div>
  {{-- <button type="submit" class="login100-form-btn btn-success">{{ $btnTexte }}</button> --}}

