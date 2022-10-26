<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'address',
        'phone',
        'email',
        'total',
        'status',
    ];
    public function Customers()
    {
        return $this->belongsTo(Customer::class);
    }
    public function OrderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
