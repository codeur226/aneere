<?php

namespace App\Http\Controllers;

use App\Models\Audit;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'accueilEtablissement']);
    }

    public function accueil()
    {
        $audits = Audit::where('par_aneree', null)
        ->GroupBy('audits.id', 'par_aneree')
        ->get();
        $auditsaneree = Audit::where('par_aneree', 0)->get()->count();
        $auditsprive = Audit::where('par_aneree', 1)->get()->count();
        $auditsprivevalides = Audit::join('rapports', 'rapports.audit_id', '=', 'audits.id')
        ->where('rapports.etat', 'Validé')
        ->where('audits.par_aneree', 1)->get()->count();

        $auditsnoneffectue = Audit::where('par_aneree', null)->get()->count();

        $batiment = Audit::join('consommateurs', 'consommateurs.id', '=', 'audits.consommateur_id')
        ->join('domaines', 'domaines.id', '=', 'consommateurs.domaine_id')
        ->where('domaines.nom', 'Bâtiment')
        ->get()->count();
        $industrie = Audit::join('consommateurs', 'consommateurs.id', '=', 'audits.consommateur_id')
        ->join('domaines', 'domaines.id', '=', 'consommateurs.domaine_id')
        ->where('domaines.nom', 'Bâtiment')
        ->get()->count();

        $transport = Audit::join('consommateurs', 'consommateurs.id', '=', 'audits.consommateur_id')
        ->join('domaines', 'domaines.id', '=', 'consommateurs.domaine_id')
        ->where('domaines.nom', 'Transport')
        ->get()->count();

        return view('pages.back-office.admin_accueil', [
            'title' => 'Tableau de bord',
            'auditsaneree' => $auditsaneree,
            'auditsprive' => $auditsprive,
            'auditsnoneffectue' => $auditsnoneffectue,
            'batiment' => $batiment,
            'industrie' => $industrie,
            'transport' => $transport,
            'auditsprivevalides' => $auditsprivevalides,
        ]);
    }

    // public function accueilEtablissement()
    // {
    //     return view('pages.front-office.etablissement-rapports.index',[
    //         "title"=>"Espace Etablissement"
    //     ]);
    // }
}
