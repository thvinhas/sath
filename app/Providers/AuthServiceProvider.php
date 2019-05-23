<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Projeto' => 'App\Policies\ProjetoPolicy',
        'App\Turma' => 'App\Policies\TurmaPolicy',
        'App\Perguntas' => 'App\Policies\PerguntasPolicy',
        'App\Turno' => 'App\Policies\TurnoPolicy',
        'App\Semestre' => 'App\Policies\SemestrePolicy',
        'App\Curso' => 'App\Policies\CursoPolicy',
        // 'App\Model' => 'App\Policies\ModelPolicy',
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
