<?php

namespace App\Http\Controllers;

use App\Models\Fiche;
use App\Models\Question;
use App\Models\Domaine;
use Illuminate\Http\Request;

class FicheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.back-office.fiches.index', [
            'fiches' => Fiche::all(),
            'title' => 'Parametrage des fiches',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $domaines = Domaine::All();
        return view('pages.back-office.fiches.create', [
            'fiches' => new Fiche(),
            'title' => 'Paramétrage des fiches',
            'domaines' => $domaines,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fiche = Fiche::create([
            'libelle' => $request->libelle,
            'ordre' => $request->ordre,
        ]);

        return view('pages.back-office.fiches.index', [
            'fiches' => Fiche::all(),
            'title' => 'Parametrage des fiches',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fiches = Fiche::where('id', $id)->get();
        $questions = Question::where('fiche_id', $id)->get();
        return view('pages.back-office.fiches.show',[
            'fiches' => $fiches,
            'questions' => $questions,
            'title' => 'Détails de la fiche',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fiche = Fiche::where('id', $id)->get();
        //dd($fiche);
        $questions = Question::where('fiche_id', $id)->get();
        $domaines = Domaine::All();
        return view('pages.back-office.fiches.edit',[
            'fiche' => $fiche,
            'domaines' => $domaines,
            'title' => 'Modification de la fiche',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fiche = Fiche::where('id', $id);
        $fiche->update(
            [
                'domaine_id' => $request->domaine,
                'libelle' => $request->libelle,
                'ordre' => $request->ordre,
            ]
            );

        $fiche = Fiche::where('id', $id)->get();
        $questions = Question::where('fiche_id', $id)->get();
        foreach ($fiche as $fiche) {
            return redirect()->route("fiches.show", $fiche->id)->with("statut","La fiche a été mise à jour avec succès");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fiche::destroy($id);

        return redirect()->route('fiches.index')->with('statut', 'La fiche a été supprimée avec succès');

        // return redirect()->route('pages.back-office.fiches.index')->with('statut', 'La fiche a été supprimé avec succès');
    }
}
