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
        Schema::create('global_tiles', function (Blueprint $table) {
            $table->id();
            $table->integer('code');
            $table->string('title');
            $table->string('vn_id');
            $table->string('vendor_code')->unique();
            $table->string('brand')->nullable();
            $table->string('collection')->nullable();
            $table->float('length', 8, 4)->nullable();
            $table->float('width',8,4)->nullable();
            $table->string('frost_resistance')->nullable();
            $table->integer('count_in_pack')->nullable();
            $table->float('meters_in_pack', 8, 4)->nullable();
            $table->string('material')->nullable();
            $table->string('for')->nullable();
            $table->string('type')->nullable();
            $table->string('design')->nullable();
            $table->string('format_collection')->nullable();
            $table->string('country')->nullable();
            $table->string('surface')->nullable();
            $table->string('unit')->nullable();
            $table->float('massa_pack', 8, 4)->nullable();
            $table->float('fat', 8, 4)->nullable();
            $table->string('color')->nullable();
            $table->float('balance', 8, 4)->nullable();
            $table->integer('price')->nullable();
            $table->string('status')->nullable();
            $table->string('effects')->nullable();
            $table->string('rectificat')->nullable();
            $table->string('relief')->nullable();
            $table->string('image_collection')->nullable();
            $table->json('images')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('global_tiles');
    }
};
