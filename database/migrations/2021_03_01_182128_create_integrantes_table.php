<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntegrantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('integrantes', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('foto');
            $table->enum('tipo', ['profesor','alumno'])->default('alumno');
            $table->unsignedBigInteger('tutor')->nullable();
            $table->unsignedBigInteger('ciclo');
            $table->unsignedBigInteger('curso');
            $table->foreign('tutor')->references('id')->on('users')->onUpdate("cascade");
            $table->foreign('ciclo')->references('id')->on('ciclos')->onUpdate("cascade");
            $table->foreign('curso')->references('id')->on('cursos')->onUpdate("cascade");
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
        Schema::dropIfExists('integrantes');
    }
}
