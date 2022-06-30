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
        Schema::create('microbus', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('placa')->unique();
            $table->string('modelo');
            $table->integer('nro_asientos');
            $table->integer('nroInterno');
            $table->string('fecha_asignacion')->nullable();
            $table->string('fecha_baja')->nullable();
            $table->unsignedBigInteger('conductor_id');
            $table->unsignedBigInteger('linea_id');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('conductor_id')->on('conductor')->references('id')
            ->onDelete('cascade');
            $table->foreign('linea_id')->on('linea')->references('id')
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
        Schema::dropIfExists('microbus');
    }
};
