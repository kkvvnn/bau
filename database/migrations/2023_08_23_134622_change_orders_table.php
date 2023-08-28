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
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['vendor_code', 'count', 'unit', 'price']);
            $table->string('customer')->nullable()->change();
            $table->string('customer_phone')->nullable()->change();
            $table->string('customer_address')->nullable()->change();
            $table->string('shipping')->nullable()->change();
            $table->string('status')->nullable()->change();
            $table->string('note')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('vendor_code');
            $table->string('count');
            $table->string('unit');
            $table->string('price');
        });
    }
};
