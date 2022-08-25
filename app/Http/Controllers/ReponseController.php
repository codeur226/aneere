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
     * @param \App\Http\Requests\StoreReponseRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    // public function store(StoreReponseRequest $request)
    public function store(Request $request)
    {
        $id_audit = $request->id_audit;
        $questions = Question::all();
        // optionsqcms = Optionsqcm::all();

        //enregistrement de la question avec sous question
        foreach ($questions as $item) {
            if ($item->type_question == 'checkbox') {
                foreach (getlisteqcm($item->id) as $item2) {
                    $reponse_qcm = $item2->libelle_option;
                    $reponse_qcm = str_replace(' ', '', $reponse_qcm);
                    // dump($item2->libelle_option." : ".$request->$reponse_qcm);

                    $reponseqcm = Reponseqcm::create([
                            'options_qcm_id' => $item2->id,
                            'audit_id' => $request->id_audit,
                            'reponse' => $request->$reponse_qcm,
                        ]);

                    // if($item->sous_question==true)
                        // {
                        //   $data2=$item->libelle_sous_question;
                        //   dump($item->libelle_sous_question." : ".$request->$data2);

                        //   }
                }
            } else {
                // $data=$item->libelle;
                // dump($item->libelle." : ".$request->$data);
                // if($item->sous_question==true)
                // {
                //   $data2=$item->libelle_sous_question;
                //   dump($item->libelle_sous_question." : ".$request->$data2);

                //   }

                if ($item->sous_question == true) {
                    $reponse_sous_question = $item->libelle_sous_question;
                    $reponse_question = $item->libelle;

                    $reponse = Reponse::create([
                                'question_id' => $item->id,
                                'audit_id' => $request->id_audit,
                                'reponse' => $request->$reponse_question,
                                'sous_reponse' => $request->$reponse_sous_question,
                            ]);
                } else {
                    $reponse_question = $item->libelle;
                    $reponse = Reponse::create([
                            'question_id' => $item->id,
                            'audit_id' => $request->id_audit,
                            'reponse' => $request->$reponse_question,
                        ]);
                }
            }
        }

        //   $appelectrique = Appelectrique::create([
        //     'fiche_id' => $item->id,
        //     'audit_id' => "60cd27c8-abb6-4035-bbce-f343ff7c11e7",
        //     'emplacement'=>$request->emplacement,
        //     'quantite'=>$request->quantite,
        //     'duree'=>$request->duree,
        //     'etat_fonctionnement'=>$request->etat,
        //     'Observations'=>$request->observation,
        // ]);

        $q_fiche0 = Question::join('fiches', 'fiches.id', '=', 'questions.fiche_id')
        ->where('fiches.ordre', '=', 0)
        ->get();
        //dd($q_fiche0);
        // QUESTIONS DE LA FICHE 1
        $q_fiche1 = Question::join('fiches', 'fiches.id', '=', 'questions.fiche_id')
        ->where('fiches.ordre', '=', 1)
        ->get();
        // QUESTIONS DE LA FICHE 2
        $q_fiche2 = Question::join('fiches', 'fiches.id', '=', 'questions.fiche_id')
        ->where('fiches.ordre', '=', 2)
        ->get();
        // QUESTIONS DE LA FICHE 3
        $q_fiche3 = Question::join('fiches', 'fiches.id', '=', 'questions.fiche_id')
        ->where('fiches.ordre', '=', 3)
        ->get();
        //QUESTIONS DE LA FICHE 4
        $q_fiche4 = Question::join('fiches', 'fiches.id', '=', 'questions.fiche_id')
        ->where('fiches.ordre', '=', 4)
        ->get();
        //QUESTIONS DE LA FICHE 5
        $q_fiche5 = Question::join('fiches', 'fiches.id', '=', 'questions.fiche_id')
        ->where('fiches.ordre', '=', 5)
        ->get();
        // QUESTIONS DE LA FICHE 6
        $q_fiche6 = Question::join('fiches', 'fiches.id', '=', 'questions.fiche_id')
        ->where('fiches.ordre', '=', 6)
        ->get();

        return redirect()->route('fiche3', [
            // 'q_fiche0' => $q_fiche0,
            // 'q_fiche1' => $q_fiche1,
            // 'q_fiche2' => $q_fiche2,
            // 'q_fiche3' => $q_fiche3,
            // 'q_fiche4' => $q_fiche4,
            // 'q_fiche5' => $q_fiche5,
            // 'q_fiche6' => $q_fiche6,
            //'questions' => Question::all(),
            //'fiches' => Fiche::all(),
            //'optionsqcms' => Optionsqcm::all(),
            //'title' => 'Fiche 3',
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
    public function update(UpdateReponseRequest $request, Reponse $reponse)
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
