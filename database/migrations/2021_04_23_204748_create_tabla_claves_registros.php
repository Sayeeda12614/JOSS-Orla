<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablaClavesRegistros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claves_registro', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('clave')->unique();
            $table->unsignedBigInteger('curso');
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
        Schema::dropIfExists('claves_registro');
    }
}
