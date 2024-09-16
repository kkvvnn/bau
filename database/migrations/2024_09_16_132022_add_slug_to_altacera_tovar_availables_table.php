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
        Schema::table('altacera_tovar_availables', function (Blueprint $table) {
            $table->string('slug')->after('tovar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('altacera_tovar_availables', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
