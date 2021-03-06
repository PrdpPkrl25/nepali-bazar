<?php

use App\Cakeapp\User\Model\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB ::table('permissions') -> truncate();
        $allPermissions=[
            ['name'=>'Create Role','label'=>'create-role'],
            ['name'=>'Create Permission','label'=>'create-permission'],
            ['name'=>'Create Customer','label'=>'create-customer'],
            ['name'=>'Create Owner','label'=>'create-owner'],
            ['name'=>'Create Carrier','label'=>'create-carrier'],
            ['name'=>'Create Product','label'=>'create-product'],
            ['name'=>'Create Shop','label'=>'create-shop'],
            ['name'=>'Create Category','label'=>'create-category'],

            ['name'=>'Read Role','label'=>'read-role'],
            ['name'=>'Read Permission','label'=>'read-permission'],
            ['name'=>'Read Customer','label'=>'read-customer'],
            ['name'=>'Read Owner','label'=>'read-owner'],
            ['name'=>'Read Carrier','label'=>'read-carrier'],
            ['name'=>'Read Product','label'=>'read-product'],
            ['name'=>'Read Shop','label'=>'read-shop'],
            ['name'=>'Read Category','label'=>'read-category'],

            ['name'=>'Edit Role','label'=>'edit-role'],
            ['name'=>'Edit Permission','label'=>'edit-permission'],
            ['name'=>'Edit Customer','label'=>'edit-customer'],
            ['name'=>'Edit Owner','label'=>'edit-owner'],
            ['name'=>'Edit Carrier','label'=>'edit-carrier'],
            ['name'=>'Edit Product','label'=>'edit-product'],
            ['name'=>'Edit Shop','label'=>'edit-shop'],
            ['name'=>'Edit Category','label'=>'edit-category'],

            ['name'=>'Delete Role','label'=>'delete-role'],
            ['name'=>'Delete Permission','label'=>'delete-permission'],
            ['name'=>'Delete Customer','label'=>'delete-customer'],
            ['name'=>'Delete Owner','label'=>'delete-owner'],
            ['name'=>'Delete Carrier','label'=>'delete-carrier'],
            ['name'=>'Delete Product','label'=>'delete-product'],
            ['name'=>'Delete Shop','label'=>'delete-shop'],
            ['name'=>'Delete Category','label'=>'delete-category'],

        ];

        foreach ($allPermissions as $permission){
            $permission_array=['name'=>$permission['name'],'label'=>$permission['label']];
            Permission::create($permission_array);
        }
    }

}
