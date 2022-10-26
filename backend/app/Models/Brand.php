<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'images',
        'description'
    ];
    public function Products()
    {
        return $this->hasMany(Product::class);
    }
}
