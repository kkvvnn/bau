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
        Schema::create('altacera_territories', function (Blueprint $table) {
            $table->id();
            $table->string('price_list');
            $table->string('type_price');
            $table->string('type_price_id');
            $table->string('depot');
            $table->string('depot_id');
            $table->string('depot_adress');
            $table->boolean('depot_display');
            $table->decimal('depot_lat', 11, 7);
            $table->decimal('depot_lon', 11, 7);
            $table->boolean('depot_deletion_mark');
            $table->json('territory');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('altacera_territories');
    }
};
