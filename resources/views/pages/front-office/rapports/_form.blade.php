
<div class="form-header"></div>
<div class="form-content">


{{--  --}}

    <div class="form-row  ">
        <div class="col-md-4 col-sm-12 ">
            <label for="date_soumission">Consommateurs<span class="obligatoire">: *</span></label>
        </div>
        <div class="col-md-6 ml-4 col-sm-12">
            <select class="form-control " name="consommateur" required>
                <option selected value="" disabled>Veuillez choisir le consommateur </option>
                @foreach ($consommateurs as $consommateur)
                <option value="{{$consommateur->id}}" {{ $rapport->consommateur_id == $consommateur->id ? 'selected' : '' }}>{{$consommateur->nom }} </option>
                @endforeach
            </select>
        @error('date_soumission')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>

    <div class="form-row  ">
        <div class="col-md-4 col-sm-12 ">
            <label for="date_soumission">date soumission<span class="obligatoire">: *</span></label>
        </div>
        <div class="col-md-6 ml-4 col-sm-12">
        <input type="date" name="date_soumission" class="form-control " value="{{ old('date_soumission') ?? $rapport->created_at }}">
        @error('date_soumission')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>

    <div class="form-row  ">
        <div class="col-md-4 col-sm-12 ">
            <label for="libelle">Intitulé du rapport<span class="obligatoire">: *</span></label>
        </div>
        <div class="col-md-6 ml-4 col-sm-12">
        <input type="text" name="libelle" class="form-control "  value="{{ old('libelle') ?? $rapport->libelle }}">
        {{-- @error('date_soumission')<div class="invalid-feedback">{{ $message }}</div>@enderror --}}
        </div>
    </div>



    <div class="form-row ">
        <div class="col-md-4 col-sm-12 ">
            <label for="fichier">Rapport<span class="obligatoire">(max = 2M): *</span></label>
        </div>
        <div class="col-md-6 ml-4 col-sm-12 ">
            <input type="file" name="fichier" id="fichier" accept=".pdf" value="{{ old('fichier') ?? $rapport->fichier }}">
            @error('fichier')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>


    <div class="form-row  ">
        <div class="col-md-4 col-sm-12 ">
            <label for="observations">Observations<span class="obligatoire">: *</span></label>
        </div>
        <div class="col-md-6 ml-4 col-sm-12">

            
          <textarea name="observations" type="text" class="form-control" cols="2" rows="3" value="{{ old('observations') ?? $rapport->Observations }}"></textarea>
         
        </div>
    </div>


    <div class="col my-1 pl-5 d-flex justify-content-center">
        <a type ="button" class="btn btn-danger btn-lg" href="{{route('rapports.index')}}"><i class="fa fa-close mr-1"></i>Fermer</a> &nbsp; &nbsp;
        <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-save mr-1"></i>{{ $btnTexte }}</button>
    </div>
</div>
