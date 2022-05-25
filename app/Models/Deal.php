<?php

namespace App\Models;
use App\Filters\FilterBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Deal extends Model
{
    use HasFactory;
    protected $fillable = ['Deal', 'Login', 'Action', 'Entry', 'Time', 'Symbol', 'Price', 'Profit', 'Volume'];
    protected $namespace = 'App\Filters';

    public function scopeFilterBy($query, $filters)
    {
        $filter = new FilterBuilder($query, $filters, $this->namespace);
        return $filter->apply();
    }
}
