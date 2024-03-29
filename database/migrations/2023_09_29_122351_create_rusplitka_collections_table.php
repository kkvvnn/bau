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
        Schema::create('rusplitka_collections', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->text('picture')->nullable();
            $table->string('url')->nullable();
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->string('country')->nullable();
            $table->string('brand')->nullable();
            $table->string('is_new')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rusplitka_collections');
    }
};
