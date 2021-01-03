<?php

namespace App\Cakeapp\User\Model;



use App\Cakeapp\Common\Eloquent\Repository;

class RoleRepository extends Repository
{

    /**
     * Specify Model class name
     * @return mixed
     */
    public function model()
    {
        return Role::class;
    }

    public function getPermissionOfAllRoles()
    {
        $permissions = Permission ::with('roles') -> get();
        $rolesArray = Role::all()->pluck('id');
        foreach($permissions as $permission) {
            $perm_role = [];
            foreach($permission -> roles as $role) {
                array_push($perm_role, $role->id);
            }
            foreach($rolesArray as $item) {
                if(in_array($item, $perm_role))
                    $permission[$item] = 1;
                else
                    $permission[$item] = 0;
            }
        }
        return $permissions;
    }

    public function getIndexViewData(){

    }

    public function handleCreate($request)
    {

    }

    public function showData($id)
    {

    }

    public function handleDelete($id)
    {

    }

}
