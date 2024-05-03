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
        Schema::create('kerabellezza2s', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('parent_code');
            $table->string('title');
            $table->integer('price_opt');
            $table->integer('price');
            $table->string('color')->nullable();
            $table->string('shtrih_code')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerabellezza2s');
    }
};
