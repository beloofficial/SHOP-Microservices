<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
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
            'status'=>'success',
            'data' => [
                'id'=>$this->id,
                'name'=>$this->name,
                'price'=>$this->price,
                'created_at'=>$this->created_at
            ]
        ];
    }
}
