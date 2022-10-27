<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\V1\OrderResource;
use App\Http\Resources\V1\OrderCollection;
use App\Filters\V1\OrderFilter;
use App\Http\Requests\BulkStoreOrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * get orderdetails by customer id
     * http://localhost:8000/api/v1/orders?customerId[eq]=1
     * 
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        /**
         * check auth
         */
        // $user = request()->user();
        // if ($user->role_as == 0) {
        //     $filler = new OrderFilter();
        //     $fillerItems = $filler->transform($request);
        //     $order = Order::where($fillerItems)->where('customer_id', $user->id);
        //     return $order->paginate();
        // }

        $filler = new OrderFilter();
        $fillerItems = $filler->transform($request);
        $order = Order::where($fillerItems);
        return $order->paginate();
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
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        return new OrderResource(Order::create($request->all()));
    }

    public function bulkStore(BulkStoreOrderRequest  $request)
    {
        $bulk = collect($request->all())->map(function ($arr, $key) {
            return Arr::except($arr, ['customerId', 'billedDate', 'paidDate']);
        });

        Order::insert($bulk->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        // $user = request()->user();
        // if ($user->role_as == 0) {
        //     $orderUser = Order::where('id', $order->id)->with('orderDetails')->get();
        //     return new OrderCollection($orderUser);
        // }
        return new OrderResource($order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Updated status successfully !',
            'data' => [
                $order
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
