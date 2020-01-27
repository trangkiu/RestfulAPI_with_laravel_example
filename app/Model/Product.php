<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Review;
class Product extends Model
{
    // we need fillable for update
    protected $fillable = [
      'name','detail','price','stock','discount'

    ];

    //because one product will have many review
    public function reviews(){
      return $this->hasMany(Review::class);
    }
}
