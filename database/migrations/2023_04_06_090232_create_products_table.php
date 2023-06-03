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
            $table->string('Element_Code')->unique();
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
            $table->string('Width')->nullable();
            $table->string('Depth')->nullable();
            $table->string('PCS_in_Package')->nullable();
            $table->string('Package_Value')->nullable();
            $table->string('Package_Weight')->nullable();
            $table->string('Pgabarites')->nullable();
            $table->string('PCSWeight')->nullable();
            $table->string('DesignValue')->nullable();
            $table->string('Color')->nullable();
            $table->string('Cover')->nullable();
            $table->string('SpoutHeight')->nullable();
            $table->string('WaterSupply')->nullable();
            $table->string('WaterOutlet')->nullable();
            $table->string('WaterDraining')->nullable();
            $table->string('Surface')->nullable();
            $table->string('FrostResistance')->nullable();
            $table->string('Rectified')->nullable();
            $table->string('Form')->nullable();
            $table->string('Orientation')->nullable();
            $table->string('TypeOfinstallation')->nullable();
            $table->string('Volume')->nullable();
            $table->string('Package_bundle')->nullable();
            $table->string('Warrantysuper')->nullable();
            $table->string('BaseValue')->nullable();
            $table->string('Architectural_surface')->nullable();
            $table->string('Durability')->nullable();
            $table->string('Rashod')->nullable();
            $table->string('TempoNanese')->nullable();
            $table->string('Propo')->nullable();
            $table->string('Worktime')->nullable();
            $table->string('SrokGod')->nullable();
            $table->string('NormaUp')->nullable();
            $table->string('Gotovn')->nullable();
            $table->string('Adgezon')->nullable();
            $table->string('Type')->nullable();
            $table->string('Power')->nullable();
            $table->string('Voltage')->nullable();
            $table->string('Vivod')->nullable();
            $table->text('Picture')->nullable();
            $table->text('Picture2')->nullable();
            $table->text('Picture3')->nullable();
            $table->text('Picture4')->nullable();
            $table->text('Picture5')->nullable();
            $table->text('Picture6')->nullable();
            $table->text('Picture7')->nullable();
            $table->text('Picture8')->nullable();
            $table->text('Picture9')->nullable();
            $table->text('Picture10')->nullable();
            $table->text('Picture11')->nullable();
            $table->text('Picture12')->nullable();
            $table->text('Picture13')->nullable();
            $table->text('Picture14')->nullable();
            $table->text('Picture15')->nullable();
            $table->text('Picture16')->nullable();
            $table->text('Picture17')->nullable();
            $table->text('Picture18')->nullable();
            $table->text('Picture19')->nullable();
            $table->text('Picture20')->nullable();
            $table->text('Picture21')->nullable();
            $table->text('Picture22')->nullable();
            $table->text('Picture23')->nullable();
            $table->text('Picture24')->nullable();

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
