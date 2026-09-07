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
        Schema::create('aqua_stocks', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_code')->unique();
            $table->string('unit');
            $table->integer('stock_msk_germes');
            $table->integer('stock_msk_eger');
            $table->integer('stock_msk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aqua_stocks');
    }
};
