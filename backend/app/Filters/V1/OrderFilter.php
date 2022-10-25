<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class OrderFilter extends ApiFilter
{
    protected $safeParms = [
        'id' => ['eq'],
        'customerId' => ['eq'],
        'total' => ['eq', 'lt', 'gt', 'lte', 'gte'],
        'status' => ['eq', 'ne'],
        'phone' => ['eq'],
        'fullname' => ['like'],
        'created_at' => ['eq', 'lt', 'lte', 'gt', 'gte', 'ne']
    ];

    protected $columMap = [
        'customerId' => 'customer_id',
    ];
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!=',
        'like' => 'like'
    ];
}
