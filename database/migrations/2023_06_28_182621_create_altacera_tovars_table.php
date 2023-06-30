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
        Schema::create('altacera_tovars', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('tovar');
            $table->string('category_id');
            $table->string('tovar_id');
            $table->string('artikul');
            $table->string('deleted');
            $table->string('archive');
            $table->string('action');
            $table->string('status');
            $table->string('not_unload');
            $table->string('not_unload_site');
            $table->string('collection_item');
            $table->string('number_of_patterns');
            $table->string('country');
            $table->string('surface_type');
            $table->integer('height');
            $table->integer('width');
            $table->integer('thickness');
            $table->string('name_for_site');
            $table->string('Рельеф');
            $table->string('Ректификация');
            $table->string('Износостойкость');
            $table->string('is_Delacora_Big_Format');
            $table->string('sale');
            $table->string('balance_zero');
            $table->string('is_small_amount');
            $table->json('units');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('altacera_tovars');
    }
};
