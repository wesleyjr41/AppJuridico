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
        Schema::create('estado', function (Blueprint $table){
			$table->id();
			$table->string('nombre');
			$table->string('descripcion')->nullable();
			$table->nullableTimestamps();
		});
        Schema::create('estado_civil', function (Blueprint $table){
			$table->id();
			$table->string('nombre');
			$table->string('descripcion')->nullable();
			$table->nullableTimestamps();
		});
        Schema::create('instruccion', function (Blueprint $table){
			$table->id();
			$table->string('nombre');
			$table->string('descripcion')->nullable();
			$table->nullableTimestamps();
		});
        Schema::create('ocupacion', function (Blueprint $table){
			$table->id();
			$table->string('nombre');
			$table->string('descripcion')->nullable();
			$table->nullableTimestamps();
		});
        Schema::create('zona', function (Blueprint $table){
			$table->id();
			$table->string('nombre');
			$table->string('descripcion')->nullable();
			$table->nullableTimestamps();
		});
        Schema::create('nivel_ingresos', function (Blueprint $table){
			$table->id();
			$table->string('nombre');
			$table->string('descripcion')->nullable();
			$table->nullableTimestamps();
		});
        Schema::create('tipo_usuario', function (Blueprint $table){
			$table->id();
			$table->string('nombre');
			$table->string('descripcion')->nullable();
			$table->nullableTimestamps();
		});
        Schema::create('tipo_patrocinio', function (Blueprint $table){
			$table->id();
			$table->string('nombre');
			$table->string('descripcion')->nullable();
			$table->nullableTimestamps();
		});
        Schema::create('tipo_judicatura', function (Blueprint $table){
			$table->id();
			$table->string('nombre');
			$table->string('descripcion')->nullable();
			$table->nullableTimestamps();
		});
        Schema::create('materias', function (Blueprint $table){
			$table->id();
			$table->string('nombre');
			$table->string('descripcion')->nullable();
			$table->nullableTimestamps();
		});
        Schema::create('linea_servicios', function (Blueprint $table){
			$table->id();
			$table->string('nombre');
			$table->string('descripcion')->nullable();
			$table->nullableTimestamps();
		});
        Schema::create('derivado_por', function (Blueprint $table){
			$table->id();
			$table->string('nombre');
			$table->string('descripcion')->nullable();
			$table->nullableTimestamps();
		});
        Schema::create('estado_causa_derivada', function (Blueprint $table){
			$table->id();
			$table->string('nombre');
			$table->string('descripcion')->nullable();
			$table->nullableTimestamps();
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estado');
        Schema::dropIfExists('estado_civil');
        Schema::dropIfExists('instruccion');
        Schema::dropIfExists('ocupacion');
        Schema::dropIfExists('zona');
        Schema::dropIfExists('nivel_ingresos');
        Schema::dropIfExists('tipo_usuario');
        Schema::dropIfExists('tipo_patrocinio');
        Schema::dropIfExists('tipo_judicatura');
        Schema::dropIfExists('materias');
        Schema::dropIfExists('linea_servicios');
        Schema::dropIfExists('derivado_por');
        Schema::dropIfExists('estado_causa_derivada');

    }
};
