<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Questionario extends Model
{
    protected $fillable = ['name', 'Turma_id', 'creator_id'];

    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'name' => $this->name, 'type' => __('questionario.questionario'),
        ]);
        $link = '<a href="'.route('questionarios.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->name;
        $link .= '</a>';

        return $link;
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function perguntas()
    {
        return $this->belongsToMany(Perguntas::class, 'questionario_pergunta', 'questonario_id', 'pergunta_id');
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class, 'turma_id', 'id');
    }
}
