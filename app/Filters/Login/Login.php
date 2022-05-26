<?php

namespace App\Filters\Login;

use App\Filters\QueryFilter;
use App\Filters\FilterContract;

class Login extends QueryFilter implements FilterContract
{
    public function handle($value): void
    {
        $this->query->orwhere('Login', $value);
    }
}