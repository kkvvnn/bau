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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->enum('account', ['Напольные решения', 'Laparet-Запад', 'Laparet-Казань'])->default('Напольные решения');
            $table->string('name');
            $table->integer('discount')->default(0);
            $table->enum('additional', ['По умолчанию', 'Не указывать цену', 'Цена 1 рубль'])->default('По умолчанию');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discounts');
    }
};
