<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    protected $fillable = ['name', 'description', 'creator_id'];

    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'name' => $this->name, 'type' => __('semestre.semestre'),
        ]);
        $link = '<a href="'.route('semestres.show', $this).'"';
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
