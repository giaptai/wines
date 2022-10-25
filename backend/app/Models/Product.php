<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'images',
        'quantity',
        'status',
        'vol',
        'c',
        'price',
        'brand_id',
        'origin_id',
        'category_id',
    ];
    public function Categories()
    {
        return $this->belongsTo(Category::class);
    }
}
