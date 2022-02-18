<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPanelesToArduinoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('arduino', function (Blueprint $table) {
            $table->integer('panel');
            $table->integer('puerto');
            $table->string('nonc');
            $table->string('nombre')->nullable;
            $table->dropColumn('estatus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('residentes', function (Blueprint $table) {
            //
        });
    }
}
