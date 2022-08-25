<?php

namespace App\Http\Controllers;

use App\Models\Qcm;
use App\Models\Qrt;
use App\Models\Role;
use App\Models\Sqrt;
use App\Models\User;
use App\Models\Audit;
use App\Models\Fiche;
use App\Models\Collecte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollecteController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','isActive','isAuditManager']);
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
        $authRole = Auth::user()->role->nom;

       if ($authRole =='Agent' || $authRole =='Chef de service') {
        return view('pages.back-office.audits.electricites.index', [
             "audits" => Audit::where('user_id', Auth::user()->id)
                              ->get(),
             "title" => "Gestion des audits"
       ]);
       }else if ($authRole =='Directeur'){

         return view('pages.back-office.audits.electricites.index', [

                 "audits" => Audit::all(),
                "title" => "Gestion des audits"
           ]);
       }else{
        return redirect()->back()->with('error', 'Vous ne disposez pas des autorisations necessaires pour acceder réaliser cette action.');
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $audit= Audit::whereId($request->audit_id)->first();
        // dd($audit);
        $domaineAudit=$audit->consommateur->domaine;
        $fiches=Fiche::where("domaine_id","like",$domaineAudit)->get();
        return view('pages.back-office.audits.electricites.create', [
            // "audit" => $audit,
            "fiches"=>$fiches,
            "title" => "Gestion de la collecte"
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Audit  $audit
     * @return \Illuminate\Http\Response
     */
    public function show(Audit $audit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Audit $audit
     * @return \Illuminate\Http\Response
     */
    public function edit(Audit $audit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Audit $audit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Audit $audit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Audit $audit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Audit $audit)
    {
        //
    }

    public function question($fiche_id)
    { 
    //     $qrts = Qrt::where('fiche_id', $fiche_id)->orderBy('num_ordre', 'ASC')->get();
    //     foreach($qrts as $key => &$val){
    //         $val['type'] = 'qrts';
    //     } 
    //     $qcms = Qcm::where('fiche_id', $fiche_id)->orderBy('num_ordre', 'ASC')->get();
    //     foreach($qcms as $key => &$val){
    //         $val['type'] = 'qcm';
    //     } 
    //     $sqrts =null;
    //     foreach ($qcms as $qcm) {
    //         $data= Sqrt::where('qcm_id', $qcm->id)->orderBy('num_ordre', 'ASC')->get();
    //         $sqrts = collect($sqrts)->merge($data) ;
            
    //         foreach($sqrts as $key => &$val){
    //             $val['type'] = 'sqrt';
    //         }
    //     }    

    // $questions = collect($qrts)->merge($qcms)->merge($sqrts);
   
    // for($i=0; $i<count($questions)-1; $i++) {
    //     $min = $i; 
    //     for($j=$i+1; $j<count($questions); $j++) { 
    //         if ($questions[$j]->num_ordre<$questions[$min]->num_ordre) {
    //             $min = $j; 
    //         }
    //     }
    //     $questions = $this->swap_positions($questions, $i, $min);
    // }
    
        return "

          <fieldset> 
            <h2 class='fs-title'>Question n°2</h2>
            <div class='row'> 
              <h3  class='fs-subtitle'>What type of diabetes do you have?</h3>
            </div>
            <br>

             <div class='form-group'>
                <span class='form-group has-float-label'>
                 <textarea name='' type='text' class='form-control' cols='2' rows='2'></textarea>
                  <label for='reponse'>Votre reponse</label>
                </span>
              </div> 
              <hr>
            <input type='button' name='previous' class='previous action-button' value='Previous' />
            <input type='button' name='next' class='next action-button' value='Next' />
        </fieldset>
        " ;
    }
    private function swap_positions($data1, $left, $right) {
        $backup_old_data_right_value = $data1[$right];
        $data1[$right] = $data1[$left];
        $data1[$left] = $backup_old_data_right_value;
        return $data1;
    }
}
