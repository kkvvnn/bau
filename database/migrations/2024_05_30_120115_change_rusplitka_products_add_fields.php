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
        Schema::table('rusplitka_products', function (Blueprint $table) {
            $table->string('rest_skald_20t')->nullable();
            $table->string('rest_skald_20t_rezerv')->nullable();
            $table->string('rest_skald_krasnodar')->nullable();
            $table->string('rest_skald_krasnodar_rezerv')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rusplitka_products', function (Blueprint $table) {
            $table->dropColumn('rest_skald_20t');
            $table->dropColumn('rest_skald_20t_rezerv');
            $table->dropColumn('rest_skald_krasnodar');
            $table->dropColumn('rest_skald_krasnodar_rezerv');
        });
    }
};
