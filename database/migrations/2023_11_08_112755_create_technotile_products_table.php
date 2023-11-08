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
        Schema::create('technotile_products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('available');
            $table->string('url');
            $table->integer('price');
            $table->string('category_id');
            $table->string('picture');
            $table->string('name');
            $table->string('description');
            $table->string('country');
            $table->string('collection');
            $table->string('surface_type');
            $table->string('surface_faktura');
            $table->string('color');
            $table->integer('length');
            $table->integer('width');
            $table->string('fat');
            $table->string('in_pallet_m2');
            $table->string('pallet_massa_kg');
            $table->string('in_box_m2');
            $table->string('box_massa_kg');
            $table->integer('count_in_box');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
