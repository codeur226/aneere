@section("pageTitle")
{{ $title }}
@endsection
<x-master-layout>
    <div class="table-responsive"> 
    <table id="example-datatable" class="table table-vcenter table-condensed table-bordered table-class">
        @foreach ($fiches as $fiche)
        <tbody>

        <tr>
            <th>Domaine :</th>
            <td> {{getDomaine($fiche->domaine_id)}} </td>
        </tr>
        <tr>
            <th>Ordre :</th>
            <td>{{ $fiche->ordre }}</td>
        </tr>
        <tr>
            <th>Libelle :</th>
            <td>{{ $fiche->libelle }}</td>
        </tr>
        <tr>
            <td colspan="2" style="background-color:#f0f0f8;"></td>
        </tr>
        <?php $number = 0; ?>
        @foreach ($questions as $question)
        <tr>
            <?php $number++; ?>
            <th colspan="2"><strong>Question {{ $number }}</strong></th>
        </tr>
        <tr>
            <th>Etiquette :</th>
            <td> {{$question->etiquette}} </td>
        </tr>
        <tr>
            <th>Libelle :</th>
            <td> {{$question->libelle}} </td>
        </tr>
        <tr>
            <th>Type de question :</th>
            <td> {{$question->type_question}} </td>
        </tr>
        <tr>
            <th>Réponse :</th>
            @if (getReponse($question->id)==NULL)
            <td>Aucune réponse n'est disponible pour le moment !</td>
            @endif
            @if (getReponse($question->id)!=NULL)
            <td> {{getReponse($question->id)}} </td>
            @endif
        </tr>
        <tr>
            <td> <strong>Sous-question</strong></td>
            @if ($question->sous_question==0)
            <td>Cette question ne possède pas de sous-question !</td>
            @endif
        </tr>
        @if ($question->sous_question==1)
        <tr>
            <th>Etiquette :</th>
            <td>{{ $question->etiquette_sous_question }}</td>
        </tr>
        <tr>
            <th>Libelle :</th>
            <td>{{ $question->libelle_sous_question }}</td>
        </tr>
        @endif
        <tr>
            <th>Sous-Réponse :</th>
            @if (getSousReponse($question->id)==NULL)
            <td>Aucune sous-réponse n'est disponible pour le moment !</td>
            @endif
            @if (getSousReponse($question->id)!=NULL)
            <td> {{getSousReponse($question->id)}} </td>
            @endif
        </tr>
        <tr>
            <td colspan="2" style="background-color:#f0f0f8;"></td>
        </tr>
        @endforeach
        </tbody>
        @endforeach
    </table>
    </div>

    <br><br>
    <tr>
        <td>
            <div class="btn-list text-center">
                <a type="button" class="btn btn-secondary btn-sm" href="{{ route('fiches.index') }}">Annuler</a>&nbsp;&nbsp;
                <a type="button" class="btn btn-primary btn-sm" href="{{ route('fiches.edit',  $fiche->id) }}">Modifier</a>&nbsp;&nbsp;
                <a type="button" class="btn btn-danger btn-sm" href="#" onClick="event.preventDefault(); deleteConfirm('{{ $fiche->id }}')">Supprimer</a>

                <form id="{{$fiche->id}}" action="{{ route('fiches.destroy', $fiche->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                </form>
            </div>
        </td>
    </tr>
    <br><br>
 

</x-master-layout>

<style>
    .table-class{
        background-color: white;
    }
</style>