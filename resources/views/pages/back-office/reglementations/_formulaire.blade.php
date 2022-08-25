  @csrf
   <label class="form-group has-float-label">
    <select class="form-control " name="type_id" required>
        <option selected value="" disabled>Veuillez choisir le type </option>
        @foreach ($types as $item)
        <option value="{{$item->id}}" {{ $reglementation->type_id == $item->id ? 'selected' : '' }} >{{$item->libelle }} </option>
        @endforeach
    </select>
    <span>Type</span>
    </label>
      <div class="form-group input-group">
        <span class="has-float-label">
          <input type="date" class="form-control" name="date" id="date"  value="{{old('date')?? $reglementation->date}}" placeholder="Date de la reglementation" required/>
          <label for="date">Date de la reglementation</label>
        </span>
    </div>
   @error('date')<small class="text-danger">{{ $message }}<br></small>@enderror

 <div class="form-group input-group">
      <span class="has-float-label">
        <textarea id="reference" class="form-control" name="reference" placeholder="reference du texte règlementaire" rows="3">{{old('reference')?? $reglementation->reference}}</textarea>
        <label for="reference">Reference du texte règlementaire</label>
        </span>
    </div>
    @error('reference')<small class="text-danger">{{ $message }}<br></small>@enderror

    <div class="form-group">
        <input type='file'  name="fichier" value="{{ old('fichier') ?? $reglementation->fichier }}"  accept="file/*.pdf" />
        @error('fichier')
        <small class="text-danger" > {{ $message }} </small>
        @enderror
    </div> <br>
    <div class="btn-list text-center">
    <button type="button" onclick="history.go(-1);"class="btn btn-danger btn-sm ">{{ $btnCancel }}</button>
    <button type="submit" class="btn btn-primary btn-sm">{{ $btnTexte }}</button>
    </div>
