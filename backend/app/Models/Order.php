<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'fullname',
        'address',
        'phone',
        'email',
        'total',
        'status',
    ];
    // protected $fillable = [
    //     'customer_id',
    //     'fullname',
    //     'address',
    //     'phone',
    //     'email',
    //     'total',
    //     'status',
    // ];
    public function Customers()
    {
        return $this->belongsTo(Customer::class);
    }
    public function OrderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
