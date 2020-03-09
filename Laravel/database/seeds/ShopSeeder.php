<?php

use App\Cakeapp\Location\Model\Locality;
use App\Cakeapp\Location\Model\Municipal;
use App\Cakeapp\User\Model\User;
use App\Cakeapp\Vendor\Model\Shop;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allShop= [
            ['name'=>'Bindabasini', 'email'=>'b@gmail.com','address'=>'Kohalpur','phone'=>'12345','number_of_flavour'=>'10','owner_name'=>'Pradip','municipal_name'=>'Kohalpur','locality_name'=>'Srijana nagar'],
            ['name'=>'Laliguras', 'email'=>'l@gmail.com','address'=>'Nepalgunj','phone'=>'98480','number_of_flavour'=>'15','owner_name'=>'Prakash','municipal_name'=>'Nepalgunj','locality_name'=>'Shanti nagar'],
            ['name'=>'CakeShop', 'email'=>'c@gmail.com','address'=>'Gulariya','phone'=>'98025','number_of_flavour'=>'20','owner_name'=>'Narayan','municipal_name'=>'Gulariya','locality_name'=>'Sanik nagar'],

        ];

        foreach ($allShop as $shop)
        {
            $owner_name= $shop['owner_name'];
            $user_object=User::where('name','=',$owner_name)->first();
            $owner_id = $user_object->id;
            $municipal_name= $shop['municipal_name'];
            $municipal_object=Municipal::where('municipal_name','=',$municipal_name)->first();
            $municipal_id = $municipal_object->id;
            $locality_name= $shop['locality_name'];
            $locality_object=Locality::where('locality_name','=',$locality_name)->first();
            $locality_id = $locality_object->id;
            $shop_array=['name'=>$shop['name'],'email'=>$shop['email'],'address'=>$shop['address'],'phone'=>$shop['phone'],'number_of_flavour'=>$shop['number_of_flavour'],'owner_id'=>$owner_id,'municipal_id'=>$municipal_id,'locality_id'=>$locality_id];
            Shop::create($shop_array);
        }
    }
}
