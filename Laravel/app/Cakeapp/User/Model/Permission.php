<?php

namespace App\Cakeapp\Auth;

use App\Cakeapp\User\Model\User;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table='permissions';
    protected $fillable=['name','label'];

    protected function roles(){
        return $this->belongsToMany(Role::class,'roles_permission');
    }

    protected function users(){
        return $this->belongsToMany(User::class,'users_permission');
    }
}
