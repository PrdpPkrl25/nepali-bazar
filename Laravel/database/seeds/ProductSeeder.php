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
        DB ::table('products') -> truncate();
        $allProduct=[
            ['product_name'=>'Black Forest','category_id'=>1,'quantity'=>1,'price'=>500],
            ['product_name'=>'White Forest','category_id'=>1,'quantity'=>2,'price'=>800],
            ['product_name'=>'Gems Overload','category_id'=>1,'quantity'=>3,'price'=>1400],

        ];

        foreach ($allProduct as $product){
            $product_array=['product_name'=>$product['product_name'],'category_id'=>$product['category_id'],'quantity'=>$product['quantity'],'price'=>$product['price']];
            Product::create($product_array);
        }
    }
}
