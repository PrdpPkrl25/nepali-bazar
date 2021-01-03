<?php

use App\Cakeapp\Product\Model\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB ::table('categories') -> truncate();
        $allCategories=[
            ['category_name'=>'Food','icon_name'=>'utensils'],
            ['category_name'=>'Fast Food','main_category_name'=>'Food','icon_name'=>'hamburger'],
            ['category_name'=>'Organic Food','main_category_name'=>'Food','icon_name'=>'apple-alt'],
            ['category_name'=>'Vegetable','main_category_name'=>'Organic Food','icon_name'=>'pepper-hot'],
            ['category_name'=>'Grocery','icon_name'=>'carrot'],
            ['category_name'=>'Cooking Oil','main_category_name'=>'Grocery','icon_name'=>'pepper-hot'],
            ['category_name'=>'Medicine','icon_name'=>'first-aid'],
            ['category_name'=>'Hand Sanitizer','main_category_name'=>'Medicine','icon_name'=>'pepper-hot'],
            ['category_name'=>'Stationery','icon_name'=>'table-tennis'],
            ['category_name'=>'Chart Paper','main_category_name'=>'Stationery','icon_name'=>'pepper-hot'],
            ['category_name'=>'Electronics','icon_name'=>'mobile-alt'],
            ['category_name'=>'Refregerator','main_category_name'=>'Electronics','icon_name'=>'pepper-hot'],
            ['category_name'=>'Hardware','icon_name'=>'tools'],
            ['category_name'=>'Cement','main_category_name'=>'Hardware','icon_name'=>'pepper-hot'],

        ];

        foreach ($allCategories as $category){
            $category_array=['category_name'=>$category['category_name'],'icon_name'=>$category['icon_name']];
            if (isset($category['main_category_name'])){
                $main_category_name=$category['main_category_name'];
                $category_object=Category::where('category_name','=',$main_category_name)->first();
                $category_id=$category_object->id;
                $category_array['main_category_id']=$category_id;
            }
            Category::create($category_array);



        }
    }
}


