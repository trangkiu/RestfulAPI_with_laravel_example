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
            'stock'=>$this->stock,
            'discount'=>$this->discount

        ];
    }
}
