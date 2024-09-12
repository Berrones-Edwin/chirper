<?php

declare(strict_types=1);

namespace App\Filters;

use Illuminate\Http\Request;

final class ApiFilter
{
     private array $safeParams = [];

     private array $columnMap = [];

     private array $operatorMap = [];

     /**
      * @return mixed[][]
      */
    public function transform(Request $request):array
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
