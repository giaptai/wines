<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\BrandFilter;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;
use App\Http\Resources\V1\BrandCollection;
use App\Http\Resources\V1\BrandResource;
use App\Models\Category;
use App\Models\Product;
date_default_timezone_set('Asia/Ho_Chi_Minh');

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filler = new BrandFilter();
        $fillerItems = $filler->transform($request);
        $includeProducts = $request->query('includeProducts');
        $brand = Brand::where($fillerItems);
        if ($includeProducts) {
            $brand->with('products');
        }
        return new BrandCollection($brand->paginate()->appends($request->query()));
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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBrandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request)
    {
        $brand = Brand::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Thêm mới thương hiệu thành công!',
            'data' => [
                $brand
            ]
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($brand = Brand::find($id)) {
            $includeOrders = request()->query('includeProducts');
            if ($includeOrders) {
                return  new BrandResource($brand->loadMissing('products'));
            }
            return new BrandResource($brand);
        }
        return response()->json([
            'status' => false,
            'mesage' => 'không tìm thấy thương hiện này'
        ], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBrandRequest  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $brand = $brand->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Cập nhật thương hiệu thành công!',
            'data' => [
                $brand
            ]
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Brand::find($id)) {
            if (Product::where('brand_id', $id)->first()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Không thể xóa thương hiệu này !'
                ], 200);
            } elseif (Brand::destroy($id)) {
                return response()->json([
                    'status' => true,
                    'message' => 'Xóa thương hiệu thành công !'
                ], 200);
            }
        }
        return response()->json([
            'status' => false,
            'message' => 'Không tìm thấy thương hiệu này !'
        ], 200);
    }
}
