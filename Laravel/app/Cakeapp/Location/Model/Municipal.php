<?php

namespace App\Cakeapp\Location\Model;

use Illuminate\Database\Eloquent\Model;

class Municipal extends Model
{
    protected $table = 'municipals';
    protected $fillable = ['municipal_name','district_id','number_of_wards'];

    protected function district()
    {
        return $this->belongsTo(District::class);
    }
}
