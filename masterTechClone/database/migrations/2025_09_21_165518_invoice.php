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
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_id'); // reference to sale
            $table->unsignedBigInteger('payment_id'); // reference to payment type
            $table->string('invoice_number')->unique(); // invoice number
            $table->date('invoice_date'); // date of invoice
            $table->decimal('amount_due', 15, 2); // total amount due
            $table->decimal('amount_paid', 15, 2)->default(0); // amount paid
            $table->enum('status', ['pending', 'paid', 'partial'])->default('pending'); // payment status
            $table->timestamps();

            // Foreign key
            $table->foreign('sale_id')
                  ->references('id')
                  ->on('sale')
                  ->onDelete('cascade'); // delete invoice if sale is deleted

            $table->foreign('payment_id')
                  ->references('id')
                  ->on('payment')
                  ->onDelete('cascade'); // delete invoice if payment is deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice');
    }
};
