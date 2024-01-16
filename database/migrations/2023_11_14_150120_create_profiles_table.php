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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('apellidos');
            $table->string('nombres');
            $table->string('identificacion');
            $table->date('fecha_nacimiento');
            $table->string('edad');
            $table->string('telefono');
            $table->string('direccion');
            //genero
            $table->unsignedBigInteger('genero_id');
            $table->foreign('genero_id')->references('id')->on('generos');
            //etnia
            $table->unsignedBigInteger('etnia_id');
            $table->foreign('etnia_id')->references('id')->on('etnias');
            //pais
            $table->unsignedBigInteger('pais_id');
            $table->foreign('pais_id')->references('id')->on('pais');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
