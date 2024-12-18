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
        Schema::table('artkera_tovar_availables', function (Blueprint $table) {
            $table->float('spb', 10,4);
            $table->float('spb_reserve', 10,4);
            $table->float('spb_way', 10,4);
            $table->float('spb_sale', 10,4);
            $table->float('spb_sale_reserve', 10,4);


            $table->float('samara', 10,4);
            $table->float('samara_reserve', 10,4);
            $table->float('samara_way', 10,4);
            $table->float('samara_sale', 10,4);
            $table->float('samara_sale_reserve', 10,4);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('artkera_tovar_availables', function (Blueprint $table) {
            $table->dropColumn('spb');
            $table->dropColumn('spb_reserve');
            $table->dropColumn('spb_way');
            $table->dropColumn('spb_sale');
            $table->dropColumn('spb_sale_reserve');

            $table->dropColumn('samara');
            $table->dropColumn('samara_reserve');
            $table->dropColumn('samara_way');
            $table->dropColumn('samara_sale');
            $table->dropColumn('samara_sale_reserve');
        });
    }
};
