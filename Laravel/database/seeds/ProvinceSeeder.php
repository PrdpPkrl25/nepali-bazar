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
        $allProvinces=[
            ['province_name'=>'Province 1',
            'province_number'=> 1],
            ['province_name'=>'Province 2',
            'province_number'=> 2],
            ['province_name'=>'Bagmati',
            'province_number'=> 3],
            ['province_name'=>'Gandaki',
            'province_number'=> 4],
            ['province_name'=>'Province 5',
            'province_number'=> 5],
            ['province_name'=>'Karnali',
            'province_number'=> 6],
            ['province_name'=>'Sudurpaschim',
            'province_number'=> 7]

        ];
        foreach($allProvinces as $province)
        {
            Province::create($province);
        }
    }
}
