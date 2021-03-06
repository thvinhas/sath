<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $fillable = ['name', 'description', 'creator_id'];

    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'name' => $this->name, 'type' => __('turno.turno'),
        ]);
        $link = '<a href="'.route('turnos.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->name;
        $link .= '</a>';

        return $link;
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function turmas()
    {
        return $this->hasMany(Turma::class);
    }
}
