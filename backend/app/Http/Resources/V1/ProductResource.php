<?php

namespace App\Http\Resources\V1;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Origin;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name' => $this->name,
            'images' => $this->images,
            'description' => $this->description,
            'vol' => $this->vol,
            'c' => $this->c,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'status' => $this->status,
            'year' => $this->year,
            'category' => new CategoryCollection(Category::where('id', $this->category_id)->get()),
            'brand' => new BrandCollection(Brand::where('id', $this->brand_id)->get()),
            'origin' => new OriginCollection(Origin::Where('id', $this->origin_id)->get()),
            'created_at' => $this->created_at,
            'update_at' => $this->updated_at
        ];
    }
}
