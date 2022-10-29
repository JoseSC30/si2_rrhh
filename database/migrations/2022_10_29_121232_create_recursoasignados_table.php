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
        Schema::create('recursoasignados', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('recurso_id')->unsigned();
            $table->bigInteger('puestolaboral_id')->unsigned();
            $table->timestamps();

            $table->foreign('recurso_id')
                    ->references('id')->on('recursos')
                    ->onDelete('cascade');

            $table->foreign('puestolaboral_id')
                    ->references('id')->on('puestolaborals')
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
        Schema::dropIfExists('recursoasignados');
    }
};
