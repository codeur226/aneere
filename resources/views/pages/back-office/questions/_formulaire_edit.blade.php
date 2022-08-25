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
         <label for="fiche">Fiche à la quelle appartient la question</label>
     </span>
   @error('fiche')<small class="text-danger">{{ $message }}<br></small>@enderror
   </div>
   
 {{-- champs numero de la question --}}
 <div class="form-group input-group">
   <span class="has-float-label">
     <input type="number" class="form-control" name="numero_question" id="numero_question" min=0 max="200"  value="{{old('numero_question')?? $questions->numero_question}}" placeholder="Numéro de la question sur la fiche" required/>
     <label for="numero_question">Numéro de la question sur la fiche</label>
   </span>
 </div>
 @error('numero_question')<small class="text-danger">{{ $message }}<br></small>@enderror
 
 
 {{-- champs etiquette --}}
         <div class="form-group input-group">
         <span class="has-float-label">
           <input type="text" class="form-control" name="etiquette" id="etiquette"  value="{{old('etiquette')?? $questions->etiquette}}" placeholder="Etiquette de la question" required/>
           <label for="etiquette">Etiquette de la question</label>
         </span>
     </div>
    @error('etiquette')<small class="text-danger">{{ $message }}<br></small>@enderror
 {{-- champs libelle --}}
    <div class="form-group input-group">
     <span class="has-float-label">
       <input type="text" class="form-control" name="libelle" id="libelle"  value="{{old('libelle')?? $questions->etiquette}}" placeholder="libelle de la question (unique)" required/>
       <label for="libelle">Libellé de la question</label>
     </span>
 </div>
 @error('libelle')<small class="text-danger">{{ $message }}<br></small>@enderror

 <div class="btn-list text-center">
 <button type="button" onclick="history.go(-1);"class="btn btn-danger btn-sm ">{{ $btnCancel }}</button>
 <button type="submit" class="btn btn-primary btn-sm">{{ $btnTexte }}</button>
 </div>
