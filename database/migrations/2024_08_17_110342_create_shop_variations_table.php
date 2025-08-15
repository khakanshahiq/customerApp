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
        Schema::create('shop_variations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable();
            $table->string('price');
            $table->string('quantity')->nullable();
            $table->foreignId('shop_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_variations');
    }
};
