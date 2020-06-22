<?php

namespace App\Cakeapp\Common\Model;

use Illuminate\Database\Eloquent\Model;

class ViewCount extends Model
{
    protected $table='view_counts';

    protected $fillable = ['user_id','table_id','model','session_id'];
}
