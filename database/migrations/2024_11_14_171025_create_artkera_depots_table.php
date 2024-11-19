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
        Schema::create('artkera_depots', function (Blueprint $table) {
            $table->id();
            $table->string('price_list');
            $table->string('depot');
            $table->string('depot_id')->unique();
            $table->string('depot_adress');
            $table->boolean('depot_display');
            $table->float('depot_lat', 10,6);
            $table->float('depot_lon', 10,6);
            $table->boolean('depot_deletion_mark');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artkera_depots');
    }
};
