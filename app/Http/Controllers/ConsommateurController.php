<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Audit;
use App\Models\Ville;
use App\Models\Domaine;
use Illuminate\Support\Str;
use App\Mail\SendMailToUser;
use App\Models\Consommateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\QueryException;

class ConsommateurController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','isActive']);
        $this->middleware(['isTextManager','isConsommateurManager'])->except(['home','informations','complementInfos','complementInfosUpadate']);
        $this->middleware(['isEtablissement'])->only(['home','informations','complementInfos','complementInfosUpadate']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->statut=='public')
        {
            // dd($request->statut);
           return view('pages.back-office.etablissements.public.index', [
            "etablissements" => Consommateur::where('statut', 'like', 'public')->get(),
            "title" => "Gestion des établissements public"
        ]);
        }else{
            if($request->statut=='privé')
            {
            return view('pages.back-office.etablissements.prive.index', [
                "etablissements" => Consommateur::where('statut','like','privé')->get(),
                "title" => "Gestion des entreprises"
            ]);}
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->statut=='public')
        {
             $user = new User();
             $etablissement = new Consommateur();
             $etablissement->user = $user;
             return view('pages.back-office.etablissements.public.create', [
                 "etablissement" => $etablissement,
                 "villes" => Ville::orderBy('nom')->get(),
                 "domaine" => Domaine::all(),
                 "title" => "Gestion des établissements publics"
             ]);
         }else{
                     if($request->statut=='privé')
                     {
                         $user = new User();
                         $etablissement = new Consommateur();
                         $etablissement->user = $user;
                         return view('pages.back-office.etablissements.prive.create', [
                             "etablissement" => $etablissement,
                             "villes" => Ville::orderBy('nom')->get(),
                             "domaine" => Domaine::all(),
                             "title" => "Gestion des entreprises"
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
           // dd($request);
           if($request->statut=='privé')
           {
                   $request->validate([
                       'nom_etablissement' => 'required|string|min:2',
                       'nom_responsable' => 'required|string|min:2',
                       'domaine_id' => 'required|string',
                       'num_identification' => 'required|string',
                       'tel_mobile' => 'nullable|string|max:30',
                       'police' => 'nullable|string|max:30',
                       'tel_fixe' => 'nullable|string|max:30',
                       'num_bp' => 'nullable|integer',
                       'email' => 'required|email',
                        //|unique:users,email,' . (isset($user) ? $user->id : null),
                       'num_rccm' => 'nullable|string|max:50',
                       'num_secteur' => 'nullable|integer',
                       'rue' => 'nullable|integer',
                       'num_porte' => 'nullable|integer',
                       'num_ifu' => 'nullable|string|max:50',
                       'autre' => 'nullable|string|max:50',
                       'date_creation' => 'nullable',

                   ]);
                   $password = Str::random(8);
                   $role = Role::where('nom', 'like', 'Etablissement')->first();
                   try{
                   $user = User::create([
                       'role_id' => $role->id,
                       'name' => strtoupper($request->nom_responsable),
                       'email' => $request->email,
                       'password' => Hash::make($password),
                    ]);
                    $user->password = $password;
                 //    Mail::to($user->email)->send(new SendMailToUser($user));
                }catch (QueryException $e){
                    $errorCode = $e->errorInfo[1];
                    if($errorCode == 1062){
                        $user = User::where('email','like',$request->email)->first();
                    }
                }

                   $etablissement = Consommateur::create([
                       'user_id'      => $user->id,
                       'domaine_id'      => $request->domaine_id,
                       'nom'      => $request->nom_etablissement,
                       'statut'      => $request->statut,
                       'num_identification'      => $request->num_identification,
                       'ville_id' => $request->ville_id,
                       'tel_mobile'       => $request->tel_mobile,
                       'police'       => $request->police,
                       'tel_fixe'       => $request->tel_fixe,
                       'num_secteur' => $request->num_secteur,
                       'rue' => $request->rue,
                       'num_porte' => $request->num_porte,
                       'bp'       => $request->num_bp,
                       'num_rccm'       => $request->num_rccm,
                       'num_ifu'       => $request->num_ifu,
                       'autre'       => $request->autre,
                       'date_creation'       => $request->date_creation,
                   ]);
                   return redirect()->route('consommateurs.show',$etablissement)->with('statut', 'Entreprise créée avec succes');
               }else{
                   if($request->statut=='public')
                   {
                       $request->validate([
                           'nom_etablissement' => 'required|string|min:2',
                           'nom_responsable' => 'required|string|min:2',
                           'domaine_id' => 'required|string',
                           'num_identification' => 'required|string',
                           'tel_mobile' => 'nullable|string|max:30',
                            'police' => 'nullable|string|max:30',
                           'tel_fixe' => 'nullable|string|max:30',
                           'num_bp' => 'nullable|integer',
                           'num_secteur' => 'nullable|integer',
                           'rue' => 'nullable|integer',
                           'num_porte' => 'nullable|integer',
                           'email' => 'required|email',
                           //|unique:users,email,' . (isset($user) ? $user->id : null),
                           // 'num_rccm' => 'nullable|string|max:50',
                           // 'num_ifu' => 'nullable|string|max:50',
                           // 'autre' => 'nullable|string|max:50',
                           'date_creation' => 'nullable',

                       ]);
                    //    $password = Str::random(8);
                       $password = "password";
                       $role = Role::where('nom', 'like', 'Etablissement')->first();
                       try{
                                    $user = User::create([
                                        'role_id' => $role->id,
                                        'name' => strtoupper($request->nom_responsable),
                                        'email' => $request->email,
                                        'password' => Hash::make($password),
                                    ]);
                                    $user->password = $password;
                                 //    Mail::to($user->email)->send(new SendMailToUser($user));
                        }catch (QueryException $e){
                            $errorCode = $e->errorInfo[1];
                            if($errorCode == 1062){
                                $user = User::where('email','like',$request->email)->first();
                            }
                        }

                       // if($request->statut=='publique'){
                       //     $request->num_rccm=null;
                       //     $request->num_ifu=null;
                       // }
                       $etablissement = Consommateur::create([
                           'user_id'      => $user->id,
                           'domaine_id'      => $request->domaine_id,
                           'nom'      => $request->nom_etablissement,
                           'statut'      => $request->statut,
                           'num_identification'      => $request->num_identification,
                           'ville_id' => $request->ville_id,
                            'police'       => $request->police,
                           'num_secteur' => $request->num_secteur,
                           'rue' => $request->rue,
                           'num_porte' => $request->num_porte,
                           'tel_mobile'       => $request->tel_mobile,
                           'tel_fixe'       => $request->tel_fixe,
                           'bp'       => $request->num_bp,
                           // 'num_rccm'       => $request->num_rccm,
                           // 'num_ifu'       => $request->num_ifu,
                           // 'autre'       => $request->autre,
                           'date_creation'       => $request->date_creation,
                       ]);
                       return redirect()->route('consommateurs.show',$etablissement)->with('statut', 'Etablissement public créé avec succès');
                   }
               }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consommateur  $consommateur
     * @return \Illuminate\Http\Response
     */
    public function show(Consommateur $consommateur)
    {
        $title="";
        if($consommateur->statut=='public'){
            $title="Gestion des établissements publics";
        }else{
            if($consommateur->statut=='public'){
                $title="Gestion des entreprises";
            }else{
                if($consommateur->statut=='particulier'){
                    $title="Gestion des particuliers";
                }
            }
        }
        return view('pages.back-office.etablissements.public.show', [
            "etablissement" => $consommateur,
            "title" => $title

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consommateur  $consommateur
     * @return \Illuminate\Http\Response
     */
    public function edit(Consommateur $consommateur)
    {
           // dd($etablissement);
           if($consommateur->statut=='public')
           {
                    return view('pages.back-office.etablissements.public.edit', [
                        "etablissement" => $consommateur,
                        "villes" => Ville::all(),
                        "domaine" => Domaine::all(),
                        "title" => "Gestion des établissements publics"
                    ]);
            }else{
                if($consommateur->statut=='privé')
                {
                    return view('pages.back-office.etablissements.prive.edit', [
                        "etablissement" => $consommateur,
                        "villes" => Ville::all(),
                        "domaine" => Domaine::all(),
                        "title" => "Gestion des entreprises"
                    ]);
                }

            }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consommateur  $consommateur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consommateur $consommateur)
    {
        if($request->statut=='public'){
            $request->validate([
                'nom_etablissement' => 'required|string|min:2',
                'nom_responsable' => 'required|string|min:2',
                'domaine_id' => 'required|string',
                'num_identification' => 'required|string',
                'tel_mobile' => 'nullable|string|max:30',
                'tel_fixe' => 'nullable|string|max:30', //|regex:/[0-9]{8}/
                'num_bp' => 'nullable|integer',
                'num_secteur' => 'nullable|integer',
                'rue' => 'nullable|integer',
                'num_porte' => 'nullable|integer',
                // 'num_rccm' => 'nullable|string|max:50',
                // 'num_ifu' => 'nullable|string|max:50',
                // 'autre' => 'nullable|string|max:50',
                'date_creation' => 'nullable',
                'email' => 'required|string|email',
                //|min:5|unique:users,email,' . (isset($consommateur) ? $consommateur->user->id : null),

            ]);
            // $role = Role::where('nom', 'like', 'Etablissement')->first();
            
            try{
                $consommateur->user->update([
                    // 'role_id' => $role->id,
                    'name' => strtoupper($request->nom_responsable),
                    'email' => $request->email,
                ]);
                $user = User::where('email','like',$request->email)->first();
            }catch (QueryException $e){
                $errorCode = $e->errorInfo[1];
                if($errorCode == 1062){
                    $user = User::where('email','like',$request->email)->first();
                    // $consommateur->user->update([
                    //     'name' => strtoupper($request->nom_etablissement),
                    //     'email' => $user->email,
                    // ]);
                }
            }
            $consommateur->update([
                'user_id'      => $user->id,
                'nom'      => $request->nom_etablissement,
                'domaine_id'      => $request->domaine_id,
                'statut'      => $request->statut,
                'num_identification'      => $request->num_identification,
                'ville_id' => $request->ville_id,
                'num_secteur' => $request->num_secteur,
                'rue' => $request->rue,
                'num_porte' => $request->num_porte,
                'tel_mobile'       => $request->tel_mobile,
                'tel_fixe'       => $request->tel_fixe,
                'bp'       => $request->num_bp,
                'date_creation'       => $request->date_creation,
            ]);
            return redirect()->route('consommateurs.show',$consommateur)->with('statut', 'Etablissement mis à jour avec succes');
        }else{
            if($request->statut=='privé'){
                $request->validate([
                    'nom_etablissement' => 'required|string|min:2',
                     'nom_responsable' => 'required|string|min:2',
                    'domaine_id' => 'required|string',
                    'num_identification' => 'required|string',
                    'tel_mobile' => 'nullable|string|max:30',
                    'tel_fixe' => 'nullable|string|max:30', //|regex:/[0-9]{8}/
                    'num_bp' => 'nullable|integer',
                    'num_rccm' => 'nullable|string|max:50',
                    'num_ifu' => 'nullable|string|max:50',
                    'num_secteur' => 'nullable|integer',
                    'rue' => 'nullable|integer',
                    'num_porte' => 'nullable|integer',
                    'autre' => 'nullable|string|max:50',
                    'date_creation' => 'nullable',
                    'email' => 'required|string|email',
                    //|min:5|unique:users,email,' . (isset($consommateur) ? $consommateur->user->id : null),

                ]);
                // $role = Role::where('nom', 'like', 'Etablissement')->first();
                try{
                        $consommateur->user->update([
                            // 'role_id' => $role->id,
                            'name' => strtoupper($request->nom_responsable),
                            'email' => $request->email,
                        ]);
                    $user = User::where('email','like',$request->email)->first();
                    }catch (QueryException $e){
                        $errorCode = $e->errorInfo[1];
                        if($errorCode == 1062){
                            $user = User::where('email','like',$request->email)->first();
                            // $consommateur->user->update([
                            //     'name' => strtoupper($request->nom_etablissement),
                            //     'email' => $user->email,
                            // ]);
                        }
                    }
                $consommateur->update([
                    'user_id'      => $user->id,
                    'nom'      => $request->nom_etablissement,
                    'domaine_id'      => $request->domaine_id,
                    'statut'      => $request->statut,
                    'num_identification'      => $request->num_identification,
                    'ville_id' => $request->ville_id,
                    'num_secteur' => $request->num_secteur,
                    'rue' => $request->rue,
                    'num_porte' => $request->num_porte,
                    'tel_mobile'       => $request->tel_mobile,
                    'tel_fixe'       => $request->tel_fixe,
                    'num_rccm' => $request->num_rccm,
                    'num_ifu' => $request->num_ifu,
                    'autre' => $request->autre,
                    'bp'       => $request->num_bp,
                    'date_creation'       => $request->date_creation,
                ]);
                return redirect()->route('consommateurs.show',$consommateur)->with('statut', 'Entreprise mise à jour avec succes');

            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consommateur  $consommateur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consommateur $consommateur)
    {
        $consommateur->statut=='public' ? $message="L'etablissement a bien été supprimé": $message="L'entreprise  a bien été supprimée";

        if ($consommateur->user->count() > 1) {
            $consommateur->delete();
            // $etablissement->delete();
            return redirect()->route('consommateurs.index',['statut'=>$consommateur->statut])->with('statut', $message);
        }else{ 
                $consommateur->user->delete();
                // $etablissement->delete();
                return redirect()->route('consommateurs.index',['statut'=>$consommateur->statut])->with('statut', $message);
            
        }
    }

    public function home()
    {
        return view('pages.front-office.consommateur.etablissement.home');
    }

    public function informations($id)
    {  //dd(Consommateur::whereId($id)->first());
        return view('pages.front-office.consommateur.etablissement.show', [
            'consommateur' => Consommateur::whereId($id)->first(),
            'audit' => Audit::where('consommateur_id','like',$id)
                                    ->where('etat','!=','Terminé')->first()
        ]);
    }

    public function consommateur($domaine_id)
    {
        // Retour des consommateurs pour le domaine sélectionné
         $consommateurs = Consommateur::whereDomaineId($domaine_id)->get();
        return $consommateurs;
    }

    public function user($user_id)
    {
        // Retour des nom consommateurs pour le domaine sélectionné
         $user = User::whereId($user_id)->first();
        return $user;
    }
    /**
     * Retour le numero d'identification du consommateur
     */
    public function getIdentifier($domaine_id,$etablissement_id)
    {

        $sousChaineStatique="ANEREE/DNLAE/SSAE/";
        $domaine= "";
        $numero=0;
         $line=Domaine::whereId($domaine_id)->first();
         if($line->nom=='Transport'){
             $domaine="TRANS";
            }else{
                if($line->nom=='Bâtiment'){
                    $domaine="BATI";
                }else{
                    if($line->nom=='Industrie'){
                        $domaine="INDU";
                    }
                }
            }

            if($etablissement_id != -1 ){
                $etblissement= Consommateur::whereId($etablissement_id)->first();
                $chaine=explode("/",$etblissement->num_identification);
                $ancienDomaine=$chaine[3];
                // return $ancienDomaine;
                if($domaine== $ancienDomaine)
                    {return $etblissement->num_identification;}
            }
         $consommateurs=Consommateur::where('domaine_id','like',$domaine_id)
                                      ->where('num_identification','like','%'.date("Y"))->get();
        foreach ($consommateurs as $consommateur) {
            $identifiants=explode("/",$consommateur->num_identification);
            $numeros=explode("-",$identifiants[4]);
            if(intval($numeros[0])>$numero){ $numero=intval($numeros[0]);}
        }
        $numero=str_pad(($numero+1), 6, '0', STR_PAD_LEFT);
         $identifiant = "ANEREE/DNLAE/SSAE/".$domaine."/".$numero."-".date("Y");
        return $identifiant;
        // str_pad($numero, 6, '0', STR_PAD_LEFT);
    }

    public function complementInfos($id)
    {
        // dd($etablissement);

        return view('pages.front-office.consommateur.etablissement.complementInfos', [
                "etablissement" => Consommateur::whereId($id)->first(),
                // "title" => "Gestion des établissements publics"

        ]);
    }

    public function complementInfosUpadate(Request $request)
    {
        // dd($request);
             $etablissement = Consommateur::whereUserId(Auth::user()->id)->first();
                $etablissement->user->name=$request->name;
                $etablissement->user->save();
                $etablissement->update([

                    // 'name'       => $request->name,
                    'tel_mobile'       => $request->tel_mobile,
                    'tel_fixe'       => $request->tel_fixe,
                    'bp'       => $request->num_bp,
                    'num_rccm'       => $request->num_rccm,
                    'num_ifu'       => $request->num_ifu,
                    'date_creation'       => $request->date_creation,
                ]);
                 return redirect()->route('consommateur.informations')->with('success', 'Informations completées avec succes');

    }
}
