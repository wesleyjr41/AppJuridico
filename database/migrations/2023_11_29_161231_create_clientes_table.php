<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('instruccion_id');
            $table->foreign('instruccion_id')->references('id')->on('instruccion');
            $table->unsignedBigInteger('ocupacion_id');
            $table->foreign('ocupacion_id')->references('id')->on('ocupacion');
            $table->unsignedBigInteger('estado_civil_id');
            $table->foreign('estado_civil_id')->references('id')->on('estado_civil');
            $table->unsignedBigInteger('nivel_ingresos_id');
            $table->foreign('nivel_ingresos_id')->references('id')->on('nivel_ingresos');
            $table->boolean('bono');
            $table->boolean('discapacidad');
            $table->unsignedBigInteger('zona_vive_id');
            $table->foreign('zona_vive_id')->references('id')->on('zona');
            $table->unsignedBigInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
