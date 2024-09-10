<?php

namespace App\Filters;

class InvoiceFilter extends ApiFilter
{
    protected $safeParams = [
        'amount' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'status' => ['eq'],
        'billed_dated' => ['eq', 'gt', 'gte', 'lt', 'lte'],
        'paid_dated' => ['eq', 'gt', 'gte', 'lt', 'lte'],
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
