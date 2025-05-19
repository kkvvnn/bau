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
        Schema::create('azarios', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_code')->unique();
            $table->string('category');
            $table->string('brand');
            $table->string('country');
            $table->string('title');
            $table->string('slug');
            $table->string('size');
            $table->integer('width');
            $table->integer('length');
            $table->integer('thickness');
            $table->string('unit');
            $table->string('surface');
            $table->string('color');
            $table->string('design')->nullable();
            $table->json('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('azarios');
    }
};
