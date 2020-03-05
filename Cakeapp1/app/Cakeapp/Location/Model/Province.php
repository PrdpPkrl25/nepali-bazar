<?php

namespace App\Cakeapp\Location\Model;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table= 'provinces';
    protected $fillable =[
        'province_name','province_number'] ;
}
