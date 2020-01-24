<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Review;
class Product extends Model
{
    //because one product will have many review
    public function reviews(){
      return $this->hasMany(Review::class);
    }
}
