

  <div id="multi_trans" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('audits.affectation') }}">
                @csrf
                <div class="modal-header ">
                    <h4 class="modal-title  text-danger">Affecter un agent à un audit !!!</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="AffecterToAgent" id="AffecterToAgent">
                    <div class="form-group">
                        <span class="form-group has-float-label">
                            <select class="form-control custom-select" name="user_id" id="user_id" required >
                                <option selected value="0" disabled>Veuillez choisir l'agent responsable de l'audit </option>
                                @foreach ($users as $item)
                                <option value="{{$item->id}}" >{{$item->name }} </option>
                                @endforeach
                            </select>
                            <label for="user">L'agent responsable de l'audit</label>
                        </span>
                         @error('user_id')<small class="text-danger">{{ $message }}<br></small>@enderror
                      </div>

                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-sm btn-outline-default" data-dismiss="modal" value="Annuler">
                    <button type="submit" class="btn btn-sm  btn-outline-warning">Affecter</button>
                </div>
            </form>
        </div>
    </div>








