<?php

namespace App\Cakeapp\Location\Model;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'wards';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['municipal_id', 'ward_number'];

    protected function municipal()
    {
        return $this->belongsTo(Municipal::class,'municipal_id');
    }


}
