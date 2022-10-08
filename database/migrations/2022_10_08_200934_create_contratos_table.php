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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('usuario_id')->unsigned();
            $table->bigInteger('empleado_id')->unsigned();
            $table->bigInteger('tipoContrato_id')->unsigned();
            $table->bigInteger('estadoContrato_id')->unsigned();
            $table->bigInteger('turno_id')->unsigned();
            $table->string('fecha');
            $table->string('hora');
            $table->string("latitud")->nullable();
            $table->string("longitud")->nullable();
            $table->timestamps();

            $table->foreign('usuario_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');

            $table->foreign('empleado_id')
                    ->references('id')->on('empleados')
                    ->onDelete('cascade');

            $table->foreign('tipoContrato_id')
                    ->references('id')->on('tipocontratos')
                    ->onDelete('cascade');        

            $table->foreign('estadoContrato_id')
                    ->references('id')->on('estado_contratos')
                    ->onDelete('cascade'); 

            $table->foreign('turno_id')
                    ->references('id')->on('turnos')
                    ->onDelete('cascade');                

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
};
