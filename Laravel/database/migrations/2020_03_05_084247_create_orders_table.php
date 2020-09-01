<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('cart_id');
            $table->integer('cart_session_id');
            $table->string('name');
            $table->string('phone_number');
            $table->string('district');
            $table->string('municipal');
            $table->string('ward_number');
            $table->string('locality');
            $table->dateTime('order_date');
            $table->string('payment_method');
            $table->decimal('delivery_charge')->nullable();
            $table->decimal('total_amount');
            $table->timestamps();
        });

        /*DB::statement("ALTER TABLE orders AUTO_INCREMENT = 1000");*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
