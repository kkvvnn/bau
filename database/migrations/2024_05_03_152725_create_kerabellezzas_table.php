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
        Schema::create('kerabellezzas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('vendor_code');
            $table->integer('price');
            $table->text('description');
            $table->string('brand');
            $table->string('country');
            $table->string('class');
            $table->string('shov');
            $table->string('massa');
            $table->string('froze_resistant');
            $table->string('vid_rabot');
            $table->string('country_proizv');
            $table->text('images');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerabellezzas');
    }
};
