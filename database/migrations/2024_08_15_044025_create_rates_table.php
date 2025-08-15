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
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shop_id')->nullable();
            $table->foreignId('product_id')->nullable();
            $table->foreignId('area_id')->nullable();
            $table->string('app_rate');
            $table->string('home_delivery_rate');
            $table->string('single_item_delivery_rate');
            $table->string('total_delivery_rate');



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rates');
    }
};
