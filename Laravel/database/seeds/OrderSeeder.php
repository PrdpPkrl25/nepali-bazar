<?php

use App\Cakeapp\Purchase\Model\Order;
use App\Cakeapp\User\Model\User;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allOrder = [
            ['order_date' => '2020-03-08 09:00:00'],
            ['order_date' => '2020-03-08 09:05:00'],
            ['order_date' => '2020-03-08 09:10:00'],

        ];

        foreach ($allOrder as $order) {
            $order_array = ['order_date' => $order['order_date'],];
            Order::create($order_array);
        }
    }
}
