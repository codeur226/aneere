<?php

namespace App\Http\Controllers;

use DateTime;
use DateInterval;
use App\Models\Etat;
use App\Models\Piece;
use App\Models\Ville;
use App\Models\Domaine;
use App\Models\Agrement;
use App\Models\auditeur;
use App\Models\Personne;
use App\Models\TypePersonne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuditeurController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth','isTextManager','isActive'])->except('etablissement_pourvisiteur','etablissement_parsecteur');
        // $this->middleware([]);
        $this->middleware(['auth','isActive','isAuditeurManager'])->except('search');
        // $this->middleware(['isEtablissement'])->only(['home','informations']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->statut);
         if ($request->statut =='cabinet') {
        $personne=Personne::where('denomination','like','Cabinet')->first();

            return view('pages.back-office.auditeurs.cabinets.index', [
                "auditeurs" => Auditeur::where('personne_id', 'like', $personne->id)->get(),
                "cabinet" => $request->statut,
                "title" => "Gestion des cabinets"
            ]);
         } else {
            if ($request->statut =='particulier') {
        $personne=Personne::where('denomination','like','Particulier')->first();

            return view('pages.back-office.auditeurs.particuliers.index', [
                "auditeurs" => Auditeur::where('personne_id', 'like', $personne->id)->get(),
                "particulier" => $request->statut,
                "title" => "Gestion des particuliers"
            ]);

        }
    }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        // dd($auditeur->id);
        if ($request->statut =='cabinet') {
            return view('pages.back-office.auditeurs.cabinets.create', [
                "auditeur" => new Auditeur,
                // "cabinet" => $request->statut,
                "ville" => Ville::orderBy('nom')->get(),
                "title" => "Gestion des cabinets"
            ]);
         } else {
            if ($request->statut =='particulier') {
            return view('pages.back-office.auditeurs.particuliers.create', [
                "auditeur" => new Auditeur,
                "ville" => Ville::orderBy('nom')->get(),
               "title" => "Gestion des particuliers"
            ]);
        }
     }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->statut);
        if ($request->statut =='cabinet') {
            $request->validate([
                'nom' => 'required|string|min:2',
                 'date_declaration' => 'required',
                'tel_mobile' => 'required|string|max:16',
                'tel_fixe' => 'nullable|string|max:16',
                 'num_bp' => 'required|string|max:50',
                 'email' => 'required|email|unique:auditeurs' , //,email,. (isset($auditeur) ? $auditeur->id : null)
                 'num_rccm' => 'nullable|string|max:50',
                'num_ifu' => 'nullable|string|max:50',
                'secteur' => 'nullable|integer',
                'rue' => 'nullable|integer',
                'num_porte' => 'nullable|integer',
                 'date_creation' => 'nullable',

            ]);

            // $auditeur = Auditeur::create($request->all());
        $personne=Personne::where('denomination','like','Cabinet')->first();
            $auditeur = Auditeur::create([
                'nom'      => $request->nom,
                'date_declaration'      => $request->date_declaration,
                'personne_id'      => $personne->id,
                'ville_id' => $request->ville_id,
                'tel_mobile'       => $request->tel_mobile,
                'tel_fixe'       => $request->tel_fixe,
                'num_bp'       => $request->num_bp,
                'rue'       => $request->rue,
                'num_porte'       => $request->num_porte,
                'secteur'       => $request->secteur,
                'num_rccm'       => $request->num_rccm,
                'num_ifu'       => $request->num_ifu,
                'email'       => $request->email,
                'date_creation'  => $request->date_creation,
        ]);
            return redirect()->route('auditeurs.show',$auditeur)->with('statut', 'Cabinet créé avec succès');
         } else {
        if ($request->statut =='particulier') {

            $request->validate([
                'nom' => 'required|string|min:2',
                'tel_mobile' => 'required|string|max:16',
                'tel_fixe' => 'nullable|string|max:16',
                 'num_bp' => 'required|string|max:50',
                 'email' => 'required|email|unique:auditeurs',//,email,' . (isset($auditeur) ? $auditeur->id : null),
                'secteur' => 'nullable|integer',
                'rue' => 'nullable|integer',
                'num_porte' => 'nullable|integer',
                 'date_declaration' => 'required',

            ]);
            $personne=Personne::where('denomination','like','Particulier')->first();
            $auditeur = Auditeur::create([
                'nom'      => $request->nom,
                'date_declaration'      => $request->date_declaration,
                'personne_id'      => $personne->id,
                'ville_id' => $request->ville_id,
                'tel_mobile'       => $request->tel_mobile,
                'tel_fixe'       => $request->tel_fixe,
                'num_bp'       => $request->num_bp,
                'rue'       => $request->rue,
                'num_porte'       => $request->num_porte,
                'secteur'       => $request->secteur,
                'email'       => $request->email,
        ]);

            return redirect()->route('auditeurs.show',$auditeur)->with('statut', 'Particulier créé avec succès');
        }
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\auditeur  $auditeur
     * @return \Illuminate\Http\Response
     */
    public function show(auditeur $auditeur)
    {
        // $personneCabinet=Personne::where('denomination','like','Cabinet')->first();
        // $personne=Personne::where('denomination','like','Particulier')->first();
        // $etatsAgrement=Etat::where('etat','like','Expiré')->first();
        // $agrementsAuditeur=Agrement::where('auditeur_id','like',$auditeur->id)->get();
        // foreach($agrementsAuditeur as $agr){
        //     $date = new DateTime($agr->date_delivrance);
        //     $date->add(new DateInterval('P1D'));
        //     $date1 = $date->format('Y-m-d');
        //     // dd($date1);
        //     if($date1 < date('Y-m-d')){
        //         $agr->etat_id=$etatsAgrement->id;
        //         $agr->save();
        //     }
        // }
        if ($auditeur->personne->denomination =='Cabinet') {
            return view('pages.back-office.auditeurs.cabinets.show', [
                "auditeur" => $auditeur,
                "agrements" => Agrement::whereAuditeurId($auditeur->id)->get(),
                "pieces" => Piece::whereAuditeurId($auditeur->id)->get(),
                "etats" => Etat::all(),
                "domaines" => Domaine::all(),
                "ville" => Ville::orderBy('nom')->get(),
                "title" => "Gestion des cabinets"
            ]);
         } else {
            if ($auditeur->personne->denomination =='Particulier') {
            return view('pages.back-office.auditeurs.particuliers.show', [
                "auditeur" => $auditeur,
                "agrements" => Agrement::whereAuditeurId($auditeur->id)->get(),
                "pieces" => Piece::whereAuditeurId($auditeur->id)->get(),
                "etats" => Etat::all(),
                "domaines" => Domaine::all(),
                "ville" => Ville::orderBy('nom')->get(),
               "title" => "Gestion des particuliers"
            ]);
        }
     }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\auditeur  $auditeur
     * @return \Illuminate\Http\Response
     */
    public function edit(auditeur $auditeur)
    {

        if ($auditeur->personne->denomination =='Cabinet') {
            return view('pages.back-office.auditeurs.cabinets.edit', [
                "auditeur" => $auditeur,
                // "cabinet" => $auditeur->statut,
                "ville" => Ville::orderBy('nom')->get(),
                "title" => "Gestion des cabinets"
            ]);
         } else {
            if ($auditeur->personne->denomination =='Particulier') {
            return view('pages.back-office.auditeurs.particuliers.edit', [
                "auditeur" => $auditeur,
                "ville" => Ville::orderBy('nom')->get(),
               "title" => "Gestion des particuliers"
            ]);
        }
     }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\auditeur  $auditeur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, auditeur $auditeur)
    {

     // dd($request->statut);
     if ($auditeur->personne->denomination=='Cabinet') {
        $request->validate([
            'nom' => 'required|string|min:2',
             'date_declaration' => 'required',
            'tel_mobile' => 'nullable|string|max:16',
            'tel_fixe' => 'nullable|string|max:16',
             'num_bp' => 'nullable|string|max:50',
             'email' => 'required|email|unique:auditeurs,email,' . (isset($auditeur) ? $auditeur->id : null),
             'num_rccm' => 'nullable|string|max:50',
            'num_ifu' => 'nullable|string|max:50',
            'secteur' => 'nullable|integer',
            'rue' => 'nullable|integer',
            'num_porte' => 'nullable|integer',
             'date_creation' => 'nullable',

        ]);

        // $auditeur = Auditeur::create($request->all());
        // $personne=Personne::where('denomination','like','Cabinet')->first();

        $auditeur->update([
            'nom'      => $request->nom,
            'date_declaration'      => $request->date_declaration,
            'personne_id'      => $auditeur->personne->id,
            'ville_id' => $request->ville_id,
            'tel_mobile'       => $request->tel_mobile,
            'tel_fixe'       => $request->tel_fixe,
            'num_bp'       => $request->num_bp,
            'rue'       => $request->rue,
            'num_porte'       => $request->num_porte,
            'secteur'       => $request->secteur,
            'num_rccm'       => $request->num_rccm,
            'num_ifu'       => $request->num_ifu,
            'email'       => $request->email,
            'date_creation'       => $request->date_creation,
    ]);
        return redirect()->route('auditeurs.show',$auditeur)->with('statut', 'Cabinet modifié avec succès');
     } else {
    if ($auditeur->personne->denomination=='Particulier') {

        $request->validate([
            'nom' => 'required|string|min:2',
            'tel_mobile' => 'nullable|string|max:16',
            'tel_fixe' => 'nullable|string|max:16',
             'num_bp' => 'nullable|string|max:50',
             'email' => 'required|email|unique:auditeurs,email,' . (isset($auditeur) ? $auditeur->id : null),
            'secteur' => 'nullable|integer',
            'rue' => 'nullable|integer',
            'num_porte' => 'nullable|integer',
             'date_declaration' => 'required',

        ]);
        // $personne=Personne::where('denomination','like','Particulier')->first();
        $auditeur->update([
            'nom'      => $request->nom,
            'date_declaration'      => $request->date_declaration,
            'personne_id'      => $auditeur->personne->id,
            'ville_id' => $request->ville_id,
            'tel_mobile'       => $request->tel_mobile,
            'tel_fixe'       => $request->tel_fixe,
            'num_bp'       => $request->num_bp,
            'rue'       => $request->rue,
            'num_porte'       => $request->num_porte,
            'secteur'       => $request->secteur,
            'email'       => $request->email,
    ]);

        return redirect()->route('auditeurs.show',$auditeur)->with('statut', 'Particulier modifié avec succès');
    }
}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\auditeur  $auditeur
     * @return \Illuminate\Http\Response
     */
    public function destroy(auditeur $auditeur)
    {
        if ($auditeur->personne->denomination =='Cabinet') {
            $auditeur->delete();
        return redirect()->route('auditeurs.index',['statut'=> 'cabinet'])->with('statut', 'Cabinet supprimé avec succès');

         } else {
            if ($auditeur->personne->denomination =='Particulier') {
                $auditeur->delete();
                return redirect()->route('auditeurs.index',['statut'=> 'particulier'])->with('statut', 'Particulier supprimé avec succès');

        }
     }

    }

    public function search($request)
    {
        if($request!=-1)
            {
            $auditeurs = DB::table('auditeurs')
            ->join('agrements', 'auditeurs.id', '=', 'agrements.auditeur_id')
            ->join('etats', 'etats.id', '=', 'agrements.etat_id')
            ->join('personnes', 'personnes.id', '=', 'auditeurs.personne_id')
            ->join('villes', 'auditeurs.ville_id', '=', 'villes.id')
            ->join('domaines', 'domaines.id', '=', 'agrements.domaine_id')
            ->select('domaines.id AS domaine_id','personnes.denomination AS personne','auditeurs.nom','villes.nom AS ville','domaines.nom AS domaine')
            ->where('domaines.id','like', $request)->distinct()
            ->where('etats.etat','like', 'Actif')
            ->get();
                return view('pages.front-office.auditeurs.search',[
                "auditeurs" => $auditeurs,
                "domaines" => Domaine::all(),
                'domaine_id' =>$request
            // "title"=>"Gestion de la règlementation"
            ]);
        }else{
            $auditeurs = DB::table('auditeurs')
            ->join('agrements', 'auditeurs.id', '=', 'agrements.auditeur_id')
            ->join('etats', 'etats.id', '=', 'agrements.etat_id')
            ->join('personnes', 'personnes.id', '=', 'auditeurs.personne_id')
            ->join('domaines', 'domaines.id', '=', 'agrements.domaine_id')
            ->join('villes', 'auditeurs.ville_id', '=', 'villes.id')
            ->select('domaines.id AS domaine_id','personnes.denomination AS personne','auditeurs.nom','villes.nom AS ville','domaines.nom AS domaine')
            ->where('etats.etat','like', 'Actif')->distinct()
            ->get();
            return view('pages.front-office.auditeurs.search',[
                "auditeurs" => $auditeurs,
                "domaines" => Domaine::all(),
                'domaine_id' =>$request
            // "title"=>"Gestion de la règlementation"
            ]);
        }

    }
}
