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
        Schema::create('empleosolicituds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('puestolaboral_id')->unsigned();
            $table->string('nombre');
            $table->string('email');
            $table->string('link_cv');
            $table->string('valoracion');
            
            $table->timestamps();

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
        Schema::dropIfExists('empleosolicituds');
    }
};
