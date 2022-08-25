<?php

namespace App\Http\Controllers;

use App\Models\Etat;
use App\Models\Domaine;
use App\Models\Agrement;
use App\Models\Personne;
use Illuminate\Http\Request;

class AgrementController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','isAuditeurManager','isActive']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $agrement = Agrement::all();
        // return view('pages.back-office.agrements.index', [
        //     "agrements" => $agrement,
        //     "title" => "Gestion des agrements"

        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        // return view('pages.back-office.agrements.create', [
        //     "agrement" => new agrement,
        //     "etats" => Etat::all(),
        //     "personnes" => Personne::all(),
        //     "domaines"=> Domaine::all(),
        //     "title" => "Gestion des agrements"
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //on verifie si un agrement du meme domaine n'est pas deja octroyé à
        $agrementsAuditeur=Agrement::where('auditeur_id','like',$request->currentAuditeur)
                                ->where("domaine_id",'like', $request->domaine_id)->get();
        if($agrementsAuditeur->count() > 0){
            return redirect()->route("auditeurs.show",$agrementsAuditeur[0]->auditeur_id)->with("error", "Cet auditeur dispose d'un agrement du même domaine. Veullez plutot redefinir cet agrement");
        }
        else{
        $request->validate([
            "num_agrement" => "required|string|min:2|unique:agrements,num_agrement",
            "date_delivrance" => "required|date",
        ]);
           $agrement = Agrement::create([
                    "auditeur_id" => $request->currentAuditeur,
                    "domaine_id" => $request->domaine_id,
                    "etat_id" => $request->etat_id,
                    "num_agrement" => $request->num_agrement,
                    "date_delivrance" => $request->date_delivrance,
        ]);
        return redirect()->route("auditeurs.show",$agrement->auditeur_id)->with("statut", "L'agrement a été ajouté avec succès");
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\agrement  $agrement
     * @return \Illuminate\Http\Response
     */
    public function show(agrement $agrement)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\agrement  $agrement
     * @return \Illuminate\Http\Response
     */
    public function edit(agrement $agrement, Request $request)
    {
        return view('pages.back-office.agrements.edit', [
            "agrement" => $agrement,
            "etats" => Etat::all(),
            "agrements" => Agrement::all(),
            "personnes" => Personne::all(),
            "domaines"=> Domaine::all(),
            // 'currentEtablissement' => $agrement->etablissement->id,
            'etablissement_id' => $agrement->etablissement->id,
            "title" => "Gestion des agrements"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\agrement  $agrement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, agrement $agrement)
    {
        $agrementsAuditeur=Agrement::where('auditeur_id','like',$agrement->auditeur->id)
        ->where("domaine_id",'like', $request->domaine_id)->get();
        if($agrementsAuditeur->count() > 0){
        return redirect()->route("auditeurs.show",$agrementsAuditeur[0]->auditeur_id)->with("error", "Cet auditeur dispose d'un agrement du même domaine. Veullez plutot redefinir cet agrement");
        }
        else{
        $request->validate([
            "num_agrement" => "required|string|min:2|unique:agrements,num_agrement," . (isset($agrement) ? $agrement->id : null),
            "date_delivrance" => "required|date",

        ]);

           $agrement->update([
                    // "auditeur_id" => $request->currentA,
                    "domaine_id" => $request->domaine_id,
                    "etat_id" => $request->etat_id,
                    "num_agrement" => $request->num_agrement,
                    "date_delivrance" => $request->date_delivrance,
        ]);
        // $agrement->etablissement_id = $request->etablissement_id;
        // $agrement->ville_id = $request->ville_id;
        // $agrement->num_compteur = $request->num_compteur;
        // $agrement->domaine = $request->domaine;
        // $agrement->niveau = $request->niveau;
        // $agrement->rue = $request->rue;


        // $agrement->save();
        return redirect()->route("auditeurs.show",$agrement->auditeur->id)->with("statut", "L'agrement a été mis à jour avec succès");
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\agrement  $agrement
     * @return \Illuminate\Http\Response
     */
    public function destroy(agrement $agrement)
    {
        $agrement->delete();
        return redirect()->route("auditeurs.show",$agrement->auditeur_id)->with("statut", "L'agrement a été supprimé avec succès");
    }
}
