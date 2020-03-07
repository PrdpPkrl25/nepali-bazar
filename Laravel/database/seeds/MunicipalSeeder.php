<?php

use App\Cakeapp\Location\Model\District;
use App\Cakeapp\Location\Model\Municipal;
use Illuminate\Database\Seeder;

class MunicipalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allMunicipal = [
            ['municipal_name' => 'Kohalpur', 'district_name' => 'Banke'],
            ['municipal_name' => 'Nepalgunj', 'district_name' => 'Banke'],
            ['municipal_name' => 'Gulariya', 'district_name' => 'Bardiya'],

        ];


        foreach ($allMunicipal as $municipal) {
            $district_name = $municipal['district_name'];
            $district_object= District::where('district_name','=',$district_name)->first();
            $district_id=$district_object->id;
            $municipal_array=['municipal_name'=>$municipal['municipal_name'],'district_id'=>$district_id];
            Municipal::create($municipal_array);


    }
    }
}
