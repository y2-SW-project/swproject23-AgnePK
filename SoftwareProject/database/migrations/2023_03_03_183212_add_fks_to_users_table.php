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
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('role_id')->unsigned();

            // these are foreign keys in the database - users table
            $table->foreign('order_id')->references('id')->on('order')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('role_id')->references('id')->on('role')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
