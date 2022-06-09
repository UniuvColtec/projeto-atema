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
        Schema::table('image_typical_foods', function (Blueprint $table) {
            $table->foreign('typical_food_id')->references('id')->on('typical_foods')->onDelete('cascade');
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('image_typical_foods', function (Blueprint $table) {
            $table->dropForeign(['typical_food_id']);
            $table->dropForeign(['image_id']);
        });
    }
};
