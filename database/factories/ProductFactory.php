<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->word ,
        'detail' =>$faker->paragraphs(rand(3,7),true),
        'price' =>rand(100,1000),
        'stock' =>rand(0,10000),
        'discount' =>rand(2,30)
    ];
});
