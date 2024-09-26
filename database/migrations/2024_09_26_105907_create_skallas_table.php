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
        Schema::create('skallas', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_code')->unique();
            $table->string('brand');
            $table->string('collection');
            $table->string('title');
            $table->string('slug');
            $table->string('slug_collection');
            $table->text('description')->nullable();
            $table->boolean('new')->nullable();
            $table->boolean('sale')->nullable();
            $table->integer('price_opt')->nullable();
            $table->integer('price');
            $table->integer('price_old')->nullable();
            $table->string('unit');
            $table->integer('length');
            $table->integer('width');
            $table->float('fat');
            $table->integer('count_in_pack');
            $table->float('square_in_pack', 8, 4);
            $table->float('massa_pack');
            $table->string('faska');
            $table->integer('class');
            $table->string('color')->nullable();
            $table->string('design');
            $table->json('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skallas');
    }
};
