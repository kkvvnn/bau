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
        Schema::create('artkera_units', function (Blueprint $table) {
            $table->id();
            $table->string('tovar_id');
            $table->string('category_id');
            $table->string('artikul');
            $table->string('unit');
            $table->string('unit_id')->unique();
            $table->float('unit_kg', 10,4);
            $table->float('unit_ratio', 10,4);
            $table->string('unit_code');
            $table->boolean('is_unit_depot');
            $table->boolean('is_unit_metr');
            $table->boolean('is_unit_piece');
            $table->boolean('is_unit_pack');
            $table->boolean('is_unit_pallet');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artkera_units');
    }
};
