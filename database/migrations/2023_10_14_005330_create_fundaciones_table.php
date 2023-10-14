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
        Schema::create('fundaciones', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('introduction');
            $table->string('history');
            $table->string('email');
            $table->string('phone');
            $table->string('website');
            $table->string('nit');
            $table->integer('employeeCount');
            $table->string('FoundationFoundingDate');
            $table->integer('animalsAssitedCount');
            $table->integer('currentAnimalAssitedCount');
            $table->integer('limitAnimalAssitedCount');
            $table->integer('foundationrating');
            $table->timestamps();
        });
    }

    /**
     * 
     */
    public function down(): void
    {
        Schema::dropIfExists('fundaciones');
    }
};
