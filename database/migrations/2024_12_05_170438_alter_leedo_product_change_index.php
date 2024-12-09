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
        Schema::table('leedo_products', function (Blueprint $table) {
            $table->dropUnique(['System_ID']);
            $table->string('slug')->unique()->after('System_ID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('leedo_products', function (Blueprint $table) {
//            $table->dropUnique('slug');
            $table->dropColumn('slug');
            $table->string('System_ID')->unique()->change();
        });
    }
};
