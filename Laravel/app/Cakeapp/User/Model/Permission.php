<?php

namespace App\Cakeapp\User\Model;

use App\Cakeapp\User\Model\User;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table='permissions';
    protected $fillable=['name','label'];

    public function roles(){
        return $this->belongsToMany(Role::class,'roles_permissions');
    }

    public function users(){
        return $this->belongsToMany(User::class,'users_permissions');
    }
}
