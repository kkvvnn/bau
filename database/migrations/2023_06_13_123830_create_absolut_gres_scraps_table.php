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
        Schema::create('absolut_gres_scraps', function (Blueprint $table) {
            $table->id();
            $table->string('url')->unique();
            $table->string('title');
            $table->string('title_avito');
            $table->string('available')->nullable();
            $table->string('sale')->nullable();
            $table->string('price');
            $table->string('price_old')->nullable();
            $table->string('unit');
            $table->string('brand');
            $table->string('country');
            $table->string('collection');
            $table->string('style');
            $table->string('vendor_code')->unique();
            $table->string('surface');
            $table->string('size');
            $table->integer('length');
            $table->integer('width');
            $table->string('pack_weight');
            $table->string('one_count_weight');
            $table->string('count_in_pack');
            $table->string('meters_in_pack');
            $table->string('one_count_square')->nullable();
            $table->string('picture')->nullable();
            $table->string('name_from_xml')->nullable();
            $table->string('price_from_xml')->nullable();
            $table->string('id_from_xml')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absolut_gres_scraps');
    }
};
