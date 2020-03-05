<?php

namespace App\Cakeapp\Location\Model;

use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    protected $table = 'localities';
    protected $fillable = ['locality_name','municipal_id'];

    protected function municipal()
    {
        return $this->belongsTo(Municipal::class);
    }



}
