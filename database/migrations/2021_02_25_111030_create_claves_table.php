<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claves', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('clave');
            $table->unsignedBigInteger('ciclo');
            $table->unsignedBigInteger('curso');
            $table->unsignedBigInteger('tutor');
            $table->foreign('ciclo')->references('id')->on('ciclos')->onUpdate("cascade");
            $table->foreign('curso')->references('id')->on('cursos')->onUpdate("cascade");
            $table->foreign('tutor')->references('id')->on('profesors')->onUpdate("cascade");
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
        Schema::dropIfExists('claves');
    }
}
