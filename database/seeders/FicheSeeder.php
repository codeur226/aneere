<?php

namespace Database\Seeders;

use App\Models\Qcm;
use App\Models\Qrt;
use App\Models\Fiche;
use App\Models\Domaine;
use App\Models\Option;
use App\Models\Sqrt;
use Illuminate\Database\Seeder;

class FicheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $fiche0=Fiche::create(['domaine_id'=> Domaine::where('nom', 'Bâtiment')->first()->id, 'libelle'=> 'FICHE N°0 : INFORMATIONS D’IDENTIFICATION']);

            $fiche1=Fiche::create(['domaine_id'=> Domaine::where('nom', 'Bâtiment')->first()->id, 'libelle'=> 'FICHE N°1 : INFORMATIONS D’ORDRE GENERAL']);
            
            // $qcm1=Qcm::create(['fiche_id'=> $fiche1->id, 'num_ordre'=> 1, 'question'=> "Avez-vous un responsable énergie au sein de votre établissement?"]);
            // Option::create(['qcm_id'=> $qcm1->id, 'option'=> 'Oui']);
            // Option::create(['qcm_id'=> $qcm1->id, 'option'=> 'Non']);
            // Sqrt::create(['qcm_id'=> $qcm1->id, 'num_ordre'=> 2, 'question'=> "Si oui, quel est son rôle?"]);

            // $qcm2=Qcm::create(['fiche_id'=> $fiche1->id, 'num_ordre'=> 3, 'question'=> "Votre bâtiment dispose-t-il d’un transformateur de tension ?"]);
            //  Option::create(['qcm_id'=> $qcm2->id, 'option'=> 'Oui']);
            //  Option::create(['qcm_id'=> $qcm2->id, 'option'=> 'Non']);
            // Sqrt::create(['qcm_id'=> $qcm2->id, 'num_ordre'=> 4, 'question'=> "Si oui, quelle est la puissance :"]);

            // $qcm3=Qcm::create(['fiche_id'=> $fiche1->id, 'num_ordre'=> 5, 'question'=> "Quelle est la qualité de la fourniture d’électricité de votre établissement?"]);
            //  Option::create(['qcm_id'=> $qcm3->id, 'option'=> 'Bonne ']);
            //  Option::create(['qcm_id'=> $qcm3->id, 'option'=> 'Passable']);
            //  Option::create(['qcm_id'=> $qcm3->id, 'option'=> 'Mauvaise']);

            //  $qcm4=Qcm::create(['fiche_id'=> $fiche1->id, 'num_ordre'=> 6, 'question'=> "Votre bâtiment dispose-t-il d’un système de compensation d’énergie réactive? "]);
            //  Option::create(['qcm_id'=> $qcm4->id, 'option'=> 'Oui']);
            //  Option::create(['qcm_id'=> $qcm4->id, 'option'=> 'Non']);
            // Sqrt::create(['qcm_id'=> $qcm4->id, 'num_ordre'=> 7, 'question'=> "Si oui, quelle est sa puissance : "]);

            // $qcm5=Qcm::create(['fiche_id'=> $fiche1->id, 'num_ordre'=> 8, 'question'=> "Quels sont les types de luminaires installés dans votre établissement?"]);
            // Option::create(['qcm_id'=> $qcm5->id, 'option'=> 'Fluorescent ']);
            // Option::create(['qcm_id'=> $qcm5->id, 'option'=> 'Fluo compact ']);
            // Option::create(['qcm_id'=> $qcm5->id, 'option'=> 'Lampe à incandescent ']);
            // Option::create(['qcm_id'=> $qcm5->id, 'option'=> 'LED ']);
            // Option::create(['qcm_id'=> $qcm5->id, 'option'=> 'Projecteur ']);
            // Option::create(['qcm_id'=> $qcm5->id, 'option'=> 'Autres']);
            // Sqrt::create(['qcm_id'=> $qcm5->id, 'num_ordre'=> 9, 'question'=> "Précisez "]);

            // $qcm6=Qcm::create(['fiche_id'=> $fiche1->id, 'num_ordre'=> 10, 'question'=> "Quels sont les types de commandes manuelles du système d’éclairage utilisés dans votre établissement? "]);
            // Option::create(['qcm_id'=> $qcm6->id, 'option'=> 'Interrupteur Simple  ']);
            // Option::create(['qcm_id'=> $qcm6->id, 'option'=> 'Télérupteur ']);
            // Option::create(['qcm_id'=> $qcm6->id, 'option'=> 'Bouton Poussoir']);
            // Option::create(['qcm_id'=> $qcm6->id, 'option'=> 'Autres  ']);
            // Sqrt::create(['qcm_id'=> $qcm6->id, 'num_ordre'=> 11, 'question'=> "Précisez "]);

            // $qcm7=Qcm::create(['fiche_id'=> $fiche1->id, 'num_ordre'=> 12, 'question'=> "Quels sont les types de commandes automatiques utilisés dans votre établissement?"]);
            // Option::create(['qcm_id'=> $qcm7->id, 'option'=> 'Détecteur de mouvement']);
            // Option::create(['qcm_id'=> $qcm7->id, 'option'=> 'Interrupteur crépusculaire  ']);
            // Option::create(['qcm_id'=> $qcm7->id, 'option'=> 'Interrupteur horaire']);

            // $qcm8=Qcm::create(['fiche_id'=> $fiche1->id, 'num_ordre'=> 13, 'question'=> "Avez-vous déjà fait une analyse de la consommation (Facture d’électricité)  de votre établissement ?"]);
            // Option::create(['qcm_id'=> $qcm8->id, 'option'=> 'Oui']);
            // Option::create(['qcm_id'=> $qcm8->id, 'option'=> 'Non']);
            // Sqrt::create(['qcm_id'=> $qcm8->id, 'num_ordre'=> 14, 'question'=> "Si oui, par qui et quel constat avez-vous fait : "]);
            // Sqrt::create(['qcm_id'=> $qcm8->id, 'num_ordre'=> 15, 'question'=> "Si non, pourquoi "]);

            // $qcm9=Qcm::create(['fiche_id'=> $fiche1->id, 'num_ordre'=> 16, 'question'=> "Disposez-vous de vos factures d’électricités des trois (03) derniers années ? "]);
            // Option::create(['qcm_id'=> $qcm9->id, 'option'=> 'Oui']);
            // Option::create(['qcm_id'=> $qcm9->id, 'option'=> 'Non']);
            // Sqrt::create(['qcm_id'=> $qcm9->id, 'num_ordre'=> 17, 'question'=> "Si oui, nous demandons une copie "]);

            // $qcm10=Qcm::create(['fiche_id'=> $fiche1->id, 'num_ordre'=> 18, 'question'=> "Avez-vous déjà entrepris des démarches volontaristes pour la réduction de votre consommation ?"]);
            // Option::create(['qcm_id'=> $qcm10->id, 'option'=> 'Oui']);
            // Option::create(['qcm_id'=> $qcm10->id, 'option'=> 'Non']);
            // Sqrt::create(['qcm_id'=> $qcm10->id, 'num_ordre'=> 19, 'question'=> "Si oui, lesquelles et quels résultats avez-vous obtenu : "]);

            // $qcm11=Qcm::create(['fiche_id'=> $fiche1->id, 'num_ordre'=> 20, 'question'=> "Avez-vous déjà entrepris des démarches volontaristes pour la réduction de votre consommation ?"]);
            // Option::create(['qcm_id'=> $qcm11->id, 'option'=> 'Oui']);
            // Option::create(['qcm_id'=> $qcm11->id, 'option'=> 'Non']);
            // Sqrt::create(['qcm_id'=> $qcm11->id, 'num_ordre'=> 21, 'question'=> "Si oui, expliquez : "]);

            // $qcm12=Qcm::create(['fiche_id'=> $fiche1->id, 'num_ordre'=> 22, 'question'=> "Connaissez-vous le concept d’efficacité énergétique ? "]);
            // Option::create(['qcm_id'=> $qcm12->id, 'option'=> 'Oui']);
            // Option::create(['qcm_id'=> $qcm12->id, 'option'=> 'Non']);
            // Sqrt::create(['qcm_id'=> $qcm12->id, 'num_ordre'=> 23, 'question'=> "Si oui, expliquez : "]);

            // $qcm13=Qcm::create(['fiche_id'=> $fiche1->id, 'num_ordre'=> 24, 'question'=> "Connaissez-vous le concept d’Eco citoyenneté ? "]);
            // Option::create(['qcm_id'=> $qcm13->id, 'option'=> 'Oui']);
            // Option::create(['qcm_id'=> $qcm13->id, 'option'=> 'Non']);
            // Sqrt::create(['qcm_id'=> $qcm13->id, 'num_ordre'=> 25, 'question'=> "Si oui, expliquez : "]);

            // $qcm14=Qcm::create(['fiche_id'=> $fiche1->id, 'num_ordre'=> 26, 'question'=> "Faites-vous un suivi de votre consommation d’électricité ? "]);
            // Option::create(['qcm_id'=> $qcm14->id, 'option'=> 'Oui']);
            // Option::create(['qcm_id'=> $qcm14->id, 'option'=> 'Non']);
            // Sqrt::create(['qcm_id'=> $qcm14->id, 'num_ordre'=> 27, 'question'=> "Si oui, comment : "]);

            // $qcm15=Qcm::create(['fiche_id'=> $fiche1->id, 'num_ordre'=> 28, 'question'=> "Avez-vous des affiches près des interrupteurs avec des messages du genre « Eteignez en quittant le local » ? "]);
            // Option::create(['qcm_id'=> $qcm15->id, 'option'=> 'Oui']);
            // Option::create(['qcm_id'=> $qcm15->id, 'option'=> 'Non']);

            // $qcm16=Qcm::create(['fiche_id'=> $fiche1->id, 'num_ordre'=> 29, 'question'=> "Le personnel a-t-il déjà été sensibilisé à l’utilisation rationnelle de l’énergie ?"]);
            // Option::create(['qcm_id'=> $qcm16->id, 'option'=> 'Oui']);
            // Option::create(['qcm_id'=> $qcm16->id, 'option'=> 'Non']);
            // Sqrt::create(['qcm_id'=> $qcm16->id, 'num_ordre'=> 30, 'question'=> "Si oui, quel impact avez-vous constaté : "]);
            // Sqrt::create(['qcm_id'=> $qcm16->id, 'num_ordre'=> 31, 'question'=> "Si non, pourquoi "]);

            // $qcm17=Qcm::create(['fiche_id'=> $fiche1->id, 'num_ordre'=> 32, 'question'=> "Avez-vous un dispositif d’alimentation de secours autre que le solaire? "]);
            // Option::create(['qcm_id'=> $qcm17->id, 'option'=> 'Oui']);
            // Option::create(['qcm_id'=> $qcm17->id, 'option'=> 'Non']);
            // Sqrt::create(['qcm_id'=> $qcm17->id, 'num_ordre'=> 33, 'question'=> " Si oui, lesquels et précisez la puissance"]);

            
            // $qcm18=Qcm::create(['fiche_id'=> $fiche1->id, 'num_ordre'=> 34, 'question'=> "Disposez-vous d’une installation solaire photovoltaïque pour votre bâtiment ? "]);
            // Option::create(['qcm_id'=> $qcm18->id, 'option'=> 'Oui']);
            // Option::create(['qcm_id'=> $qcm18->id, 'option'=> 'Non']);
            // Sqrt::create(['qcm_id'=> $qcm18->id, 'num_ordre'=> 35, 'question'=> " Si oui quelle est sa capacité et quel constat avez-vous fait "]);
            // Sqrt::create(['qcm_id'=> $qcm18->id, 'num_ordre'=> 36, 'question'=> " Pouvons-nous visiter (noter les observations)"]);
            // Sqrt::create(['qcm_id'=> $qcm18->id, 'num_ordre'=> 37, 'question'=> " Si non, pourquoi "]);

            // $qcm19=Qcm::create(['fiche_id'=> $fiche1->id, 'num_ordre'=> 38, 'question'=> "Le toit est-il accessible ? "]);
            // Option::create(['qcm_id'=> $qcm19->id, 'option'=> 'Oui']);
            // Option::create(['qcm_id'=> $qcm19->id, 'option'=> 'Non']);
            // Sqrt::create(['qcm_id'=> $qcm19->id, 'num_ordre'=> 39, 'question'=> " Si oui, vérifiez (noter les observations) "]);

