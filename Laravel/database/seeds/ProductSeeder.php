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
        factory(Product::class, 500)->create()->each(function($product){
            $product->save();
        });
    }

}
