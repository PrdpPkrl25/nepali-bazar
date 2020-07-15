<?php

namespace App\Cakeapp\Location\Model;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';
    protected $fillable = ['district_name','province_id'];

   public function province()
    {
        return $this->belongsTo(Province::class);
    }

}
