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
        Schema::create('coordenada', function (Blueprint $table) {
            $table->id();
            $table->double('longitud');
            $table->double('latitud');
            $table->unsignedBigInteger('ruta_id');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('ruta_id')->on('ruta')->references('id')
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
        Schema::dropIfExists('coordenadas');
    }
};
