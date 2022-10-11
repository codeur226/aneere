<?php

namespace App\Http\Controllers;

use App\Mail\NotifyMail;
use App\Models\Audit;
use App\Models\Auditeur;
use App\Models\Commentaire;
use App\Models\Consommateur;
use App\Models\Etablissement;
use App\Models\Rapport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RapportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //   $this->middleware(['auth', 'isActive', 'isEtablissement']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $roleAgent = Role::where('nom', 'like', 'Agent')->first()->id;
        // $roleChefDeService = Role::where('nom', 'like', 'Chef de service')->first()->id;

        return view('pages.front-office.rapports.index', [
            // 'users' => User::where('role_id', $roleAgent)
            //                     ->orWhere('role_id', $roleChefDeService)->get(),

             'rapports' => Rapport::All(),
            'title' => 'Gestion des rapports',
       ]);
    }

    public function indexback()
    {
        // $roleAgent = Role::where('nom', 'like', 'Agent')->first()->id;
        // $roleChefDeService = Role::where('nom', 'like', 'Chef de service')->first()->id;

        $nouveaux=Rapport::where('etat','Nouveau')->get()->count();
        $valides=Rapport::where('etat','Validé')->get()->count();
        $rejete=Rapport::where('etat','Réjeté')->get()->count();
        $modifies=Rapport::where('etat','Modifié par l\'auditeur')->get()->count();
        return view('pages.back-office.rapports.index', [
            // 'users' => User::where('role_id', $roleAgent)
            //                     ->orWhere('role_id', $roleChefDeService)->get(),

             'rapports' => Rapport::All(),
             'nouveaux'=>$nouveaux,
             'valides'=>$valides,
             'rejete'=>$rejete,
             'modifies'=>$modifies,
            'title' => 'Gestion des rapports d\'audit externe',
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $audits = Audit::join('consommateurs', 'consommateurs.id', '=', 'audits.consommateur_id')
        ->where('audits.etat', '<>', 'Clôturé')
        ->orderbyDesc('audits.dateDeclaration')
        ->get();
        

        // dd($consommateur);

        return view('pages.front-office.rapports.create', [
            'rapport' => new Rapport(),
            'audits' => $audits,
            'consommateurs' => Consommateur::All(),
            'title' => 'Gestion des rapports',
            // 'consommateur'=>$consommateur,
            // "title" => "Gestion de la règlementation"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $consommateur = Consommateur::where('consommateurs.user_id', '=',Auth::user()->id)
        ->first();
        $responsable = User::where('role_id', '=', '9c93bbad-990b-46ae-a981-f8d8b0951124')->first();
        //dd($consommateur->id);
        // dd($request);
        //join('users', 'users.id', '=', 'consommateurs.user_id')
        $request->validate([
            // 'user_id' => 'required',
            // 'consommateur_id' => 'required',
            // 'dateDeclaration' => 'required|date',
            // 'dateEcheance' => 'required|date',
            // // 'etat' => 'required|string|min:2',
            // 'audit_id'=> 'required',
            // 'url'=> 'required | file | max:2048  |unique:rapports,fichier",',
            // 'etat' =>'required | string |min:2',
            // "url" =>"required|file|max:2048|unique:rapports,url",
        ]);

       

        $rapport = Rapport::create([
            // "date" => $request->date,
            'libelle' => $request->libelle,
            'Observations' => $request->observations,
            'etat' => 'Nouveau',
            'consommateur_id' =>  $request->consommateur,
            'url' => $request->file('fichier')->store('rapports', 'public'),
        ]);
        $rapports = Rapport::All();

        Mail::to($responsable)->send(new NotifyMail($rapport, $responsable)); // envoie du mail

        return redirect()->route('rapports.index', ['rapport' => $rapport, 'rapports' => $rapports])->with('statut', 'Le rapport a été ajouté avec succès');

    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Rapport $rapport)
    {
        // $table->uuid('rapport_id');
        // $table->uuid('user_id');
        // $table->string('commentaire')->nullable();
        $commentaires = Commentaire::where('rapport_id', $rapport->id)->get();

        return view('pages.front-office.rapports.show', [
             'rapport' => $rapport,
             'commentaires' => $commentaires,
            'title' => 'Gestion des rapports',
       ]);
    }

    public function showback(Rapport $rapport)
    {
        // $table->uuid('rapport_id');
        // $table->uuid('user_id');
        // $table->string('commentaire')->nullable();
        $commentaires = Commentaire::where('rapport_id', $rapport->id)->get();

        return view('pages.back-office.rapports.show', [
             'rapport' => $rapport,
             'commentaires' => $commentaires,
            'title' => 'Gestion des rapports',
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Rapport $rapport)
    {
        $audits = Audit::join('consommateurs', 'consommateurs.id', '=', 'audits.consommateur_id')
        ->where('audits.etat', '<>', 'Clôturé')
        ->orderbyDesc('audits.dateDeclaration')
        ->get();

        return view('pages.front-office.rapports.edit', [
            'rapport' => $rapport,
            'audits' => $audits,
            'consommateurs' => Consommateur::All(),
            'title' => 'Gestion des rapports',
            // "title" => "Gestion de la règlementation"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rapport $rapport)
    {
        //   dd($request);
        $request->validate([
            'libelle' => 'required|string|min:2 |max :50',
        ]);

        $rapport->update([
            'libelle' => $request->libelle,
            'Observations' => $request->observations,
            'etat' => "Modifié par l'auditeur",
            'url' => $request->file('fichier')->store('rapports', 'public'),
        ]);
        $rapports = Rapport::All();

        return redirect()->route('rapports.index', ['rapport' => $rapport, 'rapports' => $rapports])->with('statut', 'Le rapport a été ajouté avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rapport $rapport)
    {
    }

    public function profil()
    {
        return view('pages.front-office.etablissement-profile.show', [
            'etablissement' => Etablissement::where('user_id', Auth::user()->id)->first(),
        ]);
    }

    public function change_password()
    {
        return view('pages.front-office.etablissement-profile.create', [
            // 'etablissement' => Etablissement::where("user_id", Auth::user()->id)->first(),
        ]);
    }

    public function profil_save(Request $request)
    {
        // dd($request);
        $request->validate([
            'oldpassword' => 'required|string|min:8',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = Auth::user();
        if (Hash::check($request->input('oldpassword'), $user->password)) {
            $user->password = bcrypt($request->input('password'));
        } else {
            return redirect()->route('etablissement-password', $user)->with('error', "Actuel mot de passe saisi invalide. Votre compte n'a pas  été mis à jour !");
        }
        $user->save();

        return redirect()->route('etablissement-password', $user)->with('success', 'Votre mot de passe a bien été mis à jour !');
    }

    public function valider(Rapport $rapport)
    {
        $audit = Audit::where('id', $rapport->audit_id)->first();
        // dd($audit);

        // validation d rapport
        $rapport->etat = 'Validé';
        $rapport->save();

        // validation de l'audit
        $userid = Auth::user()->id;

        $audit->update([
    //mettre l'etat de l'audit a clôturé
     'etat' => 'Clôturé',
     'par_aneree' => 1, //1 pour dire que l'audit a été réalisé par un privé
     'user_id' => $userid,
 ]);

        //  return redirect()->route('indexback')->with('statut', 'Rapport validé et l\' audit a été clôturé avec succès');

        $commentaires = Commentaire::where('rapport_id', $rapport->id)->get();

        return view('pages.back-office.rapports.show', [
         'rapport' => $rapport,
         'commentaires' => $commentaires,
        'title' => 'Gestion des rapports',
    ]);

        return redirect()->route('showback', ['rapport' => $rapport])->with('statut', 'Le rapport a été valié avec succès');
    }
}
