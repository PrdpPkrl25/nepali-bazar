<?php

namespace App\Cakeapp\Location\Model;

use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    protected $table = 'localities';
    protected $fillable = ['locality_name','ward_id'];

    protected function ward()
    {
        return $this->belongsTo(Ward::class);
    }



}
