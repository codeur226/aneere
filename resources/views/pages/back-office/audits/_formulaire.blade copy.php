
    @csrf
    <div class="row" id="user">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Informations sur l'établissement</div>
                </div>
                <div class="card-body">
                            <label  class=""><small>Statut :</small> </label>
                        <div class="row px-2">
                            <div >
                                <div class="custom-controls-stacked">
                                    <label for="publique">
                                        <input type="radio" id="publique" name="statut" value="{{ $types[0] }}" {{ old('statut', $auditeur->type_personne_id)== "publique" ? 'checked' : '' }}  onclick="ShowHideDiv()" required/>
                                        {{-- <input type="radio" id="publique" name="statut" value="publique" @if($auditeur->statut == "publique") checked @endif  onclick="ShowHideDiv()" required /> --}}
                                        <span class="">{{ $types[0] }}</span>
                                    </label>
                                </div>
                            </div>
                            <div class="ml-auto">
                                <div class="custom-controls-stacked">
                                    <label for="prive">
                                        <input type="radio" id="prive" value="{{ $types[1] }}" {{ old('statut', $auditeur->type_personne_id)== "privé" ? 'checked' : '' }}  name="statut" onclick="ShowHideDiv()" required/>
                                        {{-- <span class="">auditeur privé</span>
                                        <input type="radio" id="prive" value="prive" @if($auditeur->statut == "prive") checked @endif  name="statut" onclick="ShowHideDiv()" required /> --}}
                                        {{-- @dd($auditeur->statut) --}}
                                        <span class="">{{ $types[1] }}</span>

                                    </label>
                                </div>
                            </div>
                        </div><br>

                        <div class="form-group input-group">
                            <span class="has-float-label">
                              <input type="text" class="form-control" name="nom_auditeur" value="{{ old('nom_auditeur') ?? $auditeur->ume }}" id="nom_auditeur" placeholder="Nom" required/>
                              <label for="nom_auditeur">Nom</label>
                            </span>
                            @error('nom_auditeur')<small class="text-danger">{{ $message }}<br></small>@enderror
                        </div>

                <div class="form-group input-group" id="num_rccm" @if((Route::current()->getName() =='auditeurs.edit') && ($auditeur->statut == 'privé') ) style="display:flex" @else style="display:none" @endif>
                    <span class="has-float-label">
                        <input type="text" class="form-control" name="num_rccm" id="num_rccm" value="{{ old('num_rccm') ?? $auditeur->num_rccm }}" placeholder="N° rccm" />
                        <label for="num_rccm">N° rccm</label>
                    </span>
                    @error('num_rccm')<small class="text-danger">{{ $message }}<br></small>@enderror
                </div>
                <div class="form-group input-group" id="num_ifu" @if((Route::current()->getName() =='auditeurs.edit') && ($auditeur->statut == 'privé') ) style="display:flex" @else style="display:none" @endif>
                    <span class="has-float-label">
                        <input type="text" class="form-control" name="num_ifu" id="num_ifu" value="{{ old('num_ifu') ?? $auditeur->num_ifu }}"  placeholder="N° ifu"/>
                        <label for="num_ifu">N° ifu</label>
                    </span>
                    @error('num_ifu')<small class="text-danger">{{ $message }}<br></small>@enderror
                </div>
                <div class="form-group input-group" id="autre" @if((Route::current()->getName() =='auditeurs.edit') && ($auditeur->statut == 'privé') ) style="display:flex" @else style="display:none" @endif>
                    <span class="has-float-label">
                        <input type="text" class="form-control" name="autre" id="autre" value="{{ old('autre') ?? $auditeur->autre }}"  placeholder="Autre"/>
                        <label for="autre">Autre</label>
                    </span>
                    @error('autre')<small class="text-danger">{{ $message }}<br></small>@enderror
                </div>

                {{-- <div class="form-group input-group">
                    <span class="has-float-label">

                    <select class="form-control" name="secteur" id="secteur" required>

                        <option  selected value="" disabled>Veuillez choisir le secteur d'activité</option>

                        <option value="Industrie" @if($auditeur->secteur == "Industrie") selected @endif>Industrie  </option>
                        <option value="Transport" @if($auditeur->secteur == "Transport") selected @endif>Transport  </option>
                        <option value="Bâtiment" @if($auditeur->secteur == "Bâtiment") selected @endif>Bâtiment  </option>
                    </select>
                    <label for="nom_auditeur">Secteur d'activité</label>
                    </span>
                    @error('secteur')<small class="text-danger">{{ $message }}<br></small>@enderror
                </div> --}}
                <div class="form-group input-group">
                    <label class="form-group has-float-label">
                        <select class="form-control custom-select" name="secteur_id" required>
                          <option selected value="" disabled>Veuillez choisir le type de personne </option>
                          @foreach ($types as $item)
                         {{-- <option value="{{$item->id}}" {{ $auditeur->secteur_id == $item->id ? 'selected' : '' }} >{{$item->nom }} </option> --}}
                         <option value="{{$item->id}}" >{{$item->nom }} </option>
                           @endforeach
                        </select>
                        <label for="secteur">Type de personne</label>
                    </span>
                </div>
                <div class="form-group input-group">
                    <span class="has-float-label">
                      <input type="date" class="form-control" name="date_creation" id="date_creation" value="{{ old('date_creation') ?? $auditeur->date_creation }}" placeholder="Date de creation de l'auditeur"  required/>
                      <label for="date_creation">Date de creation</label>
                    </span>
                    @error('date_creation')<small class="text-danger">{{ $message }}<br></small>@enderror
                </div>

                <div class="form-group input-group">
                    <span class="has-float-label">
                      <input type="date" class="form-control" name="date_declaration" id="date_declaration" value="{{ old('date_declaration') ?? $auditeur->date_declaration}}"  placeholder="date de declaration"  required/>
                      <label for="date_declaration">Date de declaration</label>
                    </span>
                    @error('date_creation')<small class="text-danger">{{ $message }}<br></small>@enderror
                </div>

            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Contacts</div>
            </div>
            <div class="card-body">
                <div class="wd-200 mg-b-30">

                    <div class="form-group input-group">
                        <span class="has-float-label">
                        <input type="text" class="form-control" name="tel_mobile" id="tel_mobile" value="{{ old('tel_mobile') ?? $auditeur->tel_mobile}}"   placeholder="N° de télephone mobile"  required/>
                        <label for="tel_mobile">N° de télephone mobile</label>
                        </span>
                        @error('tel_mobile')<small class="text-danger">{{ $message }}<br></small>@enderror
                    </div>

                    <div class="form-group input-group">
                        <span class="has-float-label">
                        <input type="text" class="form-control" name="tel_fixe" id="tel_fixe" value="{{ old('tel_fixe') ?? $auditeur->tel_fixe}}"   placeholder="N° de télephone fixe"  required/>
                        <label for="tel_fixe">N° de télephone fixe</label>
                        </span>
                        @error('tel_fixe')<small class="text-danger">{{ $message }}<br></small>@enderror
                    </div>
                    <div class="form-group input-group">
                            <label class="form-group has-float-label">
                                <select class="form-control custom-select" name="ville_id" required>
                                <option selected value="" disabled>Veuillez choisir la ville </option>
                                @foreach ($ville as $item)
                                <option value="{{$item->id}}" {{ $auditeur->ville_id == $item->id ? 'selected' : '' }} >{{$item->nom }} </option>
                                @endforeach
                                </select>
                                <label for="ville">Ville</label>
                            </span>
                        </div>

                    <div class="form-group input-group">
                        <span class="has-float-label">
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') ?? $auditeur->email}}" placeholder="Email"  required/>
                        <label for="email">Email</label>
                        </span>
                        @error('email')<small class="text-danger">{{ $message }}<br></small>@enderror
                    </div>
                    <div class="form-group input-group">
                        <span class="has-float-label">
                        <input type="text" class="form-control" name="num_bp" id="num_bp" value="{{ old('num_bp') ?? $auditeur->bp}}" placeholder="Boite postale"  required/>
                        <label for="num_bp">Boite postale</label>
                        </span>
                        @error('num_bp')<small class="text-danger">{{ $message }}<br></small>@enderror
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
    {{-- <div class="btn-list text-center">
        <button type="submit" class="btn btn-secondary "><i class="fe fe-check mr-2"></i>{{ $btnTexte }}</button>
    </div> --}}

    <div class="btn-list text-center">
        <button type="button" onclick="history.go(-1);"class="btn btn-danger btn-sm ">{{ $btnCancel }}</button>
        <button type="submit" class="btn btn-primary btn-sm">{{ $btnTexte }}</button>
    </div>

