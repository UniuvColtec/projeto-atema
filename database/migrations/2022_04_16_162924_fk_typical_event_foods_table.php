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
        Schema::table('typical_event_foods', function (Blueprint $table) {
            $table->foreign('typical_food_id')->references('id')->on('typical_food');
            $table->foreign('event_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('typical_event_foods', function (Blueprint $table) {
            $table->dropForeign(['typical_food_id']);
            $table->dropForeign(['event_id']);
        });
    }
};
