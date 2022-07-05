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
        Schema::create('ubicacion', function (Blueprint $table) {
            $table->id();
            $table->double('latitud');
            $table->double('longitud');
            $table->string('distancia')->nullable();
            $table->unsignedBigInteger('micro_id');
            $table->unsignedBigInteger('recorrido_id');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('micro_id')->on('microbus')->references('id')
            ->onDelete('cascade');
            $table->foreign('recorrido_id')->on('recorridos')->references('id')
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
        Schema::dropIfExists('ubicacion');
    }
};
