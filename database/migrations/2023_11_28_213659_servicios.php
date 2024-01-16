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
        Schema::create('categoria_servicios', function (Blueprint $table){
			$table->id();
			$table->unsignedBigInteger('linea_servicio_id');
            $table->foreign('linea_servicio_id')->references('id')->on('linea_servicios');
			$table->string('nombre');
			$table->string('descripcion')->nullable();
			$table->nullableTimestamps();
		});
        Schema::create('servicios', function (Blueprint $table){
			$table->id();
			$table->unsignedBigInteger('categoria_servicios_id');
            $table->foreign('categoria_servicios_id')->references('id')->on('categoria_servicios');
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
        Schema::dropIfExists('categoria_servicios');
        Schema::dropIfExists('servicios');
    }
    
};
