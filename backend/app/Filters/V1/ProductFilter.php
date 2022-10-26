<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class ProductFilter extends ApiFilter
{
    protected $safeParms = [
        'id' => ['eq'],
        'name' => ['like'],
        'description' => ['like'],
        'originId' => ['eq', 'in'],
        'brandId' => ['eq', 'in'],
        'cateId' => ['eq', 'in'],
    ];

    protected $columMap = [
        'cateId' => 'category_id',
        'brandId' => 'brand_id',
        'originId' => 'origin_id'
    ];
    protected $operatorMap = [
        'eq' => '=',
        'like' => 'like',
        'in' => 'in'
    ];
}
