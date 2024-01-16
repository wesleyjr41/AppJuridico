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
        Schema::create('patrocinio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asesoria_id');
            $table->foreign('asesoria_id')->references('id')->on('asesorias');
            $table->string('nombres_abogado');
            $table->date('fecha_asignacion_causa');
            $table->unsignedBigInteger('tipo_patrocinio_id');
            $table->foreign('tipo_patrocinio_id')->references('id')->on('tipo_patrocinio');
            $table->unsignedBigInteger('tipo_judicatura_id');
            $table->foreign('tipo_judicatura_id')->references('id')->on('tipo_judicatura');
            $table->string('numero_juzgado');
            $table->string('nombre_juez');
            $table->string('numero_causa');
            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')->references('id')->on('estado');
            $table->boolean('resolución_judicial');
            $table->date('fecha_resolucion');
            $table->string('observacion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patrocinio');
    }
};
