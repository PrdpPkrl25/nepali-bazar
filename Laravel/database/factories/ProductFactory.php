<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cakeapp\Product\Model\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Auth;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id'=>$faker->biasedNumberBetween(0,15),
        'product_name'=>$faker->word(),
        'shop_id'=>$faker->biasedNumberBetween(1,3),
        'base_quantity'=>$faker->biasedNumberBetween(0,100),
         'measure_unit'=>$faker->word(),
        'price'=>$faker->biasedNumberBetween(50,5000),
    ];
});
