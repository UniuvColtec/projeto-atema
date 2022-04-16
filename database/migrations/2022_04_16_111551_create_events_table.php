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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->string('contact',75);
            $table->dateTime('start_date');
            $table->dateTime('final_date');
            $table->unsignedBigInteger('city_id');
            $table->string('address',255);
            $table->string('district',255);
            $table->string('latitude',100);
            $table->string('longitude',100);
            $table->enum('status',['Aprovado']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
