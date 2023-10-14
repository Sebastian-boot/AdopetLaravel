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
            $table->enum('gender', ['F', 'M'])->nullable();
            $table->string('coat_color', 50)->nullable();
            $table->decimal('weight')->nullable();
            $table->decimal('height')->nullable();
            $table->string('breed_or_type', 50)->nullable();
            $table->string('rescue_history')->nullable();
            $table->dateTime('rescue_date')->default(now()->format('Y-m-d\TH:i'));
            $table->string('health_condition')->nullable();
            $table->string('rescue_place');
            $table->boolean('is_adoptable')->default(false);
            $table->unsignedBigInteger('animal_status_id')->nullable();
            $table->timestamps();

            $table->foreign('animal_status_id')
                ->references('id')->on('animal_states')
                ->onDelete('set null')
                ->onUpdate('cascade');
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
