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
        Schema::create('jewellery', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('name');
            $table->decimal('price');
            $table->text('description');
            $table->enum('category', ['earrings','ring','necklace','bracelets']);
            $table->enum('material', ['sterling silver','gold','rosegold','white gold','bronze']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jewellery');
    }
};
