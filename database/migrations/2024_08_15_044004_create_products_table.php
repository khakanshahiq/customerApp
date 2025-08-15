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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->string('name');
            $table->string('product_image')->nullable();
            $table->string('unit')->default('kg');
            $table->string('size')->default('1kg');
            $table->string('price');
            $table->string('quantity');
            $table->foreignId('category_id')->nullable();
            $table->foreignId('subcategory_id')->nullable();
            $table->foreignId('shop_id')->nullable();
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
