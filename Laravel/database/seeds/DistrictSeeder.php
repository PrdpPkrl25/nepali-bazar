<?php

use App\Cakeapp\Location\Model\Province;
use Illuminate\Database\Seeder;
use App\Cakeapp\Location\Model\District;


class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allDistrict=[
            ['district_name'=>'Taplejung','province_name'=>'Province 1'],
            ['district_name'=>'Panchthar','province_name'=>'Province 1'],
            ['district_name'=>'Banke','province_name'=>'Province 5'],
            ['district_name'=>'Bardiya','province_name'=>'Province 5'],




        ];
        foreach($allDistrict as $district)
        {
            $province_name = $district['province_name'];
            $province_object=Province::where('province_name','=',$province_name)->first();
            $province_id=$province_object->id;
            $district_array=['district_name'=>$district['district_name'],'province_id'=>$province_id];
            District::create($district_array);

        }
    }
}