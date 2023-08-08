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
        Schema::create('nt_ceramic_no_imgs', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_code')->unique();
            $table->string('collection')->nullable();
            $table->string('title')->nullable();
            $table->string('brand')->nullable();
            $table->string('country')->nullable();
            $table->string('size_mm')->nullable();
            $table->string('size_cm')->nullable();
            $table->string('fat')->nullable();
            $table->string('surface')->nullable();
            $table->string('square_in_pack')->nullable();
            $table->integer('count_in_pack')->nullable();
            $table->string('massa_of_pack')->nullable();
            $table->string('square_one')->nullable();
            $table->string('massa_one')->nullable();
            $table->integer('price_opt');
            $table->integer('price');
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nt_ceramic_no_imgs');
    }
};
