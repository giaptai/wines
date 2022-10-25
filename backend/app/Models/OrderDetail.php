<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'price',
        'product_name',
        'quantity',
        'order_id'
    ];
    public function Orders()
    {
        return $this->belongsTo(Order::class);
    }
}
