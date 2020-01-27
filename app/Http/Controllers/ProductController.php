<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductCollection;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use  Symfony\Component\HttpFoundation\Response;
class ProductController extends Controller
{

    // in order to create or delete a product user need authentication so we will create a constructor
    // middleware except index and show method cause these two dont need authentication to protect route
    public function __construct(){
      $this->middleware('auth:api')->except('index','show');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Product::all();
        // return ProductResource::collection(Product::all()); // this one will return everything with detail
        //return ProductCollection::collection(Product::all()); // this will return ProductCollectionthat show all products
        // paginate
        return ProductCollection::collection(Product::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // we dont need it
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //return ' this is store method';

        // save the request into database
        $product = new Product;
        $product->name = $request->name;
        $product->detail = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->discount= $request->discount;

        $product->save();

        return response([
          'data'=> new ProductResource($product)
        ], Response::HTTP_CREATED); // 201 for created
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //we need to define that everytime they call the show, it will return the productResource
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        // not gonna use it since it need to show edit form
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // Request $request we get new data : to check return $request->all();
        // Product $product we get old data : to check return $product;

        $request['detail'] = $request->description;
        unset($request['description'] );
        $product->update($request->all());

        return response([
          'data'=> new ProductResource($product)
        ], Response::HTTP_CREATED); // 201 for created
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response([
          null
        ], Response::HTTP_NO_CONTENT); // 
    }
}
