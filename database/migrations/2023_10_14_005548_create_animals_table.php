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
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->integer('age')->nullable();
            $table->enum('gender', ['H', 'M'])->nullable();
            $table->string('coatColor', 50)->nullable();
            $table->decimal('weight')->nullable();
            $table->decimal('height')->nullable();
            $table->string('breed_or_type', 50)->nullable();
            $table->string('rescue_story')->nullable();
            $table->dateTime('rescue_date')->default(now());
            $table->string('health_condition')->nullable();
            $table->string('rescue_place');
            $table->boolean('is_adoptable')->default(false);
            $table->string('status', 20)->default('ABANDONED');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
