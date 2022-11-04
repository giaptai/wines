<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Origin extends Model
{
    use HasApiTokens, HasFactory;
    protected $fillable = [
        'name',
        'description'
    ];
    public function Products()
    {
        return $this->hasMany(Product::class);
    }
}
