<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = ['name', 'creator_id'];

    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'name' => $this->name, 'type' => __('curso.curso'),
        ]);
        $link = '<a href="'.route('cursos.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->name;
        $link .= '</a>';

        return $link;
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
