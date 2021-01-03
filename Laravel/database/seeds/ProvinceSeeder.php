<?php

use Illuminate\Database\Seeder;
use App\Cakeapp\Location\Model\Province;


class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB ::table('provinces') -> truncate();
        $allProvinces=config('location.provinces');
        foreach($allProvinces as $province)
        {
            Province::create($province);
        }
    }
}
