<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id();
            $table->time('hora_llegada');
            $table->time('hora_salida');
            $table->date('fecha');
            $table->timestamps();

            $table->bigInteger('usuariomovil_id')->unsigned();

            $table->foreign('usuariomovil_id')
            ->references('id')->on('usuariomovils')
            ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asistencias');
    }
};
