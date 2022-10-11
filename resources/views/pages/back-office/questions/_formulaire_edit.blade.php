@csrf
 {{-- champ selection de la fiche --}}
   <div class="form-group input-group">
     <span class="form-group has-float-label">
         <select class="form-control custom-select" name="fiche" id="fiche" required autofocus>
         <option selected  disabled value="0">Veuillez choisir une fiche </option>
        @foreach ($fiche as $fiche)
        <option value="{{$fiche->id}}" {{ $fiche->id == $question->fiche_id ? 'selected' : '' }} >{{$fiche->libelle }} </option>
        @endforeach
         </select>
         <label for="fiche">Fiche à laquelle appartient la question</label>
     </span>
   @error('fiche')<small class="text-danger">{{ $message }}<br></small>@enderror
   </div>
   
 {{-- champs numero de la question --}}
 <div class="form-group input-group">
   <span class="has-float-label">
     <input type="number" class="form-control" name="numero_question" id="numero_question" min=0 max="200"  value="{{old('numero_question')?? $question->numero_question}}" placeholder="Numéro de la question sur la fiche" required/>
     <label for="numero_question">Numéro de la question sur la fiche</label>
   </span>
 </div>
 @error('numero_question')<small class="text-danger">{{ $message }}<br></small>@enderror
 
 
 {{-- champs etiquette question--}}
         <div class="form-group input-group">
         <span class="has-float-label">
           <input type="text" class="form-control" name="etiquette" id="etiquette"  value="{{old('etiquette')?? $question->etiquette}}" placeholder="Etiquette de la question" required/>
           <label for="etiquette">Etiquette de la question</label>
         </span>
     </div>
    @error('etiquette')<small class="text-danger">{{ $message }}<br></small>@enderror
 {{-- champs libelle question--}}
    <div class="form-group input-group">
     <span class="has-float-label">
       <input type="text" class="form-control" name="libelle" id="libelle"  value="{{old('libelle')?? $question->libelle}}" placeholder="libelle de la question (unique)" required/>
       <label for="libelle">Libellé de la question</label>
     </span>
 </div>
 @error('libelle')<small class="text-danger">{{ $message }}<br></small>@enderror

 @if($question->sous_question==true)
    {{-- champs etiquette sous-question--}}
    <div class="form-group input-group">
        <span class="has-float-label">
          <input type="text" class="form-control" name="etiquette_sous_question" id="etiquette_sous_question"  value="{{old('etiquette_sous_question')?? $question->etiquette_sous_question}}" placeholder="Etiquette de la sous question" required/>
          <label for="etiquette_sous_question">Etiquette de la sous-question</label>
        </span>
    </div>
   @error('etiquette_sous_question')<small class="text-danger">{{ $message }}<br></small>@enderror
    {{-- champs libelle sous-question--}}
    <div class="form-group input-group">
        <span class="has-float-label">
        <input type="text" class="form-control" name="libelle_sous_question" id="libelle_sous_question"  value="{{old('libelle_sous_question')?? $question->libelle_sous_question}}" placeholder="libelle de la sous-question" required/>
        <label for="libelle">Libellé de la sous-question</label>
        </span>
    </div>
    @error('libelle_sous_question')<small class="text-danger">{{ $message }}<br></small>@enderror
@endif

 <div class="btn-list text-center">
 <a href="{{ route('questions.show',$question->id) }}" class="btn btn-primary btn-sm" >Annuler</a>
 <button type="submit" class="btn btn-primary btn-sm">Valider</button>
 </div>
