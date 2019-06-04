<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetoProfessorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projeto_professor', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('projeto_id');
            $table->unsignedBigInteger('aluno_id');
            $table->float('media',2,2);

            $table->foreign('projeto_id')->references('id')->on('projetos')->onDelete('cascade');
            $table->foreign('aluno_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projeto_professor');
    }
}
