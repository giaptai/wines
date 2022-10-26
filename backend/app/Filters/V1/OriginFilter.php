<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class OriginFilter extends ApiFilter
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
