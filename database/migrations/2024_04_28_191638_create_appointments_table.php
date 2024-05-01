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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->foreignId('member_id')->constrained()->onDelete('cascade'); // Doctor's ID
            $table->foreignId('centre_id')->constrained()->onDelete('cascade');
            $table->string('queue_no')->nullable();
            $table->dateTime('appointment_time');
            $table->decimal('center_charge', 8, 2);
            $table->decimal('doctor_charge', 8, 2);
            $table->date('appointment_date')->nullable();
            $table->string('status')->default('scheduled'); // Examples: scheduled, completed, cancelled
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
