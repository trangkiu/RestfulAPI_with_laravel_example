<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// this resource command will create REST control include create and edit
// however because we are using API so we dont have any page to show create and edit
// so we will u apiResource instead
// Route::resource('/products','ProductController');
Route::apiResource('/products','ProductController');

// when it comes to review, the url will looks like products/{productId}/reviews
// so we need to group them to give prefix
Route::group(['prefix'=>'products'],function(){
  Route::apiResource('/{product}/reviews', 'ReviewController');
});
