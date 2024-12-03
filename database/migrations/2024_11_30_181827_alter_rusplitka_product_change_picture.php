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
            DB::statement('truncate table rusplitka_products');
            $table->json('picture')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rusplitka_products', function (Blueprint $table) {
            DB::statement('truncate table rusplitka_products');
            $table->text('picture')->nullable()->change();
        });
    }
};
