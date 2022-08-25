
<div class="form-header"></div>
<div class="form-content">
    <h4>Completer profile</h4>
    <hr>
    <div class="form-row  ">
        <div class="col-md-4 col-sm-12 ">
            <label for="name"> Nom du responsable  <span class="obligatoire">: *</span></label>
        </div>
        <div class="col-md-6 ml-4 col-sm-12">
        <input type="text" name="name" class="form-control " value="{{ old('name') ?? $etablissement->user->name}}">
          @error('oldpassword')<small class="text-danger">{{ $message }}<br></small>@enderror
        </div>
    </div>
    <div class="form-row  ">
        <div class="col-md-4 col-sm-12 ">
            <label for="num_rccm"> N° RCCM <span class="obligatoire">: *</span></label>
        </div>
        <div class="col-md-6 ml-4 col-sm-12">
        <input type="text" name="num_rccm" class="form-control " value="{{ old('num_rccm') ?? $etablissement->num_rccm}}">
          @error('oldpassword')<small class="text-danger">{{ $message }}<br></small>@enderror
        </div>
    </div>
    <div class="form-row  ">
        <div class="col-md-4 col-sm-12 ">
            <label for="num_ifu"> N° IFU<span class="obligatoire">: *</span></label>
        </div>
        <div class="col-md-6 ml-4 col-sm-12">
        <input type="text" name="num_ifu" class="form-control " value="{{ old('num_ifu') ?? $etablissement->num_ifu}}">
        @error('num_ifu')<small class="text-danger">{{ $message }}<br></small>@enderror
    </div>
    </div>

    <div class="form-row  ">
        <div class="col-md-4 col-sm-12 ">
            <label for="num_tel">Tel mobile<span class="obligatoire">: *</span></label>
        </div>
        <div class="col-md-6 ml-4 col-sm-12">
        <input type="text" name="tel_mobile" class="form-control " value="{{ old('tel_mobile') ?? $etablissement->tel_mobile}}">
        @error('tel_mobile')<small class="text-danger">{{ $message }}<br></small>@enderror
    </div>
    </div>
    <div class="form-row  ">
        <div class="col-md-4 col-sm-12 ">
            <label for="tel_fixe">Tel fixe<span class="obligatoire">: *</span></label>
        </div>
        <div class="col-md-6 ml-4 col-sm-12">
        <input type="text" name="tel_fixe" class="form-control " value="{{ old('num_bp') ?? $etablissement->tel_fixe}}">
        @error('tel_fixe')<small class="text-danger">{{ $message }}<br></small>@enderror
    </div>
    </div>
    <div class="form-row  ">
        <div class="col-md-4 col-sm-12 ">
            <label for="num_bp">Boite postale<span class="obligatoire">: *</span></label>
        </div>
        <div class="col-md-6 ml-4 col-sm-12">
        <input type="text" name="num_bp" class="form-control " value="{{ old('num_bp') ?? $etablissement->bp}}">
        @error('num_bp')<small class="text-danger">{{ $message }}<br></small>@enderror
    </div>
    </div>

    <div class="form-row  ">
        <div class="col-md-4 col-sm-12 ">
            <label for="date_creation">Date de création<span class="obligatoire">: *</span></label>
        </div>
        <div class="col-md-6 ml-4 col-sm-12">
        <input type="date" name="date_creation" class="form-control " value="{{ old('date_creation') ?? $etablissement->date_creation}}">
        @error('date_creation')<small class="text-danger">{{ $message }}<br></small>@enderror
    </div>
    </div>

 <br>
    <div class="col my-2 pl-5 d-flex justify-content-center">
        <button class="btn btn-outline-info btn-sm"><i class="far fa-save mr-1"></i>{{ $btnTexte }}</button>
    </div>
</div>
