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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->integer('user_id');
            $table->integer('transaction_total');
            $table->string('transaction_status');
            $table->string('bank_name');
            $table->string('courier');
            $table->string('va_number');
            $table->string('payment_type');
            $table->string('payment_url');
            $table->string('payment_token');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
