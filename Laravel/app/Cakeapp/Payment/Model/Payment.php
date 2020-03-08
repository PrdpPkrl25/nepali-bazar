<?php

namespace App\Cakeapp\Payment\Model;

use App\Cakeapp\Purchase\Model\Purchase;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'payment_date','is_success','purchase_id',
    ];

    protected function purchase(){
        return $this-> belongsTo(Purchase::class,'purchase_id');
    }
}
