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
        Schema::create('avito_two_excels', function (Blueprint $table) {
            $table->id();
            $table->string('AvitoId')->nullable();
            $table->string('Id_av')->unique();
            $table->string('ContactMethod')->nullable();
            $table->string('EMail')->nullable();
            $table->string('AvitoStatus')->nullable();
            $table->string('ManagerName')->nullable();
            $table->string('Price')->nullable();
            $table->string('CompanyName')->nullable();
            $table->string('Title')->nullable();
            $table->text('ImageUrls')->nullable();
            $table->string('GoodsSubType')->nullable();
            $table->string('GoodsType')->nullable();
            $table->string('Category')->nullable();
            $table->string('ListingFee')->nullable();
            $table->string('FinishingType')->nullable();
            $table->string('ContactPhone')->nullable();
            $table->text('Description')->nullable();
            $table->string('Address')->nullable();
            $table->string('AdType')->nullable();
            $table->string('FinishingSubType')->nullable();
            $table->string('Condition')->nullable();
            $table->string('VideoUrl')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avito_two_excels');
    }
};
