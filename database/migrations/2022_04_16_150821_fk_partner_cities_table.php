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
        Schema::table('partner_cities', function (Blueprint $table) {
            $table->foreign('partner_id')->references('id')->on('partners');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partner_cities', function (Blueprint $table) {
            $table->dropForeign(['partner_id']);
            $table->dropForeign(['city_id']);
        });
    }
};
