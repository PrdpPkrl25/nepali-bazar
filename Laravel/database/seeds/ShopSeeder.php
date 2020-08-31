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
            ['shop_name'=>'Bindabasini', 'email'=>'b@gmail.com','phone_number'=>'12345','province_id'=>5,'district_id'=>47,'municipal_name'=>'Kohalpur','ward_number'=>11],
            ['shop_name'=>'Laliguras', 'email'=>'l@gmail.com','phone_number'=>'12345','province_id'=>5,'district_id'=>47,'municipal_name'=>'Nepalgunj','ward_number'=>05],
            ['shop_name'=>'Pashupati', 'email'=>'p@gmail.com','phone_number'=>'12345','province_id'=>5,'district_id'=>47,'municipal_name'=>'Kohalpur','ward_number'=>10],
            ['shop_name'=>'PA Agro Farm', 'email'=>'pa@gmail.com','phone_number'=>'12345','province_id'=>5,'district_id'=>47,'municipal_name'=>'Kohalpur','ward_number'=>10],

        ];

        foreach ($allShop as $shop)
        {
            $owner_id = 3;
            $municipal_name= $shop['municipal_name'];
            $municipal_object=Municipal::where('municipal_name','=',$municipal_name)->first();
            $municipal_id = $municipal_object->id;
            $ward_number= $shop['ward_number'];
            $ward_object=Ward::where(['ward_number'=>$ward_number,'municipal_id'=>$municipal_id])->first();
            $ward_id = $ward_object->id;
            $shop_array=['shop_name'=>$shop['shop_name'],'email'=>$shop['email'],'phone_number'=>$shop['phone_number'],'owner_id'=>$owner_id,'province_id'=>$shop['province_id'],'district_id'=>$shop['district_id'],'municipal_id'=>$municipal_id,'ward_id'=>$ward_id];
            Shop::create($shop_array);
        }
    }
}
