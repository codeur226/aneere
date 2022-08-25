<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $type=Type::create([
            'libelle' => 'ARRETE'
        ]);
        $type=Type::create([
            'libelle' => 'COMMUNICATION'
        ]);
        $type=Type::create([
            'libelle' => 'DECISION'
        ]);
        $type=Type::create([
            'libelle' => 'DECRET'
        ]);
        $type=Type::create([
            'libelle' => 'DIRECTIVE'
        ]);
        $type=Type::create([
            'libelle' => 'LOI'
        ]);

    }
}
