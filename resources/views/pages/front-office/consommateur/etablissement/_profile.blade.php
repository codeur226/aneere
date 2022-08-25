
<div class="form-header"></div>
<div class="form-content">
    <h4>Changer mot de passe</h4>
    <div class="form-row  ">
        <div class="col-md-4 col-sm-12 ">
            <label for="oldpassword">Ancien <span class="obligatoire">: *</span></label>
        </div>
        <div class="col-md-6 ml-4 col-sm-12">
        <input type="password" name="oldpassword" class="form-control " value="{{ old('oldpassword') }}" required>
        {{-- @error('oldpassword')<div class="invalid-feedback">{{ $message }}</div>@enderror --}}
        @error('oldpassword')<small class="text-danger">{{ $message }}<br></small>@enderror    
    </div>
    </div>
    <div class="form-row  ">
        <div class="col-md-4 col-sm-12 ">
            <label for="password">Nouveau<span class="obligatoire">: *</span></label>
        </div>
        <div class="col-md-6 ml-4 col-sm-12">
        <input type="password" name="password" class="form-control " value="{{ old('password') }}" required>
        @error('password')<small class="text-danger">{{ $message }}<br></small>@enderror
        {{-- @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror --}}
        </div>
    </div> 
    <div class="form-row  ">
        <div class="col-md-4 col-sm-12 ">
            <label for="password_confirmation">Confirmation<span class="obligatoire">: *</span></label>
        </div>
        <div class="col-md-6 ml-4 col-sm-12">
        <input type="password" name="password_confirmation" class="form-control " value="{{ old('password_confirmation') }}" required>
        @error('password_confirmation')<small class="text-danger">{{ $message }}<br></small>@enderror
        {{-- @error('password_confirmation')<div class="invalid-feedback">{{ $message }}</div>@enderror --}}
        </div>
    </div>

    <div class="col my-2 pl-5 d-flex justify-content-center">
        <button class="btn btn-outline-info btn-sm"><i class="far fa-save mr-1"></i>{{ $btnTexte }}</button>
    </div>
</div>
