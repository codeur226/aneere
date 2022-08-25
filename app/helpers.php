<?php

use Carbon\Carbon;
use App\Models\Audit;
use App\Models\Auditeur;
use App\Models\Domaine;
use App\Models\Optionsqcm;
use App\Models\Reponse;
use App\Models\Fiche;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Route;

if (!function_exists('set_active')) {
    function set_active($uri, $output = 'activer')
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        } else {
            if (Route::is($uri)) {
                return $output;
            }
        }
    }
}
if (!function_exists('set_active_green')) {
    function set_active_green($uri, $output = 'activer')
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        } else {
            if (Route::is($uri)) {
                return $output;
            }
        }
    }
}

if (!function_exists('set_active_back')) {
    function set_active_back($uri, $output = 'active')
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        } else {
            if (Route::is($uri)) {
                return $output;
            }
        }
    }
}

if (!function_exists('formatDate')) {
    function formatDate($date)
    {
        $dtime = Carbon::parse($date)->format('d-m-Y');
        //    $dtime = Carbon::parse($date)->format('d/m/Y à h:i');
        return $dtime;
    }
}

/* ********************************************************************
     * DEMBELE
     * recuperer la liste des options de QCM connaissant le numero de la question
     *
***********************************************************************/

if (!function_exists('getlisteqcm')) {
    function getlisteqcm($id)
    {
        $record = Optionsqcm::where('question_id', $id)->get();
        if ($record != null) {
            return $record;
        } else {
            return '';
        }
    }
}

//nombre des a auditer
if (!function_exists('getnombreAuditer')) {
    function getnombreAuditer()
    {
        $record = Audit::where('user_id', '<>', null)->count();
        if ($record != null) {
            return $record;
        } else {
            return '';
        }
    }
}

//nombre audits réalisé
if (!function_exists('getauditsRealise')) {
    function getauditsRealise()
    {
        $record = Audit::where('user_id', '<>', null)
        ->where('etat', 'Clôturé')
        ->count();
        if ($record != null) {
            return $record;
        } else {
            return '';
        }
    }
}
//nombre de société d'audits aggrées
if (!function_exists('getnombresocieteAgree')) {
    function getnombresocieteAgree()
    {
        $record = Auditeur::where('id', '<>', null)->count();
        if ($record != null) {
            return $record;
        } else {
            return '';
        }
    }
}

//nombre de société d'audits aggrées
if (!function_exists('getAttenteAffectation')) {
    function getAttenteAffectation()
    {
        $record = Audit::where('user_id', '=', null)->count();
        if ($record != null) {
            return $record;
        } else {
            return '';
        }
    }
}

//nombre d'audit déclaré'
if (!function_exists('getAuditDeclare')) {
    function getAuditDeclare()
    {
        $record = Audit::where('user_id', '=', null)
        ->where('etat', '<>', 'Clôturé')
        ->count();
        if ($record != null) {
            return $record;
        } else {
            return '';
        }
    }
}

//nombre d'audit déclaré'
if (!function_exists('getStrutuctureAssujetis')) {
    function getStrutuctureAssujetis()
    {

        $record =DB::table('audits')
        ->join('consommateurs', 'consommateurs.id', '=', 'audits.consommateur_id')
        ->join('domaines', 'domaines.id', '=', 'consommateurs.domaine_id')
        ->select('domaines.nom', DB::raw('count(domaines.nom) as total'))
        ->GroupBy('domaines.nom')
        ->get();
        if ($record != null) {
            return $record;
        } else {
            return '';
        }
    }
}

//Nom utilisateur
if (!function_exists('getnomUtilisateur')) {
    function getnomUtilisateur($id)
    {
        $record = User::where('id', $id)->get('name');
        if ($record != null) {
            return $record;
        } else {
            return '';
        }
    }
}

if (!function_exists('getDomaine')) {
    function getDomaine($id)
    {
        $record = Domaine::where('id', $id)->first();
        if ($record != null) {
            return $record['nom'];
        } else {
            return '';
        }
    }
}

if (!function_exists('getReponse')) {
    function getReponse($id)
    {
        $record = Reponse::where('question_id', $id)->first();
        if ($record != null) {
            return $record['reponse'];
        } else {
            return '';
        }
    }
}

if (!function_exists('getSousReponse')) {
    function getSousReponse($id)
    {
        $record = Reponse::where('question_id', $id)->first();
        if ($record != null) {
            return $record['sous_reponse'];
        } else {
            return '';
        }
    }
}

if (!function_exists('getFicheLibelle')) {
    function getFicheLibelle($id)
    {
        $record = Fiche::where('id', $id)->first();
        if ($record != null) {
            return $record['libelle'];
        } else {
            return '';
        }
    }
}
