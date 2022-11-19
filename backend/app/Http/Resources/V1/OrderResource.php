<?php

namespace App\Http\Resources\V1;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'customerid' => $this->customer_id,
            'total' => $this->total,
            'status' => $this->status,
            'email' => $this->email,
            'phone'=>$this->phone,
            'address' => $this->address,
            'fullname' => $this->fullname,
            'orderDetails' => new OrderDetailsCollection(OrderDetail::where('order_id', $this->id)->paginate()),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
