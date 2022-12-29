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
        Schema::create('sueldos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('empleado_id')->unsigned();
            $table->double('monto', 8, 2)->nullable()->default(123.4567);
            $table->date('fecha');
            $table->time('hora');
            $table->timestamps();

            $table->foreign('empleado_id')
            ->references('id')->on('empleados')
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
        Schema::dropIfExists('sueldos');
    }
};
