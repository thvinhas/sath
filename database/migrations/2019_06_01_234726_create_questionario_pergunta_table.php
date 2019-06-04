<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionarioPerguntaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionario_pergunta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('questonario_id');
            $table->unsignedBigInteger('pergunta_id');

            $table->foreign('questonario_id')->references('id')->on('questionarios')->onDelete('cascade');
            $table->foreign('pergunta_id')->references('id')->on('perguntas')->onDelete('cascade');
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
        Schema::dropIfExists('questionario_pergunta');
    }
}
