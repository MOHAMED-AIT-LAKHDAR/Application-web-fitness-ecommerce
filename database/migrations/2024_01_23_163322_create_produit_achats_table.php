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
        Schema::create('produit_achats', function (Blueprint $table) {
            $table->id();
            $table->string('reference_achat');
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
        Schema::dropIfExists('produit_achats');
    }
};
