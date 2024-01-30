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
        Schema::create('pixmosaic_news', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_code')->unique();
            $table->string('title')->nullable();
            $table->string('title2')->nullable();
            $table->integer('price')->nullable();
            $table->string('stock')->nullable();
            $table->string('size_tile')->nullable();
            $table->string('size_chip')->nullable();
            $table->string('fat')->nullable();
            $table->string('osnova')->nullable();
            $table->string('material')->nullable();
            $table->string('surface')->nullable();
            $table->string('square_list')->nullable();
            $table->string('img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pixmosaic_news');
    }
};
