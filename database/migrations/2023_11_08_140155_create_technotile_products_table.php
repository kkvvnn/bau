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
            $table->string('available')->nullable();
            $table->string('url')->nullable();
            $table->integer('price')->nullable();
            $table->string('category_id')->nullable();
            $table->string('picture')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('country')->nullable();
            $table->string('collection')->nullable();
            $table->string('surface_type')->nullable();
            $table->string('surface_faktura')->nullable();
            $table->string('color')->nullable();
            $table->integer('length')->nullable();
            $table->integer('width')->nullable();
            $table->string('fat')->nullable();
            $table->string('in_pallet_m2')->nullable();
            $table->string('pallet_massa_kg')->nullable();
            $table->string('in_box_m2')->nullable();
            $table->string('box_massa_kg')->nullable();
            $table->integer('count_in_box')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technotile_products');
    }
};
