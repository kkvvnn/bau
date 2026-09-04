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
        Schema::create('aqua_collections', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('slug')->unique();
            $table->string('brand');
            $table->string('collection_in_price');
            $table->string('collection');
            $table->string('type_in_price');
            $table->integer('price_opt');
            $table->integer('price');
            $table->integer('count_decors');
            $table->float('protect_layer',8, 3);
            $table->string('tisnenie_v_register');
            $table->string('type');
            $table->string('connection');
            $table->string('faska');
            $table->string('podlozhka');
            $table->string('size');
            $table->float('fat');
            $table->integer('class');
            $table->string('count_in_pack');
            $table->float('meters_in_pack', 8, 3);
            $table->float('massa_pack');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aqua_collections');
    }
};
