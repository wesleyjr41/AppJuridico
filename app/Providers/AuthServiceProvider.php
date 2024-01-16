<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

    Gate::define('Administrador', function ($user) {

        return $user->roles->contains('nombre', 'Administrador');
        dd($user->roles->contains('name', 'Administrador'));
    });

    Gate::define('Secretaria', function ($user) {
        return $user->roles->contains('nombre', 'Secretaria');
    });

    Gate::define('Abogada', function ($user) {
        return $user->roles->contains('nombre', 'Abogada');
    });

    Gate::define('Auxiliar', function ($user) {
        return $user->roles->contains('nombre', 'Auxiliar');
    });
    }
}
