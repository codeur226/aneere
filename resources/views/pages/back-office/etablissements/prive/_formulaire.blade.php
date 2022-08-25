
    @csrf
    <div class="row" id="user">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Informations d'identification</div>
                </div>
                <div class="card-body">
                    <div class="form-group input-group">
                        <span class="has-float-label">
                          <input type="text" class="form-control" name="nom_responsable" value="{{ old('nom_responsable') ?? $etablissement->user->name }}" id="nom_responsable" placeholder="Nom" required/>
                          <label for="nom_responsable">Nom et Prenom du responsable</label>
                        </span>
                        @error('nom_responsable')<small class="text-danger">{{ $message }}<br></small>@enderror
                    </div>
                    <div class="form-group input-group">
                        <span class="has-float-label">
                          <input type="text" class="form-control" name="nom_etablissement" value="{{ old('nom_etablissement') ?? $etablissement->nom }}" id="nom_etablissement" placeholder="Nom" required/>
                          <label for="nom_etablissement">Nom de l'etablissement</label>
                        </span>
                        @error('nom_etablissement')<small class="text-danger">{{ $message }}<br></small>@enderror
                    </div>

                    <div class="form-group input-group">
                        <label class="form-group has-float-label">
                            <select class="form-control custom-select" name="domaine_id" id="domaine_id" required>
                              <option selected value="" disabled>Veuillez choisir le domaine d'audit </option>
                              @foreach ($domaine as $item)
                             <option value="{{$item->id}}" {{ $etablissement->domaine_id == $item->id ? 'selected' : '' }} >{{$item->nom }} </option>
                               @endforeach
                            </select>
                            <label for="domaine">Domaine d'audit</label>
                        </span>
                    </div>
                    <div class="form-group input-group">
                        <span class="has-float-label">
                        <input type="text" class="form-control" name="num_identification" id="num_identification" value="{{ old('num_identification') ?? $etablissement->num_identification}}"   placeholder="N° d'identification" readonly />
                        <label for="num_identification">N° d'identification</label>
                        </span>
                        @error('num_identification')<small class="text-danger">{{ $message }}<br></small>@enderror
                    </div>
                    

                {{-- <div class="form-group input-group" id="num_rccm" >
                    <span class="has-float-label">
                        <input type="text" class="form-control" name="num_rccm" id="num_rccm" value="{{ old('num_rccm') ?? $etablissement->num_rccm }}" placeholder="N° rccm" />
                        <label for="num_rccm">N° rccm</label>
                    </span>
                    @error('num_rccm')<small class="text-danger">{{ $message }}<br></small>@enderror
                </div>
                <div class="form-group input-group" id="num_ifu" >
                    <span class="has-float-label">
                        <input type="text" class="form-control" name="num_ifu" id="num_ifu" value="{{ old('num_ifu') ?? $etablissement->num_ifu }}"  placeholder="N° ifu"/>
                        <label for="num_ifu">N° ifu</label>
                    </span>
                    @error('num_ifu')<small class="text-danger">{{ $message }}<br></small>@enderror
                </div>
                <div class="form-group input-group" id="autre" >
                    <span class="has-float-label">
                        <input type="text" class="form-control" name="autre" id="autre" value="{{ old('autre') ?? $etablissement->autre }}"  placeholder="Autre"/>
                        <label for="autre">Autre</label>
                    </span>
                    @error('autre')<small class="text-danger">{{ $message }}<br></small>@enderror
                </div> --}}

                {{-- <div class="form-group input-group">
                    <span class="has-float-label">
                      <input type="date" class="form-control" name="date_creation" id="date_creation" value="{{ old('date_creation') ?? $etablissement->date_creation }}" placeholder="Date de creation de l'etablissement" />
                      <label for="date_creation">Date de creation</label>
                    </span>
                    @error('date_creation')<small class="text-danger">{{ $message }}<br></small>@enderror
                </div> --}}

                {{-- <div class="form-group input-group">
                    <span class="has-float-label">
                      <input type="date" class="form-control" name="date_declaration" id="date_declaration" value="{{ old('date_declaration') ?? $etablissement->date_declaration}}"  placeholder="date de declaration"  required/>
                      <label for="date_declaration">Date de declaration</label>
                    </span>
                    @error('date_declaration')<small class="text-danger">{{ $message }}<br></small>@enderror
                </div> --}}

            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Adresse</div>
            </div>
            <div class="card-body">
                <div class="wd-200 mg-b-30">
                    <div class="form-group input-group">
                        <span class="has-float-label">
                        <input type="text" class="form-control" name="police" id="police" value="{{ old('police') ?? $etablissement->police}}"   placeholder="Police" />
                        <label for="police">Police</label>
                        </span>
                        @error('police')<small class="text-danger">{{ $message }}<br></small>@enderror
                    </div>
                    <div class="form-group input-group">
                        <span class="has-float-label">
                        <input type="text" class="form-control" name="tel_mobile" id="tel_mobile" value="{{ old('tel_mobile') ?? $etablissement->tel_mobile}}"   placeholder="N° de télephone mobile"/>
                        <label for="tel_mobile">N° de télephone mobile</label>
                        </span>
                        @error('tel_mobile')<small class="text-danger">{{ $message }}<br></small>@enderror
                    </div>

                    <div class="form-group input-group">
                        <span class="has-float-label">
                        <input type="text" class="form-control" name="tel_fixe" id="tel_fixe" value="{{ old('tel_fixe') ?? $etablissement->tel_fixe}}"   placeholder="N° de télephone fixe"/>
                        <label for="tel_fixe">N° de télephone fixe</label>
                        </span>
                        @error('tel_fixe')<small class="text-danger">{{ $message }}<br></small>@enderror
                    </div>
                    <div class="form-group input-group">
                            <label class="form-group has-float-label">
                                <select class="form-control custom-select" name="ville_id" required>
                                <option selected value="" disabled>Veuillez choisir la ville </option>
                                @foreach ($villes as $ville)
                                <option value="{{$ville->id}}" {{ $etablissement->ville_id == $ville->id ? 'selected' : '' }} >{{$ville->nom }} </option>
                                @endforeach
                                </select>
                                <label for="ville">Ville</label>
                            </span>
                        </div>
                        {{-- <div class="form-group input-group" id="num_secteur" >
                            <span class="has-float-label">
                                <input type="number" class="form-control" name="num_secteur" id="num_secteur" value="{{ old('num_secteur') ?? $etablissement->num_secteur }}" placeholder="N° secteur" />
                                <label for="num_secteur">N° Secteur</label>
                            </span>
                            @error('num_secteur')<small class="text-danger">{{ $message }}<br></small>@enderror
                        </div>
                        <div class="form-group input-group" id="rue" >
                            <span class="has-float-label">
                                <input type="number" class="form-control" name="rue" id="rue" value="{{ old('rue') ?? $etablissement->rue }}" placeholder="N° rue" />
                                <label for="rue">N° rue</label>
                            </span>
                            @error('rue')<small class="text-danger">{{ $message }}<br></small>@enderror
                        </div>
                        <div class="form-group input-group" id="num_porte" >
                            <span class="has-float-label">
                                <input type="number" class="form-control" name="num_porte" id="num_porte" value="{{ old('num_porte') ?? $etablissement->num_porte }}" placeholder="N° porte" />
                                <label for="num_porte">N° porte</label>
                            </span>
                            @error('num_porte')<small class="text-danger">{{ $message }}<br></small>@enderror
                        </div> --}}
                    <div class="form-group input-group">
                        <span class="has-float-label">
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') ?? $etablissement->user->email}}" placeholder="Email"  required/>
                        <label for="email">Email</label>
                        </span>
                        @error('email')<small class="text-danger">{{ $message }}<br></small>@enderror
                    </div>
                    {{-- <div class="form-group input-group">
                        <span class="has-float-label">
                        <input type="number" class="form-control" name="num_bp" id="num_bp" value="{{ old('num_bp') ?? $etablissement->bp}}" placeholder="Boite postale"/>
                        <label for="num_bp">Boite postale</label>
                        </span>
                        @error('num_bp')<small class="text-danger">{{ $message }}<br></small>@enderror
                    </div> --}}

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

