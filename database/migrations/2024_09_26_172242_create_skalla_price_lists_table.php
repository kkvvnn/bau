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
        Schema::create('skalla_price_lists', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_code')->unique();
            $table->integer('price_opt');
            $table->integer('price');
            $table->integer('price_old')->nullable();
            $table->boolean('sale')->nullable();
            $table->boolean('new')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skalla_price_lists');
    }
};
