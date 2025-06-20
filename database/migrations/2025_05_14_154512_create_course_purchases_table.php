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
        Schema::create('course_purchases', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_code')->unique();
            $table->dateTime('purchase_date');
            $table->integer('total_paid');
            $table->integer('mentor_commission');
            $table->integer('admin_commission');
            $table->enum('status', ['pending', 'verified'])->default('pending');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // $table->foreignId('mentor_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_purchases');
    }
};
