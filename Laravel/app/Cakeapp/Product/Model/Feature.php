<?php

namespace App\Cakeapp\Product\Model;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table='features';

    protected $fillable = [
        'name', 'product_id', 'description',
    ];

    public function product(){
       return $this->belongsTo(Product::class,'product_id');
    }

}
