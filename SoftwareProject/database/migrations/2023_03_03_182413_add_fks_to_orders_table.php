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
        Schema::table('orders', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('jewellery_id')->unsigned();

            // these are foreign keys in the database - order table
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('jewellery_id')->references('id')->on('jewellery')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['users_id']);
            $table->dropForeign(['jewellery_id']);
            $table->dropColumn('users_id');
            $table->dropColumn('jewellery_id');
        });
    }
};
