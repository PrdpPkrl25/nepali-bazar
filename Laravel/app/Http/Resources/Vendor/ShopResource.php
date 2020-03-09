<?php

namespace App\Http\Resources\Vendor;


use App\Http\Resources\Location\MunicipalResource;
use Illuminate\Http\Resources\Json\JsonResource;



class ShopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'address'=>$this->address,
            'phone'=>$this->phone,
            'municipal'=> new MunicipalResource($this->municipal),
            'number_of_flavour'=>$this->number_of_flavour,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
