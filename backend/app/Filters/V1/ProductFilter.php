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
        'price' => ['between', 'sort'],
        'c' => ['eq', 'lt', 'lte', 'gt', 'gte', 'between'],
    ];

    protected $columMap = [
        'cateId' => 'category_id',
        'brandId' => 'brand_id',
        'originId' => 'origin_id'
    ];
    protected $operatorMap = [
        'eq' => '=',
        'like' => 'like',
        'in' => 'in',
        'between' => 'between',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'sort' => 'sort'
    ];
}
