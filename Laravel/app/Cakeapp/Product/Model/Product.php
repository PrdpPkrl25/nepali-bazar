<?php

namespace App\Cakeapp\Product\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';

    protected $fillable = [
       'category_id', 'product_name', 'quantity','price','measure_unit','image_name'
    ];
}
