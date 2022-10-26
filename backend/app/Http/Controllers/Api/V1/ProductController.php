<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\ProductFilter;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\V1\ProductCollection;
use App\Http\Resources\V1\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * 1. Get all product
     * url: http://localhost:8000/api/v1/products.
     *
     * 2. filter product by name
     *url http://localhost:8000/api/v1/products?name[eq]=a
     *
     * 3. filter product by category_id(cateId)
     * url: http://localhost:8000/api/v1/products?cateId[eq]=3
     * 
     * 4. filter product by categories
     * url: http://localhost:8000/api/v1/products?cateId[in]=[3,4,5]
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filler = new ProductFilter();
        $product = new Product();
        $filterItems = $filler->transform($request);
        foreach ($filterItems as $items) {
            if ($items[1] == 'in') {
                $integerIDs = array_map('intval', json_decode($items[2], true));
                $product = $product->whereIn($items[0], $integerIDs);
            } else {
                $tmp[] = $items;
                $product = $product->where($tmp);
            }
        }
        return $product->select('id', 'name', 'price', 'images')->paginate()->appends($request->query());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * * url: http://localhost:8000/api/v1/products/
     * method: POST
     * data: {
     *  "name" : "",
     *  "description" : "",
     *  "images" : "",
     *  "quantity" : "",
     *  "status" : "",
     *  "vol":"",
     *  "c":"",
     * "year":"",
     *  "price":"",
     *  "brand_id" : "",
     *  "origin_id" : "",
     *  "category_id" :"",
     * }
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = new ProductResource(Product::create($request->all()));
        return response()->json([
            'status' => true,
            'message' => 'Create new product successfully!',
            'data' => $product
        ], 200);
    }

    /**
     * 1. Get product details.
     * url: http://localhost:8000/api/v1/products/1
     * 
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update information product.
     * url: http://localhost:8000/api/v1/products/
     * method: PUT/PATCH
     * data: {
     *  "name" : "",
     *  "description" : "",
     *  "images" : "",
     *  "quantity" : "",
     *  "status" : "",
     *  "vol":"",
     *  "c":"",
     *  "price":"",
     *  "brand_id" : "",
     *  "origin_id" : "",
     *  "category_id" :"",
     * }
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Updated product successfully !',
        ]);
        // return $product;
        // return new ProductCollection(Product::find($product));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::deleted($id);
        return response()->json([
            'status' => true,
            'message' => 'Deleted productId=' . $id . ' successfully !'
        ], 200);
    }
}
