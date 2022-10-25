<?php

namespace App\Http\Resources\V1;

use App\Models\Order;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailsResource extends JsonResource
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
            'productId' => $this->product_id,
            'price' => $this->price,
            'productName' => $this->product_name,
            'quantity' => $this->quantity,
            'orderId' => $this->order_id
        ];
    }
}
