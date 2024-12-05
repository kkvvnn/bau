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
            $table->dropUnique('rusplitka_products_code_unique');
            $table->string('slug')->unique()->after('code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rusplitka_products', function (Blueprint $table) {
            $table->dropUnique('rusplitka_products_slug_unique');
            $table->dropColumn('slug');
            $table->string('code')->unique()->change();
        });
    }
};
