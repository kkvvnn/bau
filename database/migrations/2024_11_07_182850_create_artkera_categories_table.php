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
        Schema::create('artkera_categories', function (Blueprint $table) {
            $table->id();
            $table->string('parent');
            $table->string('category');
            $table->string('parent_id');
            $table->string('category_id')->unique();
            $table->boolean('deleted');
            $table->boolean('archive');
            $table->boolean('is_folder');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artkera_categories');
    }
};
