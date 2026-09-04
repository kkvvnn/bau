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
        Schema::create('aquas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('vendor_code')->unique();
            $table->string('brand');
            $table->string('collection');
            $table->integer('price');
            $table->integer('old_price');
            $table->string('unit');
            $table->string('size');
            $table->float('fat');
            $table->integer('class');
            $table->string('osnova')->nullable();
            $table->string('verh_sloi')->nullable();
            $table->float('massa_pack')->nullable();
            $table->string('vlagostoikost')->nullable();
            $table->string('decor')->nullable();
            $table->string('class_pozhar')->nullable();
            $table->float('meters_in_pallet', 8, 3);
            $table->float('meters_in_pack', 8, 3);
            $table->string('podlozhka')->nullable();
            $table->string('faska')->nullable();
            $table->string('niz_sloi')->nullable();
            $table->string('ottenok')->nullable();
            $table->string('poverhnost')->nullable();
            $table->string('teplyi_pol')->nullable();
            $table->string('protivoskolzhen')->nullable();
            $table->string('sred_sloi')->nullable();
            $table->string('country');
            $table->string('textura')->nullable();
            $table->string('type_risunka')->nullable();
            $table->string('type_soedinen');
            $table->string('type_pack')->nullable();
            $table->float('zashit_sloy')->nullable();
            $table->string('him_stoikost')->nullable();
            $table->integer('count_in_pack');
            $table->string('formaldegid')->nullable();
            $table->string('link_tovar');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aquas');
    }
};
