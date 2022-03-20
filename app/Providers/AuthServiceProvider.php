<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\User' => 'App\Policies\UserPolicy',
        'App\Models\Cuenta' => 'App\Policies\CuentaPolicy',
        'App\Models\Juzgado' => 'App\Policies\JuzgadoPolicy',
        'App\Models\TipoDocumento' => 'App\Policies\TipoDocumentoPolicy',
        'App\Models\TipoCarpeta' => 'App\Policies\TipoCarpetaPolicy',
        'App\Models\Fuero' => 'App\Policies\FueroPolicy',
        'App\Models\Carpeta' => 'App\Policies\CarpetaPolicy',
//        \App\Models\Documento::class => \App\Policies\DocumentoPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
