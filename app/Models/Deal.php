<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Deal extends Model
{
    use HasFactory;
    protected $fillable = ['Deal', 'Login', 'Action', 'Entry', 'Time', 'Symbol', 'Price', 'Profit', 'Volume'];

    public function get($id)
    {
        return Deal::where('id', $id)->first();
    }
}
