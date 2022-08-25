<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //effacer les données existantes de
        // DB::table('role_user')->delete();
        // DB::table('users')->delete();
        // DB::table('roles')->delete();


            //creation des roles

            $roleSecretaire=Role::create([
                'nom' => 'Secretaire'
            ]);
            $roleAgent=Role::create([
                'nom' => 'Agent'
            ]);
            $roleChefService=Role::create([
                'nom' => 'Chef de service'
            ]);
            $roleDirecteur=Role::create([
                'nom' => 'Directeur'
            ]);
            $roleEtablissement=Role::create([
                'nom' => 'Etablissement'
            ]);
            $roleAdmin=Role::create([
                'nom' => 'Administrateur'
            ]);
            $roleGestionnaireAgrement=Role::create([
                'nom' => 'Gestionnaire agrement'
            ]);
            //creation des utilisateurs
        $secretaire=User::create([
            'role_id' => $roleSecretaire->id,
            'name' => "Secretaire",
            'email' =>'secretaire@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $agent=User::create([
            'role_id' => $roleAgent->id,
            'name' => "Agent",
            'email' =>'agent@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $chef=User::create([
            'role_id' => $roleChefService->id,
            'name' => "Chef de service",
            'email' =>'chef@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $directeur=User::create([
            'role_id' => $roleDirecteur->id,
            'name' => "Directeur",
            'email' =>'directeur@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $admin=User::create([
            'role_id' => $roleAdmin->id,
            'name' => "Admin",
            'email' =>'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $gestionnaireAgrement=User::create([
            'role_id' => $roleGestionnaireAgrement->id,
            'name' => "Gestionaire",
            'email' =>'gestionnaire@gmail.com',
        'password' => Hash::make('password'),
        ]);
        // $etablissement=User::create([
        //     'role_id' => $roleEtablissement->id,
        //     'name' => Str::random(10),
        //     'email' =>'admin@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);
            //attaches utilisateur role
            // $secretaire->roles()->attach($roleSecretaire);
            // $agent->roles()->attach($roleAgent);
            // $chef->roles()->attach($roleChefService);
            // $directeur->roles()->attach($roleDirecteur);
            // $admin->roles()->attach($roleAdmin);

    }
}
