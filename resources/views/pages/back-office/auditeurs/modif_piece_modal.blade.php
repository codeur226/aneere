

 <div id={!! $idModal !!} class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  action="{{ route('pieces.update', $piece ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-header ">
                    <h4 class="modal-title  text-danger">Modification de la pièce de {{ $auditeur->nom }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">

                        <div class="form-group input-group">
                            <span class="has-float-label">
                              <input type="file" class="form-control" name="piece" placeholder="la piece" value="" />
                              <label for="piece">Piece</label>
                            </span>
                            @error('piece')<small class="text-danger">{{ $message }}<br></small>@enderror
                          </div>
                          {{-- <div class="form-group input-group">
                              <span class="has-float-label">
                                <input type="date" class="form-control" name="date_delivrance" placeholder="date de delivrance" value="" required/>
                                <label for="date_delivrance">Date delivrance</label>
                              </span>
                              @error('date_delivrance')<small class="text-danger">{{ $message }}<br></small>@enderror
                            </div> --}}
                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-sm btn-outline-default" data-dismiss="modal" value="Annuler">
                    <button type="submit" class="btn btn-sm  btn-outline-warning">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
    </div>
