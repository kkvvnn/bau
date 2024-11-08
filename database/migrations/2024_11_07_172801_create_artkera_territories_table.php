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
        Schema::create('artkera_territories', function (Blueprint $table) {
            $table->id();
            $table->string('price_list');
            $table->string('type_price');
            $table->string('type_price_id');
            $table->string('depot');
            $table->string('depot_id');
            $table->string('depot_adress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artkera_territories');
    }
};
