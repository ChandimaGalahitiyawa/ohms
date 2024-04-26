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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('last_name');
            $table->string('nic')->nullable();
            $table->string('phone')->nullable();
            $table->string('nationality')->default('Local');
            $table->string('passport')->nullable();
            $table->date('dob')->nullable();
            $table->string('address')->nullable();
            $table->string('medical_school')->nullable();
            $table->string('license_number')->nullable();
            $table->string('')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
