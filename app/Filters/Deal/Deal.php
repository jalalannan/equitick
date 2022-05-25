<?php

namespace App\Filters\Deal;

use App\Filters\QueryFilter;
use App\Filters\FilterContract;

class Deal extends QueryFilter implements FilterContract
{
    public function handle($value): void
    {
        $this->query->where('deal', $value);
    }
}