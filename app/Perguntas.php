<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Question\Question;

class Perguntas extends Model
{
    protected $table ='perguntas';
    protected $fillable = ['name', 'description', 'creator_id'];

    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'name' => $this->name, 'type' => __('perguntas.perguntas'),
        ]);
        $link = '<a href="'.route('perguntas.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->name;
        $link .= '</a>';

        return $link;
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function questionarios()
    {
        return $this->belongsToMany(Questionario::class, 'questionario_pergunta', 'pergunta_id', 'questonario_id');
    }
}
