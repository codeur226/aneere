@extends('layouts.master')
@section('content')
<section class="dashboard">
    <div class="container">
            <div class="row">
                @include('partials.asideUser')
                <div class="col-md-9 mb-5 mt-5 " >
                    @include('pages.front-office.partials._message_flash')
                    <div class="dashboard-contenu ">
                        <div class="news_6">

                            <form method="POST" action="{{route('demandes.update',$demande)  }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('pages.demandes._form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>
@endsection
