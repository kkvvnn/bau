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
        Schema::create('nt_ceramic_with_imgs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('vendor_code')->unique();
            $table->string('brand')->nullable();
            $table->string('collection')->nullable();
            $table->string('color')->nullable();
            $table->string('type_of_surface')->nullable();
            $table->string('square_in_pack')->nullable();
            $table->string('fat')->nullable();
            $table->string('massa_in_pack')->nullable();
            $table->integer('count_in_pack')->nullable();
            $table->integer('price');
            $table->string('img1')->nullable();
            $table->string('img2')->nullable();
            $table->string('img3')->nullable();
            $table->string('img4')->nullable();
            $table->string('img5')->nullable();
            $table->string('img6')->nullable();
            $table->string('img7')->nullable();
            $table->string('img8')->nullable();
            $table->string('img9')->nullable();
            $table->string('img10')->nullable();
            $table->string('img11')->nullable();
            $table->string('img12')->nullable();
            $table->string('img13')->nullable();
            $table->string('img14')->nullable();
            $table->string('img15')->nullable();
            $table->string('img16')->nullable();
            $table->string('img17')->nullable();
            $table->string('img18')->nullable();
            $table->string('img19')->nullable();
            $table->string('img20')->nullable();
            $table->string('img21')->nullable();
            $table->string('img22')->nullable();
            $table->string('img23')->nullable();
            $table->string('img24')->nullable();
            $table->string('img25')->nullable();
            $table->string('img26')->nullable();
            $table->string('img27')->nullable();
            $table->string('img28')->nullable();
            $table->string('img29')->nullable();
            $table->string('img30')->nullable();
            $table->string('img31')->nullable();
            $table->string('img32')->nullable();
            $table->string('img33')->nullable();
            $table->string('img34')->nullable();
            $table->string('img35')->nullable();
            $table->string('img36')->nullable();
            $table->string('img37')->nullable();
            $table->string('img38')->nullable();
            $table->string('img39')->nullable();
            $table->string('img40')->nullable();
            $table->string('img41')->nullable();
            $table->string('img42')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nt_ceramic_with_imgs');
    }
};
