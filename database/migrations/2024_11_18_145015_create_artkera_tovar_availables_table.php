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
        Schema::create('artkera_tovar_availables', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('tovar');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('unit');
            $table->float('moscow', 10,4);
            $table->float('moscow_reserve', 10,4);
            $table->float('moscow_way', 10,4);
            $table->float('moscow_sale', 10,4);
            $table->float('moscow_sale_reserve', 10,4);
            $table->float('moscow_depot_reserve', 10,4);
            $table->float('moscow_depot_reserve_reserve', 10,4);
            $table->float('kazan', 10,4);
            $table->float('kazan_reserve', 10,4);
            $table->float('kazan_way', 10,4);
            $table->float('kazan_sale', 10,4);
            $table->float('kazan_sale_reserve', 10,4);
            $table->string('category_id');
            $table->string('tovar_id');
            $table->string('artikul');
            $table->json('artikul_diy');
            $table->string('deleted');
            $table->string('archive');
            $table->string('action');
            $table->string('status');
            $table->string('not_unload');
            $table->string('not_unload_site');
            $table->string('collection_item');
            $table->string('number_of_patterns');
            $table->string('country');
            $table->string('surface_type');
            $table->integer('height');
            $table->integer('width');
            $table->integer('thickness');
            $table->string('name_for_site');
            $table->float('massa_pack', 8, 4);
            $table->float('square_in_pack', 8, 4);
            $table->string('Рельеф');
            $table->string('Ректификация');
            $table->string('Износостойкость');
            $table->string('is_Delacora_Big_Format');
            $table->string('sale');
            $table->string('balance_zero');
            $table->string('is_small_amount');
            $table->boolean('is_action');
            $table->integer('packing');
            $table->json('units');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artkera_tovar_availables');
    }
};
