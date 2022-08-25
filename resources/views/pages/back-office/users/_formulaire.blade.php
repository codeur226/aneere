
 @csrf
    <div class="form-group input-group">
        <span class="has-float-label">
          <input type="text" class="form-control" type="text" name="name" placeholder="Votre nom..." value="{{ old('name')?? $user->name }}" required/>
          <label for="name">Nom & Prenom</label>
        </span>
    </div>
     @error('name')<small class="text-danger">{{ $message }}<br></small>@enderror

        <div class="form-group input-group">
        <span class="has-float-label">
          <input type="email" class="form-control" name="email" placeholder="Votre Email" value="{{ old('email')?? $user->email }}" required/>
          <label for="email">Email</label>
        </span>
    </div>
     @error('email')<small class="text-danger">{{ $message }}<br></small>@enderror

  <label class="form-group has-float-label">
    <select class="form-control custom-select" name="role" required>
        <option selected value="" disabled>Veuillez choisir le role </option>
        @foreach ($roles as $item)
        <option value="{{$item->id}}" {{ $user->role_id == $item->id ? 'selected' : '' }} >{{$item->nom }} </option>
        @endforeach
    </select>
    <span>Role</span>
    </label>

        @if(Route::current()->getName() ==='users.create')

  <div class="form-group input-group">
        <span class="has-float-label">
          <input class="form-control" value="{{ old('password') }}"  type="password" name="password" placeholder="Mot de passe" required/>
          <label for="password">Mot de passe</label>
        </span>
    </div>
     @error('password')<small class="text-danger">{{ $message }}<br></small>@enderror

<div class="form-group input-group">
        <span class="has-float-label">
          <input class="form-control" value="{{ old('password_confirmation') }}"  type="password" name="password_confirmation" placeholder="Confirmation .." required/>
          <label for="password_confirmation">Confirmation mot de passe</label>
        </span>
    </div>
     @error('password_confirmation')<small class="text-danger">{{ $message }}<br></small>@enderror

        @endif
        {{-- @if(Route::current()->getName() ==='users.edit')
        <div class="form-check">
            @foreach ($roles as $role)
            <label for="{{$role->id}}" class="form-check-label">
            <input type="checkbox" class="form-check-input" name="roles[]"  value="{{$role->id }}" id="{{$role->id}}" @if($user->roles->pluck('id')->contains($role->id)) checked @endif >
            {{ $role->nom }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </label>
            @endforeach

        </div>
         @endif --}}

        {{-- <label class="custom-control custom-checkbox mt-4">
            <input type="checkbox" class="custom-control-input">
            <span class="custom-control-label">Agree the <a href="terms.html">terms and policy</a></span>
        </label> --}}
        <div class="btn-list text-center">
            <button type="button" onclick="history.go(-1);"class="btn btn-danger btn-sm ">{{ $btnCancel }}</button>
            <button type="submit" class="btn btn-primary btn-sm">{{ $btnTexte }}</button>
          </div>

