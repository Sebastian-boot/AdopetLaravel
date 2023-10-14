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
        Schema::create('animal_vaccine', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('animal_id');
            $table->unsignedBigInteger('vaccine_id');
            $table->date('apply_date')->default(now());
            $table->string('observations')->nullable();
            $table->string('administered_by', 30);
            $table->timestamps();

            $table->foreign('animal_id')
                ->references('id')->on('animals')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('vaccine_id')
                ->references('id')->on('vaccines')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animal_vaccine');
    }
};
