<?php

use App\Cakeapp\Purchase\Model\Cart;
use App\Cakeapp\Purchase\Model\Order;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allCart = [
            ['cart_date' => '2020-03-08 09:05:00','total_price'=>1000],
            ['cart_date' => '2020-03-08 09:10:00','total_price'=>1500],
            ['cart_date' => '2020-03-08 09:15:00','total_price'=>2000],

        ];

        foreach ($allCart as $cart) {
            $cart_array = ['cart_date' => $cart['cart_date'],'total_price' => $cart['total_price'],];
            Cart::create($cart_array);
        }
    }
}
