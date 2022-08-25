<?php

namespace Database\Seeders;

use Database\Seeders\QrtSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\EtatSeeder;
use Database\Seeders\TypeSeeder;
use Database\Seeders\FicheSeeder;
use Database\Seeders\DomaineSeeder;
use Database\Seeders\PersonneSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Ville::factory(49)->create();

        $this->call([
            RoleSeeder::class,
            TypeSeeder::class,
            DomaineSeeder::class,
            EtatSeeder::class,
            PersonneSeeder::class,
            FicheSeeder::class,
        ]);
    }
}
