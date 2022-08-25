           @if(session("statut"))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ session("statut") }}
                </div>
            @endif
                @if(session("error"))
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ session("error") }}
                </div>
               @endif
                @if(session("warning"))
                <div class="alert alert-warning" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>{{ session("warning") }}
                </div>
               @endif
    
               <br>

