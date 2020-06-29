<?php

use App\Cakeapp\User\Model\Role;
use Illuminate\Database\Seeder;
use App\Cakeapp\User\Model\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $allUser = [
            ['name' => 'Pradip', 'phone_number' => '98480', 'email' => 'Pradip.Pokhrel25@gmail.com', 'password' => Hash::make('1234'),'province_id'=>'5','district_id'=>'47','municipal_id'=>'1','ward_id'=>'11','role'=>'super-admin'],
            ['name' => 'Prakash', 'phone_number' => '98481', 'email' => 'Prakash.Pokhrel111@gmail.com', 'password' => Hash::make('1234'),'province_id'=>'5','district_id'=>'47','municipal_id'=>'1','ward_id'=>'11','role'=>'admin'],
            ['name' => 'Narayan', 'phone_number' => '98482', 'email' => 'Narayan.Pokhrel25@gmail.com', 'password' => Hash::make('1234'),'province_id'=>'5','district_id'=>'47','municipal_id'=>'1','ward_id'=>'11','role'=>'owner'],
            ['name' => 'Prativa', 'phone_number' => '98483', 'email' => 'Prativa.Pokhrel25@gmail.com', 'password' => Hash::make('1234'),'province_id'=>'5','district_id'=>'47','municipal_id'=>'1','ward_id'=>'11','role'=>'customer'],
            ['name' => 'Tara', 'phone_number' => '98484', 'email' => 'Tara.Pokhrel25@gmail.com', 'password' => Hash::make('1234'),'province_id'=>'5','district_id'=>'47','municipal_id'=>'1','ward_id'=>'11','role'=>'carrier'],
        ];

        foreach ($allUser as $user) {
            $role=$user['role'];
            unset($user['role']);
            $user_object=User::create($user);
            $role_object=Role::where('label',$role)->first();
            $user_object->roles()->attach($role_object->id);
        }
    }
}
