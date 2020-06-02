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
        DB ::table('users') -> truncate();
        $allUser=[
        ['name'=>'Pradip','number'=>'98480','email'=>'Pradip.Pokhrel25@gmail.com','password'=>'1234'],
        ['name'=>'Prakash','number'=>'98481','email'=>'Prakash.Pokhrel111@gmail.com','password'=>'1234'],
        ['name'=>'Narayan','number'=>'98482','email'=>'Narayan.Pokhrel25@gmail.com','password'=>'1234'],
        ];

        foreach ($allUser as $user){
            $user_array=['name'=>$user['name'],'number'=>$user['number'],'email'=>$user['email'],'password'=>$user['password']];
            User::create($user_array);
    }
    }
}
