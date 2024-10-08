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
        Schema::create('keramopros', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_code')->unique();
            $table->string('code');
            $table->string('type');
            $table->string('title');
            $table->string('collection');
            $table->string('brand');
            $table->string('country');
            $table->string('url');
            $table->string('currency');
            $table->integer('price_opt');
            $table->integer('price');
            $table->string('unit');
            $table->float('balance');
            $table->string('format');
            $table->integer('length');
            $table->integer('width');
            $table->integer('fat');
            $table->string('surface');
            $table->string('color');
            $table->string('design');
            $table->string('main_image');
            $table->json('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keramopros');
    }
};
