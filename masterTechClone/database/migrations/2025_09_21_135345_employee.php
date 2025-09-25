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
        Schema::create('employees',function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->string('image')->nullable();
            $table->date('dob')->nullable();
            $table->string('email')->unique();
            $table->string('phoneNumber')->unique();
            $table->string('address');
            $table->date('hireDate');
            $table->string('position');
            $table->decimal('salary', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
