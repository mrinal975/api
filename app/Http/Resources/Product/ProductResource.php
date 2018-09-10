<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name'=>$this->name,
            'detail'=>$this->detail,
            'price'=>$this->price,
            'stock'=>$this->stock,
            'discount'=>$this->discount,
            'rating'=>$this->reviews->count()>0?
                round($this->reviews->sum('star')/$this->reviews->count(),2)
                :'No Rating Yet',
            'href'=>[
                'Reviews'=>route('reviews.index',$this->id)
            ]
        ];
    }
}
