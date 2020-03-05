<?php

use App\Cakeapp\Location\Model\Locality;
use App\Cakeapp\Location\Model\Municipal;
use Illuminate\Database\Seeder;

class LocalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allLocality= [
                ['locality_name'=>'Locality 1', 'municipal_name'=>'Municipal 1'],
                ['locality_name'=>'Locality 2', 'municipal_name'=>'Municipal 2'],
                ['locality_name'=>'Locality 3', 'municipal_name'=>'Municipal 3']
            ];

       foreach ($allLocality as $locality)
       {
           $municipal_name= $locality['municipal_name'];
           $municipal_object=Municipal::where('municipal_name','=',$municipal_name)->first();
           $municipal_id = $municipal_object->id;
           $locality_array=['locality_name'=>$locality['locality_name'],'municipal_id'=>$municipal_id];
           Locality::create($locality_array);
       }
    }
}
