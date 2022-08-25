

 <div id="importation" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  action="{{ route('importations.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="modal-header ">
                    <h4 class="modal-title  text-danger">Importation d'établissements</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">

                        <div class="form-group input-group">
                            <span class="has-float-label">
                              <input type="file" class="form-control" name="fichier" placeholder="le fichier" value="" required />
                              <label for="fichier">Fichier</label>
                            </span>
                            @error('fichier')<small class="text-danger">{{ $message }}<br></small>@enderror
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
                    <button type="submit" class="btn btn-sm  btn-outline-warning">Importer</button>
                </div>
            </form>
        </div>
    </div>
    </div>
