<?php

use App\Cakeapp\Location\Model\Locality;
use App\Cakeapp\Location\Model\Municipal;
use App\Cakeapp\Location\Model\Ward;
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
        DB ::table('shops') -> truncate();
        $allShop= [
            ['name'=>'Bindabasini', 'email'=>'b@gmail.com','address'=>'Kohalpur','phone'=>'12345','owner_name'=>'Pradip','municipal_name'=>'Kohalpur','ward_number'=>11],
            ['name'=>'Laliguras', 'email'=>'l@gmail.com','address'=>'Nepalgunj','phone'=>'98480','owner_name'=>'Prakash','municipal_name'=>'Nepalgunj','ward_number'=>05],
            ['name'=>'CakeShop', 'email'=>'c@gmail.com','address'=>'Gulariya','phone'=>'98025','owner_name'=>'Narayan','municipal_name'=>'Kohalpur','ward_number'=>10],

        ];

        foreach ($allShop as $shop)
        {
            $owner_name= $shop['owner_name'];
            $user_object=User::where('name','=',$owner_name)->first();
            $owner_id = $user_object->id;
            $municipal_name= $shop['municipal_name'];
            $municipal_object=Municipal::where('municipal_name','=',$municipal_name)->first();
            $municipal_id = $municipal_object->id;
            $ward_number= $shop['ward_number'];
            $ward_object=Ward::where(['ward_number'=>$ward_number,'municipal_id'=>$municipal_id])->first();
            $ward_id = $ward_object->id;
            $shop_array=['name'=>$shop['name'],'email'=>$shop['email'],'address'=>$shop['address'],'phone'=>$shop['phone'],'owner_id'=>$owner_id,'ward_id'=>$ward_id];
            Shop::create($shop_array);
        }
    }
}
