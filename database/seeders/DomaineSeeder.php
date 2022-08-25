<?php

namespace Database\Seeders;

use App\Models\Domaine; 
use Illuminate\Database\Seeder;

class DomaineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $industrie=Domaine::create([
            'nom' => 'Bâtiment'
        ]);
        $industrie=Domaine::create([
            'nom' => 'Industrie'
        ]);
        $transport=Domaine::create([
            'nom' => 'Transport'
        ]);
    }
}
