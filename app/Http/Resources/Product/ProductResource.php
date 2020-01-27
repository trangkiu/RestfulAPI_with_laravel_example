<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**php artisan make:resource Product/ProductResource
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      // we will format the return json as the way we want to end user
      // 'displayname'=>$this-> the column name in the database
        return [
            'name'=>$this->name,
            'descripstion'=>$this->detail,
            'price'=>$this->price,
            'stock'=>$this->stock == 0 ? 'out of stock':$this->stock,
            'discount'=>$this->discount,
            // total prize will be the price after discount
            'final_prize'=>round((1- ($this->discount/100)) * $this->price ,2),
            //sum reviews and divide by number of review
            // we also need to consider the situation where the product doesnt have any review
            'rating'=> $this->reviews->count() > 0 ?
            round($this->reviews->sum('star')/$this->reviews->count(),2):'no rating yet',
            'href'=>[
              'review'=>route('reviews.index',$this->id)
            ]
        ];
    }
}
