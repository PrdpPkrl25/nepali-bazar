<?php

use App\Cakeapp\Location\Model\District;
use App\Cakeapp\Location\Model\Municipal;
use App\Cakeapp\Location\Model\Ward;
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
        DB ::table('municipals') -> truncate();

        $allMunicipal =config('location.municipals');

        foreach ($allMunicipal as $municipal) {
            $district_name = $municipal['district_name'];
            $district_object= District::where('district_name','=',$district_name)->first();
            $district_id=$district_object->id;
            $total_wards=$municipal['number_of_wards'];
            $municipal_array=['municipal_name'=>$municipal['municipal_name'],'district_id'=>$district_id,'number_of_wards'=>$municipal['number_of_wards']];
            $municipal_object=Municipal::create($municipal_array);
            for($i=1;$i<=$total_wards;$i++){
            Ward::create(['municipal_id'=>$municipal_object->id,'ward_number'=>$i]);
            }


    }
    }
}