// model sqrt, table option(id option idqcm)

            // $fiche1=Fiche::create(['domaine_id'=> Domaine::where('nom', 'Bâtiment')->first()->id, 'libelle'=> 'FICHE N°1 : INFORMATIONS D’ORDRE GENERAL']);
            // $qrt1=Qrt::create(['fiche_id'=> $fiche1->id, 'num_ordre'=> 1, 'question'=> 'Avez-vous un responsable énergie au sein de votre établissement?']);






    //     $fiches = array(
    //         ['domaine_id'=> Domaine::where('nom', 'Bâtiment')->first()->id, 'libelle'=> 'FICHE N°1 : INFORMATIONS D’ORDRE GENERAL'],
    //         ['domaine_id'=> Domaine::where('nom', 'Bâtiment')->first()->id, 'libelle'=> 'FICHE N°2 : COLLECTE DE DONNEES SUR LES SOURCES D’ALIMENTATION'],
    //         ['domaine_id'=> Domaine::where('nom', 'Bâtiment')->first()->id, 'libelle'=> 'FICHE N°3 : COLLECTE DE DONNEES SUR LES APPAREILS ELECTRIQUES'],
    //         ['domaine_id'=> Domaine::where('nom', 'Bâtiment')->first()->id, 'libelle'=> 'FICHE N°4 : COLLECTE DE DONNEES SUR LES TABLEAUX ELECTRIQUES'],
    //         ['domaine_id'=> Domaine::where('nom', 'Bâtiment')->first()->id, 'libelle'=> 'FICHE N°5 : COLLECTE DE DONNEES SUR LES CABLES ELECTRIQUES'],

    //         ['domaine_id'=> Domaine::where('nom', 'Industrie')->first()->id, 'libelle'=> 'FICHE N°1 : INFORMATIONS D’ORDRE GENERAL'],
    //         ['domaine_id'=> Domaine::where('nom', 'Industrie')->first()->id, 'libelle'=> 'FICHE N°2 : COLLECTE DE DONNEES SUR LES SOURCES D’ALIMENTATION'],
    //         ['domaine_id'=> Domaine::where('nom', 'Industrie')->first()->id, 'libelle'=> 'FICHE N°3 : COLLECTE DE DONNEES SUR LES APPAREILS ELECTRIQUES'],
    //         ['domaine_id'=> Domaine::where('nom', 'Industrie')->first()->id, 'libelle'=> 'FICHE N°4 : COLLECTE DE DONNEES SUR LES TABLEAUX ELECTRIQUES'],
    //         ['domaine_id'=> Domaine::where('nom', 'Industrie')->first()->id, 'libelle'=> 'FICHE N°5 : COLLECTE DE DONNEES SUR LES CABLES ELECTRIQUES'],
    //    );
    //    foreach ($fiches as $key => $fiche) {
    //          Fiche::create($fiche);
    //    }
    }
}
