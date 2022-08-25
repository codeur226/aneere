<?php

namespace App\Http\Controllers;

use DateTime;
use DateInterval;
use App\Models\Role;
use App\Models\User;
use App\Models\Audit;
use App\Models\Ville;
use App\Models\Domaine;
use App\Models\Temporaire;
use App\Models\Importation;
use Illuminate\Support\Str;
use App\Models\Consommateur;
use Illuminate\Http\Request;
use App\Imports\ConsommateursImport;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\QueryException;

class ImportationController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','isActive']);
        // $this->middleware('auth')->except('index');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $importation=$request->importation;
        //  dd($importation);
        if($importation==-1)
        {return view('pages.back-office.etablissements.importations.index', [
            "importations" => Importation::all(),
            "temporaires" => Temporaire::where('importation_id','like',-1)->get(),
            "curentImportation"=> $importation,
            // "importations" => Importation::whereId($importation->id),
            "title" => "Gestion des consommateurs",
        ]);  }else{
            return view('pages.back-office.etablissements.importations.index', [
                "importations" => Importation::all(),
                "curentImportation"=> $importation,
                "temporaires" => Temporaire::where('importation_id','like',$importation)->get(),
                "title" => "Gestion des consommateurs",
            ]);
        }
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
        $request->validate([
            "fichier" => "file|mimes:xlsx,xls|max:2048",
        ]);
        // dd( Excel::import(new ConsommateursImport, $request->file('fichier')));
        Excel::import(new ConsommateursImport, $request->file('fichier'));

        return redirect()->back()->with('statut', 'Les données ont été importées avec succès.');





    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Importation  $importation
     * @return \Illuminate\Http\Response
     */
    public function show(Importation $importation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Importation  $importation
     * @return \Illuminate\Http\Response
     */
    public function edit(Temporaire $importation)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Importation  $importation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Importation $importation)
    {
        //
    }

    /**
     * Remove the specified resource from storage. 
     *
     * @param  \App\Models\Importation  $importation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Importation $importation)
    {
        // $tempor=Temporaire::where('id','like',$temporaire)->first();
        //   dd($importation);

        $importation->delete();
        return redirect()->route("importations.index",['importation'=>-1])->with("statut", "L'importation a été supprimée avec succès");
    }

    public function import( $request)
    {
        // dd($request);
        $importation=Importation::whereId($request)->first();
            $temporaires=Temporaire::whereNotNull("email")
                                    ->where('importation_id','like',$request)->get();
            $compteur=0;
            foreach($temporaires as $temporaire){
                $consommateur=new Consommateur;
                $chaine=explode(" ",$temporaire->ville);
                $ville=Ville::where("nom","like","%".$chaine[0]."%")->first();
                $consommateur->ville_id=$ville->id;
                // dd($temporaire->ville."====".$ville->nom);
                $password = Str::random(8);
                $role = Role::where('nom', 'like', 'Etablissement')->first();
                // dd($role);
                try{
                $user = User::create([
                    'role_id' => $role->id,
                    'name' => "NomEtPrenom Responsable",
                    'email' => $temporaire->email,
                    'password' => Hash::make($password),
                ]);
                      $user->password = $password;
                //    Mail::to($user->email)->send(new SendMailToUser($user));
                    }catch (QueryException $e){
                        $errorCode = $e->errorInfo[1];
                        if($errorCode == 1062){
                            $user = User::where('email','like',$temporaire->email)->first();
                            // $consommateur->user->update([
                            //     'name' => strtoupper($request->nom_etablissement),
                            //     'email' => $user->email,
                            // ]);
                        }
                    }
                $consommateur->user_id=$user->id;
                $domaine=Domaine::where("nom","like","Bâtiment")->first();
                $consommateur->domaine_id=$domaine->id;
                if($temporaire->type=="PARTICULIER"){
                    $consommateur->statut="privé";
                }else{
                    if($temporaire->type=="ADMINISTRATION"){
                        $consommateur->statut="public";
                    }
                }
                $consommateur->num_identification=app('App\Http\Controllers\ConsommateurController')->getIdentifier($domaine->id,-1);
                
                
                
                // $consommateur->getIdentifier($domaine->id,-1);
                $consommateur->police= $temporaire->police;
                $consommateur->nom= $temporaire->nom; 
                $consommateur->tel_mobile= $temporaire->telephone; 
                $consommateur->save();
                $temporaire->delete();
                $date = new DateTime(date("Y-m-d"));
                $date->add(new DateInterval('P6M'));
                $date1 = $date->format('Y-m-d');
                Audit::create([
                    'dateDeclaration'      => date("Y-m-d"),
                    'consommateur_id'      => $consommateur->id,
                    'dateEcheance' =>  $date1,
                    'etat'       => 'Declaré',
                ]);
                $compteur++;
            }
            if($importation->temporaires->count()<=0){$importation->delete();}
            return redirect()->route('importations.index', ['importation'=>$request])->with('statut', "Déclaration efectuée avec succès: ".$compteur." établissements ont été déclarés");
    }
}
