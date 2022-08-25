<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\Consommateur;
use App\Models\Role;
use App\Models\User;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuditController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'isActive', 'isAuditManager']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roleAgent = Role::where('nom', 'like', 'Agent')->first()->id;
        $roleChefDeService = Role::where('nom', 'like', 'Chef de service')->first()->id;

        return view('pages.back-office.audits.affectations.index', [
            'users' => User::where('role_id', $roleAgent)
                                ->orWhere('role_id', $roleChefDeService)->get(),

             'audits' => Audit::where('user_id', null)->get(),
            'title' => 'Gestion des audits',
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::where('nom', 'like', 'Agent')->first()->id;
        $autUser = Auth::user()->role->nom;
        if ($autUser == 'Directeur') {
            return view('pages.back-office.audits.affectations.create', [
            'audit' => new Audit(),
            // "cabinet" => $request->statut,
            'users' => User::where('role_id', $role)->get(),
            'consommateurs' => Consommateur::all(),
            'title' => 'Gestion des audits',
        ]);
        } elseif ($autUser == 'Agent') {
            return view('pages.back-office.audits.electricites.create', [
            'audit' => new Audit(),
            // "cabinet" => $request->statut,
            'users' => User::where('role_id', $role)->get(),
            'consommateurs' => Consommateur::all(),
            'title' => 'Gestion des audits',
        ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'user_id' => 'required',
            'consommateur_id' => 'required',
            // 'dateDeclaration' => 'required|date',
            // 'dateEcheance' => 'required|date',
            // 'etat' => 'required|string|min:2',
        ]);
        $date = new DateTime(date('Y-m-d'));
        $date->add(new DateInterval('P6M'));
        $date1 = $date->format('Y-m-d');
        $audit = Audit::create([
            'dateDeclaration' => date('Y-m-d'),
            'consommateur_id' => $request->consommateur_id,
            'dateEcheance' => $date1,
            'etat' => 'Declaré',
    ]);

        return redirect()->route('audits.index')->with('statut', 'L\' audit créé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Audit $audit)
    {
        // dd($audit);
        // $autUser = Auth::user()->role->nom;
        // if ($autUser == 'Agent' || $autUser == 'Chef de service') {
        return view('pages.back-office.audits.electricites.show', [
              'audit' => $audit,
              'title' => 'Gestion des audits',
        ]);
        // } else {
        //     return redirect()->back()->with('error', 'Vous ne disposez pas de la permission pour acceder à cet audit.');
        //     // abort('401');
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Audit $audit)
    {
        $role = Role::where('nom', 'like', 'Agent')->first()->id;

        return view('pages.back-office.audits.affectations.edit', [
            'audit' => $audit,
            // "cabinet" => $request->statut,
            'users' => User::where('role_id', $role)->get(),
            'consommateurs' => Consommateur::all(),
            'title' => 'Gestion des audits',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Audit $audit)
    {
        $request->validate([
            // 'user_id' => 'required',
            'consommateur_id' => 'required',
            // 'dateDeclaration' => 'required|date',
            // 'dateEcheance' => 'required|date',
            // 'etat' => 'required|string|min:2',
        ]);

        $audit->update([
            // 'dateDeclaration'      => $request->dateDeclaration,
            'consommateur_id' => $request->consommateur_id,
            // 'dateEcheance' => $request->dateEcheance,
    ]);

        return redirect()->route('audits.index')->with('statut', 'L\' audit modifié avec succès');
    }

    public function cloturer(Audit $audit)
    {
        $audit->update([
           //mettre l'etat de l'audit a clôturé
            'etat' => 'Clôturé',
            'par_aneree' => 0, //0 pour dire que l'audit a été realisé par l'aneree
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('collectes.index')->with('statut', 'L\' audit a été clôturé avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audit $audit)
    {
        $audit->delete();

        return redirect()->route('audits.index')->with('statut', 'L\' audit supprimé avec succès');
    }

    public function affecterToAgent(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);
        $auditId[] = explode(',', $request->AffecterToAgent);
        //    dd($auditId);
        foreach ($auditId as  $audit) {
            //  dd($audit);
            if ($audit != null) {
                $audit = Audit::whereIn('id', $audit);
                // dd($audit);
                $audit->update([
                    'user_id' => $request->user_id,
                    'etat' => 'En attente d\'audit',
                ]);

                return redirect()->route('audits.index')->with('statut', 'Ce(s) audit(s) a (ont) été affecté(s) avec succès');
            }
        }
    }
}
