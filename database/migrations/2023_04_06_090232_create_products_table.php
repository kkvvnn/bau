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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('GroupProduct')->nullable();
            $table->string('Element_Code')->nullable();
            $table->string('Owner_Article')->nullable();
            $table->string('Name')->nullable();
            $table->integer('Price')->nullable();
            $table->integer('RMPrice')->nullable();
            $table->integer('RMPriceOld')->nullable();
            $table->string('Producer_Brand')->nullable();
            $table->string('Country_of_manufacture')->nullable();
            $table->string('MainUnit')->nullable();
            $table->tinyInteger('Novinka')->nullable();
            $table->string('Skidka')->nullable();
            $table->tinyInteger('balance')->nullable();
            $table->string('balanceCount')->nullable();
            $table->string('Category')->nullable();
            $table->string('Collection_Id')->nullable();
            $table->string('Collection_Code')->nullable();
            $table->string('Collection_Name')->nullable();
            $table->string('Field_of_Application')->nullable();
            $table->string('Place_in_the_Collection')->nullable();
            $table->string('Kratnost')->nullable();
            $table->string('Lenght')->nullable();
            $table->string('Height')->nullable();
            $table->string('Thickness')->nullable();
            $table->string('PCS_in_Package')->nullable();
            $table->string('Package_Value')->nullable();
            $table->string('Package_Weight')->nullable();
            $table->string('Pgabarites')->nullable();
            $table->string('PCSWeight')->nullable();
            $table->string('DesignValue')->nullable();
            $table->string('Color')->nullable();
            $table->string('Cover')->nullable();
            $table->string('Surface')->nullable();
            $table->string('FrostResistance')->nullable();
            $table->string('Rectified')->nullable();
            $table->string('BaseValue')->nullable();
            $table->string('Architectural_surface')->nullable();
            $table->string('Durability')->nullable();
            $table->string('Picture')->nullable();
            $table->string('Picture2')->nullable();
            $table->string('Picture3')->nullable();
            $table->string('Picture4')->nullable();
            $table->string('Picture5')->nullable();
            $table->string('Picture6')->nullable();
            $table->string('Picture7')->nullable();
            $table->string('Picture8')->nullable();
            $table->string('Picture9')->nullable();
            $table->string('Picture10')->nullable();
            $table->string('Picture11')->nullable();
            $table->string('Picture12')->nullable();
            $table->string('Picture13')->nullable();
            $table->string('Picture14')->nullable();
            $table->string('Picture15')->nullable();
            $table->string('Picture16')->nullable();
            $table->string('Picture17')->nullable();
            $table->string('Picture18')->nullable();
            $table->string('Picture19')->nullable();
            $table->string('Picture20')->nullable();
            $table->string('Picture21')->nullable();
            $table->string('Picture22')->nullable();
            $table->string('Picture23')->nullable();
            $table->string('Picture24')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
