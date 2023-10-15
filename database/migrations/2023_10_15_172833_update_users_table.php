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
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname');
            $table->string('user')->unique();
            $table->timestamp('user_verified_at')->nullable();
            $table->string('dni');
            $table->string('phone');
            $table->date('birthdate');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
            $table->dropColumn('user');
            $table->dropColumn('user_verified_at');
            $table->dropColumn('dni');
            $table->dropColumn('phone');
            $table->dropColumn('birthdate');
        });
    }
};
