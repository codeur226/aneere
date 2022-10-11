<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Appelectrique;
use App\Models\Audit;
use App\Models\Fiche;
use App\Models\Optionsqcm;
use App\Models\Question;
use App\Models\Reponse;
use Illuminate\Support\Str;
use App\Models\Reponseqcm;
use Illuminate\Http\Request;
use PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Style;
use PhpOffice\PhpWord\TemplateProcessor;

class QuestionController extends Controller
{
    public function __construct()
    {
        // $this->middleware(['auth','isTextManager','isActive'])->except('search','toutes');
        $this->middleware(['auth', 'isTextManager', 'isActive'])->except('search');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.back-office.questions.index', [
            'questions' => Question::all(),
            'fiches' => Fiche::all(),
            'title' => 'Parametrage des questions',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.back-office.questions.create', [
            'questions' => new Question(),
            'fiches' => Fiche::all(),
            'title' => 'Paramétrage des questions',
        ]);

        // return view('pages.back-office.audits.questions.create', [
        //     'question' => new Question(),
        //     'fiches' => Fiche::all(),
        //     'title' => 'Gestion des questions',
        // ]);

        // return view('pages.back-office.equipements.create', [
        //     "equipement" => new Equipement,
        //     "domaines"=> Domaine::all(),
        //     "title" => "Gestion des equipements"
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'fiche' => 'required',
        //     'etiquette' => 'required|string|unique:reglementations,reference',
        //     'libelle' => 'required|string|unique',
        //     'sousquestion' => 'required|string|unique',
        //     'type' => 'required|string|unique|min:3|max:3"',
        // ]);
        //enregistrement de la question sans sous question

        if ($request->sousquestion == true) {
            $question = Question::create([
            'fiche_id' => $request->fiche,
            'numero_question' => $request->numero_question,
            'etiquette' => $request->etiquette,
            'libelle' => $request->libelle,
            'etiquette_sous_question' => $request->etiquettesousquestion,
            'libelle_sous_question' => $request->libellesousquestion,
            'type_question' => $request->type,
            'sous_question' => $request->sousquestion,
        ]);
        } else {
            //enregistrement de la question avec sous question
            $question = Question::create([
                'fiche_id' => $request->fiche,
                'numero_question' => $request->numero_question,
                'etiquette' => $request->etiquette,
                'libelle' => $request->libelle,
                'type_question' => $request->type,
                'sous_question' => $request->sousquestion,
            ]);
        }
        //Code permettant de separer les options saisie
        $listedesoptions = $request->optionqcms;
        $elements = [];
        $delimiteurs = '.,;';
        $tok = strtok($listedesoptions, ';');
        while (strlen(join(';', $elements)) != strlen($listedesoptions)) {
            array_push($elements, $tok);
            $tok = strtok($delimiteurs);
        }
        //Enregistrement de la liste d'option pour la question
        foreach ($elements as $element) {
            $optionsqcms = Optionsqcm::create([
            'question_id' => $question->id,
            'etiquette_option' => $element,
            'libelle_option' => $element.''.$question->id,
            ]);
        }

        return redirect()->route('questions.index', $question)->with('statut', 'La question a été ajoutée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
        $question = Question::where('id', $id)->get();
        return view('pages.back-office.questions.show',[
            'question' => $question,
            'title' => 'Détails de la question',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::where('id', $id)->get();
        return view('pages.back-office.questions.edit',[
            'question' => $question,
            'fiche' => Fiche::all(),
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
        $question = Question::where('id', $id);
        $question->update([
            'fiche_id' => $request->fiche,
            'numero_question' => $request->numero_question,
            'etiquette' => $request->etiquette,
            'libelle' => $request->libelle,
            'etiquette_sous_question' => $request->etiquette_sous_question,
            'libelle_sous_question' => $request->libelle_sous_question,
        ]);

        $question = Question::where('id', $id)->get();

        return view('pages.back-office.questions.show',[
            'question' => $question,
            'title' => 'Détails de la question',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::destroy($id);
        return redirect()->route('questions.index')->with('statut', 'La question a été supprimée avec succès');
    }

    

    public function exporter(Audit $audit)
    {
        $questions = Question::All();
        // $reponses = Reponse::All();
        $fiches = Fiche::all();


        $phpWord = new PhpWord();

        $templateProcessor = new TemplateProcessor('template_rapport.docx');
   

       
        // $templateProcessor->setValue(['City', 'Street'], ['Detroit', '12th Street']);

        // $export_file = public_path('filename.docx');

        // $templateProcessor->saveAs($export_file);

        // return response()->download($export_file)->deleteFileAfterSend(false);

        // $templateProcessor = new TemplateProcessor('template_rapport.docx');
        // // $templateProcessor = new TemplateProcessor('template.docx');
        // $templateProcessor->setValue('firstname', 'Sohail');
        // $templateProcessor->setValue('lastname', 'Saleem');
        // $templateProcessor->saveAs('Result1.docx');

        // foreach ($fiches as $fiche) {
        // $reponses= Reponse::where('question_id', $role)->get(),}

        //FICHE 00
        /*$reponse00 = Reponse::join('questions', 'questions.id', '=', 'reponses.question_id')
            ->join('fiches', 'fiches.id', '=', 'questions.fiche_id')
            ->join('audits', 'audits.id', '=', 'reponses.audit_id')
            ->where('audits.id', $audit->id)
            ->where('fiches.ordre', '=', 0)
            ->orderbyDesc('questions.numero_question')
            ->get();*/
            //dd($reponse00);
        
        /*$reponse_qcm00 = Reponseqcm::join('optionsqcms', 'optionsqcms.id', '=', 'reponseqcms.options_qcm_id')
        ->join('audits', 'audits.id', '=', 'reponseqcms.audit_id')
        ->where('audits.id', $audit->id)
        ->get();*/

        //FICHE 01
        $reponse01 = Reponse::join('questions', 'questions.id', '=', 'reponses.question_id')
        ->join('fiches', 'fiches.id', '=', 'questions.fiche_id')
        ->join('audits', 'audits.id', '=', 'reponses.audit_id')
        ->where('audits.id', $audit->id)
        ->where('fiches.ordre', '=', 1)
        ->orderby('questions.numero_question')
        ->get(['reponses.id','reponses.question_id','reponses.audit_id','reponses.reponse',
        'reponses.sous_reponse','reponses.created_at as Rcreated_at','reponses.updated_at as Rupdated_at','questions.id',
        'questions.fiche_id', 'questions.etiquette', 'questions.libelle as Qlibelle','questions.type_question',
        'questions.sous_question','questions.created_at as Qcreated_at','questions.updated_at as Qupdated_at', 
        'questions.numero_question', 'questions.etiquette_sous_question',
        'questions.libelle_sous_question', 'fiches.id', 'fiches.domaine_id','fiches.libelle as Flibelle',
        'fiches.created_at as Fcreated_at','fiches.updated_at as Fupdated_at','fiches.ordre','audits.id','audits.user_id',
        'audits.consommateur_id','audits.dateDeclaration','audits.dateEcheance','audits.dateCollecte',
        'audits.pointFocal','audits.telephonePointFocal','audits.etat','audits.created_at as Acreated_at',
        'audits.updated_at as Aupdated_at','audits.par_aneree',]);

        //dd($reponse01);

        //FICHE 02
        $reponse02 = Reponse::join('questions', 'questions.id', '=', 'reponses.question_id')
          ->join('fiches', 'fiches.id', '=', 'questions.fiche_id')
          ->join('audits', 'audits.id', '=', 'reponses.audit_id')
          ->where('audits.id', $audit->id)
          ->where('fiches.ordre', '=', 2)
          ->orderby('questions.numero_question')
          ->get(['reponses.id','reponses.question_id','reponses.audit_id','reponses.reponse',
        'reponses.sous_reponse','reponses.created_at as Rcreated_at','reponses.updated_at as Rupdated_at','questions.id',
        'questions.fiche_id', 'questions.etiquette', 'questions.libelle as Qlibelle','questions.type_question',
        'questions.sous_question','questions.created_at as Qcreated_at','questions.updated_at as Qupdated_at', 
        'questions.numero_question', 'questions.etiquette_sous_question',
        'questions.libelle_sous_question', 'fiches.id', 'fiches.domaine_id','fiches.libelle as Flibelle',
        'fiches.created_at as Fcreated_at','fiches.updated_at as Fupdated_at','fiches.ordre','audits.id','audits.user_id',
        'audits.consommateur_id','audits.dateDeclaration','audits.dateEcheance','audits.dateCollecte',
        'audits.pointFocal','audits.telephonePointFocal','audits.etat','audits.created_at as Acreated_at',
        'audits.updated_at as Aupdated_at','audits.par_aneree',]);

        //FICHE 03
        $reponse03 = Appelectrique::where('audit_id', $audit->id)->get();

        //FICHE 04
        $reponse04 = Reponse::join('questions', 'questions.id', '=', 'reponses.question_id')
          ->join('fiches', 'fiches.id', '=', 'questions.fiche_id')
          ->join('audits', 'audits.id', '=', 'reponses.audit_id')
          ->where('audits.id', $audit->id)
          ->where('fiches.ordre', '=', 4)
          ->orderby('questions.numero_question')
          ->get(['reponses.id','reponses.question_id','reponses.audit_id','reponses.reponse',
        'reponses.sous_reponse','reponses.created_at as Rcreated_at','reponses.updated_at as Rupdated_at','questions.id',
        'questions.fiche_id', 'questions.etiquette', 'questions.libelle as Qlibelle','questions.type_question',
        'questions.sous_question','questions.created_at as Qcreated_at','questions.updated_at as Qupdated_at', 
        'questions.numero_question', 'questions.etiquette_sous_question',
        'questions.libelle_sous_question', 'fiches.id', 'fiches.domaine_id','fiches.libelle as Flibelle',
        'fiches.created_at as Fcreated_at','fiches.updated_at as Fupdated_at','fiches.ordre','audits.id','audits.user_id',
        'audits.consommateur_id','audits.dateDeclaration','audits.dateEcheance','audits.dateCollecte',
        'audits.pointFocal','audits.telephonePointFocal','audits.etat','audits.created_at as Acreated_at',
        'audits.updated_at as Aupdated_at','audits.par_aneree',]);

        //FICHE 05
        $reponse05 = Reponse::join('questions', 'questions.id', '=', 'reponses.question_id')
        ->join('fiches', 'fiches.id', '=', 'questions.fiche_id')
        ->join('audits', 'audits.id', '=', 'reponses.audit_id')
        ->where('audits.id', $audit->id)
        ->where('fiches.ordre', '=', 5)
        ->orderby('questions.numero_question')
        ->get(['reponses.id','reponses.question_id','reponses.audit_id','reponses.reponse',
        'reponses.sous_reponse','reponses.created_at as Rcreated_at','reponses.updated_at as Rupdated_at','questions.id',
        'questions.fiche_id', 'questions.etiquette', 'questions.libelle as Qlibelle','questions.type_question',
        'questions.sous_question','questions.created_at as Qcreated_at','questions.updated_at as Qupdated_at', 
        'questions.numero_question', 'questions.etiquette_sous_question',
        'questions.libelle_sous_question', 'fiches.id', 'fiches.domaine_id','fiches.libelle as Flibelle',
        'fiches.created_at as Fcreated_at','fiches.updated_at as Fupdated_at','fiches.ordre','audits.id','audits.user_id',
        'audits.consommateur_id','audits.dateDeclaration','audits.dateEcheance','audits.dateCollecte',
        'audits.pointFocal','audits.telephonePointFocal','audits.etat','audits.created_at as Acreated_at',
        'audits.updated_at as Aupdated_at','audits.par_aneree',]);

        //FICHE 06
        $reponse06 = Reponse::join('questions', 'questions.id', '=', 'reponses.question_id')
          ->join('fiches', 'fiches.id', '=', 'questions.fiche_id')
          ->join('audits', 'audits.id', '=', 'reponses.audit_id')
          ->where('audits.id', $audit->id)
          ->where('fiches.ordre', '=', 6)
          ->orderby('questions.numero_question')
          ->get(['reponses.id','reponses.question_id','reponses.audit_id','reponses.reponse',
        'reponses.sous_reponse','reponses.created_at as Rcreated_at','reponses.updated_at as Rupdated_at','questions.id',
        'questions.fiche_id', 'questions.etiquette', 'questions.libelle as Qlibelle','questions.type_question',
        'questions.sous_question','questions.created_at as Qcreated_at','questions.updated_at as Qupdated_at', 
        'questions.numero_question', 'questions.etiquette_sous_question',
        'questions.libelle_sous_question', 'fiches.id', 'fiches.domaine_id','fiches.libelle as Flibelle',
        'fiches.created_at as Fcreated_at','fiches.updated_at as Fupdated_at','fiches.ordre','audits.id','audits.user_id',
        'audits.consommateur_id','audits.dateDeclaration','audits.dateEcheance','audits.dateCollecte',
        'audits.pointFocal','audits.telephonePointFocal','audits.etat','audits.created_at as Acreated_at',
        'audits.updated_at as Aupdated_at','audits.par_aneree',]);

        //   SECTION POUR FICHE 01
        $section = $phpWord->addSection();

        $fontStyle = new Style\Font();
        $fontStyle->setBold(true);
        $fontStyle->setName('Maiandra GD');
        $fontStyle->setSize(16);

        $fontStylereponse = new Style\Font();
        //$fontStylereponse->setBold(true);
        $fontStylereponse->setName('Maiandra GD');
        $fontStylereponse->setSize(12);
        //$fontStylereponse->setItalic(false);
        $text = $section->addText('FICHE N°1 : INFORMATIONS D’ORDRE GENERAL');
        $text->setFontStyle($fontStyle);
        $templateProcessor->setComplexValue('F1', $text);
        $compteur01 = 0;
        foreach ($reponse01 as $item) {
            if ($item->type_question=='radio') {
                if ($item->reponse=='true') {
                    $item->reponse = 'Oui';

                }
                if ($item->reponse=='false') {
                    $item->reponse = 'Non';
                }
            }
            
            if ($item->type_question=='checkbox') {
                if(Str::contains($item->reponse, ';'))
                {
                    $item->reponse = str_replace(';',', ',$item->reponse);
                }
            }

            if(Str::contains($item->Qlibelle, '?'))
            {
                $item->Qlibelle = str_replace('?','',$item->Qlibelle);
            }

            // Saut de ligne
            $text = $section->addText(' ');
            $templateProcessor->setComplexValue('C'.$compteur01, $text);
            $compteur01++;

            // Question/Reponse
            $text = $section->addText($item->numero_question.'. '.$item->Qlibelle.' : '.$item->reponse);
            $text->setFontStyle($fontStylereponse);
            $templateProcessor->setComplexValue('C'.$compteur01, $text);
            $compteur01++;

            if ($item->sous_question == true) {
                if(Str::contains($item->libelle_sous_question, '?'))
                {
                    $item->libelle_sous_question = str_replace('?','',$item->libelle_sous_question);
                }

                //Sous-question/Sous-reponse
                $text = $section->addText($item->libelle_sous_question.': '.$item->sous_reponse);
                $text->setFontStyle($fontStylereponse);
                $templateProcessor->setComplexValue('C'.$compteur01, $text);
            }
            $compteur01++;
        }
        // FIN SECTION POUR FICHE 1

        //  DEBUT SECTION POUR FICHE 02
        $section = $phpWord->addSection();
        $text = $section->addText('FICHE N°2: COLLECTE DE DONNEES SUR LES SOURCES D’ALIMENTATION');
        $text->setFontStyle($fontStyle);
        $templateProcessor->setComplexValue('F2', $text);
        $compteur02 = 21;
        foreach ($reponse02 as $item) {
            if ($item->type_question=='radio') {
                if ($item->reponse=='true') {
                    $item->reponse = 'Oui';

                }
                if ($item->reponse=='false') {
                    $item->reponse = 'Non';
                }
            }
            
            if ($item->type_question=='checkbox') {
                if(Str::contains($item->reponse, ';'))
                {
                    $item->reponse = str_replace(';',', ',$item->reponse);
                }
            }

            if(Str::contains($item->Qlibelle, '?'))
            {
                $item->Qlibelle = str_replace('?','',$item->Qlibelle);
            }

            // Saut de ligne
            $text = $section->addText(' ');
            $templateProcessor->setComplexValue('C'.$compteur02, $text);
            $compteur02++;
            $text = $section->addTextBreak();

            // Question/Reponse
            $text = $section->addText($item->numero_question.'. '.$item->Qlibelle.' : '.$item->reponse);
            $text->setFontStyle($fontStylereponse);
            $templateProcessor->setComplexValue('C'.$compteur02, $text);
            $compteur02++;

            if ($item->sous_question == true) {
                if(Str::contains($item->libelle_sous_question, '?'))
                {
                    $item->libelle_sous_question = str_replace('?','',$item->libelle_sous_question);
                }
                $text = $section->addText($item->libelle_sous_question.': '.$item->sous_reponse);
                $text->setFontStyle($fontStylereponse);
                $templateProcessor->setComplexValue('C'.$compteur02, $text);
            }
            $compteur02++;
        }
        // FIN SECTION POUR FICHE 2

        //  DEBUT SECTION POUR FICHE 03
        $section = $phpWord->addSection();
        $text = $section->addText('FICHE N°3 : COLLECTE DE DONNEES SUR LES APPAREILS ELECTRIQUES');
        $text->setFontStyle($fontStyle);
        $templateProcessor->setComplexValue('F3', $text);
        $compteur03 = 51;
        foreach ($reponse03 as $item) {

            // Saut de ligne
            $text = $section->addText(' ');
            $templateProcessor->setComplexValue('C'.$compteur03, $text);
            $compteur03++;
            $text = $section->addTextBreak();

            $text = $section->addText("Emplacement: ".$item->emplacement);
            $text->setFontStyle($fontStylereponse);
            $templateProcessor->setComplexValue('C'.$compteur03, $text);
            $compteur03++;
            $text = $section->addText("Désignation et caractéristiques techniques par types d’appareils électrique: ".$item->designation);
            $text->setFontStyle($fontStylereponse);
            $templateProcessor->setComplexValue('C'.$compteur03, $text);
            $compteur03++;
            $text = $section->addText("Quantité: ".$item->quantite);
            $text->setFontStyle($fontStylereponse);
            $templateProcessor->setComplexValue('C'.$compteur03, $text);
            $compteur03++;
            $text = $section->addText("Puissance électrique en KWH: ".$item->puissance_electrique);
            $text->setFontStyle($fontStylereponse);
            $templateProcessor->setComplexValue('C'.$compteur03, $text);
            $compteur03++;
            $text = $section->addText("Durée estimative de fonctionnement: ".$item->duree);
            $text->setFontStyle($fontStylereponse);
            $templateProcessor->setComplexValue('C'.$compteur03, $text);
            $compteur03++;
            $text = $section->addText("Etat fonctionnement: ".$item->etat_fonctionnement);
            $text->setFontStyle($fontStylereponse);
            $templateProcessor->setComplexValue('C'.$compteur03, $text);
            $compteur03++;
            $text = $section->addText("Observations: ".$item->Observations);
            $text->setFontStyle($fontStylereponse);
            $templateProcessor->setComplexValue('C'.$compteur03, $text);
            $compteur03++;
        }
        // FIN SECTION POUR FICHE 3

        //  DEBUT SECTION POUR FICHE 04
        $section = $phpWord->addSection();
        $text = $section->addText('FICHE N°4: COLLECTE DE DONNEES SUR LES TABLEAUX ELECTRIQUES');
        $text->setFontStyle($fontStyle);
        $templateProcessor->setComplexValue('F4', $text);
        $compteur04 = 71;
        foreach ($reponse04 as $item) {
            if ($item->type_question=='radio') {
                if ($item->reponse=='true') {
                    $item->reponse = 'Oui';

                }
                if ($item->reponse=='false') {
                    $item->reponse = 'Non';
                }
            }
            
            if ($item->type_question=='checkbox') {
                if(Str::contains($item->reponse, ';'))
                {
                    $item->reponse = str_replace(';',', ',$item->reponse);
                }
            }

            if(Str::contains($item->Qlibelle, '?'))
            {
                $item->Qlibelle = str_replace('?','',$item->Qlibelle);
            }

            // Saut de ligne
            $text = $section->addText(' ');
            $templateProcessor->setComplexValue('C'.$compteur04, $text);
            $compteur04++;
            $text = $section->addTextBreak();

            // Question/Reponse
            $text = $section->addText($item->numero_question.'. '.$item->Qlibelle.' : '.$item->reponse);
            $text->setFontStyle($fontStylereponse);
            $templateProcessor->setComplexValue('C'.$compteur04, $text);
            $compteur04++;

            if ($item->sous_question == true) {
                if(Str::contains($item->libelle_sous_question, '?'))
                {
                    $item->libelle_sous_question = str_replace('?','',$item->libelle_sous_question);
                }
                $text = $section->addText($item->libelle_sous_question.': '.$item->sous_reponse);
                $text->setFontStyle($fontStylereponse);
                $templateProcessor->setComplexValue('C'.$compteur04, $text);
            }
            $compteur04++;
        }
        // FIN SECTION POUR FICHE 4

        //  DEBUT SECTION POUR FICHE 05
        $section = $phpWord->addSection();
        $text = $section->addText('FICHE N°5: COLLECTE DE DONNEES SUR LES CABLES ELECTRIQUES');
        $text->setFontStyle($fontStyle);
        $templateProcessor->setComplexValue('F5', $text);
        $compteur05 = 111;
        foreach ($reponse05 as $item) {
            if ($item->type_question=='radio') {
                if ($item->reponse=='true') {
                    $item->reponse = 'Oui';

                }
                if ($item->reponse=='false') {
                    $item->reponse = 'Non';
                }
            }
            
            if ($item->type_question=='checkbox') {
                if(Str::contains($item->reponse, ';'))
                {
                    $item->reponse = str_replace(';',', ',$item->reponse);
                }
            }

            if(Str::contains($item->Qlibelle, '?'))
            {
                $item->Qlibelle = str_replace('?','',$item->Qlibelle);
            }

            // Saut de ligne
            $text = $section->addText(' ');
            $templateProcessor->setComplexValue('C'.$compteur05, $text);
            $compteur05++;
            $text = $section->addTextBreak();

            // Question/Reponse
            $text = $section->addText($item->numero_question.'. '.$item->Qlibelle.' : '.$item->reponse);
            $text->setFontStyle($fontStylereponse);
            $templateProcessor->setComplexValue('C'.$compteur05, $text);
            $compteur05++;

            if ($item->sous_question == true) {
                if(Str::contains($item->libelle_sous_question, '?'))
                {
                    $item->libelle_sous_question = str_replace('?','',$item->libelle_sous_question);
                }
                $text = $section->addText($item->libelle_sous_question.': '.$item->sous_reponse);
                $text->setFontStyle($fontStylereponse);
                $templateProcessor->setComplexValue('C'.$compteur05, $text);
                $compteur05++;
            }
        }
        // FIN SECTION POUR FICHE 5

        //  DEBUT SECTION POUR FICHE 06
        $section = $phpWord->addSection();
        $text = $section->addText('FICHE N°6: INFORMATIONS D’ORDRE SPECIFIQUE');
        $text->setFontStyle($fontStyle);
        $templateProcessor->setComplexValue('F6', $text);
        $compteur06 = 131;
        foreach ($reponse06 as $item) {
            if ($item->type_question=='radio') {
                if ($item->reponse=='true') {
                    $item->reponse = 'Oui';

                }
                if ($item->reponse=='false') {
                    $item->reponse = 'Non';
                }
            }
            
            if ($item->type_question=='checkbox') {
                if(Str::contains($item->reponse, ';'))
                {
                    $item->reponse = str_replace(';',', ',$item->reponse);
                }
            }

            if(Str::contains($item->Qlibelle, '?'))
            {
                $item->Qlibelle = str_replace('?','',$item->Qlibelle);
            }

            // Saut de ligne
            $text = $section->addText(' ');
            $templateProcessor->setComplexValue('C'.$compteur06, $text);
            $compteur06++;
            $text = $section->addTextBreak();

            // Question/Reponse
            $text = $section->addText($item->numero_question.'. '.$item->Qlibelle.' : '.$item->reponse);
            $text->setFontStyle($fontStylereponse);
            $templateProcessor->setComplexValue('C'.$compteur06, $text);
            $compteur06++;

            if ($item->sous_question == true) {
                if(Str::contains($item->libelle_sous_question, '?'))
                {
                    $item->libelle_sous_question = str_replace('?','',$item->libelle_sous_question);
                }
                $text = $section->addText($item->libelle_sous_question.': '.$item->sous_reponse);
                $text->setFontStyle($fontStylereponse);
                $templateProcessor->setComplexValue('C'.$compteur06, $text);
            }
            $compteur06++;
        }
        // FIN SECTION POUR FICHE 6

        // Nettoyer toutes les lignes non remplies
        for ($i=0; $i < 500; $i++) { 
            $text = $section->addText(' ');
            $templateProcessor->setComplexValue('C'.$i, $text);
        }

        $templateProcessor->saveAs('RapportFinal'.' '.getConsommateurNom($audit->consommateur_id).''.'.docx');
      
      
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        // Get all document xml code
        // $fullxml = $objWriter->getWriterPart('Document')->write();
       
        $objWriter->save('Rapport d\'audit'.' '.getConsommateurNom($audit->consommateur_id).''.'.docx');

        return response()->download(public_path('Rapport d\'audit'.' '.getConsommateurNom($audit->consommateur_id).''.'.docx'));

        // $data = [
        //     'title' => 'Welcome to Tutsmake.com',
        //     'date' => date('m/d/Y'),
        // ];

        // //$pdf = PDF::loadView('dashboard', $data);
        // $pdf = PDF::loadView('dashboard');

        // // return $pdf->download('public/reglementation/test.pdf');
        // return $pdf->stream();

        // return $pdf->save(public_path('storage/documents/fichier.pdf'));
        // store('reglementation','public')

        // $pdf = PDF::loadView('questions.index', compact('questions'));

        // // Lancement du téléchargement du fichier PDF
        // return $pdf->stream();

        // return PDF::loadView('questions.index', [
        //     'question' => $questions,
        //     'fiches' => $fiches, ])
        //     ->setPaper('a4', 'landscape')
        //     ->setWarnings(false)
        //     ->save(public_path('storage/documents/fichier.pdf'))
        //     ->stream();

        //return $pdf->download(\Str::slug($fiche->id).'.pdf');

        // $data = [

        //     'title' => 'Generation de rapport pdf',

        //     'date' => date('m/d/Y')

        // ];

        // $pdf = PDF::loadView('index', $data);

        // return $pdf->download('rapport.pdf');
    }

    // $filename = 'view-docx.doc';
    // header("Content-Type: application/force-download");   //it will download the file without open it in browser
    // header( "Content-Disposition: attachment; filename=".basename($filename));
    // header( "Content-Description: File Transfer");
    // @readfile($filename);

    // $docsBody = '<html>
    //              <head></head>
    //              <body>
    //              <h1>This is test heading using docx export.</h1>
    //              <p>Hello, its a paragraph for testing text docuents</p>

    //              @if($questions->count() > 0)
    //              <div class="card-body">
    //                  <div class="table-responsive">

    //                      <table id="data-table1" class="table table-striped table-bordered text-nowrap w-100">
    //                          <thead>
    //                              <tr>
    //                                  <th class="wd-15p">N° ordre</th>

    //                                  <th class="wd-15p">Fiche</th>
    //                                  <th class="wd-15p">Etiquette</th>
    //                                  <th class="wd-15p">libelle</th>
    //                                  <th class="wd-15p">Sous question ?</th>
    //                                  <th class="wd-10p">Type de question</th>
    //                                  <th class="wd-10p">Actions</th>
    //                                  {{-- <th class="wd-20p">satut</th> --}}
    //                              </tr>
    //                          </thead>
    //                          <tbody>
    //                              @foreach ($questions as $question)
    //                              <tr class="position-relative">

    //                                  <td>{{ $question->numero_question }}</td>
    //                                  <td> {{ $question->fiche->libelle }}</td>
    //                                  <td> {{ $question->etiquette}}

    //                                  </td>

    //                                      <td> {{ $question->libelle}}</td>
    //                                      @if($question->sous_question==true)
    //                                      <td>Oui</td>

    //                                      @else
    //                                       <td> Non</td>
    //                                      @endif
    //                                      <td> {{ $question->type_question}}</td>
    //                                  <td>

    //                                  </td>

    //                              </tr>
    //                              @endforeach
    //                          </tbody>
    //                      </table>

    //                      </div>

    //                  </div>
    //              </div>
    //  @endif

    //              </body>
    //              </html>';
    // echo $docsBody;

    // }
    

    public function questionnaire(Audit $audit)
    {
        // QUESTIONS DE LA FICHE 0
        $q_fiche0 = Question::join('fiches', 'fiches.id', '=', 'questions.fiche_id')
        ->where('fiches.ordre', '=', 0)
        ->get(['questions.id', 'questions.etiquette', 'questions.libelle','questions.type_question',
         'questions.sous_question', 'questions.numero_question', 'questions.etiquette_sous_question', 'questions.libelle_sous_question' ]);

        // QUESTIONS DE LA FICHE 1
        $q_fiche1 = Question::join('fiches', 'fiches.id', '=', 'questions.fiche_id')
        ->where('fiches.ordre', '=', 1)
        ->orderby('questions.numero_question')
        ->get(['questions.id', 'questions.etiquette', 'questions.libelle', 'questions.type_question',
         'questions.sous_question', 'questions.numero_question', 'questions.etiquette_sous_question', 'questions.libelle_sous_question' ]);

         // QUESTIONS DE LA FICHE 2
        $q_fiche2 = Question::join('fiches', 'fiches.id', '=', 'questions.fiche_id')
        ->where('fiches.ordre', '=', 2)
        ->orderby('questions.numero_question')
        ->get(['questions.id', 'questions.etiquette', 'questions.libelle', 'questions.type_question',
         'questions.sous_question', 'questions.numero_question', 'questions.etiquette_sous_question', 'questions.libelle_sous_question' ]);

        // QUESTIONS DE LA FICHE 3
        /*$q_fiche3 = Question::join('fiches', 'fiches.id', '=', 'questions.fiche_id')
        ->where('fiches.ordre', '=', 3)
        ->get(['questions.id', 'questions.etiquette', 'questions.libelle', 'questions.type_question',
         'questions.sous_question', 'questions.numero_question', 'questions.etiquette_sous_question', 'questions.libelle_sous_question' ]);*/

        //QUESTIONS DE LA FICHE 4
        $q_fiche4 = Question::join('fiches', 'fiches.id', '=', 'questions.fiche_id')
        ->where('fiches.ordre', '=', 4)
        ->orderby('questions.numero_question')
        ->get(['questions.id', 'questions.etiquette', 'questions.libelle', 'questions.type_question',
         'questions.sous_question', 'questions.numero_question', 'questions.etiquette_sous_question', 'questions.libelle_sous_question' ]);

        //QUESTIONS DE LA FICHE 5
        $q_fiche5 = Question::join('fiches', 'fiches.id', '=', 'questions.fiche_id')
        ->where('fiches.ordre', '=', 5)
        ->orderby('questions.numero_question')
        ->get(['questions.id', 'questions.etiquette', 'questions.libelle', 'questions.type_question',
         'questions.sous_question', 'questions.numero_question', 'questions.etiquette_sous_question', 'questions.libelle_sous_question' ]);

        // QUESTIONS DE LA FICHE 6
        $q_fiche6 = Question::join('fiches', 'fiches.id', '=', 'questions.fiche_id')
        ->where('fiches.ordre', '=', 6)
        ->orderby('questions.numero_question')
        ->get(['questions.id', 'questions.etiquette', 'questions.libelle', 'questions.type_question',
         'questions.sous_question', 'questions.numero_question', 'questions.etiquette_sous_question', 'questions.libelle_sous_question' ]);

        return view('pages.back-office.questions.questionnaire', [
            'q_fiche0' => $q_fiche0,
            'q_fiche1' => $q_fiche1,
            'q_fiche2' => $q_fiche2,
            //'q_fiche3' => $q_fiche3,
            'q_fiche4' => $q_fiche4,
            'q_fiche5' => $q_fiche5,
            'q_fiche6' => $q_fiche6,
            'questions' => Question::all(),
            'fiches' => Fiche::all(),
            'audit' => $audit,
            'optionsqcms' => Optionsqcm::all(),
            'title' => 'Questionnaire',
        ]);
    }
}