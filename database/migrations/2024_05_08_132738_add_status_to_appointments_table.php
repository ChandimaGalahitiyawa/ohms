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
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        // Create the new status column as enum
        Schema::table('appointments', function (Blueprint $table) {
            $table->enum('status', ['pending', 'ongoing', 'completed'])->default('pending');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('appointments', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        // Recreate the old status column
        Schema::table('appointments', function (Blueprint $table) {
            $table->string('status')->default('scheduled');
        });
    }
};
