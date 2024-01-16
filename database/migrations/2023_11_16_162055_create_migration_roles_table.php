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
        Schema::create('roles', function (Blueprint $table){
			$table->bigIncrements('rolid');
			$table->string('nombre');
			$table->string('descripcion');
			$table->nullableTimestamps();
		});
        Schema::create('modulos', function (Blueprint $table){
			$table->bigIncrements('moduloid');
			$table->string('nombre');
			$table->string('ruta');
			$table->nullableTimestamps();
		});
        Schema::create('permisos', function (Blueprint $table){
			$table->bigIncrements('permisoid');
			$table->string('nombre');
			$table->string('nombreLaravel');
			$table->string('color');
			$table->nullableTimestamps();
		});
		Schema::create('moduloPermiso', function (Blueprint $table){
			$table->bigIncrements('modulopermisoid');
			$table->bigInteger('moduloid')->unsigned();
			$table->bigInteger('permisoid')->unsigned();
			$table->foreign('permisoid')->references('permisoid')->on('permisos');
			$table->foreign('moduloid')->references('moduloid')->on('modulos');
			$table->nullableTimestamps();
		});
		Schema::create('rolModuloPermiso', function (Blueprint $table){
			$table->bigIncrements('rolmodulopermisoid');
			$table->bigInteger('rolid')->unsigned();
			$table->bigInteger('modulopermisoid')->unsigned();
			$table->foreign('rolid')->references('rolid')->on('roles');
			$table->foreign('modulopermisoid')->references('modulopermisoid')->on('moduloPermiso');
			$table->nullableTimestamps();
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('rolModuloPermiso');
		Schema::drop('moduloPermiso');
		Schema::drop('permisos');
		Schema::drop('modulos');
		Schema::drop('roles');
    }
};
