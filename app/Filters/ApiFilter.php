<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter
{
    protected $safeParams = [];

    protected $columnMap = [];

    protected $operatorMap = [];

    public function transform(Request $request)
    {
        $eloQuery = [];

        foreach ($this->safeParams as $key => $value) {

            $query = $request->query($key);
            if (! isset($query)) {
                continue;
            }
            $column = $this->columnMap[$key] ?? $key;
            foreach ($value as $v) {

                if (isset($query[$v])) {
                    $eloQuery[] = [$column, $this->operatorMap[$v], $query[$v]];
                }
            }
        }

        return $eloQuery;
    }
}
