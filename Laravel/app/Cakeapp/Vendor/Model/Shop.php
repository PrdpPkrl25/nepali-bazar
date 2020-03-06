<?php

namespace App\Cakeapp\Vendor\Model;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shops';

    protected $fillable = ['name','email','address','phone','no_of_flavour'];
}
