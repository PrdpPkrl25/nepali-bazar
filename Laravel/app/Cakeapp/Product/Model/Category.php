<?php

namespace App\Cakeapp\Product\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';

    protected $fillable = ['main_category_id','category_name','icon_name'];

}
