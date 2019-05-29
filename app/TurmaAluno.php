<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TurmaAluno extends Model
{
    protected $table ='perguntas';
    protected $fillable = ['turma_id', 'aluno_id'];
}
