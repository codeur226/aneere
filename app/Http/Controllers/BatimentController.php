<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ville;
use App\Models\Domaine;
use App\Models\Secteur;
use App\Models\Batiment;
use Illuminate\Http\Request;
use App\Models\Etablissement;

class BatimentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','isTextManager','isActive']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $batiment = Batiment::all();
        return view('pages.back-office.batiments.index', [
            "batiments" => $batiment,
            "title" => "Gestion des batiments"

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.back-office.batiments.create', [
            "batiment" => new Batiment,
            "domaines"=> Domaine::all(),
            "title" => "Gestion des batiments"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "consommateur_id" => "required|string",
            "num_compteur" => "nullable|string",
            // "secteur" => "required|string",
            'date_declaration' => 'required|date',
            // "num_secteur" => "integer",
            // "rue" => "integer",
            "niveau" => "nullable|string",
            // "ville_id" => "required|string"
        ]);
           $batiment = Batiment::create([
                    "consommateur_id" => $request->consommateur_id,
                    // "ville_id" => $request->ville_id,
                    // "secteur" => $request->secteur,
                    "date_declaration" => $request->date_declaration,
                    // "rue" => $request->rue,
                    "niveau" => $request->niveau,
                    "num_compteur" => $request->num_compteur,
        ]);
        //  dd($batiment->etablissement);
        return redirect()->route("batiments.index")->with("statut", "Le batiment a été ajouté avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Batiment  $batiment
     * @return \Illuminate\Http\Response
     */
    public function show(Batiment $batiment)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Batiment  $batiment
     * @return \Illuminate\Http\Response
     */
    public function edit(Batiment $batiment, Request $request)
    {
        return view('pages.back-office.batiments.edit', [
            "batiment" => $batiment,
            "domaines"=> Domaine::all(),
            // 'currentEtablissement' => $batiment->etablissement->id,
            'consommateur_id' => $batiment->consommateur->id,
            "title" => "Gestion des batiments"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Batiment  $batiment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Batiment $batiment)
    {
        $request->validate([
            "consommateur_id" => "required|string",
            "num_compteur" => "nullable|string",
            // "secteur" => "required|string",
            // "num_secteur" => "integer",
            // "rue" => "integer",
            "niveau" => "string",
            "date_declaration" => "required|date"
        ]);
        $batiment->consommateur_id = $request->consommateur_id;
        $batiment->date_declaration = $request->date_declaration;
        $batiment->num_compteur = $request->num_compteur;
        // $batiment->num_secteur = $request->num_secteur;
        $batiment->niveau = $request->niveau;
        // $batiment->rue = $request->rue;


        $batiment->save();
        return redirect()->route("batiments.index")->with("statut", "Le batiment a été mis à jour avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Batiment  $batiment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batiment $batiment)
    {
        $batiment->delete();
        return redirect()->route("batiments.index")->with("statut", "Le batiment a été supprimé avec succès");
    }


}
