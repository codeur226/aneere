<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReponseRequest;
use App\Http\Requests\UpdateReponseRequest;
use App\Models\Appelectrique;
use App\Models\Fiche;
use App\Models\Optionsqcm;
use App\Models\Question;
use App\Models\Reponse;
use App\Models\Reponseqcm;
use Illuminate\Http\Request;

class ReponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $id_audit = $request->id_audit;
        $questions = Question::all();

        //Enregistrement des réponses de la fiche 1,2,4,5 et 6

        foreach ($questions as $item) {
            $id = $item->etiquette;
            $reponse_sous_question = $item->etiquette_sous_question;
            $reponse_question = $item->etiquette;
            if ($item->type_question == 'checkbox') {
            //dd($request->$id);
                if ($item->sous_question == true) {
                    $reponse = Reponse::create([
                                'question_id' => $item->id,
                                'audit_id' => $request->id_audit,
                                'reponse' => implode(';', $request->$id),
                                'sous_reponse' => $request->$reponse_sous_question,
                            ]);
                } else {
                    $reponse = Reponse::create([
                            'question_id' => $item->id,
                            'audit_id' => $request->id_audit,
                            'reponse' => implode(';', $request->$id),
                        ]);
                }
            } else {

                if ($item->sous_question == true) {
                    $reponse = Reponse::create([
                                'question_id' => $item->id,
                                'audit_id' => $request->id_audit,
                                'reponse' => $request->$reponse_question,
                                'sous_reponse' => $request->$reponse_sous_question,
                            ]);
                } else {
                    $reponse = Reponse::create([
                            'question_id' => $item->id,
                            'audit_id' => $request->id_audit,
                            'reponse' => $request->$reponse_question,
                        ]);
                }
            }
        }

        return redirect()->route('fiche3', [
            'audit_id' => $id_audit,
        ])->with('statut', 'Données des fiches 1, 2,4,5,6 enregistrées avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Reponse $reponse)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Reponse $reponse)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reponse $reponse)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reponse $reponse)
    {
    }
}
