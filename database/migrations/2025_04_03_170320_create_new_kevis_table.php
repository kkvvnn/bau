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
        Schema::create('new_kevis', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('brand');
            $table->string('collection');
            $table->string('category');
            $table->integer('price');
            $table->integer('price_opt')->nullable();
            $table->integer('price_old')->nullable();
            $table->string('country');
            $table->string('surface');
            $table->string('unit');
            $table->string('size');
            $table->integer('width');
            $table->integer('length');
            $table->integer('thickness');
            $table->string('rectified');
            $table->integer('count_in_pack');
            $table->float('meters_in_pack');
            $table->string('design');
            $table->string('color');
            $table->string('images')->nullable();
            $table->string('videos')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_kevis');
    }
};
