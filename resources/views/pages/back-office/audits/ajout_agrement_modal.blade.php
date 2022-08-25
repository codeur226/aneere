

 <div id={!! $idModal !!} class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  action="{{ route('agrements.store',['currentAuditeur'=>$id]) }}" method="POST">
                @csrf
                @method('post')
                <div class="modal-header ">
                    <h4 class="modal-title  text-danger">Ajouter un agrement à {{ $auditeur->nom }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    {{-- <div class="row mb-2">
                        <div class="col-md-2 col-sm-12"></div>
                        <div class="col-md-10 col-sm-12">
                            <p class="">Ajouter .</p>
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <span class="form-group has-float-label">
                            <select class="form-control custom-select" name="domaine_id" id="domaine" required>
                            <option selected value="0" disabled>Veuillez choisir le domaine </option>
                            @foreach ($domaines as $item)
                            <option value="{{$item->id}}" >{{$item->nom }} </option>
                            {{-- <option value="{{$item->id}}" {{ $auditeur->domaine_id == $item->id ? 'selected' : '' }} >{{$item->nom }} </option> --}}
                            @endforeach
                            </select>
                            <label for="domaine">Domaine d'audit de l'auditeur</label>
                        </span>
                      @error('domaine')<small class="text-danger">{{ $message }}<br></small>@enderror
                      </div>

                      <div class="form-group">
                          <span class="form-group has-float-label">
                              <select class="form-control custom-select" name="etat_id" id="etat" required>
                              <option selected value="0" disabled>Veuillez choisir l'etat </option>
                              @foreach ($etats as $item)
                              <option value="{{$item->id}}" {{ $auditeur->etat_id == $item->id ? 'selected' : '' }} >{{$item->etat }} </option>
                              @endforeach
                              </select>
                              <label for="etat">etat </label>
                          </span>
                        @error('etat')<small class="text-danger">{{ $message }}<br></small>@enderror
                        </div>

                        <div class="form-group input-group">
                            <span class="has-float-label">
                              <input type="text" class="form-control" name="num_agrement" placeholder="N° agrement" value="{{ old('num_agrement') }}" required/>
                              <label for="num_agrement">N° Agrement</label>
                            </span>
                            @error('num_agrement')<small class="text-danger">{{ $message }}<br></small>@enderror
                          </div>
                          <div class="form-group input-group">
                              <span class="has-float-label">
                                <input type="date" class="form-control" name="date_delivrance" placeholder="date de delivrance" value="{{ old('date_delivrance') }}" required/>
                                <label for="date_delivrance">Date delivrance</label>
                              </span>
                              @error('date_delivrance')<small class="text-danger">{{ $message }}<br></small>@enderror
                            </div>
                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-sm btn-outline-default" data-dismiss="modal" value="Annuler">
                    <button type="submit" class="btn btn-sm  btn-outline-warning">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
    </div>
