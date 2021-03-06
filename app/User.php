<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','login','perfil'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function turmas()
    {
        return $this->belongsToMany(Turma::class, 'turma_aluno', 'aluno_id', 'turma_id');
    }

    public function projetosProfessores()
    {
        return $this->belongsToMany(Projeto::class, 'projeto_professor', 'aluno_id', 'projeto_id');
    }

    public function projetosAlunos()
    {
        return $this->belongsToMany(Projeto::class, 'projeto_aluno', 'aluno_id', 'projeto_id');
    }
}
