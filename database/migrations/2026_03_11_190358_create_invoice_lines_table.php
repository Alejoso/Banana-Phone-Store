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
        Schema::create('invoice_lines', function (Blueprint $table) {
            $table->id();
            $table->integer('unit_price');
            $table->integer('discount');
            $table->integer('quantity');
            $table->string('reason');
            $table->foreignId('invoice_id')->constrained('invoices')->onDelete('cascade');
            // $table->foreignId('phone_id')->constrained('phones')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_lines');
    }
};
