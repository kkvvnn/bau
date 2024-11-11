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
        Schema::create('artkera_balances', function (Blueprint $table) {
            $table->id();
            $table->string('depot_id');
            $table->string('tovar_id');
            $table->string('unit_id');
            $table->float('balance', 10, 4);
            $table->float('reserve', 10, 4);
            $table->float('free_balance', 10, 4);
            $table->float('balance_way', 10, 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artkera_balances');
    }
};
