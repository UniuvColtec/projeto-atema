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
        Schema::table('image_tourist_spots', function (Blueprint $table) {
            $table->foreign('image_id')->references('id')->on('images');
            $table->foreign('tourist_spot_id')->references('id')->on('tourist_spots');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('image_tourist_spots', function (Blueprint $table) {
            $table->dropForeign(['image_id']);
            $table->dropForeign(['tourist_spot_id']);
        });
    }
};
