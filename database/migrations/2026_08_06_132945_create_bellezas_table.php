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
        Schema::create('bellezas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('title_rus');
            $table->string('slug');
            $table->string('brand');
            $table->string('code')->unique();
            $table->string('vendor_code');
            $table->string('country');
            $table->string('unit');
            $table->string('count_in_pack');
            $table->string('collection');
            $table->boolean('sale');
            $table->boolean('byOrder');
            $table->boolean('novelty');
            $table->boolean('TradeOnlyPack');
            $table->boolean('CollectionNovelty');
            $table->boolean('Rectified');
            $table->boolean('Frost_resistance');
            $table->boolean('Suitable_for_heated_floors');
            $table->integer('price');
            $table->integer('price_opt');
            $table->string('size');
            $table->integer('length');
            $table->integer('width');
            $table->float('thickness');
            $table->string('color');
            $table->string('type');
            $table->float('stock');
            $table->float('stock_reserv');
            $table->float('stock_all');
            $table->float('units_m2');
            $table->float('units_pallet');
            $table->float('units_pack');
            $table->float('units_one');
            $table->float('weight');
            $table->boolean('isTrash');
            $table->json('images');
            $table->json('Expected');
            $table->string('name_rus');
            $table->string('image_1');
            $table->string('image_2');
            $table->string('itemCategory');
            $table->string('surface');
            $table->string('surface_2');
            $table->string('image_collection');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bellezas');
    }
};
