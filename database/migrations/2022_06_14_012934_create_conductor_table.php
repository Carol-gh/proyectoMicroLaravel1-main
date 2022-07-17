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
        Schema::create('conductor', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('ci')->unique();
            $table->string('fecha_nacimiento');
            $table->string('telefono');
            $table->string('categoria_lic');
            $table->string('foto')->nullable();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('microbus_id');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('users_id')->on('users')->references('id')
            ->onDelete('cascade');
  
            $table->foreign('microbus_id')->on('microbus')->references('id')
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
        Schema::dropIfExists('conductor');
    }
};
