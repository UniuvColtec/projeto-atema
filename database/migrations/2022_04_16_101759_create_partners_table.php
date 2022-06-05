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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('cnpj',100);
            $table->longText('description');
            $table->string('logo');
            $table->string('email',100);
            $table->string('site',200)->nullable();
            $table->string('telephone',20);
            $table->string('address',255)->nullable();
            $table->string('latitude',255);
            $table->string('longitude',255);
            $table->string('district',255)->nullable();
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('partner_type_id');
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
        Schema::dropIfExists('partners');
    }
};

