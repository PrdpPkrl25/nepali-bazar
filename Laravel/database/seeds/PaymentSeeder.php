<?php

use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allPayment = [
            ['municipal_name' => 'Kohalpur', 'district_name' => 'Banke','number_of_wards'=>10],
            ['municipal_name' => 'Nepalgunj', 'district_name' => 'Banke','number_of_wards'=>15],
            ['municipal_name' => 'Gulariya', 'district_name' => 'Bardiya','number_of_wards'=>20],

        ];


        foreach ($allPayment as $payment) {
            $district_name = $municipal['district_name'];
            $district_object= District::where('district_name','=',$district_name)->first();
            $district_id=$district_object->id;
            $municipal_array=['municipal_name'=>$municipal['municipal_name'],'district_id'=>$district_id,'number_of_wards'=>$municipal['number_of_wards']];
            Municipal::create($municipal_array);


        }
    }
}
