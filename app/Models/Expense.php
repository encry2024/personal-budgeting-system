<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Item;

class Expense extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['name'];

    public function items()
    {
        return $this->hasMany(Item::class, 'expense_id', 'id');
    }
}
