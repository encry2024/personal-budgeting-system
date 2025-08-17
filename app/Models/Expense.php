<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ExpenseAttributeValue;

class Expense extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['user_id', 'name'];

    public function attributes()
    {
        return $this->hasMany(ExpenseAttributeValue, 'expense_id', 'id');
    }
}
