<?php

use App\Cakeapp\Product\Model\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allProduct=[
            ['name'=>'Black Forest','flavour'=>'chocolate','quantity'=>1,'price'=>500],
            ['name'=>'White Forest','flavour'=>'chocolate','quantity'=>2,'price'=>800],
            ['name'=>'Gems Overload','flavour'=>'vanilla','quantity'=>3,'price'=>1400],

        ];

        foreach ($allProduct as $product){
            $product_array=['name'=>$product['name'],'flavour'=>$product['flavour'],'quantity'=>$product['quantity'],'price'=>$product['price']];
            Product::create($product_array);
        }
    }
}
