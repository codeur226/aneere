@csrf
<label class="form-group has-float-label">
 <select class="form-control " name="domaine" required>
     <option selected value="" disabled>Veuillez choisir le domaine </option>
     @foreach ($domaines as $item)
     <option value="{{$item->id}}" {{ $fiche->domaine_id == $item->id ? 'selected' : '' }} >{{$item->nom }} </option>
     @endforeach
 </select>
 <span>Domaine</span>
 </label>
    {{-- ORDRE DE LA FICHE --}}
    <div class="form-group input-group ">
        <span class="has-float-label">
            <input type="number" class="form-control" name="ordre" id="ordre"  value="{{old('ordre')?? $fiche->ordre}}" placeholder="Ordre de la fiche" required/>
            <label for="ordre">Ordre de la fiche</label>
        </span>
    </div>
    @error('libelle')<small class="text-danger">{{ $message }}<br></small>@enderror

    {{-- LIBELLE DE LA FICHE --}}
        <div class="form-group input-group ">
            <span class="has-float-label">
                <input type="text" class="form-control" name="libelle" id="libelle"  value="{{old('libelle')?? $fiche->libelle}}" placeholder="libellé de la fiche" required/>
                <label for="libelle">Libelle de la fiche</label>
            </span>
        </div>
    @error('libelle')<small class="text-danger">{{ $message }}<br></small>@enderror

 <div class="btn-list text-center">
 <button type="button" onclick="history.go(-1);"class="btn btn-danger btn-sm ">{{ $btnCancel }}</button>
 <button type="submit" class="btn btn-primary btn-sm">{{ $btnTexte }}</button>
 </div>
