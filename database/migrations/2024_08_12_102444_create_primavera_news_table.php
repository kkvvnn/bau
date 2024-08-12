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
        Schema::create('primavera_news', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->string('type')->nullable();
            $table->string('title')->nullable();
            $table->string('brand')->nullable();
            $table->string('collection')->nullable();
            $table->string('vendor_code')->unique();
            $table->string('color')->nullable();
            $table->string('image_collection')->nullable();
            $table->json('images')->nullable();
            $table->json('for_room')->nullable();
            $table->float('fat')->nullable();
            $table->string('factura')->nullable();
            $table->string('for')->nullable();
            $table->string('unit')->nullable();
            $table->string('class_stoikost')->nullable();
            $table->string('surface')->nullable();
            $table->string('cover')->nullable();
            $table->string('design')->nullable();
            $table->string('country')->nullable();
            $table->text('description')->nullable();
            $table->string('shtrikhkod')->nullable();
            $table->string('form')->nullable();
            $table->string('rectificat')->nullable();
            $table->string('size_format')->nullable();
            $table->float('length')->nullable();
            $table->float('width')->nullable();
            $table->float('massa_pack')->nullable();
            $table->integer('count_in_pack')->nullable();
            $table->integer('length_pack')->nullable();
            $table->integer('width_pack')->nullable();
            $table->integer('fat_pack')->nullable();
            $table->float('square_in_pack', 8, 4)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('primavera_news');
    }
};
