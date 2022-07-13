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
        Schema::create('micro_conductor', function (Blueprint $table) {
            $table->id();
            $table->string('fecha');
            $table->unsignedBigInteger('conductor_id');
            $table->unsignedBigInteger('micro_id');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('conductor_id')->on('conductor')->references('id')
            ->onDelete('cascade');
            $table->foreign('micro_id')->on('microbus')->references('id')
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
        Schema::dropIfExists('micro_conductor');
    }
};
