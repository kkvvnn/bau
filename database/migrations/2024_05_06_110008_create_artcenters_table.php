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
        Schema::create('artcenters', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('vendor_code')->nullable();
            $table->string('title')->nullable();
            $table->string('brand')->nullable();
            $table->string('collection')->nullable();
            $table->string('material')->nullable();
            $table->string('for')->nullable();
            $table->string('surface')->nullable();
            $table->string('size')->nullable();
            $table->string('rectified')->nullable();
            $table->string('picture_surface')->nullable();
            $table->string('style')->nullable();
            $table->string('color')->nullable();
            $table->string('unit')->nullable();
            $table->string('fat')->nullable();
            $table->string('meters_in_pack')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->integer('price')->nullable();
            $table->string('kazan_stock')->nullable();
            $table->string('moscow_stock')->nullable();
            $table->string('nn_stock')->nullable();
            $table->string('samara_stock')->nullable();
            $table->string('spb_stock')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artcenters');
    }
};
