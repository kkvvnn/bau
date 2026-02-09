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
        Schema::create('global_tile_price_stocks', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_code')->unique();
            $table->string('unit')->nullable();
            $table->string('status')->nullable();
            $table->string('format')->nullable();
            $table->string('count_in_pack')->nullable();
            $table->string('weight_pack')->nullable();
            $table->integer('price');
            $table->integer('price_rbc');
            $table->float('stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('global_tile_price_stocks');
    }
};
