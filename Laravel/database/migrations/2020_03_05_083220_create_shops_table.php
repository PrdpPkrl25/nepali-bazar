<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('shop_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('delivery_charge')->nullable();
            $table->string('image_name')->nullable();
            $table->integer('owner_id')->nullable();
            $table->integer('province_id');
            $table->integer('district_id');
            $table->integer('municipal_id');
            $table->integer('ward_id');
            $table->string('locality')->nullable();
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
        Schema::dropIfExists('shops');
    }
}
