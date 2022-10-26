<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'firstname',
        'lastname',
        'phone',
        'email',
        'city',
        'state',
        'address',
        'type',
    ];
    public function Orders()
    {
        return $this->hasMany(Order::class);
    }
}
