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
                ['locality_name'=>'Srijana nagar', 'municipal_name'=>'Kohalpur'],
                ['locality_name'=>'Shanti nagar', 'municipal_name'=>'Nepalgunj'],
                ['locality_name'=>'Sanik nagar', 'municipal_name'=>'Gulariya']
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
