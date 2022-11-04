<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\OriginFilter;
use App\Http\Controllers\Controller;
use App\Models\Origin;
use App\Http\Requests\StoreOriginRequest;
use App\Http\Requests\UpdateOriginRequest;
use App\Http\Resources\V1\OriginCollection;
use App\Http\Resources\V1\OriginResource;
use App\Models\Product;
use Illuminate\Http\Request;

class OriginController extends Controller
{
    /**
     * 1. Get all Origins
     * url: http://localhost:8000/api/v1/origins.
     *
     * 2. Search Origins by name
     * url: http://localhost:8000/api/v1/origins?name[like]=name.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filler = new OriginFilter();
        $fillerItems = $filler->transform($request);
        $includeProducts = $request->query('includeProducts');
        $category = Origin::where($fillerItems);
        if ($includeProducts) {
            $category->with('Products');
        }
        return new OriginCollection($category->paginate()->appends($request->query()));
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
     * 1. Add new origin .
     * url: http://localhost:8000/api/v1/origins.
     * method: POST
     * data{
     *  'name':'name',
     * ''description':'description'
     * }
     *
     * @param  \App\Http\Requests\StoreOriginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOriginRequest $request)
    {
        $origin = Origin::create($request->all());
        return response()->json([
            'status' => true,
            'message' => "Thêm mới quốc gia thành công",
            'data' => [
                $origin
            ]
        ], 200);
    }

    /**
     * 1. Add new origin .
     * url: http://localhost:8000/api/v1/origins/id.
     *
     * @param  \App\Models\Origin  $origin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($origin = Origin::find($id)) {
            $includeOrders = request()->query('includeProducts');
            if ($includeOrders) {
                return  new OriginResource($origin->loadMissing('products'));
            }
            return new OriginResource($origin);
        }
        return response()->json([
            'status' => false,
            'message' => 'Không tìm thấy quốc gia này'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Origin  $origin
     * @return \Illuminate\Http\Response
     */
    public function edit(Origin $origin)
    {
        //
    }

    /**
     * * 1. Update origin .
     * url: http://localhost:8000/api/v1/origins/id.
     * method: PUT/PATCH
     * data{
     *  'name':'name',
     * ''description':'description'
     * }
     *
     * @param  \App\Http\Requests\UpdateOriginRequest  $request
     * @param  \App\Models\Origin  $origin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOriginRequest $request, Origin $origin)
    {
        $origin = $origin->update($request->all());
        return response()->json([
            'status' => true,
            'message' => "Cập nhật quốc gia thành công",
            'data' => [
                $origin
            ]
        ], 200);
    }

    /**
     * 1. Remove origin by id.
     * url: http://localhost:8000/api/v1/origins/id.
     * method: Delete
     *
     * @param  \App\Models\Origin  $origin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Origin::find($id)) {
            if (Product::where('origin_id', $id)->first()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Không thể xóa nơi xuất xứ này !'
                ], 200);
            } elseif (Origin::destroy($id)) {
                return response()->json([
                    'status' => true,
                    'message' => 'Xóa nơi xuất xứ thành công !'
                ], 200);
            }
        }
        return response()->json([
            'status' => false,
            'message' => 'Không tìm thấy nơi xuất xứ này !'
        ], 200);
    }
}
