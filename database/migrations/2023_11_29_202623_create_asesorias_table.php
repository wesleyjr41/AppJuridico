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
        Schema::create('asesorias', function (Blueprint $table) {
            $table->id();
            //DATOS DEL USUARIO
            $table->unsignedBigInteger('cliente_id');
            $table->string('apellidos');
            $table->string('nombres');
            $table->string('identificacion');
            $table->date('fecha_nacimiento');
            $table->string('edad');
            $table->string('telefono');
            $table->string('direccion');
            $table->unsignedBigInteger('genero_id');
            $table->unsignedBigInteger('etnia_id');
            $table->unsignedBigInteger('pais_id');
            $table->unsignedBigInteger('instruccion_id');
            $table->unsignedBigInteger('ocupacion_id');
            $table->unsignedBigInteger('estado_civil_id');
            $table->unsignedBigInteger('nivel_ingresos_id');
            $table->boolean('bono');
            $table->boolean('discapacidad');
            $table->unsignedBigInteger('zona_vive_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('genero_id')->references('id')->on('generos');
            $table->foreign('etnia_id')->references('id')->on('etnias');
            $table->foreign('pais_id')->references('id')->on('pais');
            $table->foreign('instruccion_id')->references('id')->on('instruccion');
            $table->foreign('ocupacion_id')->references('id')->on('ocupacion');
            $table->foreign('estado_civil_id')->references('id')->on('estado_civil');
            $table->foreign('nivel_ingresos_id')->references('id')->on('nivel_ingresos');
            $table->foreign('zona_vive_id')->references('id')->on('zona');

            //DATOS GENERALES
            $table->unsignedBigInteger('cjga_id');
            $table->string('mes');
            $table->string('anio');
            $table->unsignedBigInteger('provincia_id');
            $table->unsignedBigInteger('ciudad_id');
            $table->string('nombres_abogado');
            $table->date('fecha_asesoria');
            $table->unsignedBigInteger('linea_servicio_id');
            $table->unsignedBigInteger('materias_id');
            $table->unsignedBigInteger('servicio_id');
            $table->unsignedBigInteger('tipo_usuario_id');
            $table->unsignedBigInteger('derivado_id');
            $table->unsignedBigInteger('estado_causa_id');
            $table->boolean('seguimiento');
            $table->boolean('patrocinio');
            $table->string('observaciones');
            $table->foreign('cjga_id')->references('id')->on('cjga');
            $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->foreign('ciudad_id')->references('id')->on('ciudades');    
            $table->foreign('linea_servicio_id')->references('id')->on('linea_servicios');
            $table->foreign('materias_id')->references('id')->on('materias');
            $table->foreign('servicio_id')->references('id')->on('servicios');
            $table->foreign('tipo_usuario_id')->references('id')->on('tipo_usuario');
            $table->foreign('derivado_id')->references('id')->on('derivado_por');
            $table->foreign('estado_causa_id')->references('id')->on('estado_causa_derivada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asesorias');
    }
};
