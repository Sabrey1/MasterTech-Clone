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
        Schema::create('product', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('productCategory');
            $table->string('name');
            $table->string('description');
            $table->string('image')->nullable();
            $table->decimal('price', 10, 2);
            $table->integer('stock');
            $table->timestamps();

            $table->foreign('productCategory')->references('id')->on('productCategory')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
