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
        Schema::create('emperos', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_code')->unique();
            $table->string('title');
            $table->integer('price')->nullable();
            $table->string('collection')->nullable();
            $table->string('brand')->nullable();
            $table->string('size')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('fat')->nullable();
            $table->integer('stock')->nullable();
            $table->integer('stock_real')->nullable();
            $table->string('square_one')->nullable();
            $table->json('images')->nullable();
            $table->json('img_collection')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emperos');
    }
};
