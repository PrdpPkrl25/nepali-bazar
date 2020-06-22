<?php

namespace App\Cakeapp\User\Model;

use App\Cakeapp\User\Model\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='roles';
    protected $fillable=['name','label'];

    public function permissions(){
        return $this->belongsToMany(Permission::class,'roles_permissions');
    }

    public function users(){
        return $this->belongsToMany(User::class,'users_roles');
    }
}
