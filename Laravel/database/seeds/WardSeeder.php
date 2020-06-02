<?php

use App\Cakeapp\Location\Model\Municipal;
use App\Cakeapp\Location\Model\Ward;
use Illuminate\Database\Seeder;

class WardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB ::table('wards') -> truncate();
        $allWard = [
            ['municipal_name' => 'Kohalpur', 'ward_number' => 11],
            ['municipal_name' => 'Nepalgunj', 'ward_number' => 05],
            ['municipal_name' => 'Gulariya','ward_number' => 10],

        ];


        foreach ($allWard as $ward) {
            $municipal_name = $ward['municipal_name'];
            $municipal_object= Municipal::where('municipal_name','=',$municipal_name)->first();
            $municipal_id=$municipal_object->id;
            $ward_array=['ward_number'=>$ward['ward_number'],'municipal_id'=>$municipal_id];
            Ward::create($ward_array);

        }
    }
}
