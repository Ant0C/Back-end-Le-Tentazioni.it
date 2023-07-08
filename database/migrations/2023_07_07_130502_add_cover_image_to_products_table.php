<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('cover_image')->nullable();
        });
        Schema::table('products', function (Blueprint $table) {
            $table->string('cover_image_s')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('cover_image');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('cover_image_s');
        });

    }
};
