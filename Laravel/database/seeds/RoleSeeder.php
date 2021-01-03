<?php

use App\Cakeapp\User\Model\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB ::table('roles') -> truncate();
        $allRoles=[
            ['name'=>'Super Admin','label'=>'super-admin'],
            ['name'=>'Admin','label'=>'admin'],
            ['name'=>'Owner','label'=>'owner'],
            ['name'=>'Customer','label'=>'customer'],
            ['name'=>'Carrier','label'=>'carrier'],
        ];

        foreach ($allRoles as $role){
            Role::create($role);
         }

    }
}
