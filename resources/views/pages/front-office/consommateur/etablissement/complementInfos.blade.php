<link rel="stylesheet" href="{{asset('css/style.css')}}">
<x-app-layout>
    <section class="dashboard">
        <div class="container">
                <div class="row">
                    @include('pages.front-office.partials.asideConsommateur')
                    <div class="col-md-9 mb-5 mt-5 " >
                        @include('pages.front-office.partials._message_flash')
                        <div class="dashboard-contenu ">
                            <div class="news_6">

                                <form action="{{ route('consommateur.complementInfosUpdate') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    @include('pages.front-office.consommateur.etablissement._form', ["btnTexte" => "Enregistrer"])

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
    {{-- @endsection --}}
    </x-app-layout>
