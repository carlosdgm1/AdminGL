<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('telefono');
            $table->string('ine');
            $table->string('motivo');
            $table->string('placa');
            $table->string('fraccionamiento');
            $table->string('placa_foto')->nullable();
            $table->string('ine_foto')->nullable();
            $table->string('cara_foto')->nullable();
            $table->date('fecha');
            $table->unsignedBigInteger('idr')->nullable();
            $table->foreign('idr')->references('id')->on('residentes');
            $table->string('estatus');
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
        Schema::dropIfExists('visitantes');
    }
}
