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
        Schema::create('product_buys', function (Blueprint $table) {
            $table->id();
            $table->string('reference_buy');
            $table->integer('product_id');
            $table->decimal('price_unity');
            $table->integer('quantity');
            $table->decimal('price_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_buys');
    }
};
