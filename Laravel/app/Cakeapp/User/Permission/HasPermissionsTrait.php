<?php


namespace App\Cakeapp\User\Permission;


use App\Cakeapp\User\Model\Permission;
use App\Cakeapp\User\Model\Role;
use phpDocumentor\Reflection\Types\Null_;

trait HasPermissionsTrait
{
    public function givePermissionsTo(...$permissions){
        $permissions=$this->getAllPermissions($permissions);
        if($permissions===null){
            return $this;
        }
        $this->permission()->saveMany($permissions);
        return $this;
    }

    public function withdrawPermissionsTo( ... $permissions ) {

        $permissions = $this->getAllPermissions($permissions);
        $this->permissions()->detach($permissions);
        return $this;

    }

    public function refreshPermissions( ... $permissions ) {

        $this->permissions()->detach();
        return $this->givePermissionsTo($permissions);
    }

    public function hasPermissionTo($permission) {

        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    public function hasPermissionThroughRole($permission) {

        foreach ($permission->roles as $role){
            if($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole( ... $roles ) {

        foreach ($roles as $role) {
            if ($this->roles->contains('label', $role)) {
                return true;
            }
        }
        return false;
    }

    public function roles() {

        return $this->belongsToMany(Role::class,'users_roles');

    }
    public function permissions() {

        return $this->belongsToMany(Permission::class,'users_permissions');

    }
    protected function hasPermission($permission) {

        return (bool) $this->permissions->where('label', $permission->label)->count();
    }

    protected function getAllPermissions(array $permissions) {

        return Permission::whereIn('label',$permissions)->get();

    }

}
