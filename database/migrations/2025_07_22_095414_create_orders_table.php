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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();
            $table->foreignId('product_id')->nullable()->constrained('products')->onDelete('cascade');
            $table->foreignId('product_query_id')->nullable()->constrained('product_imports')->onDelete('cascade');
            $table->string('sku')->nullable();
            $table->string('email')->nullable();
            $table->string('additional_note')->nullable();
            $table->string('leg')->nullable();
            $table->string('side')->nullable();
            $table->string('color_desc')->nullable();
            $table->string('cc')->nullable();
            $table->string('cb1')->nullable();
            $table->string('cb')->nullable();
            $table->string('lower_length')->nullable();
            $table->string('cg')->nullable();
            $table->string('ce1')->nullable();
            $table->string('cd')->nullable();
            $table->string('upper_length')->nullable();
            $table->enum('status',['Pending', 'Completed', 'Cancelled'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
