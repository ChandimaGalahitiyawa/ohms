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
        Schema::create('centres', function (Blueprint $table) {
            $table->id();
            $table->string('centre_name');
            $table->string('centre_contact_number');
            $table->string('centre_email_address');
            $table->string('centre_city');
            $table->string('address')->nullable();
            $table->string('centre_fee_type'); // 'flat_rate' or 'percentage'
            $table->string('centre_accept_currency'); // 'LKR' or 'USD'
            $table->decimal('centre_fee', 10, 2); // assuming a decimal type
            $table->decimal('refund_protection_fee', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centres');
    }
};
