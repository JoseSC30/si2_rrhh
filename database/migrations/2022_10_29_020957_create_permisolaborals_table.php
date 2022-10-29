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
        Schema::create('permisolaborals', function (Blueprint $table) {
            $table->id();
            $table->string('detalle');
            $table->time('hora');
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
        Schema::dropIfExists('permisolaborals');
    }
};
