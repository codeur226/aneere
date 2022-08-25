<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use App\Models\Equipement;
use Illuminate\Http\Request;

class EquipementController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','isTextManager','isActive'])->except('search');
        // $this->middleware('auth')->except('index');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.back-office.equipements.index', [
            "equipements" => Equipement::all(),
            "title" => "Gestion des equipements",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.back-office.equipements.create', [
            "equipement" => new Equipement,
            "domaines"=> Domaine::all(),
            "title" => "Gestion des equipements"
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
            "domaine" => "required",
            "designation" => "required|string|min:5|unique:equipements,designation," . (isset($equipement) ? $equipement->id : null),

        ]);
           $equipement = Equipement::create([
                    "domaine_id" => $request->domaine,
                    "designation" => $request->designation,
        ]);
        //  dd($equipement->etablissement);
        return redirect()->route("equipements.index")->with("statut", "L'equipement a été ajouté avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipement  $equipement
     * @return \Illuminate\Http\Response
     */
    public function show(Equipement $equipement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipement  $equipement
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipement $equipement)
    {
        return view('pages.back-office.equipements.edit', [
            "equipement"=>$equipement,
            "domaines"=> Domaine::all(),
            "title" => "Gestion des equipements"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipement  $equipement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipement $equipement)
    {
        $request->validate([
            "domaine" => "required",
            "designation" => "required|string|min:5|unique:equipements,designation," . (isset($equipement) ? $equipement->id : null),

        ]);
        $equipement->domaine_id = $request->domaine;
        $equipement->designation = $request->designation;
        $equipement->save();
        return redirect()->route("equipements.index")->with("statut", "L'equipement a été mis à jour avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipement  $equipement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipement $equipement)
    {
        $equipement->delete();
        return redirect()->route("equipements.index")->with("statut", "Le equipement a été supprimé avec succès");
    }

    public function search($request)
    {
        if($request!=-1)
            {
                return view('pages.front-office.equipements.search',[
                    "equipements" => Equipement::where('domaine_id','like', $request)->get(),
                    "domaines" => Domaine::all(),
                    'domaine_id' =>$request
                // "title"=>"Gestion de la règlementation"
                ]);
            }else{ //dd($request);
                return view('pages.front-office.equipements.search',[
                    "equipements" => Equipement::all(),
                    "domaines" => Domaine::all(),
                    'domaine_id' =>$request
                // "title"=>"Gestion de la règlementation"
                ]);
            }
    }


}
