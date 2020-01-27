<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductCollection extends Resource
{
    /** php artisan make:resource Product/ProductCollection
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      //  return parent::toArray($request); // this one will return whatever in the database
      // customize the return string
      return [

        'name'=>$this->name,
        'discount'=>$this->discount,
        'final_prize'=>round((1- ($this->discount/100)) * $this->price ,2),
        'rating'=> $this->reviews->count() > 0 ?
        round($this->reviews->sum('star')/$this->reviews->count(),2):'no rating yet',
        'href'=>[
          'link'=>route('products.show',$this->id)
        ]
      ];
    }
}
