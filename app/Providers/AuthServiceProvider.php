<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-text', function($user){
              return  $user->isTextManager();
        });
        Gate::define('manage-consommateur', function($user){
            return  $user->isConsommateurManager();
      });
// etablissement
        Gate::define('etablissement', function($user){
            return  $user->isEtablissement();
      });
      Gate::define('manage-audit', function($user){
        return  $user->isAuditManager();
        });
        Gate::define('manage-auditeur', function($user){
            return  $user->isAuditeurManager();
        });

        //
    }

}
