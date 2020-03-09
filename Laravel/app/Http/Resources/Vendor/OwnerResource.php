<?php

namespace App\Http\Resources\Vendor;


use App\Http\Resources\User\UserResource;
use App\Http\Resources\Vendor\ShopResource;
use Illuminate\Http\Resources\Json\JsonResource;

class OwnerResource extends JsonResource
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
            'shop'=>new ShopResource($this->shop),
            'user'=>new UserResource($this->user),
            ];
    }
}
