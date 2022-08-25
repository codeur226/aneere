
<div class="form-header"></div>
<div class="form-content">
    <h4>Formulaire de dépot des rapports</h4>
    <div class="form-row  ">
        <div class="col-md-4 col-sm-12 ">
            <label for="date_soumission">date soumission<span class="obligatoire">: *</span></label>
        </div>
        <div class="col-md-6 ml-4 col-sm-12">
        <input type="date" name="date_soumission" class="form-control " value="">
        @error('date_soumission')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>
    <div class="form-row  ">
        <div class="col-md-4 col-sm-12 ">
            <label for="domicile">Motif<span class="obligatoire">: *</span></label>
        </div>
        <div class="col-md-6 ml-4 col-sm-12">
        <input type="text" name="domicile" class="form-control " value="">
        @error('domicile')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>

    <div class="form-row ">
        <div class="col-md-4 col-sm-12 ">
            <label for="">Rapport<span class="obligatoire">(max = 1M): *</span></label>
        </div>
        <div class="col-md-6 ml-4 col-sm-12 ">
            <input type="file" name="rapport" id="rapport" accept="image/*,.pdf" value="">
            @error('rapport')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>
 <br> <br>
    <div class="col my-2 pl-5 d-flex justify-content-center">
        <button class="btn btn-outline-info btn-sm"><i class="far fa-save mr-1"></i>{{ $btnTexte }}</button>
    </div>
</div>
