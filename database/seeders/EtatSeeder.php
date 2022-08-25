<?php

namespace Database\Seeders;

use App\Models\Etat;
use Illuminate\Database\Seeder;

class EtatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $etat=Etat::create([
            'etat' => 'Actif'
        ]);
        $etat=Etat::create([
            'etat' => 'Suspendu'
        ]);
        $etat=Etat::create([
            'etat' => 'Retiré'
        ]);
        $etat=Etat::create([
            'etat' => 'Expiré'
        ]);
    }
}
