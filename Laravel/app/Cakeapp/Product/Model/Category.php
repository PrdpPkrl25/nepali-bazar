<?php

namespace App\Cakeapp\Product\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';

    protected $fillable = ['main_category_id','category_name','icon_name'];

    public function subCategories(){
        return $this->hasMany(Category::class,'main_category_id');
    }

    public function mainCategory(){
        return $this->belongsTo(Category::class,'main_category_id');
    }

}
