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
        Schema::create('art_centre_news', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('vendor_code')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('brand')->nullable();
            $table->string('collection')->nullable();
            $table->string('material')->nullable();
            $table->string('for')->nullable();
            $table->string('surface')->nullable();
            $table->string('size')->nullable();
            $table->float('width')->nullable();
            $table->float('length')->nullable();
            $table->string('rectified')->nullable();
            $table->string('picture_surface')->nullable();
            $table->string('style')->nullable();
            $table->string('color')->nullable();
            $table->string('unit')->nullable();
            $table->string('fat')->nullable();
            $table->string('square_in_pack')->nullable();
            $table->json('images')->nullable();
            $table->integer('price');
            $table->float('kazan')->nullable();
            $table->float('moscow')->nullable();
            $table->float('nn')->nullable();
            $table->float('samara')->nullable();
            $table->float('spb')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('art_centre_news');
    }
};
