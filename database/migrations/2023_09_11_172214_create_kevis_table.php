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
        Schema::create('kevis', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('title');
            $table->string('brand');
            $table->string('collection');
            $table->string('category');
            $table->integer('price');
            $table->string('country');
            $table->string('surface');
            $table->string('unit');
            $table->integer('width');
            $table->integer('length');
            $table->integer('count_in_pack');
            $table->string('meters_in_pack');
            $table->text('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kevis');
    }
};
