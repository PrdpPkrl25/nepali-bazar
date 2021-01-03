<?php

namespace App\Http\Resources\Location;

use Illuminate\Http\Resources\Json\JsonResource;

class MunicipalResource extends JsonResource
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
            'municipal_name'=>$this->municipal_name,
            'district_id'=>$this->district_id,
            'number_of_wards'=>$this->number_of_wards,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
