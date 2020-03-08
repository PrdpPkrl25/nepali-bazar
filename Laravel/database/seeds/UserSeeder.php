<?php

use Illuminate\Database\Seeder;
use App\Cakeapp\User\Model\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allUser=[
        ['name'=>'Pradip','email'=>'Pradip.Pokhrel25@gmail.com','password'=>'1234'],
        ['name'=>'Prakash','email'=>'Prakash.Pokhrel111@gmail.com','password'=>'5678'],
        ['name'=>'Narayan','email'=>'Narayan.Pokhrel25@gmail.com','password'=>'abcd'],
        ];

        foreach ($allUser as $user){
            $user_array=['name'=>$user['name'],'email'=>$user['email'],'password'=>$user['password']];
            User::create($user_array);
    }
    }
}
