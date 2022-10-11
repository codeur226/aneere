<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAppelectriqueRequest;
use App\Models\Appelectrique;
use App\Models\Audit;
use App\Models\Fiche;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FicheExport;

class AppelectriqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($audit_id)
    {
        
    }

    public function fiche3($audit_id)
    {
        // 'fiches' => Fiche::all(),

        return view('pages.back-office.appelectriques.create', [
            'appelectriques' => new Appelectrique(),
            'fiches' => Fiche::where('ordre', 3)->get(),
            'audit_id' => $audit_id,
            'title' => 'COLLECTE DE DONNEES SUR LES APPAREILS ELECTRIQUES',
        ]);
    }

    public function fiche3_index($audit_id)
    {
        $appelectriques = Appelectrique::where('audit_id', $audit_id)->get();

        return view('pages.back-office.appelectriques.index', [
            'appelectriques' => $appelectriques,
            'title' => 'COLLECTE DE DONNEES SUR LES APPAREILS ELECTRIQUES',
        ]);
    }

    /**
     * Fonction pour terminer un audit.
     *
     * @return \Illuminate\Http\Response
     */
    public function terminerAudit($audit_id)
    {
        $audit = Audit::where('id', $audit_id);
        $audit->update([
            'etat' => 'Validé',
    ]);
        $audit = Audit::where('id', $audit_id)->get();
        foreach ($audit as $audit) {
            return redirect()->route('audits.show',$audit)->with('statut', 'L\' audit a été enregistré avec succès');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 'fiches' => Fiche::all(),

        return view('pages.back-office.appelectriques.create', [
            'appelectriques' => new Appelectrique(),
            'fiches' => Fiche::all(),
            'audits' => $audit_id,
            'title' => 'COLLECTE DE DONNEES SUR LES APPAREILS ELECTRIQUES',
        ]);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            // 'user_id' => 'required',
            // 'consommateur_id' => 'required',
            // 'dateDeclaration' => 'required|date',
            // 'dateEcheance' => 'required|date',
            // 'etat' => 'required|string|min:2',
        ]);
        $appelectrique = Appelectrique::create([
            'fiche_id' => $request->fiche,
            'audit_id' => $request->audit, //'ed8ca24e-83f3-4b0d-ba99-dc8b50eb2bdc',
            'emplacement' => $request->emplacement,
            'designation' => $request->designation,
            'quantite' => $request->quantite,
            'puissance_electrique' => $request->puissance,
            'duree' => $request->duree,
            'etat_fonctionnement' => $request->etat,
            'Observations' => $request->observation,
    ]);

        // return view('pages.back-office.appelectriques.create', [
        //     'appelectriques' => new Appelectrique(),
        //     'fiches' => Fiche::all(),
        //     'audits' => Audit::all(),
        //     'title' => 'COLLECTE DE DONNEES SUR LES APPAREILS ELECTRIQUES',
        // ]);

        return redirect()->route('fiche3', [
            'audit_id' => $request->audit,
        ])->with('statut', 'Donnée Appareil électrique créée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Appelectrique $appelectrique)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Appelectrique $appelectrique)
    {
        return view('pages.back-office.appelectriques.edit', [
            'appelectrique' => $appelectrique,
            'title' => 'COLLECTE DE DONNEES SUR LES APPAREILS ELECTRIQUES',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appelectrique $appelectrique)
    {
        //dd($request);
        $appelectrique->update([
            //'fiche_id' => $request->fiche,
            //'audit_id' => $request->audit, //'ed8ca24e-83f3-4b0d-ba99-dc8b50eb2bdc',
            'emplacement' => $request->emplacement,
            'designation' => $request->designation,
            'quantite' => $request->quantite,
            'puissance_electrique' => $request->puissance,
            'duree' => $request->duree,
            'etat_fonctionnement' => $request->etat,
            'Observations' => $request->observation,
    ]);

        $appelectriques = Appelectrique::where('audit_id', $appelectrique->audit_id)->get();

        return view('pages.back-office.appelectriques.index', [
            'appelectriques' => $appelectriques,
            'title' => 'COLLECTE DE DONNEES SUR LES APPAREILS ELECTRIQUES',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appelectrique $appelectrique)
    {
    }

    public function extraireFiche($audit_id)
    {
        $audit = Audit::where('id', $audit_id)->get();
        foreach ($audit as $item) 
        {
            $label = 'Appelectrique'.' '.getConsommateurNom($item->consommateur_id).'.xls';
            return (new FicheExport($audit_id))->download($label);
        }

        
    }
}
