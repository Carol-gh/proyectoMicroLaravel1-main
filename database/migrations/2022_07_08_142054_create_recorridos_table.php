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
        Schema::create('recorridos', function (Blueprint $table) {
            $table->id();
            $table->string('fecha')->nullable();
            $table->string('horaSalida');
            $table->string('horaLLegada')->nullable();
            $table->double('latitud')->nullable();
            $table->double('longitud')->nullable();
            $table->string('tiempo')->nullable();
            $table->string('retraso')->default('0');
            $table->string('tipo');
            $table->string('estado')->default('activo');
            $table->unsignedBigInteger('conductor_id');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('conductor_id')->on('conductor')->references('id')
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
        Schema::dropIfExists('recorridos');
    }
};
