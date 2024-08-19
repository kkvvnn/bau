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
        Schema::create('kerranovas', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_code')->unique();
            $table->string('vendor_code_short');
            $table->string('category');
            $table->string('brand');
            $table->string('collection');
            $table->string('title');
            $table->string('format');
            $table->integer('length');
            $table->integer('width');
            $table->integer('fat');
            $table->string('unit');
            $table->string('color');
            $table->string('design');
            $table->string('surface_code');
            $table->string('surface');
            $table->string('rectificat');
            $table->float('massa_one_meter');
            $table->float('square_in_pack');
            $table->json('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerranovas');
    }
};
