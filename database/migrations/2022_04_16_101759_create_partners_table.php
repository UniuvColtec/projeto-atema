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
            $table->string('email',100);
            $table->string('site',200)->nullable();;
            $table->string('telephone',20);
            $table->string('address',255)->nullable();;
            $table->string('district',255)->nullable();;
            $table->string('latitude',100)->nullable();;
            $table->string('longitude',100)->nullable();;
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

