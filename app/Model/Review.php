<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Product;
class Review extends Model
{
    //because one review only belong to one product
    public function product(){
      return $this->belongsTo(Product::class);
    }
}
