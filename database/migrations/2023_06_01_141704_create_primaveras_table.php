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
        Schema::create('primaveras', function (Blueprint $table) {
            $table->id();
            $table->string('vendor_code')->unique();
            $table->string('title');
            $table->string('title_avito');
            $table->integer('price')->nullable();
            $table->integer('pack_massa')->nullable();
            $table->string('img1')->nullable();
            $table->text('img2')->nullable();
            $table->string('brand')->nullable();
            $table->string('color')->nullable();
            $table->string('color_name')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->integer('count_in_pack')->nullable();
            $table->string('meters_in_pack')->nullable();
            $table->string('format')->nullable();
            $table->string('type')->nullable();
            $table->text('annotation')->nullable();
            $table->string('country')->nullable();
            $table->string('fat')->nullable();
            $table->string('factura_poverhnosti')->nullable();
            $table->string('osobennosti')->nullable();
            $table->string('for')->nullable();
            $table->string('iznosostoikost')->nullable();
            $table->string('poverhnost')->nullable();
            $table->string('decor')->nullable();
            $table->string('form')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('primaveras');
    }
};
