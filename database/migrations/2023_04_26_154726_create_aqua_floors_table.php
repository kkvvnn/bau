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
        Schema::create('aqua_floors', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('collection')->nullable();
            $table->integer('price');
            $table->text('description_collection')->nullable();
            $table->integer('cound_decors')->nullable();
            $table->string('type_ucladki')->nullable();
            $table->string('material')->nullable();
            $table->string('faska')->nullable();
            $table->string('podlozhka')->nullable();
            $table->string('vendor_codes')->nullable();
            $table->string('zashit_sloi')->nullable();
            $table->string('CPL')->nullable();
            $table->integer('class_iznosost')->nullable();
            $table->string('lenght')->nullable();
            $table->string('width')->nullable();
            $table->string('fat')->nullable();
            $table->string('meters_in_pack')->nullable();
            $table->integer('count_in_pack')->nullable();
            $table->string('meters_in_palet')->nullable();
            $table->string('massa_pack')->nullable();
            $table->string('zamok')->nullable();
            $table->string('srok')->nullable();
            $table->string('class_pozhar')->nullable();
            $table->string('img_1')->nullable();
            $table->string('img_2')->nullable();
            $table->string('img_3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aqua_floors');
    }
};
