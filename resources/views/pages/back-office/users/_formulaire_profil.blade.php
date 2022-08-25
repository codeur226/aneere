
        @csrf
        <div class="form-group input-group">
            <span class="has-float-label">
              <input class="form-control" value="{{ old('oldpassword') }}"  type="password" name="oldpassword" placeholder="Mot de passe" required/>
              <label for="password">Mot de passe</label>
            </span>
            @error('oldpassword')<small class="text-danger">{{ $message }}<br></small>@enderror
        </div>
         <div class="form-group input-group">
            <span class="has-float-label">
              <input class="form-control" value="{{ old('password') }}"  type="password" name="password" placeholder="Nouveau mot de passe" required/>
              <label for="password">Nouveau mot de passe</label>
            </span>
            @error('password')<small class="text-danger">{{ $message }}<br></small>@enderror
        </div>
    <div class="form-group input-group">
            <span class="has-float-label">
              <input class="form-control" value="{{ old('password_confirmation') }}"  type="password" name="password_confirmation" placeholder="Confirmation .." required/>
              <label for="password_confirmation">Confirmation mot de passe</label>
            </span>
            @error('password_confirmation')<small class="text-danger">{{ $message }}<br></small>@enderror
        </div>
        {{-- <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <input value="{{ old('oldpassword') }}" class="input100" type="password" name="oldpassword" placeholder="Ancien mot de passe">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><g fill="none"><path d="M0 0h24v24H0V0z"/><path d="M0 0h24v24H0V0z" opacity=".87"/></g><path d="M6 20h12V10H6v10zm6-7c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z" opacity=".3"/><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/></svg>
            </span>

        </div>
        @error("oldpassword")
        <div style="margin-top:-8px;" class="text-danger mb-3" >
            <small>{{ $message }}</small>
        </div>
        @enderror
            <div class="wrap-input100 validate-input" data-validate = "Password is required">
                <input value="{{ old('password') }}" class="input100" type="password" name="password" placeholder="Nouveau un mot de passe">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><g fill="none"><path d="M0 0h24v24H0V0z"/><path d="M0 0h24v24H0V0z" opacity=".87"/></g><path d="M6 20h12V10H6v10zm6-7c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z" opacity=".3"/><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/></svg>
                </span>

            </div>
            @error("password")
            <div style="margin-top:-8px;" class="text-danger mb-3" >
                <small>{{ $message }}</small>
            </div>
            @enderror

            <div class="wrap-input100 validate-input" data-validate = "Password is required">
                <input value="{{ old('password_confirmation') }}" class="input100" type="password" name="password_confirmation" placeholder="Entez à nouveau votre mot de passe">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><g fill="none"><path d="M0 0h24v24H0V0z"/><path d="M0 0h24v24H0V0z" opacity=".87"/></g><path d="M6 20h12V10H6v10zm6-7c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z" opacity=".3"/><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/></svg>
                </span>
            </div> --}}


            <div class="btn-list text-center">
                <button type="button" onclick="history.go(-1);"class="btn btn-danger btn-sm ">{{ $btnCancel }}</button>
                <button type="submit" class="btn btn-primary btn-sm">{{ $btnTexte }}</button>
              </div>

