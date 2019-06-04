<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    protected $fillable = ['name', 'description', 'creator_id', 'turma_id'];

    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'name' => $this->name, 'type' => __('projeto.projeto'),
        ]);
        $link = '<a href="'.route('projetos.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->name;
        $link .= '</a>';

        return $link;
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class);
    }

    public function professores()
    {
        return $this->belongsToMany(User::class, 'projeto_professor', 'projeto_id', 'aluno_id')->withPivot('media');
    }

    public function alunos()
    {
        return $this->belongsToMany(User::class, 'projeto_aluno', 'projeto_id', 'aluno_id');
    }
}
