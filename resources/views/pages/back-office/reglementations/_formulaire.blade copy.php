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
{{-- @dd($reglementation->fichier); --}}
    <div class="form-group">
        {{-- <input type='file'  name="fichier" value="{{ old('fichier') ?? $reglementation->fichier }}"  accept="file/*.pdf" /> --}}
        {{-- <input type="text" class="form-control col-7 d-block" type="text" name="fichier" value="{{ old('name')?? $reglementation->fichier }}" />
        <button type="file" class="col-3 d-block btn btn-default" >Choisir un fichier</button> --}}
        <p class="input-group">
            <input type="text" id="from" class="form-control" name="fichier" value="{{ old('name')?? $reglementation->fichier }}"/>
            <span class="input-group-btn">
              <button type="button" class="btn btn-default"></i>Choisir un fichier</button>
            </span>
          </p>
        @error('fichier')
        <small class="text-danger" > {{ $message }} </small>
        @enderror
    </div>
    <button type="submit" class="login100-form-btn btn-success">{{ $btnTexte }}</button>



