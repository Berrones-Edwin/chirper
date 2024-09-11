<?php

declare(strict_types=1);

namespace App\Filters;

use Illuminate\Http\Request;

final class ApiFilter
{
    private $safeParams = [];

    private $columnMap = [];

    private $operatorMap = [];

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
