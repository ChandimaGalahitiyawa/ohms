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
        Schema::create('availabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained('members')->onDelete('cascade');
            $table->string('pattern_type'); // daily, weekly, monthly, custom
            $table->json('pattern'); // Holds details like days of the week or specific dates
            $table->boolean('all_day')->default(false); // True if available all day
            $table->json('time_slots')->nullable(); // Holds specific time slots if not all day
            $table->boolean('status')->default(true); // Active or inactive
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('availabilities');
    }
};
