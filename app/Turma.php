<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $fillable = ['name', 'description', 'creator_id', 'turno_id', 'semestre_id', 'curso_id'];

    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'name' => $this->name, 'type' => __('turma.turma'),
        ]);
        $link = '<a href="'.route('turmas.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->name;
        $link .= '</a>';

        return $link;
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function turno()
    {
        return $this->belongsTo(Turno::class);
    }

    public function semestre()
    {
        return $this->belongsTo(Semestre::class);
    }

    public function alunos()
    {
        return $this->belongsToMany(User::class, 'turma_aluno', 'turma_id', 'aluno_id');
    }

    public function projetos()
    {
        return $this->hasMany(Projeto::class);
    }

    public function questionarios()
    {
        return $this->hasMany(Questionario::class, 'turma_id', 'id');
    }
}
