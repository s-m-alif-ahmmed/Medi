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
        Schema::create('product_imports', function (Blueprint $table) {
            $table->id();
            $table->string('sku')->unique();
            $table->text('description')->nullable();
            $table->string('product_length')->nullable();
            $table->string('side')->nullable();
            $table->string('color_desc')->nullable();
            $table->string('product_size')->nullable();
            $table->string('cC')->nullable();
            $table->string('cB1')->nullable();
            $table->string('cB')->nullable();
            $table->string('lmall_D1')->nullable();
            $table->string('cG')->nullable();
            $table->string('cE1')->nullable();
            $table->string('cD')->nullable();
            $table->string('lE_G')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_imports');
    }
};
