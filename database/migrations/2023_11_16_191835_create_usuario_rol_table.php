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
        Schema::create('role_user', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->bigInteger('role_id')->unsigned();
			$table->unsignedBigInteger('user_id');
            
			$table->foreign('role_id')->references('rolid')->on('roles');
            $table->foreign('user_id')->references('id')->on('users');
			$table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_user');
    }
};
