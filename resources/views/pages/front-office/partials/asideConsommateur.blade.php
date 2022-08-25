<div class="col-md-3 mb-5 mt-5 fixed menu-to-hide-in-mobile">
    <div class="menu-navigation ">
        <div >
            {{-- <div class="text-center">
                <strong>{{Auth::user()->name}}</strong>
            </div> --}}
            <div class="form-group mr-2 ml-2">
              <label for=""></label>
              <select class="form-control" name="" id="etablissement">
                @foreach (Auth::user()->consommateurs as $consommateur)
                <option value="{{$consommateur->id}}">{{$consommateur->nom}}</option>
                @endforeach
              </select>
            </div>
        </div>
        <hr>
            
        <nav class="nav flex-column">
            {{-- @if (Auth::user()) --}}
            {{-- <a class="nav-link mb-2 {{set_active(['etablissement-rapports.create'])}}"  href="{{route('etablissement-password')}}" ><i class="fas fa-folder-plus menu__icon"></i><span>Nouveau rapport</span></a> --}}
            {{-- <a class="nav-link  mb-2 {{set_active(['etablissement-rapports.index'])}}"   href="{{route('password_save')}}"><i class="fa fa-folder-open menu__icon"></i><span>Mes rapports</span></a> --}}
            <a id="link_information" class="nav-link  mb-2 {{set_active(['consommateur.informations'])}}" ><i class="fa fa-home menu__icon"></i> <span>Mon établissement</span></a>
            <a href="{{route('rapports.index')}}" id="listerapport" class="nav-link  mb-2 {{set_active(['rapports.index'])}}" ><i class="fa fa-folder-open menu__icon"></i> <span>Mes Rapports d'audits</span></a>
            <a href="{{route('consommateur.password_change')}}" class="nav-link  mb-2 {{set_active(['consommateur.password_change'])}}" ><i class="fa fa-user-circle menu__icon"></i><span>Mon mot de passe</span></a>

             {{-- @endif --}}

           </nav>
           <hr>
           {{-- <div class="over-eservice text-center">
            <small class="d-block"> <strong>  ANEREE</strong> </small> <br> <br> <br>
           </div> --}}



    </div>
</div>
<script src="{{asset('assetadmin/js/jquery-3.4.1.min.js')}}"></script>
            <script>
                $(function() {

                    // Récupération des id pour consommateur et domaine
                    var etablissement_id  = {{ old('etablissement',0) }};
                    
                    $('#etablissement').val(etablissement_id).prop('selected', true);
                    
                    $('#etablissement').on('change', function(e) {
                        var etablissement_id = e.target.value;
                        
                        var url_information="{{route('consommateur.informations',':id')}}";
                        url_information=url_information.replace(':id',etablissement_id);
                        $('#link_information').attr('href',url_information);

                        var url_maj="{{route('consommateur.complementInfos',':id')}}";
                        url_maj=url_maj.replace(':id',etablissement_id);
                        $('#link_maj').attr('href',url_maj);
  


 
                    });

                });
                </script>
{{-- <div class="topnav" id="myTopnav">
    <a href="#" class="active">
      ulfjnjnglk,fklh</a>
    <a href="#">Nouvelle demande</a>
    <a href="#">Mes demandes</a>
    @if ( Auth::user())
    <a href="#">Compte</a>
    @else
    <a href="#?">About</a>

    @endif
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div> --}}

  {{-- <script>
      function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
  </script> --}}
