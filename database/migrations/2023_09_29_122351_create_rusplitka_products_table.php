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
        Schema::create('rusplitka_products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('collection_id')->nullable();
            $table->json('picture')->nullable();
            $table->string('url')->nullable();
            $table->string('external_id')->nullable();
            $table->string('name')->nullable();
            $table->string('articul')->nullable();
            $table->string('svoystvo')->nullable();
            $table->string('size_a')->nullable();
            $table->string('size_b')->nullable();
            $table->string('unit')->nullable();
            $table->string('currency')->nullable();
            $table->string('weight')->nullable();
            $table->string('in_pack_sht')->nullable();
            $table->string('in_pack_m2')->nullable();
            $table->string('thickness')->nullable();
            $table->string('surface')->nullable();
            $table->string('country_of_origin')->nullable();
            $table->string('brand_name')->nullable();
            $table->integer('price')->nullable();
            $table->integer('price_rozn')->nullable();
            $table->string('rest_skald_ljubercy')->nullable();
            $table->string('rest_skald_ljubercy_rezerv')->nullable();
            $table->string('rest_skald_bronnicy')->nullable();
            $table->string('rest_skald_bronnicy_rezerv')->nullable();
            $table->string('rest_real_free')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rusplitka_products');
    }
};
