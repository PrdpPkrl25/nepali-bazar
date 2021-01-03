<?php

namespace App\Cakeapp\User\Model;

use Illuminate\Database\Eloquent\Model;

class AuthenticationLog extends Model
{
    protected $table='authentication_logs';
    protected $fillable=['user_id','ip_address','session_id','login_time','logout_time'];
}
