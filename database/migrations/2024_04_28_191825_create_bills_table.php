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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')->constrained()->onDelete('cascade'); 
            $table->decimal('consultation_fee', 8, 2);  
            $table->decimal('centre_fee', 8, 2)->nullable(); // If applicable 
            $table->decimal('refund_protection_fee', 8, 2)->nullable();
            $table->decimal('total_amount', 8, 2);
            $table->string('currency');
            $table->string('status')->default('unpaid'); // unpaid, paid, partially_paid, etc.
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
