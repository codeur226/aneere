<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\Reglementation;

class ReglementationController extends Controller
{
   public function __construct(){
            // $this->middleware(['auth','isTextManager','isActive'])->except('search','toutes');
            $this->middleware(['auth','isTextManager','isActive'])->except('search');

            // $this->middleware(['auth','isActive']);
            // $this->middleware(['isTextManager','isEtablissementManager'])->except(['home','informations']);
            // $this->middleware(['isEtablissement'])->only(['home','informations']);
            // $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return view('pages.back-office.reglementations.index',[
                "reglementations" => Reglementation::all(),
                "types" => Type::all(),
             "title"=>"Gestion de la règlementation"
            ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('pages.back-office.reglementations.create',[
            "reglementation" => new Reglementation,
            "type_id" => $request->type_id,
            "types" => Type::all(),
            "title"=>"Gestion de la règlementation"
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
            "date" =>"required|date",
            // "reference" =>"required|string|min:2|max:255",
            "reference" =>"required|string|unique:reglementations,reference",
            "fichier" =>"required|file|max:2048|unique:reglementations,fichier",
        ]);
        // dd($request);
        $reglementation= Reglementation::create([
            "type_id" => $request->type_id,
            "date" => $request->date,
            "reference" => $request->reference,
            "fichier" => $request->file("fichier")->store('reglementation','public'),
        ]);
        return redirect()->route("reglementations.show", $reglementation)->with("statut","Le texte règlementaire a été ajouté avec succès");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reglementation  $reglementation
     * @return \Illuminate\Http\Response
     */
    public function show(Reglementation $reglementation)
    { //dd($reglementation->fichier);
        return view('pages.back-office.reglementations.show',[
            "reglementation" => $reglementation,
            // "types" => Type::all(),
            "title"=>"Gestion de la règlementation"

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reglementation  $reglementation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reglementation $reglementation)
    {

        return view('pages.back-office.reglementations.edit',[
            "reglementation" => $reglementation,
            "types" => Type::all(),
            "type_id" => $reglementation->type_id,
            "title"=>"Gestion de la règlementation"

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reglementation  $reglementation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reglementation $reglementation)
    {
        $request->validate([
            "date" =>"required|date",
            // "reference" =>"required|string|min:2|max:255",
            "reference" =>"required|string|unique:reglementations,reference," . (isset($reglementation) ? $reglementation->id : null),
        ]);
        $reglementation->type_id = $request->type_id;
        $reglementation->date = $request->date;
        $reglementation->reference = $request->reference;
        // $reglementation->objet = $request->objet;
        $reglementation->fichier = $request->hasFile("fichier") ? $request->file("fichier")->store('reglementation','public') : $reglementation->fichier;
        $reglementation->save();
        return redirect()->route("reglementations.show", $reglementation)->with("statut","Le texte règlementaire a été mis à jour avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reglementation  $reglementation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reglementation $reglementation)
    {
        // dd(Storage::delete(['public/reglementation/' . $reglementation->fichier]));
        $file_path = public_path('/storage/'.$reglementation->fichier);
        unlink($file_path);
        $reglementation->delete();



        return redirect()->route("reglementations.index")->with("statut","Le texte reglementaire a été supprimé avec succès");
    }

    public function search($request)
    {
        if($request!=-1)
            {return view('pages.front-office.reglementations.search',[
                "reglementations" => Reglementation::where('type_id','like', $request)->get(),
                "types" => Type::all(),
                'type_id' =>$request
            // "title"=>"Gestion de la règlementation"
            ]);
        }else{
            return view('pages.front-office.reglementations.search',[
                "reglementations" => Reglementation::all(),
                "types" => Type::all(),
                'type_id' =>$request
            // "title"=>"Gestion de la règlementation"
            ]);
        }

    }


}
