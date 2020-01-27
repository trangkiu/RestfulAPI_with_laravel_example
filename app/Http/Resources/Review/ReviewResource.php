<?php

namespace App\Http\Resources\Review;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      //  return parent::toArray($request); // this will return same thing as database
      return[
        'customer'=> $this->customer,
        'body'=>$this->review,
        'star'=>$this->star

      ];
    }
}
