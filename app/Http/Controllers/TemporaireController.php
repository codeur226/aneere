<?php

namespace App\Http\Controllers;

use App\Models\Temporaire;
use Illuminate\Http\Request;

class TemporaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Temporaire $temporaire)
    {
        return view('pages.back-office.etablissements.importations.edit', [
            "temporaire"=>$temporaire,
            "title" => "Gestion des consommateurs"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Temporaire $temporaire)
    {
        // $request->validate([

        //     "designation" => "required|string|min:5|unique:equipements,designation," . (isset($equipement) ? $equipement->id : null),

        // ]);
        $temporaire->nom = $request->nom;
        $temporaire->ville = $request->ville;
        $temporaire->type = $request->type;
        $temporaire->police = $request->police;
        $temporaire->telephone = $request->telephone;
        $temporaire->email = $request->email;
        $temporaire->save();
        return redirect()->route("importations.index",['importation'=>$temporaire->importation->id])->with("statut", "L'equipement a été mis à jour avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Temporaire $temporaire)
    {
        $temporaire->delete();
        return redirect()->route("importations.index",['importation'=>$temporaire->importation->id])->with("statut", "Le consommateur a été supprimé avec succès");
    }
}
