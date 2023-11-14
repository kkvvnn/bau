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
        Schema::create('aqua_new_floors', function (Blueprint $table) {
            $table->id();
            $table->string('url')->nullable();
            $table->string('title');
            $table->string('vendor_code')->unique();
            $table->integer('price')->nullable();
            $table->string('collection')->nullable();
            $table->string('razmer')->nullable();
            $table->string('klass_iznosostojkosti')->nullable();
            $table->integer('kolichestvo_polos')->nullable();
            $table->string('tip_soedineniya')->nullable();
            $table->string('country')->nullable();
            $table->string('tip_risunka')->nullable();
            $table->string('vlagostojkost')->nullable();
            $table->integer('count_in_box')->nullable();
            $table->integer('srok_year')->nullable();
            $table->string('material')->nullable();
            $table->string('vstroennaya_podlozhka')->nullable();
            $table->string('zashhitnuy_sloy_mm')->nullable();
            $table->string('klass_pozharniy')->nullable();
            $table->string('shumoizolyacziya')->nullable();
            $table->string('tehnologiya_cpl')->nullable();
            $table->string('dlina')->nullable();
            $table->string('shirina')->nullable();
            $table->string('fat')->nullable();
            $table->string('massa_box')->nullable();
            $table->string('faska')->nullable();
            $table->string('picture')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aqua_new_floors');
    }
};
