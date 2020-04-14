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
        DB ::table('districts') -> truncate();
        $allDistrict=[
            ['district_name'=>'Bhojpur','province_name'=>'Province 1'],
            ['district_name'=>'Dhankuta','province_name'=>'Province 1'],
            ['district_name'=>'Ilam','province_name'=>'Province 1'],
            ['district_name'=>'Jhapa','province_name'=>'Province 1'],
            ['district_name'=>'Khotang','province_name'=>'Province 1'],
            ['district_name'=>'Morang','province_name'=>'Province 1'],
            ['district_name'=>'Okhaldhunga','province_name'=>'Province 1'],
            ['district_name'=>'Panchthar','province_name'=>'Province 1'],
            ['district_name'=>'Sankhuwasabha','province_name'=>'Province 1'],
            ['district_name'=>'Solukhumbu','province_name'=>'Province 1'],
            ['district_name'=>'Sunsari','province_name'=>'Province 1'],
            ['district_name'=>'Taplejung','province_name'=>'Province 1'],
            ['district_name'=>'Tehrathum','province_name'=>'Province 1'],
            ['district_name'=>'Udayapur ','province_name'=>'Province 1'],

            ['district_name'=>'Bara','province_name'=>'Province 2'],
            ['district_name'=>'Dhanusa','province_name'=>'Province 2'],
            ['district_name'=>'Mahottari','province_name'=>'Province 2'],
            ['district_name'=>'Parsa','province_name'=>'Province 2'],
            ['district_name'=>'Rautahat','province_name'=>'Province 2'],
            ['district_name'=>'Saptari','province_name'=>'Province 2'],
            ['district_name'=>'Sarlahi','province_name'=>'Province 2'],
            ['district_name'=>'Siraha','province_name'=>'Province 2'],

            ['district_name'=>'Bhaktapur','province_name'=>'Bagmati'],
            ['district_name'=>'Chitwan','province_name'=>'Bagmati'],
            ['district_name'=>'Dhading','province_name'=>'Bagmati'],
            ['district_name'=>'Dolakha','province_name'=>'Bagmati'],
            ['district_name'=>'Kavrepalanchok','province_name'=>'Bagmati'],
            ['district_name'=>'Kathmandu','province_name'=>'Bagmati'],
            ['district_name'=>'Lalitpur','province_name'=>'Bagmati'],
            ['district_name'=>'Makwanpur','province_name'=>'Bagmati'],
            ['district_name'=>'Nuwakot','province_name'=>'Bagmati'],
            ['district_name'=>'Ramechhap','province_name'=>'Bagmati'],
            ['district_name'=>'Rasuwa','province_name'=>'Bagmati'],
            ['district_name'=>'Sindhuli','province_name'=>'Bagmati'],
            ['district_name'=>'Sindhupalchowk','province_name'=>'Bagmati'],

            ['district_name'=>'Baglung','province_name'=>'Gandaki'],
            ['district_name'=>'Gorkha','province_name'=>'Gandaki'],
            ['district_name'=>'Kaski','province_name'=>'Gandaki'],
            ['district_name'=>'Lamjung','province_name'=>'Gandaki'],
            ['district_name'=>'Manang','province_name'=>'Gandaki'],
            ['district_name'=>'Mustang','province_name'=>'Gandaki'],
            ['district_name'=>'Myagdi','province_name'=>'Gandaki'],
            ['district_name'=>'(East) Nawalparasi','province_name'=>'Gandaki'],
            ['district_name'=>'Parbat','province_name'=>'Gandaki'],
            ['district_name'=>'Syangja','province_name'=>'Gandaki'],
            ['district_name'=>'Tanahun','province_name'=>'Gandaki'],

            ['district_name'=>'Banke','province_name'=>'Province 5'],
            ['district_name'=>'Bardiya','province_name'=>'Province 5'],
            ['district_name'=>'Arghakhanchi','province_name'=>'Province 5'],
            ['district_name'=>'Dang Deukhuri','province_name'=>'Province 5'],
            ['district_name'=>'Gulmi','province_name'=>'Province 5'],
            ['district_name'=>'Kapilvastu','province_name'=>'Province 5'],
            ['district_name'=>'(West) Nawalparasi','province_name'=>'Province 5'],
            ['district_name'=>'Palpa','province_name'=>'Province 5'],
            ['district_name'=>'Pyuthan','province_name'=>'Province 5'],
            ['district_name'=>'Rolpa','province_name'=>'Province 5'],
            ['district_name'=>'(East) Rukum','province_name'=>'Province 5'],
            ['district_name'=>'Rupandehi','province_name'=>'Province 5'],

            ['district_name'=>'Dailekh','province_name'=>'Karnali'],
            ['district_name'=>'Dolpa','province_name'=>'Karnali'],
            ['district_name'=>'Humla','province_name'=>'Karnali'],
            ['district_name'=>'Jajarkot','province_name'=>'Karnali'],
            ['district_name'=>'Jumla','province_name'=>'Karnali'],
            ['district_name'=>'Kalikot','province_name'=>'Karnali'],
            ['district_name'=>'Mugu','province_name'=>'Karnali'],
            ['district_name'=>'(West) Rukum','province_name'=>'Karnali'],
            ['district_name'=>'Salyan','province_name'=>'Karnali'],
            ['district_name'=>'Surkhet','province_name'=>'Karnali'],

            ['district_name'=>'Achham','province_name'=>'Sudurpaschim'],
            ['district_name'=>'Baitadi','province_name'=>'Sudurpaschim'],
            ['district_name'=>'Bajhang','province_name'=>'Sudurpaschim'],
            ['district_name'=>'Bajura','province_name'=>'Sudurpaschim'],
            ['district_name'=>'Dadeldhura','province_name'=>'Sudurpaschim'],
            ['district_name'=>'Darchula','province_name'=>'Sudurpaschim'],
            ['district_name'=>'Doti','province_name'=>'Sudurpaschim'],
            ['district_name'=>'Kailali','province_name'=>'Sudurpaschim'],
            ['district_name'=>'Kanchanpur','province_name'=>'Sudurpaschim'],

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
