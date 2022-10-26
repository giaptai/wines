<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class CategoryFilter extends ApiFilter
{
    protected $safeParms = [
        'id' => ['eq'],
        'name' => ['like'],
    ];

    protected $columMap = [
        'postalCode' => 'postal_code'
    ];
    protected $operatorMap = [
        'eq' => '=',
        'like' => 'like',
    ];
}
