<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\V1\CategoryCollection;
use App\Http\Resources\V1\CategoryResource;
use Illuminate\Http\Request;
use App\Filters\V1\CategoryFilter;
use App\Models\Product;
date_default_timezone_set('Asia/Ho_Chi_Minh');

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filler = new CategoryFilter();
        $fillerItems = $filler->transform($request);
        $includeProducts = $request->query('includeProducts');
        $category = Category::where($fillerItems);
        if ($includeProducts) {
            $category->with('Products');
        }
        return new CategoryCollection($category->paginate()->appends($request->query()));
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
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Thêm mới thể loại thành công!',
            'data' => [
                $category
            ]
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($category = Category::find($id)) {
            $includeOrders = request()->query('includeProducts');
            if ($includeOrders) {
                return  new CategoryResource($category->loadMissing('products'));
            }
            return new CategoryResource($category);
        }
        return response()->json([
            'status' => false,
            'message' => 'Không tìm thấy thể loại này'
        ], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category = $category->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Chỉnh sửa thể loại thành công!',
            'data' => [
                $category
            ]
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Category::find($id)) {
            if (Product::where('category_id', $id)->first()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Không thể xóa thể loại này !'
                ], 200);
            } elseif (Category::destroy($id)) {
                return response()->json([
                    'status' => true,
                    'message' => 'Xóa thể loại thành công !'
                ], 200);
            }
        }
        return response()->json([
            'status' => false,
            'message' => 'Không tìm thấy thể loại này !'
        ], 200);
    }
}
