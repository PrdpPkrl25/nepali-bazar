<?php

namespace App\Cakeapp\Auth;

use App\Cakeapp\User\Model\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='roles';
    protected $fillable=['name','label'];

    protected function permissions(){
        return $this->belongsToMany(Permission::class,'roles_permission');
    }

    protected function users(){
        return $this->belongsToMany(User::class,'users_roles');
    }
}
