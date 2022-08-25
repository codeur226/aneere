
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuditController;
use App\Http\Controllers\FicheController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\RapportController;
use App\Http\Controllers\ReponseController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AgrementController;
use App\Http\Controllers\AuditeurController;
use App\Http\Controllers\BatimentController;
use App\Http\Controllers\CollecteController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\EquipementController;
use App\Http\Controllers\TemporaireController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ImportationController;
use App\Http\Controllers\ConsommateurController;
use App\Http\Controllers\AppelectriqueController;
use App\Http\Controllers\ReglementationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//  Route::prefix('dashboard')->group(function () {
    Route::get('/', [WelcomeController::class, 'welcome'])->name('welcome');

    Route::prefix('dashboard')->group(function () {
        Route::get('/accueil', [AdminController::class, 'accueil'])->name('accueil');
        Route::resource('/etablissement-rapports', RapportController::class);
        Route::resource('/rapports', RapportController::class);
        Route::get('/indexback', [RapportController::class, 'indexback'])->name('indexback');
        Route::get('/showback/{rapport}', [RapportController::class, 'showback'])->name('showback');
        
        Route::resource('/commentaires', CommentaireController::class);
        Route::get('/valider/{rapport}', [RapportController::class, 'valider'])->name('valider');
        Route::post('/rejeter/{rapport}', [CommentaireController::class, 'rejeter'])->name('rejeter');

        Route::resource('/consommateurs', ConsommateurController::class);
        Route::resource('/pieces', PieceController::class);
        Route::resource('/importations', ImportationController::class);
        Route::resource('/temporaires', TemporaireController::class);
        //    Route::delete('/importations/{temporaire}', [ImportationController::class,'destroy'])->name('importations.destroy');
        //route pourles questions
        Route::resource('/questions', QuestionController::class);
        Route::get('/fiche3/{audit_id}', [AppelectriqueController::class, 'fiche3'])->name('fiche3');
        Route::get('/terminerAudit/{audit_id}', [AppelectriqueController::class, 'terminerAudit'])->name('terminerAudit');
        Route::resource('/appelectriques', AppelectriqueController::class);
        

        //EXPORT
        //Route::get('/view-docx', [QuestionController::class, 'index'])->name('view-docx');  //for view
        Route::get('/exporter/{audit}', [QuestionController::class, 'exporter'])->name('exporter'); //for export function

        Route::get('/questionnaire/{audit}', [QuestionController::class, 'questionnaire'])->name('questionnaire');

        // route reponse
        Route::resource('/reponses', ReponseController::class);
        //route fiche
        Route::resource('/fiches', FicheController::class);

        //route pour appareil electriques
        Route::resource('/appelectriques', AppelectriqueController::class);
        //  ->where('school', '^[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}$');

        Route::resource('/audits', AuditController::class);
        Route::post('/audits/affectation', [AuditController::class, 'affecterToAgent'])->name('audits.affectation');
        Route::get('/cloturer/{audit}', [AuditController::class, 'cloturer'])->name('cloturer'); //for export function

        Route::resource('/collectes', CollecteController::class);

        Route::resource('/users', UserController::class);
        Route::get('profil/user', [UserController::class, 'profil'])->name('profil');
        Route::post('profil_save/user', [UserController::class, 'profil_save'])->name('profil_save');
        Route::get('users/{user}/disable', [UserController::class, 'disable'])->name('users.disable');
        Route::get('users/{user}/activate', [UserController::class, 'activate'])->name('users.activate');

        Route::resource('/batiments', BatimentController::class);

        Route::resource('/auditeurs', AuditeurController::class);
        Route::resource('/agrements', AgrementController::class);

        Route::resource('/reglementations', ReglementationController::class);
        Route::resource('/equipements', EquipementController::class);
    });

    Route::prefix('reglementation')->group(function () {
        Route::get('/search/{type}', [ReglementationController::class, 'search'])->name('reglementations.search');
    });
     Route::prefix('equipement')->group(function () {
         Route::get('/search/{type}', [EquipementController::class, 'search'])->name('equipements.search');
     });
     Route::prefix('auditeur')->group(function () {
         Route::get('/search/{domaine}', [AuditeurController::class, 'search'])->name('auditeurs.search');
     });
     Route::prefix('importation')->group(function () {
         Route::get('/import/{importation}', [ImportationController::class, 'import'])->name('importations.import');
     });
     Route::prefix('dashboard/collecte')->group(function () {
         Route::get('/fiche/question/{fiche_id}', [CollecteController::class, 'question'])->name('collectes.question');
     });
    //  Route::prefix('importation')->group(function () {
    //     Route::get('/import/{request}',[ImportationController::class, 'import'])->name("importations.import");
    //  });
    //  Route::prefix('domaine')->group(function () {
    //     Route::get('/identifier/{domaine}',[DomaineController::class, 'identifier'])->name("domaine.identifier");
    //  });
   Route::prefix('consommateur')->group(function () {
       Route::get('consommateur/{domaine_id}', [ConsommateurController::class, 'consommateur']);
       Route::get('user/{user_id}', [ConsommateurController::class, 'user']);
       Route::get('identifier/{domaine_id}/{num_identification}', [ConsommateurController::class, 'getIdentifier']);
       Route::get('/change-password', [UserController::class, 'change_password'])->name('consommateur.password_change');
       Route::post('/password-save', [UserController::class, 'save_password'])->name('consommateur.password_save');
       Route::get('/home', [ConsommateurController::class, 'home'])->name('consommateur.home');
       Route::get('/informations/{id}', [ConsommateurController::class, 'informations'])->name('consommateur.informations');
       Route::get('/complement-informations/{id}', [ConsommateurController::class, 'complementInfos'])->name('consommateur.complementInfos');
       Route::put('/complement-information/update', [ConsommateurController::class, 'complementInfosUpadate'])->name('consommateur.complementInfosUpdate');
       // ROUTE A PROTEGER
   });

Route::get('/admin', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
