<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Origin extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function Products()
    {
        return $this->hasMany(Product::class);
    }
}
