<link rel="stylesheet" href="{{asset('css/style.css')}}">
<x-app-layout>
<section class="dashboard">
    <div class="container">

      <div class="row">
        @include('pages.front-office.partials.asideConsommateur')
        <div class="col-md-9 mb-5 mt-5" >
          <div class="dashboard-contenu">
            {{-- @include('partials._notifications') --}}
            <h5 class="text-center mb-4">Formulaire de mise à jour des rapports
              <hr>
            </h5>
            

            <div class="news_6">

              <form action="{{ route('rapports.update',$rapport) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  @include('pages.front-office.rapports._form', ["btnTexte" => "Mettre à jour"])

              </form>
          </div>

            </div>
        </div>
    </div>
    </div>
    </section>
</x-app-layout>

