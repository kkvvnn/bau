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
        Schema::create('altacera_balances', function (Blueprint $table) {
            $table->id();
            $table->string('depot_id');
            $table->string('tovar_id');
            $table->string('unit_id');
            $table->decimal('balance', 10, 4);
            $table->decimal('reserve', 10, 4);
            $table->decimal('free_balance', 10, 4);
            $table->decimal('balance_way', 10, 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('altacera_balances');
    }
};
