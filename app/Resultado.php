<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    protected $table = 'resposta';
    protected $fillable = ['pergunta_id', 'Questionario_id', 'Aluno_id', 'resposta'];
    public $timestamps = false;
}



