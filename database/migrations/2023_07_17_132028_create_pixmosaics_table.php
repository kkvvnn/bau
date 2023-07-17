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
        Schema::create('pixmosaics', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_code')->unique();
            $table->integer('price');
            $table->string('title');
            $table->string('material')->nullable();
            $table->string('fat')->nullable();
            $table->string('chip_size')->nullable();
            $table->string('surface')->nullable();
            $table->string('module_size')->nullable();
            $table->string('img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pixmosaics');
    }
};
