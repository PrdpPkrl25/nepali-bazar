<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddCartsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts_products', function (Blueprint $table) {
            $table->unsignedInteger('cart_id');
            $table->unsignedInteger('product_id');
            $table->decimal('quantity');
            $table->decimal('price_per_quantity');
            $table->string('measure_unit');
            $table->decimal('price');
            $table->decimal('discount_price')->nullable();
            $table->decimal('net_price');
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->primary(['cart_id','product_id']);
            $table->integer('voucher_id')->nullable();
            $table->dateTime('product_added_time')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('carts_products');
    }
}
