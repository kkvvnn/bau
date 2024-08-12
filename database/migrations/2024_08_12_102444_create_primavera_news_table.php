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
        Schema::create('primavera_news', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('type');
            $table->string('title');
            $table->string('brand');
            $table->string('collection');
            $table->string('vendor_code');
            $table->string('color');
            $table->string('image_collection');
            $table->json('images');
            $table->json('for');
            $table->float('fat', 4, 2);
            $table->string('factura');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('primavera_news');
    }
};
