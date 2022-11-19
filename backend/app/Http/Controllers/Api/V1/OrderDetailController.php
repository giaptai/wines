<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BulkStoreOrderDetailRequest;
use App\Models\OrderDetail;
use App\Http\Requests\StoreOrderDetailRequest;
use App\Http\Requests\UpdateOrderDetailRequest;
use App\Http\Resources\V1\OrderDetailsCollection;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

date_default_timezone_set('Asia/Ho_Chi_Minh');

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new OrderDetailsCollection(OrderDetail::all());
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
     * 1. Create orderdetail.
     *
     *  [
     *      { "id": 1,
     *      "productId": 26,
     *      "price": "8.00",
     *      "productName": "Dr. Mervin Rippin III",
     *      "quantity": 5,
     *      "orderId": 1
     *      },
     *      {
     *      "id": 2,
     *      "productId": 27,
     *      "price": "2.00",
     *      "productName": "Jeanie Schulist V",
     *      "quantity": 3,
     *      "orderId": 2
     *      },
     * ]
     * 
     * @param  \App\Http\Requests\StoreOrderDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderDetailRequest $request)
    {
        $bulk = collect($request->all())->map(function ($arr, $key) {
            return Arr::except($arr, ['productId', 'productName', 'orderId']);
        });
        foreach ($bulk as $item) {
            OrderDetail::create($item);
        }
        return response()->json(['status' => true, 'message' => 'Add orderdetails successfully !', 'data' => [$bulk]]);
    }

    /**
     * Insert mutiple Order
     */
    // public function bulkStore(BulkStoreOrderDetailRequest $request)
    // {
    //     return $request;
    //     $bulk = collect($request->all())->map(function ($arr, $key) {
    //         return Arr::except($arr, ['productId', 'productName', 'orderId']);
    //     });

    //     return $bulk->toArray();
    //     OrderDetail::insert($bulk->toArray());
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderDetailRequest  $request
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderDetailRequest $request, OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderDetail $orderDetail)
    {
        //
    }
}
