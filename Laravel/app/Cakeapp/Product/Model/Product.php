<?php

namespace App\Cakeapp\Product\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'flavour', 'quantity','price'
    ];
}
