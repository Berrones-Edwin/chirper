<?php

namespace App\Filters;

class CustomerFilter extends ApiFilter
{
    protected $safeParams = [
        'name' => ['eq'],
        'email' => ['eq'],
        'type' => ['eq'],
        'city' => ['eq'],
    ];

    protected $columnMap = [

    ];

    protected $operatorMap = [
        'eq' => '=',
        'neq' => '!=',
        'gt' => '>',
        'gte' => '>=',
        'lt' => '<',
        'lte' => '<=',
    ];
}
