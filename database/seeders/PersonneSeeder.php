<?php

namespace Database\Seeders;

use App\Models\Personne;
use Illuminate\Database\Seeder;

class PersonneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $personne=Personne::create([
            'denomination' => 'Particulier'
        ]);
        $personne=Personne::create([
            'denomination' => 'Cabinet'
        ]);
    }
}
