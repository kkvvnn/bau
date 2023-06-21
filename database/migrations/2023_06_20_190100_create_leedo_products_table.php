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
        Schema::create('leedo_products', function (Blueprint $table) {
            $table->id();
            $table->string('Category')->nullable();
            $table->string('System_ID')->unique();
            $table->string('Brand_name')->nullable();
            $table->string('Collection')->nullable();
            $table->string('Item_name')->nullable();
            $table->string('unit')->nullable();
            $table->string('URL_name')->nullable();
            $table->integer('Price_OPT')->nullable();
            $table->integer('Price_rozn')->nullable();
            $table->string('Surface')->nullable();
            $table->string('Color_text')->nullable();
            $table->string('Material')->nullable();
            $table->string('Usage')->nullable();
            $table->string('Form')->nullable();
            $table->string('Tile_size_cm')->nullable();
            $table->string('Chip_size_mm')->nullable();
            $table->decimal('Kg_per_box')->nullable();
            $table->integer('Pcs_per_box')->nullable();
            $table->decimal('Thickness_mm')->nullable();
            $table->decimal('Tile_sheet_square', 8, 5)->nullable();
            $table->integer('Boxes_per_pallet')->nullable();
            $table->decimal('Kg_per_pallet')->nullable();
            $table->longText('Description')->nullable();
            $table->string('Rectification')->nullable();
            $table->char('Show')->nullable();
            $table->decimal('Sq_m_per_box',8 , 5)->nullable();
            $table->decimal('Sq_m_per_pallet', 8, 5)->nullable();
            $table->decimal('Sklad_Msk_LeeDo')->nullable();
            $table->decimal('Sklad_SPb_LeeDo')->nullable();
            $table->string('Color')->nullable();
            $table->decimal('Reserv_Msk_LeeDo')->nullable();
            $table->decimal('Reserv_SPb_LeeDo')->nullable();
            $table->string('Basic_pic')->nullable();
            $table->string('Picture2')->nullable();
            $table->string('Picture1')->nullable();
            $table->string('Picture3')->nullable();
            $table->string('Picture4')->nullable();
            $table->string('Picture5')->nullable();
            $table->string('Picture6')->nullable();
            $table->string('Picture7')->nullable();
            $table->json('Style')->nullable();
            $table->json('Color_solution')->nullable();
            $table->string('Item_sheet')->nullable();
            $table->string('Item_chip')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leedo_products');
    }
};
