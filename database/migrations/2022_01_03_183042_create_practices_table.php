<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practices', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('calificacion')->nullable();
            $table->string('observacion')->nullable();
            $table->string('informe')->nullable();
            $table->string('resolucion')->nullable();
            $table->string('comentario')->nullable();
            $table->string('estado');
            $table->unsignedBigInteger('idinscripcion');
            $table->foreign('id')->references('id')->on('inscriptions');
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
        Schema::dropIfExists('practices');
    }
}
