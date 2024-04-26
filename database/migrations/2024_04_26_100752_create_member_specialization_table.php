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
        Schema::create('member_specialization', function (Blueprint $table) {
            $table->foreignId('member_id')->constrained('members')->onDelete('cascade');
            $table->foreignId('specialization_id')->constrained('specializations')->onDelete('cascade');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member_specialization');
    }
};
