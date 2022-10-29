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
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('empleado_id')->unsigned();
            $table->string('telefono_uno');
            $table->string('telefono_dos');
            $table->string('email_uno');
            $table->string('email_dos');
            $table->string('redsocial_uno');
            $table->string('redsocial_dos');
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
        Schema::dropIfExists('contactos');
    }
};
