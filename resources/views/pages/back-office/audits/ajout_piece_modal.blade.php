<script src="{{asset('assetadmin/js/jquery-3.4.1.min.js')}}"></script>

 <div id={!! $idModal !!} class="modal fade">
    <div class="modal-dialog">

        <div class="modal-content">
            <form  action="{{ route('pieces.store',['currentAuditeur'=>$id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="modal-header ">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                      {{-- <strong>Sorry !</strong> There were some problems with your input.<br><br> --}}
                      <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                    @endif

                      @if(session('success'))
                      <div class="alert alert-success">
                        {{ session('success') }}
                      </div>
                      @endif
                    {{-- <h4 class="modal-title  text-danger">Ajouter une pièce à {{ $auditeur->nom }}</h4> --}}
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    {{-- <div class="row mb-2">
                        <div class="col-md-2 col-sm-12"></div>
                        <div class="col-md-10 col-sm-12">
                            <p class="">Ajouter .</p>
                        </div>
                    </div> --}}
                    <div class="input-group control-group increment" >
                        <input type="file" name="piece[]" class="form-control">
                        @error('piece')<small class="text-danger">{{ $message }}<br></small>@enderror

                        <div class="input-group-btn">
                          <button class="btn btn-success btn-sm" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                        </div>
                      </div>
                      <div class="clone hide">
                        <div class="control-group input-group" style="margin-top:10px">
                          <input type="file" name="piece[]" class="form-control">
                          <div class="input-group-btn">
                            <button class="btn btn-danger btn-sm" type="button"><i class="glyphicon glyphicon-remove"></i></button>
                          </div>
                        </div>
                        @error('piece')<small class="text-danger">{{ $message }}<br></small>@enderror
                     </div>

                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-sm btn-outline-default" data-dismiss="modal" value="Annuler">
                    <button type="submit" class="btn btn-sm  btn-outline-warning">Ajouter</button>
                </div>
            </form>

            <script type="text/javascript">
                $(document).ready(function() {
                  $(".btn-success").click(function(){
                      var html = $(".clone").html();
                      $(".increment").after(html);
                  });
                  $("body").on("click",".btn-danger",function(){
                      $(this).parents(".control-group").remove();
                  });
                });
            </script>
        </div>
    </div>
    </div>
